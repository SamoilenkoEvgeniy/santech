<?php

namespace App\Modules\Base\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BaseController extends Controller
{
    /**
     * @param $image
     * @param int $thumb_size
     * @return string
     */
    public static function storeImage($image, $thumb_size = 400)
    {
        $image_preview = Image::make($image)->resize($thumb_size, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image = Image::make($image);
        $file_name = env('SERVICES_PATH') . substr(md5(time() . md5(time())), rand(1, 2), 8) . ".png";
        $file_name_preview = env('SERVICES_PATH') . substr(md5(time() . md5(time())), rand(1, 2), 8) . "_preview.png";
        $image_preview->save(public_path($file_name_preview));
        $image->save(public_path($file_name));

        return $file_name;
    }
}
