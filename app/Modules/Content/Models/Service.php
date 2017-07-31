<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "slug", "header", "image", "preview_text", "text", "is_public"
    ];
}
