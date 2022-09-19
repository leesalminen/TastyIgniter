<?php

namespace IgniterLabs\MultiVendor\Components;

use Admin\Traits\ValidatesForm;
use Exception;
use IgniterLabs\MultiVendor\Classes\Vendor;
use IgniterLabs\MultiVendor\Models\Settings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use System\Classes\BaseComponent;

class RestaurantSignup extends BaseComponent
{
    use ValidatesForm;

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        // Do something when the component is loaded by a page or layout
    }

    public function onSignup()
    {
        try {
            $data = post();

            $this->validate($data, $this->createRules());

            $requireApproval = Settings::requireVendorApproval();
            $autoApproval = !$requireApproval;

            $vendor = Vendor::instance()->register($data, $autoApproval);

            $this->sendRegistrationEmail($vendor);

            $alertMessage = $requireApproval
                ? lang('igniter.user::default.login.alert_account_activation')
                : lang('igniter.user::default.login.alert_account_created');

            flash()->success($alertMessage);

            return Redirect::back();
        }
        catch (Exception $ex) {
            flash()->warning($ex->getMessage())->important();

            return Redirect::back()->withInput();
        }
    }

    protected function createRules()
    {
        return [
            ['name', 'igniterlabs.multivendor::default.label_name', 'required|between:2,32|unique:locations,location_name'],
            ['description', 'igniterlabs.multivendor::default.label_description', 'max:255'],

            ['street', 'igniterlabs.multivendor::default.label_street', 'required|between:2,128'],
            ['city', 'igniterlabs.multivendor::default.label_city', 'max:128'],
            ['postcode', 'igniterlabs.multivendor::default.label_postcode', 'max:10'],
            ['country_id', 'igniterlabs.multivendor::default.label_country', 'required|integer'],
            ['telephone', 'igniterlabs.multivendor::default.label_telephone', 'sometimes'],
            ['email', 'igniterlabs.multivendor::default.label_email', 'required|email:filter|max:96'],

            ['admin.name', 'igniterlabs.multivendor::default.label_admin_name', 'required|max:128'],
            ['admin.email', 'igniterlabs.multivendor::default.label_admin_email', 'required|email:filter|max:96|unique:staffs,staff_email'],
            ['admin.username', 'igniterlabs.multivendor::default.label_admin_username', 'required|alpha_dash|unique:users,username'],
            ['admin.password', 'igniterlabs.multivendor::default.label_admin_password', 'required|min:8|max:40|same:admin.confirm_password'],
        ];
    }

    protected function sendRegistrationEmail($vendor)
    {
        $data = [
            'vendor' => $vendor,
            'vendor_approval_link' => admin_url('igniterlabs/multivendor/vendors/approve/'.$vendor->id),
        ];

        $location = $vendor->location;

        Mail::queue('igniterlabs.multivendor::_mail.registration', $data, function ($message) use ($location) {
            $message->to($location->location_email, $location->location_name);
        });

        Mail::queue('igniterlabs.multivendor::_mail.registration_alert', $data, function ($message) {
            $message->to(setting('site_email'), setting('site_name'));
        });
    }

    protected function sendApprovalEmail($customer)
    {
        $link = $this->makeActivationUrl($customer->getActivationCode());
        $data = [
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'account_activation_link' => $link,
        ];

        Mail::queue('igniter.user::mail.activation', $data, function ($message) use ($customer) {
            $message->to($customer->email, $customer->name);
        });
    }
}
