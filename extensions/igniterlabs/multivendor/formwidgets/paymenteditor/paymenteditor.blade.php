@php
    $fieldOptions = $field->options();
    $checkedValues = (array)$field->value;
@endphp
<div
    class="field-checkboxlist"
    data-control="paymenteditor"
    data-alias="{{ $this->alias }}"
>
    @foreach ($fieldOptions as $value => $option)
        @php
            $checkboxId = 'checkbox_'.$field->getId().'_'.$loop->iteration;
            if (!is_array($option)) $option = [$option];
        @endphp

        <div class="d-flex">
            <div class="pr-4">
                <button
                    type="button"
                    class="btn btn-sm btn-outline-default"
                    data-editor-control="load-item"
                    data-payment-code="{{ $value }}"
                ><i class="fa fa-pencil"></i></button>
            </div>
            <div class="">
                <div class="form-check mb-2">
                    <input
                        type="checkbox"
                        id="{{ $checkboxId }}"
                        class="form-check-input"
                        name="{{ $field->getName() }}[]"
                        value="{{ $value }}"
                        {!! in_array($value, $checkedValues) ? 'checked="checked"' : '' !!}
                    >
                    <label class="form-check-label" for="{{ $checkboxId }}">
                        {{ is_lang_key($option[0]) ? lang($option[0]) : $option[0] }}
                        @isset($option[1])
                            <p
                                class="help-block font-weight-normal"
                            >{{ is_lang_key($option[1]) ? lang($option[1]) : $option[1] }}</p>
                        @endisset
                    </label>
                </div>
            </div>
        </div>

    @endforeach
</div>
