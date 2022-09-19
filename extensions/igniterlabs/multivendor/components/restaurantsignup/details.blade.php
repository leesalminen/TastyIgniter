<div class="form-group">
    <label for="street">@lang('igniterlabs.multivendor::default.label_street')</label>
    <input
        type="text"
        id="street"
        class="form-control"
        value="{{ set_value('street') }}"
        name="street"
    />
    {!! form_error('street', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="city">@lang('igniterlabs.multivendor::default.label_city')</label>
    <input
        type="text"
        id="city"
        class="form-control"
        value="{{ set_value('city') }}"
        name="city"
    />
    {!! form_error('city', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="postcode">@lang('igniterlabs.multivendor::default.label_postcode')</label>
    <input
        type="text"
        id="postcode"
        maxlength="10"
        class="form-control"
        value="{{ set_value('postcode') }}"
        name="postcode"
    />
    {!! form_error('postcode', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="country">@lang('igniterlabs.multivendor::default.label_country')</label>
    <select
        id="country"
        name="country_id"
        class="form-select"
    >
        @foreach (countries('country_name') as $key => $value)
            <option
                value="{{ $key }}"
                {!! $key == setting('country_id') ? 'selected="selected"' : '' !!}
            >{{ $value }}</option>
        @endforeach
    </select>
    {!! form_error('country_id', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="telephone">@lang('igniterlabs.multivendor::default.label_telephone')</label>
    <input
        type="text"
        id="telephone"
        class="form-control"
        value="{{ set_value('telephone') }}"
        name="telephone"
    />
    {!! form_error('telephone', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="email">@lang('igniterlabs.multivendor::default.label_email')</label>
    <input
        type="text"
        id="email"
        class="form-control"
        value="{{ set_value('email') }}"
        name="email"
    />
    <span class="small form-text text-muted">@lang('igniterlabs.multivendor::default.help_email')</span>
    {!! form_error('email', '<span class="text-danger">', '</span>') !!}
</div>
