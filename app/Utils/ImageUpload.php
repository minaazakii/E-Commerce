<?php

namespace App\Utils;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageUpload
{
    public static function uploadImage($file,$height = null,$width=null)
    {

        $imageName = time() . '.' . $file->extension();
        $image = Image::make($file->path());
        [$defaultWidth,$defaultHeight] = getimagesize($file);
        $width = $width ?? $defaultWidth;
        $height = $height?? $defaultHeight;
        $image->fit($height, $width, function ($constrain) {
            $constrain->upsize();
        })->stream();

        Storage::disk('public')->put($imageName, $image);
        return 'public/'. $imageName;
    }
}


