<?php

namespace IgniterLabs\MultiVendor\Controllers;

use Admin\Facades\AdminMenu;
use Illuminate\Support\Facades\Mail;

/**
 * RevisionHistory Admin Controller
 */
class RevisionHistory extends \Admin\Classes\AdminController
{
    public $implement = [
        \Admin\Actions\FormController::class,
        \Admin\Actions\ListController::class,
    ];

    public $listConfig = [
        'list' => [
            'model' => \IgniterLabs\MultiVendor\Models\RevisionHistory::class,
            'title' => 'lang:igniterlabs.multivendor::default.revision_history.text_title',
            'emptyMessage' => 'lang:admin::lang.list.text_empty',
            'defaultSort' => ['created_at', 'DESC'],
            'configFile' => 'revision_history',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:igniterlabs.multivendor::default.revision_history.text_title',
        'model' => \IgniterLabs\MultiVendor\Models\RevisionHistory::class,
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'igniterlabs/multivendor/revision_history/edit/{id}',
            'redirectClose' => 'igniterlabs/multivendor/revision_history',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'igniterlabs/multivendor/revision_history',
        ],
        'delete' => [
            'redirect' => 'igniterlabs/multivendor/revision_history',
        ],
        'configFile' => 'revision_history',
    ];

    protected $requiredPermissions = 'IgniterLabs.MultiVendor.RevisionHistory';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('vendors', 'restaurant');
    }

    public function approve($context, $recordId = null)
    {
        $model = $this->formFindModelObject($recordId);

        if ($model->requiresApproval()) {
            $model->approve();
            $this->sendApprovalNotification($model);
        }

        flash()->success(lang('igniterlabs.multivendor::default.alert_revision_approved'));

        return $this->redirectBack();
    }

    public function listExtendQuery($query)
    {
        $query->groupBy('revisionable_type', 'revisionable_id');
    }

    public function formValidate($model, $form)
    {
        if ($form->getContext() !== 'create')
            return;

        $rules = [
            ['location.name', 'admin::lang.label_name', 'required|between:2,32'],
            ['location.email', 'admin::lang.label_email', 'required|email:filter|max:96'],
        ];

        return $this->validatePasses($form->getSaveData(), $rules);
    }

    public function sendApprovalNotification($revisionHistory)
    {
        $vendor = $revisionHistory->vendor;

        $data = [
            'vendor' => $vendor,
            'revisionHistory' => $revisionHistory,
        ];

        Mail::queue('igniterlabs.multivendor::_mail.revision_approval', $data, function ($message) use ($vendor) {
            $message->to($vendor->location->location_email, $vendor->location->location_name);
        });
    }
}
