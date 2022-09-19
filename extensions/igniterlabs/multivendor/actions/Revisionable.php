<?php

namespace IgniterLabs\MultiVendor\Actions;

use Admin\Facades\AdminAuth;
use Admin\Facades\AdminLocation;
use Igniter\Flame\Database\Model;
use Igniter\Flame\Traits\ExtensionTrait;
use IgniterLabs\MultiVendor\Classes\Vendor;
use IgniterLabs\MultiVendor\Models\RevisionHistory;
use IgniterLabs\MultiVendor\Models\Settings;
use System\Actions\ModelAction;

class Revisionable extends ModelAction
{
    use ExtensionTrait;

    protected $revisionableOriginalAttributes;

    protected $revisionableDirtyAttributes;

    protected $revisionableUpdating = false;

//    protected $revisionableMaxRevisions = 10;
//
//    protected $excludeRevisionableAttributes = [];
//
//    protected $includeRevisionableHiddenAttributes = [];

    public function __construct(Model $model)
    {
        parent::__construct($model);

        $this->model->relation['morphToMany']['revisions'] = [
            RevisionHistory::class, 'name' => 'revisionable',
        ];

        $this->model->addCasts(['is_pending_review' => 'boolean']);

        $this->model->bindEvent('model.afterFetch', [$this, 'afterModelFetch']);
        $this->model->bindEvent('model.beforeSave', [$this, 'beforeModelSave']);
        $this->model->bindEvent('model.afterSave', [$this, 'afterModelSave']);
        $this->model->bindEvent('model.afterDelete', [$this, 'afterModelDelete']);
    }

    public function afterModelFetch()
    {
        if (!$this->revisioningEnabled())
            return;

        if (!$latestRevision = $this->getLatestRevision())
            return;

        $this->model->setRawAttributes($latestRevision->model_attributes);
    }

    public function beforeModelSave()
    {
        if (!$this->revisioningEnabled())
            return;

        $this->revisionableOriginalAttributes = $this->model->getOriginal();
        $this->revisionableDirtyAttributes = $this->model->getDirty();
        $this->revisionableUpdating = $this->model->exists;

        $this->model->setRawAttributes($this->revisionableOriginalAttributes);

        $this->model->is_pending_review = true;
    }

    public function afterModelSave()
    {
        if (!$this->revisioningEnabled())
            return;

        if (!$modelAttributes = $this->getRevisionableAttributes())
            return;

//        if (!$this->model->is_pending_review)
//            return;

        RevisionHistory::createHistory($this->model, $modelAttributes);
    }

    public function revisionableGetUser()
    {
        return AdminAuth::check() ? AdminAuth::getId() : null;
    }

    public function revisionableGetVendor()
    {
        return optional(AdminLocation::current())->vendor;
    }

    protected function getRevisionableAttributes()
    {
        $excludeFields = $this->excludeRevisionableAttributes ?? [];

        $excludeFields[] = $this->getUpdatedAtColumn();
        if (method_exists($this, 'getDeletedAtColumn'))
            $excludeFields[] = $this->getDeletedAtColumn();

        return array_except($this->revisionableDirtyAttributes, $excludeFields);
    }

    protected function revisioningEnabled()
    {
        if (!Settings::requireMenuApproval())
            return false;

        if (!Vendor::instance()->isUser())
            return false;

        return true;
    }

    protected function getLatestRevision()
    {
        return $this->model->revisions()->orderByDesc('created_at')->first();
    }
}
