---
title: 'main::lang.account.register.title'
permalink: /register
description: ''
layout: default

'[session]':
    security: guest

'[account]':
    agreeRegistrationTermsPage: 1

'[restaurantSignup]':

---
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto my-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title h4 mb-4 font-weight-normal">
                        @lang('main::lang.account.login.text_register')
                    </h1>

                    <ul class="nav nav-pills nav-fill" role="tablist" id="registerTab">

                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab" aria-controls="customer" aria-selected="true">
                            @lang('admin::lang.customers.text_form_name')
                        </button>
                      </li>
                      <li class="nav-item" role="presentation">

                        <button class="nav-link" id="restaurant-tab" data-bs-toggle="tab" data-bs-target="#restaurant" type="button" role="tab" aria-controls="restaurant" aria-selected="true">
                            @lang('admin::lang.reservations.text_tab_restaurant')
                        </button>
                        
                      </li>
                    </ul>

                    <div class="tab-content" id="registerTabContent" style="margin-top: 10px;">
                        <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                            @partial('account::register')
                        </div>
                        <div class="tab-pane fade" id="restaurant" role="tabpanel" aria-labelledby="restaurant-tab">
                             @component('restaurantSignup')
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>