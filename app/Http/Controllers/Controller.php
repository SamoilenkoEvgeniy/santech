<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $base_url = "";

    /**
     * @param $path
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    public function view($path, $data = [])
    {
        $data = array_merge($data, [
            "base_url" => $this->base_url
        ]);
        return response()->view($path, $data);
    }
}
