<?php

namespace App\Modules\Content\Http\Controllers\Crud;

use App\Modules\Content\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public $base_url = "/admin/crud/services";

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return $this->view("content::services.crud.index", [
            "services" => $services
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("content::services.crud.create");
    }
}
