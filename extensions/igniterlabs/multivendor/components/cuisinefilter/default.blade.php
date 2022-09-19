<div class="card mb-4">
    <div class="card-header">
        <h5>@lang('igniterlabs.multivendor::default.cuisine.text_title')</h5>
    </div>
    <div class="list-group list-group-flush">
        @foreach ($cuisines as $cuisine)
            <div class="list-group-item">
                <div class="form-check">
                    <input
                        type="radio"
                        id="customRadio{{$cuisine->cuisine_id}}"
                        name="cuisine"
                        class="form-check-input"
                        value="{{$cuisine->cuisine_id}}"
                        data-page-url="{{ $filterPageUrl }}"
                        {!! $cuisine->cuisine_id == $selectedCuisine ? 'checked=checked' : '' !!}
                    />
                    <label
                        class="form-check-label w-100"
                        for="customRadio{{$cuisine->cuisine_id}}"
                    >{{ $cuisine->name }}</label>
                </div>
            </div>
        @endforeach
    </div>
</div>
