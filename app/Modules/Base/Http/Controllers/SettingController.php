<?php

namespace App\Modules\Base\Http\Controllers;

use App\Modules\Base\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public $base_url = "/admin/crud/settings";
    protected $fields = [
        "phone_number" => [
            "type" => "text",
            "rus_name" => "Номер телефона",
        ],
        "phone_number_tag" => [
            "type" => "text",
            "rus_name" => "Номер телефона для тега",
        ],
        "address" => [
            "type" => "text",
            "rus_name" => "Адрес",
        ],
    ];

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = [];

        foreach ($this->fields as $key => $field) {
            $item = Setting::findByKey($key);
            $values[$key] = $item;
        }
        return $this->view("base::crud.settings.index", [
            "fields" => $this->fields,
            "values" => $values
        ]);
    }

    public function update(Request $request)
    {
        foreach ($this->fields as $key => $field) {
            $value = $request->input($key);
            if (!$value) {
                $value = null;
            }
            $setting = Setting::where("key", "=", $key)->first();
            if (!$setting) {
                $setting = Setting::create([
                    "value" => $value,
                    "key" => $key
                ]);
            } else {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect($this->base_url);
    }
}
