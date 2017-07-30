<?php

namespace App\Modules\Content\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return $this->view("content::services.front.index");
    }
}
