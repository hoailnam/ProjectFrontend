<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showLogin(Request $r)
    {

        if ($r->session()->has('id')) {
            return redirect()->back();
        } else {
            return view('front.shop.login');
        }
    }

    public function showRegister()
    {
        return view('front.shop.register');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'email' => 'required|email',
                    'password' => 'required',
                ]
            );
        }
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($arr)) {
            $result = DB::table('users')->where('email', $request->email)->first();
            $request->session()->put('id', $result->id);
            return redirect()->to('');
        } else {
            Auth::logout();
            return redirect()->back()->with('message', 'Email hoặc password không chính xác!');
        }
    }


    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'name' => ['required', 'min:3', 'max:20', 'alpha'],
                    'email' => 'required|email',
                    'password' => 'required|min:6|max:32',
                    'repassword' => 'required|same:password|min:6|max:32',
                    'phone' => 'required|digits:10|numeric',
                    'address' => 'required|string',
                ]
            );
        }

        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user) {
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->phone = $request->phone;
            $newUser->address = $request->address;
            $newUser->save();
            return redirect()->route('dang-ky')->with('message', 'Tạo tài khoản thành công!');
        } else {
            return redirect()->route('dang-ky')->with('message', 'Tài khoản đã tồn tại!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('id');
        Auth::logout();
        return redirect()->to('');
    }
}
