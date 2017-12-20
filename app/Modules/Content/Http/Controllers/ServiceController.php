<?php

namespace App\Modules\Content\Http\Controllers;

use App\Modules\Content\Models\Service;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return $this->view("content::services.front.index", [
            "services" => $services
        ]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::where("slug", $slug)->first();
        return $this->view("content::services.front.show", [
            "service" => $service
        ]);
    }
}
