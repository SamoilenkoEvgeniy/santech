<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view("user::index");
    }

    public function update(Request $request)
    {
        $user = User::whereEmail($request->input("email"))->first();
        if ($user) {
            $user->password = \Hash::make($request->input("password"));
            $user->save();
        }
        return response()->redirectTo("/admin/crud/user");
    }
}
