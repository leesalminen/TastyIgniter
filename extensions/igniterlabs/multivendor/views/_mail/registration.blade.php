subject = "Welcome to {site_name}"
==
Hi {{ $vendor->owner->staff_name }},

Thank you for registering with {site_name}.

@if ($vendor->requiresApproval())
    Your vendor account is been reviewed, we will send you another email once it has been approved.
@else
    Your vendor account has now been created and you can log in using your username and password by visiting our website or at the following URL: {{admin_url('login')}}
@endif
==
Hi {{ $vendor->owner->staff_name }},

## Thank you for registering with {site_name}.

@if ($vendor->requiresApproval())
    Your vendor account is been reviewed, we will send you another email once it has been approved.
@else
    Your vendor account has now been created and you can log in using your username and password by clicking the button below:
@endif

@partial('button', ['url' => admin_url('login'), 'type' => 'primary'])
Login into your account
@endpartial
