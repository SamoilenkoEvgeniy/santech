<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "slug", "header", "image", "preview_text", "text", "is_public"
    ];

    public function getPreview()
    {
        $path = $this->image;
        $path = pathinfo($path);
        unset($path['basename']);
        $path['filename'] .= "_preview" . "." . $path['extension'];
        unset($path['extension']);
        return implode("/", $path);
    }
}
