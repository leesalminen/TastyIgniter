<?php

namespace IgniterLabs\MultiVendor\FormWidgets;

use Admin\Classes\BaseFormWidget;
use Admin\Models\Payments_model;
use Admin\Traits\FormModelWidget;
use Admin\Traits\ValidatesForm;
use Admin\Widgets\Form;
use Igniter\Flame\Exception\ApplicationException;
use Igniter\Flame\Exception\ValidationException;

class PaymentEditor extends BaseFormWidget
{
    use FormModelWidget;
    use ValidatesForm;

    public $formTitle = 'igniterlabs.multivendor::default.text_title_payment';

    public $popupSize = 'modal-xl';

    public function initialize()
    {
        $this->fillFromConfig([
            'formTitle',
        ]);
    }

    public function render()
    {
        $this->prepareVars();

        return $this->makePartial('paymenteditor/paymenteditor');
    }

    public function loadAssets()
    {
        $this->addJs('~/app/admin/formwidgets/recordeditor/assets/js/recordeditor.modal.js', 'recordeditor-modal-js');
        $this->addJs('js/paymenteditor.js', 'paymenteditor-js');
    }

    public function prepareVars()
    {
        $this->vars['field'] = $this->formField;
    }

    public function onLoadRecord()
    {
        if (!$this->model->exists)
            return;

        $paymentCode = post('recordId');
        $paymentMethod = Payments_model::whereCode($paymentCode)->first();

        if (!$paymentMethod)
            throw new ApplicationException('Record not found');

        $formTitle = sprintf(lang($this->formTitle), $paymentMethod->name);

        return $this->makePartial('~/app/admin/formwidgets/recordeditor/form', [
            'formRecordId' => $paymentCode,
            'formTitle' => $formTitle,
            'formWidget' => $this->makePaymentFormWidget($paymentMethod),
        ]);
    }

    public function onSaveRecord()
    {
        if (!$this->model->exists)
            return;

        $paymentCode = post('recordId');
        $paymentMethod = Payments_model::whereCode($paymentCode)->first();

        if (!$paymentMethod)
            throw new ApplicationException('Record not found');

        $form = $this->makePaymentFormWidget($paymentMethod);
        $saveData = $form->getSaveData();

        try {
            $this->validate($saveData, $this->mergeRules($paymentMethod->getConfigRules()));
        }
        catch (ValidationException $ex) {
            throw new ApplicationException($ex->getMessage());
        }

        if ($this->setOverrideSettings($paymentMethod, $saveData)) {
            flash()->success(sprintf(lang('admin::lang.alert_success'), 'Settings updated'))->now();
        }
        else {
            flash()->error(lang('admin::lang.alert_error_try_again'))->now();
        }

        return [
            '#'.$this->getId() => $this->render(),
            '#notification' => $this->makePartial('flash'),
        ];
    }

    protected function makePaymentFormWidget($paymentMethod)
    {
        $widgetConfig = [
            'fields' => [
                'name' => [
                    'label' => 'lang:admin::lang.label_name',
                    'type' => 'text',
                ],
            ],
        ];

        if ($paymentMethod->exists) {
            $configFields = $paymentMethod->getConfigFields();
            $widgetConfig['fields'] = array_merge($widgetConfig['fields'], $configFields);
        }

        $newPaymentMethod = Payments_model::make();
        $newPaymentMethod->class_name = $paymentMethod->class_name;
        $newPaymentMethod->applyGatewayClass();

        $widgetConfig['model'] = $newPaymentMethod;
        $widgetConfig['data'] = $this->getOverrideSettings($paymentMethod->code);
        $widgetConfig['alias'] = $this->alias.'FormPaymentEditor';
        $widgetConfig['arrayName'] = $this->formField->arrayName.'[paymentData]';
        $widgetConfig['context'] = 'edit';
        $widget = $this->makeWidget(Form::class, $widgetConfig);

        $widget->bindToController();
        $widget->previewMode = $this->previewMode;

        return $widget;
    }

    protected function mergeRules(array $mergeRules)
    {
        $rules = [
            ['name', 'lang:admin::lang.label_name', 'required|min:2|max:128'],
            ['description', 'lang:admin::lang.label_description', 'max:255'],
        ];

        array_push($rules, ...$mergeRules);

        return $rules;
    }

    protected function setOverrideSettings($paymentMethod, $saveData)
    {
        $settings = $this->model->getOption('payment_settings', []);
        array_set($settings, $paymentMethod->code, $saveData);

        $this->model->setOption('payment_settings', $settings);

        return $this->model->save();
    }

    protected function getOverrideSettings($code)
    {
        return array_get($this->model->getOption('payment_settings', []), $code, []);
    }
}
