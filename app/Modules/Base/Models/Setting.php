<?php

namespace App\Modules\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        "key", "value"
    ];

    public static function findByKey($key)
    {
        $val = self::where("key", "=", $key)->first();
        return $val ? $val->value : null;
    }
}
