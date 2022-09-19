{!! form_open([
    'role' => 'form',
    'method' => 'POST',
    'data-request' => 'restaurantSignup::onSignup',
]) !!}
<div class="card mb-2">
    <div class="card-body">
        <h1 class="card-title h4 font-weight-normal">
            @lang('lang:igniterlabs.multivendor::default.description')
        </h1>
        <p>
            @lang('lang:igniterlabs.multivendor::default.description_helper')
        </p>
        @partial('@info')
    </div>
</div>

<div class="card mb-2">
    <div class="card-body">
        <h1 class="card-title h4 font-weight-normal">
            @lang('lang:igniterlabs.multivendor::default.address')
        </h1>
        <p>
            @lang('lang:igniterlabs.multivendor::default.address_helper')
        </p>
        @partial('@details')
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h1 class="card-title h4 font-weight-normal">
            @lang('lang:igniterlabs.multivendor::default.admin')
        </h1>
        <p>
            @lang('lang:igniterlabs.multivendor::default.admin_helper')
        </p>
        @partial('@admin')
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-2">
                <button
                    type="submit"
                    class="btn btn-primary btn-block btn-lg"
                    data-attach-loading=""
                >
                    @lang('main::lang.account.login.button_register')
                </button>
            </div>
            <div class="col-12 text-center">
                <a
                    href="{{ page_url('login') }}"
                    class="btn btn-link"
                >
                    @lang('igniter.user::default.login.button_login')
                </a>
            </div>
        </div>

    </div>
</div>

{!! form_close() !!}
