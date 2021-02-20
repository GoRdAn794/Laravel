<?php

namespace App\Http\Controllers;

use App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Models\userdata;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Location;

class logincontroller extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show_login_form', 'process_login', 'show_signup_form', 'process_signup']);
        $this->middleware('guest')->except(['logout', 'userdashboard']);
    }
    /**
     * show_login_form
     *
     * @return void
     */
    public function show_login_form()
    {
        // if (Auth::user()) {
        //     return view('userdashboard');
        // } else {
        //     return view('login');
        // }
        return view('login');
    }
    /**
     * process_login
     *
     * @param  mixed $request
     * @return void
     */
    public function process_login(Request $request)
    {
        //Using ajax
        $request->validate([
            'name' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $credentials = $request->only('email', 'password');
        // $email = $request->email;
        // $password = $request->password;
        if (Auth::guard('userpanel')->attempt($credentials)) {
            $msg = array(
                'status' => 'success',
                'message' => 'login successful'
            );
            // return redirect()->route('userdashboard');
            // return view('userdashboard');

        } else {
            $msg = array(
                'status' => 'error',
                'message' => 'Login fail!'
            );
        }
        return response()->json(json_encode($msg));
        //Using Laravel



        // // print_r($credentials);
        // // die;
        // if (Auth::attempt($credentials)) {
        //     // $request->session()->regenerate();
        //     return redirect()->route('userdashboard');
        // } else {
        //     return redirect()->route('login')->with('message', 'Invalid Details!!');
        // }

        // $input = $request->input();
        // $dataToMatch = trim($input['email']);
        // // print_r($dataToMatch);
        // // print_r($input['password']);
        // // die;
        // $data = userdata::showdata($dataToMatch);
        // if (Hash::check($input['password'], $data)) {
        //     Session::put('user', $dataToMatch);
        //     return redirect()->route('userdashboard');
        // } else {
        //     session()->flash('loginmsg', 'Invalid Login Details');
        //     return redirect()->route('login');
        // }
    }
    /**
     * show_signup_form
     *
     * @return void
     */
    public function show_signup_form()
    {
        // if (Auth::check('user')) {
        //     return redirect()->route('userdashboard');
        // } else {
        //     return view('register');
        // }
        return view('register');
    }
    /**
     * process_signup
     *
     * @param  mixed $request
     * @return void
     */
    public function process_signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = userdata::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);
        if ($user) {
            echo "Inserted";
        } else {
            echo "Not";
        }
        return redirect()->route('login')->with('message', 'Account Created Successfully!!');
    }
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * userdashboard
     *
     * @return void
     */
    public function userdashboard()
    {
        // if (Auth::user()) {
        //     return view('userdashboard');
        // } else {
        //     return redirect()->route('login');
        // }
        return view('userdashboard');

        // if (!Session::has('user')) {
        //     return redirect()->route('login');
        // } else {
        //     return view('userdashboard');
        // }
        // if (Auth::check()) {
        //     return view('userdashboard');
        // } else {
        //     return redirect()->route('login');
        // }
    }
}
