<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout','AdminEdit','AdminUpdate');
    }

    public function  adminLogin()
    {
        return view('backend.login.login');
    }


    public function  login(Request $request)
    {

        if (empty($request->_type) || $request->_type!=='admin') return redirect()->back()->with('error','Access Denied For admin dashboard.');
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $type = $request->_type;
        $email=$request->email;
        $password=($request->password);
        $remember=isset($request->remember) ? true : false;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => $type], $remember))
        {
            return view('backend.pages.dashboard.dashboard');

        }
        else{

            return redirect()->back()->with('error','Email or Password not valid');
        }


    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }



    public function AdminEdit($id)
    {
        $userAdmin=Auth::user()->find($id);
        return view('backend.login.editlogin',compact($userAdmin));
    }


    public function  AdminUpdate(Request $request,  $id)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $data = array(
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        );

        if(User::where('id',$id)->update($data))
        {
            return redirect()->route('dashboard')->with('message','sucessuflly  updated');

        }
        else{

            return redirect()->back()->with('error','Email or Password not valid');
        }
    }
}
