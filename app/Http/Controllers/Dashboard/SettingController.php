<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $setting->update($request->validated());
        $logoName = time() . '.' . $request->logo->extension();
        $logo = Image::make($request->logo->path());
        $logo->fit(200, 200, function ($constrain) {
            $constrain->upsize();
        })->stream();

        Storage::disk('public')->put($logoName, $logo);
        return back();
    }
}