<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        "slug",
        "header",
        "image",
        "preview_text",
        "text",
        "is_public"
    ];

    /**
     * @return string
     */
    public function getPreview(): string
    {
        $path = $this->image;
        $path = pathinfo($path);
        unset($path['basename']);
        $path['filename'] .= "_preview" . "." . $path['extension'];
        unset($path['extension']);
        return $path ? implode("/", $path) : '';
    }
}
