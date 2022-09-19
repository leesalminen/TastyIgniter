<?php

namespace IgniterLabs\MultiVendor\Models;

use Igniter\Flame\Database\Model;

/**
 * RevisionHistory Model
 */
class RevisionHistory extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'igniterlabs_multivendor_revision_history';

    protected $guarded = [];

    public $timestamps = true;

    protected $casts = [
        'revisionable_id' => 'integer',
        'location_id' => 'integer',
        'user_id' => 'integer',
        'model_attributes' => 'array',
    ];

    public $relation = [
        'belongsTo' => [
            'vendor' => [Vendor::class],
        ],
        'morphTo' => [
            'revisionable' => [],
        ],
    ];

    public static function createHistory($revisionable, array $modelAttributes)
    {
        $model = new static;
        $model->revisionable_type = $revisionable->getMorphClass();
        $model->revisionable_id = $revisionable->getKey();
        $model->location_id = $revisionable->revisionableGetVendor();
        $model->user_id = $revisionable->revisionableGetUser();
        $model->model_attributes = $modelAttributes;
        $model->save();

        return $model;
    }

    public function approve()
    {
        $this->revisionable->is_pending_review = true;
        $this->revisionable->save();
    }
}
