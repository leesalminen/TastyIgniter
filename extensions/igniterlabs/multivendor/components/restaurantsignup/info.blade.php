<div class="form-group">
    <label for="name">@lang('igniterlabs.multivendor::default.label_name')</label>
    <input
        type="text"
        id="name"
        class="form-control"
        value="{{ set_value('name') }}"
        name="name"
        required
    />
    {!! form_error('name', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="description">@lang('igniterlabs.multivendor::default.label_description')</label>
    <textarea required id="name" name="description" class="form-control">{{ set_value('description') }}</textarea>
    {!! form_error('description', '<span class="text-danger">', '</span>') !!}
</div>
