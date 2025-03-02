---
title: 'main::lang.home.title'
permalink: /
description: ''
layout: default

'[slider]':
    code: home-slider

'[featuredItems]':
    items: ['6', '7', '8', '9']
    limit: 3
    itemsPerRow: 3
    itemWidth: 400
    itemHeight: 300

---
@component('slider')


<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="container d-flex align-items-center justify-content-center">
                <div>
                    <h1>
                        @lang('main::home.title')
                    </h1>    
                </div>
            </div>


            <div class="container d-flex align-items-center justify-content-center">
                <div>
                    <p>
                        @lang('main::home.text')
                    </p>
                </div>
            </div>

            <div class="container d-flex align-items-center justify-content-center">
                <div style="margin-bottom: 10px;">
                    <a href="/locations" class="btn btn-primary">
                        @lang('main::home.cta')
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="container d-flex align-items-center justify-content-center">
                <div>
                    <h1>
                        @lang('main::home.secondary_title')
                    </h1>    
                </div>
            </div>


            <div class="container d-flex align-items-center justify-content-center">
                <div>
                    <p>
                        @lang('main::home.secondary_text')
                    </p>
                </div>
            </div>

            <div class="container d-flex align-items-center justify-content-center">
                <div style="margin-bottom: 10px;">
                    <a href="@lang('main::home.secondary_cta_href')" class="btn btn-primary">
                        @lang('main::home.secondary_cta')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
