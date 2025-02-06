<?php

use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if (!function_exists('getSetting')) {
    function getSetting() {
        return Setting::first();
    }
}
