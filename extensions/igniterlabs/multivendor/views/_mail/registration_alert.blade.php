subject = "New Vendor on {site_name}"
==
A new vendor has registered!

@if ($vendor->requiresApproval())
    Please click the link to view and approve: {vendor_approval_link}
@else
    Please click the link to view: {{admin_url('login')}}
@endif
==
##  A new vendor has registered.

@if ($vendor->requiresApproval())
    Please click the button to view and approve.

    @partial('button', ['url' => '{vendor_approval_link}', 'type' => 'primary'])
    Approve Vendor
    @endpartial
@else
    Please click the button to view.

    @partial('button', ['url' => admin_url('login'), 'type' => 'primary'])
    View Vendor
    @endpartial
@endif
