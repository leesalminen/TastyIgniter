<?php

namespace Igniter\PayRegister;

use Admin\Models\Payments_model;
use Admin\Requests\Location;
use Admin\Widgets\Form;
use Illuminate\Support\Facades\Event;
use System\Classes\BaseExtension;

class Extension extends BaseExtension
{
    public function registerPaymentGateways()
    {
        return [
            \Igniter\PayRegister\Payments\Cod::class => [
                'code' => 'cod',
                'name' => 'lang:igniter.payregister::default.cod.text_payment_title',
                'description' => 'lang:igniter.payregister::default.cod.text_payment_desc',
            ],
            \Igniter\PayRegister\Payments\PaypalExpress::class => [
                'code' => 'paypalexpress',
                'name' => 'lang:igniter.payregister::default.paypal.text_payment_title',
                'description' => 'lang:igniter.payregister::default.paypal.text_payment_desc',
            ],
            \Igniter\PayRegister\Payments\AuthorizeNetAim::class => [
                'code' => 'authorizenetaim',
                'name' => 'lang:igniter.payregister::default.authorize_net_aim.text_payment_title',
                'description' => 'lang:igniter.payregister::default.authorize_net_aim.text_payment_desc',
            ],
            \Igniter\PayRegister\Payments\Stripe::class => [
                'code' => 'stripe',
                'name' => 'lang:igniter.payregister::default.stripe.text_payment_title',
                'description' => 'lang:igniter.payregister::default.stripe.text_payment_desc',
            ],
            \Igniter\PayRegister\Payments\Mollie::class => [
                'code' => 'mollie',
                'name' => 'lang:igniter.payregister::default.mollie.text_payment_title',
                'description' => 'lang:igniter.payregister::default.mollie.text_payment_desc',
            ],
            \Igniter\PayRegister\Payments\Square::class => [
                'code' => 'square',
                'name' => 'lang:igniter.payregister::default.square.text_payment_title',
                'description' => 'lang:igniter.payregister::default.square.text_payment_desc',
            ],
            \Igniter\PayRegister\Payments\BtcPayServer::class => [
                'code' => 'btcpayserver',
                'name' => 'lang:igniter.payregister::default.btcpayserver.text_payment_title',
                'description' => 'lang:igniter.payregister::default.btcpayserver.text_payment_desc',
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [
            \Igniter\PayRegister\FormWidgets\PaymentAttempts::class => [
                'label' => 'Payment Attempts',
                'code' => 'paymentattempts',
            ],
        ];
    }

    public function boot()
    {
        Event::listen('admin.form.extendFieldsBefore', function (Form $form) {
            if ($form->model instanceof \Admin\Models\Orders_model) {
                $form->tabs['fields']['payment_logs']['type'] = 'paymentattempts';
                $form->tabs['fields']['payment_logs']['form'] = '$/igniter/payregister/models/config/payment_logs_model';
                $form->tabs['fields']['payment_logs']['columns']['is_refundable'] = [
                    'title' => 'Action',
                    'partial' => '$/igniter/payregister/views/partials/refund_button',
                ];
            }
        });

        Event::listen('main.theme.activated', function () {
            Payments_model::syncAll();
        });

        Event::listen('igniter.checkout.afterSaveOrder', function ($order) {
            if (!$order->payment_method || !$order->payment_method instanceof Payments_model)
                return;

            if (!$order->payment_method->methodExists('updatePaymentIntentSession'))
                return;

            $order->payment_method->updatePaymentIntentSession($order);
        });

        $this->extendLocationOptionsFields();
    }

    protected function extendLocationOptionsFields()
    {
        Event::listen('admin.locations.defineOptionsFormFields', function () {
            return [
                'payments' => [
                    'label' => 'lang:igniter.payregister::default.label_payments',
                    'accordion' => 'lang:admin::lang.locations.text_tab_general_options',
                    'type' => 'checkboxlist',
                    'options' => ['Admin\Models\Payments_model', 'listDropdownOptions'],
                    'commentAbove' => 'lang:igniter.payregister::default.help_payments',
                    'placeholder' => 'lang:igniter.payregister::default.help_no_payments',
                ],
            ];
        });

        Event::listen('system.formRequest.extendValidator', function ($formRequest, $dataHolder) {
            if (!$formRequest instanceof Location)
                return;

            $dataHolder->attributes = array_merge($dataHolder->attributes, [
                'options.payments.*' => lang('igniter.payregister::default.label_payments'),
            ]);

            $dataHolder->rules = array_merge($dataHolder->rules, [
                'options.payments.*' => ['string'],
            ]);
        });
    }
}
