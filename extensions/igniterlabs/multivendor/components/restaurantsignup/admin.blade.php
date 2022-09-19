<div class="form-group">
    <label for="admin_name">@lang('igniterlabs.multivendor::default.label_admin_name')</label>
    <input
        type="text"
        id="admin_name"
        class="form-control"
        value="{{ set_value('admin[name]') }}"
        name="admin[name]"
    />
    {!! form_error('admin[name]', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="admin_email">@lang('igniterlabs.multivendor::default.label_admin_email')</label>
    <input
        type="text"
        id="admin_email"
        class="form-control"
        value="{{ set_value('admin[email]') }}"
        name="admin[email]"
    />
    <span class="small form-text text-muted">@lang('igniterlabs.multivendor::default.help_admin_email')</span>
    {!! form_error('admin[email]', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="admin_username">@lang('igniterlabs.multivendor::default.label_admin_username')</label>
    <input
        type="text"
        id="admin_username"
        class="form-control"
        value="{{ set_value('admin[username]') }}"
        name="admin[username]"
    />
    {!! form_error('admin[username]', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="admin_password">@lang('igniterlabs.multivendor::default.label_admin_password')</label>
    <input
        type="password"
        id="admin_password"
        class="form-control"
        value="{{ set_value('admin[password]') }}"
        name="admin[password]"
    />
    {!! form_error('admin[password]', '<span class="text-danger">', '</span>') !!}
</div>
<div class="form-group">
    <label for="confirm_admin_password">@lang('igniterlabs.multivendor::default.label_admin_confirm_password')</label>
    <input
        type="password"
        id="confirm_admin_password"
        class="form-control"
        value="{{ set_value('admin[confirm_password]') }}"
        name="admin[confirm_password]"
    />
    {!! form_error('admin[confirm_password]', '<span class="text-danger">', '</span>') !!}
</div>
