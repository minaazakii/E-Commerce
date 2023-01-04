<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'description'=>'string',
            'logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg,mpeg|max:2048',
            'favicon'=>'required|image|mimes:jpg,png,jpeg,gif,svg,mpeg|max:2048',
            'email'=>"email",
            'phone'=>"integer",
            'address'=>"string",
            'facebook'=>"string",
            'twitter'=>"string",
            'instagram'=>"string",
            'youtube'=>"string",
            'tiktok'=>"string"
        ];
    }
}
