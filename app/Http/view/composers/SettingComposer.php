<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Setting;

class SettingComposer
{
    public function compose(View $view)
    {
    $settings = Setting::all()->pluck('value', 'key');        
    $view->with('settings', $settings);
    }

}