subject = "Your restaurant has been approved at {site_name}"
==
Hi {vendor.owner.staff_name},

## Your restaurant has been approved. Thank you for choosing {site_name}.

You can now log in using your username and password by clicking the button below:

@partial('button', ['url' => '{account_login_link}', 'type' => 'primary'])
Login into your account
@endpartial
