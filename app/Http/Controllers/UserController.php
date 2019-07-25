<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Email khong dung dinh dang',
                'password.required' => 'Vui long nhap password'
            ]
        );
        $credentials = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($credentials)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'fullname' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                're_password' => 'required|same:password'
            ],
            [
                'fullname.required' => 'Vui long nhap ten',
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Email khong dung dinh dang',
                'email.unique' => 'Email nay da co nguoi su dung',
                'password.required' => 'Vui long nhap mat khau',
                'password.min' => 'Mat khau it nhat 6 ky tu',
                'password.max' => 'Mat khau khong qua 20 ky tu',
                're_password.required' => 'Vui long nhap lai mat khau',
                're_password.same' => 'Mat khau khong giong nhau'
            ]
        );
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return 'true';
    }
}