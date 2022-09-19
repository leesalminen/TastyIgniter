<?php

namespace IgniterLabs\MultiVendor\Models;

use Admin\Traits\Locationable;
use Igniter\Flame\Database\Model;
use Igniter\Flame\Database\Traits\HasPermalink;
use Igniter\Flame\Database\Traits\NestedTree;
use Igniter\Flame\Database\Traits\Sortable;

/**
 * Cuisine Model
 */
class Cuisine extends Model
{
    use Sortable;
    use HasPermalink;
    use NestedTree;
    use Locationable;

    const SORT_ORDER = 'priority';

    const LOCATIONABLE_RELATION = 'locations';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'igniterlabs_multivendor_cuisines';

    protected $primaryKey = 'cuisine_id';

    protected $guarded = [];

    protected $casts = [
        'parent_id' => 'integer',
        'priority' => 'integer',
        'status' => 'boolean',
        'nest_left' => 'integer',
        'nest_right' => 'integer',
    ];

    public $relation = [
        'belongsTo' => [
            'parent_cat' => [\IgniterLabs\MultiVendor\Models\Cuisine::class, 'foreignKey' => 'parent_id', 'otherKey' => 'cuisine_id'],
        ],
        'morphToMany' => [
            'locations' => [\Admin\Models\Locations_model::class, 'name' => 'locationable'],
        ],
    ];

    public $permalinkable = [
        'permalink_slug' => [
            'source' => 'name',
        ],
    ];

    public static function getDropdownOptions()
    {
        return self::pluck('name', 'cuisine_id');
    }

    //
    // Accessors & Mutators
    //

    public function getDescriptionAttribute($value)
    {
        return strip_tags(html_entity_decode($value, ENT_QUOTES, 'UTF-8'));
    }

    //
    // Scopes
    //

    public function scopeIsEnabled($query)
    {
        return $query->where('status', 1);
    }
}
