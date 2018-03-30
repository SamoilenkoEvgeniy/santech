<?php

namespace App\Modules\Content\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use ReflectionClass;

class ServiceController extends Controller
{

    public $dictionary = [
        'service' => [
            'list' => 'Услуги'
        ],
        'article' => [
            'list' => 'Статьи'
        ],
    ];
    public $model;

    /**
     * @param $model
     * @return \Illuminate\Http\Response
     */
    public function index($model)
    {
        $services = $this->getInstance($model)::all();
        return $this->view("content::services.front.index", [
            "services" => $services,
            "dictionary" => $this->dictionary[$this->model]
        ]);
    }

    /**
     * @param $model
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($model, $slug)
    {
        $service = $this->getInstance($model)::where("slug", $slug)->first();
        if (!$service) {
            abort(404);
        }
        return $this->view("content::services.front.show", [
            "service" => $service,
            "dictionary" => $this->dictionary[$this->model]
        ]);
    }

    /**
     * @param $model
     * @return object|ReflectionClass
     */
    public function getInstance($model)
    {
        $model = substr($model, 0, strlen($model) - 1);
        $this->model = $model;
        try {
            $instance = new ReflectionClass('App\Modules\Content\Models\\' . ucfirst($model));
            $instance = $instance->newInstance();
        } catch (\Exception $exception) {
            if (\Request::path() !== '404') {
                Redirect::to('404')->send();
            } else {
                abort(404);
            }
        }
        return $instance;
    }
}
