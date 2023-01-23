<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signup(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|unique:users|email:rfc,dns,filter',
            'name' => 'required',
            'password' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('signup-page'))
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->contacts = $data['message'];

        $user->save();

        return redirect(route('main-page'));
    }
}
