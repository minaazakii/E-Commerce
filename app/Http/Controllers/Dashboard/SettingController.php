<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\Setting;
use App\Utils\ImageUpload;
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
        if ($request->has('logo'))
        {
            $setting->update(['logo' => ImageUpload::uploadImage($request->logo, 200, 200)]);
        }
        if($request->hasFile('favicon'))
        {
            $setting->update(['favicon' =>ImageUpload::uploadImage($request->favicon) ]);
        }

        return back();
    }
}
