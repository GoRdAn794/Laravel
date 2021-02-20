<?php

namespace App\Http\Controllers;

use App\Http\Controllers\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Helpers\UserHelper;

class mcpcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:adminpanel')->except('mcp_show_login', 'process_mcp', 'shownames');
        $this->middleware('guest:adminpanel')->except('admindashboard', 'logout', 'showproducts', 'addproducts', 'editproductrecord', 'deleteproducts', 'updateproducts');
    }
    /**Function Definition
     * mcp_show_login
     *
     * @return void
     */
    public function mcp_show_login()
    {
        return view('mcp');
    }
    /**
     * process_mcp
     *
     * @return void
     */
    public function process_mcp(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        // print_r($credentials);
        // die;
        if (Auth::guard('adminpanel')->attempt($credentials)) {
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
        //         return redirect()->route('admindashboard');
        //     } else {
        //         session()->flash('msg', "Invalid login details");
        //         return redirect()->route('mcplogin')->with('message', "Invalid Details");
        //     }
    }
    public function admindashboard()
    {
        return view('admindashboard');
    }
    public function logout()
    {
        Auth::guard('adminpanel')->logout();
        return redirect()->route('showadmin');
    }
    public function showproducts()
    {
        $items = Product::showproduct();

        // return view('admindashboard', ['product' => $data]);
        // print_r($users);
        // die;
        // return view('admindashboard', ['users' => $users]);
        // var_dump($data);
        return response()->json(json_encode($items));
    }
    public function addproducts(Request $re)
    {
        $re->validate([
            'name' => 'required',
            'Sku' => 'required|max:5',
            'price' => 'required|max:6',
            'cat' => 'required|max:10',
        ]);
        $name = $re->input();
        // var_dump($name);
        // die("dfsdsfds");

        $query = DB::table('products')->insert([
            'Prodname' => $re->input('name'),
            'Sku' => $re->input('sku'),
            'Category' => $re->input('cat'),
            'price' => $re->input('price')
        ]);
        return $query;
    }
    public function deleteproducts(Request $re)
    {
        $id = $re->input('id');
        $check = Product::deleteproduct($id);
    }
    public function updateproducts(Request $re)
    {
        $id = $re->input('id');
        $data = Product::selectrecord($id);
        return response()->json(json_encode($data));
    }
    public function editproductrecord(Request $re)
    {
        $re->validate([
            'name' => 'required',
            'Sku' => 'required',
            'price' => 'required',
            'cat' => 'required',
        ]);
        $name = $re->input();
        // print_r($name);
        // die("hello");
        $query = DB::table('products')
            ->where('id', $re->input('id'))
            ->update([
                'Prodname' => $re->input('pname'),
                'Sku' => $re->input('sku'),
                'Category' => $re->input('cat'),
                'price' => $re->input('price')
            ]);
        return $query;
    }

    //Helpers functions
    public function shownames()
    {

        $helper = new UserHelper();
        $helper->show();
        echo "<br>";
        $var = $helper->splitname("John Snow");
        foreach ($var as $key) {
            echo $key;
        }
    }
}
