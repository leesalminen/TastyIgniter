<?php

namespace IgniterLabs\MultiVendor\Components;

use Admin\Models\Locations_model;
use IgniterLabs\MultiVendor\Models\Cuisine;
use Illuminate\Support\Arr;
use System\Classes\BaseComponent;

class CuisineFilter extends BaseComponent
{
    public function defineProperties()
    {
        return [
            'param' => [
                'label' => 'Url param to use for filtering',
                'type' => 'text',
                'default' => 'cuisine',
                'validationRule' => 'required',
            ],
        ];
    }

    public function initialize()
    {
        Locations_model::extend(function ($model) {
            $model->bindEvent('model.extendListFrontEndQuery', function ($query) {
                if ($type = request()->input($this->property('param', 'cuisine'))) {
                    $query->whereHas('cuisines', function ($query) use ($type) {
                        $query->where('igniterlabs_multivendor_cuisines.cuisine_id', $type);
                    });
                }
            });
        });
    }

    public function onRun()
    {
        $paramName = $this->property('param', 'cuisine');

        $url = page_url().'?';
        if ($params = Arr::query(request()->except($paramName)))
            $url .= $params.'&';

        $this->page['cuisineUrl'] = $url.$paramName.'=';
        $this->page['cuisines'] = Cuisine::isEnabled()->orderBy('priority')->get();
        $this->page['selectedCuisine'] = request()->input($paramName, '');
    }
}
