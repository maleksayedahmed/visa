<div class="address-item">
    <hr>
    @foreach (config('app.locales') as $locale)
        <div class="form-group">
            <label for="addresses[{{ $index }}][description][{{ $locale }}]">@lang('attributes.description') ({{ strtoupper($locale) }})</label>
            <textarea
                class="form-control @error("addresses.{{ $index }}.description.$locale") is-invalid @enderror"
                name="addresses[{{ $index }}][description][{{ $locale }}]"
                id="addresses[{{ $index }}][description][{{ $locale }}]">{{ old("addresses.$index.description.$locale", $address?->getTranslation('description', $locale) ?? '') }}</textarea>
            @error("addresses.{{ $index }}.description.$locale")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

    <div class="form-group">
        <label for="addresses[{{ $index }}][type]">@lang('attributes.address_type')</label>
        <select
            class="form-control @error("addresses.{{ $index }}.type") is-invalid @enderror"
            name="addresses[{{ $index }}][type]"
            id="addresses[{{ $index }}][type]">
            <option value="home" {{ old("addresses.$index.type", $address->type ?? '') == 'home' ? 'selected' : '' }}>@lang('attributes.home')</option>
            <option value="work" {{ old("addresses.$index.type", $address->type ?? '') == 'work' ? 'selected' : '' }}>@lang('attributes.work')</option>
        </select>
        @error("addresses.{{ $index }}.type")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="addresses[{{ $index }}][country_id]">@lang('attributes.country')</label>
        <select
            class="form-control country-dropdown @error("addresses.{{ $index }}.country_id") is-invalid @enderror"
            name="addresses[{{ $index }}][country_id]"
            id="addresses[{{ $index }}][country_id]"
            data-index="{{ $index }}">
            <option value="" selected>@lang('attributes.select_country')</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ old("addresses.$index.country_id", $address->country_id ?? '') == $country->id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        @error("addresses.{{ $index }}.country_id")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="addresses[{{ $index }}][city_id]">@lang('attributes.city')</label>
        <select
            class="form-control city-dropdown @error("addresses.{{ $index }}.city_id") is-invalid @enderror"
            name="addresses[{{ $index }}][city_id]"
            id="addresses[{{ $index }}][city_id]"
            data-index="{{ $index }}">
            <option value="" selected>@lang('attributes.select_city')</option>
            {{-- Dynamically populated via JS --}}
        </select>
        @error("addresses.{{ $index }}.city_id")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="addresses[{{ $index }}][area_id]">@lang('attributes.area')</label>
        <select
            class="form-control area-dropdown @error("addresses.{{ $index }}.area_id") is-invalid @enderror"
            name="addresses[{{ $index }}][area_id]"
            id="addresses[{{ $index }}][area_id]"
            data-index="{{ $index }}">
            <option value="" selected>@lang('attributes.select_area')</option>
            {{-- Dynamically populated via JS --}}
        </select>
        @error("addresses.{{ $index }}.area_id")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="addresses[{{ $index }}][street_no]">@lang('attributes.street_no')</label>
        <input
            type="text" placeholder="@lang('attributes.enter_street_number')"
            class="form-control @error("addresses.{{ $index }}.street_no") is-invalid @enderror"
            name="addresses[{{ $index }}][street_no]"
            id="addresses[{{ $index }}][street_no]"
            value="{{ old("addresses.$index.street_no", $address->street_no ?? '') }}">
        @error("addresses.{{ $index }}.street_no")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="addresses[{{ $index }}][building_no]">@lang('attributes.building_no')</label>
        <input
            type="text" placeholder="@lang('attributes.enter_building_number')"
            class="form-control @error("addresses.{{ $index }}.building_no") is-invalid @enderror"
            name="addresses[{{ $index }}][building_no]"
            id="addresses[{{ $index }}][building_no]"
            value="{{ old("addresses.$index.building_no", $address->building_no ?? '') }}">
        @error("addresses.{{ $index }}.building_no")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="button" class="btn btn-danger remove-address">@lang('attributes.remove_address')</button>
</div>
