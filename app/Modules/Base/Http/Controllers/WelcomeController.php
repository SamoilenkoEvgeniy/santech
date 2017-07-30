<?php

namespace App\Modules\Base\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view("base::welcome");
    }

    public function getModal()
    {
        return $this->view("base::modal");
    }
}
