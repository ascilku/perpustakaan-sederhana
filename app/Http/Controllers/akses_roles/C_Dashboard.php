<?php

namespace App\Http\Controllers\akses_roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Session;

use App\Models\User                 as User;

class C_Dashboard extends Controller
{
    //
    public function index()
    {
        if(isset($_COOKIE['cookie-storage'])){
            $cookie = $_COOKIE['cookie-storage'];
            $data['query_nik'] = User::where('nik', $cookie)->first();
            if($data['query_nik']){
                return view('dashboard.dashboard', $data);
            }
        }else{
            Session::flash('alert-login', 'You are forced to logout because there is no access.');
            return redirect('/login');
        }
    }
}
