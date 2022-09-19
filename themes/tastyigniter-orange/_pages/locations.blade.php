---
title: main::lang.locations.title
layout: default
permalink: /locations

'[localSearch]':

'[localList]':

'[cuisineFilter]':

---
<div class="container">
    <div class="row py-4">
        <div class="locations-filter col-sm-3">	
            @component('cuisineFilter')
        </div>
        <div class="location-list col-sm-9">
            @partial('localList::search')

            @component('localList')
        </div>
    </div>
</div>
