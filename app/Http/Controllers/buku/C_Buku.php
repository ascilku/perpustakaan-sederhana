<?php

namespace App\Http\Controllers\buku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Crypt;
use Session;

use App\Models\buku                 as buku;
use App\Models\User                 as User;

class C_Buku extends Controller
{
    public function index($key, Request $request)
    {   
        if($request->input('key') != null){

            $course_id = Crypt::decrypt($request->input('key')); 
            $data['userDetail'] = User::where('id', $course_id)->first();

            if(isset($_COOKIE['cookie-storage'])){
                $cookie = $_COOKIE['cookie-storage'];
                $data['query_nik'] = User::where('nik', $cookie)->first();
                if($data['query_nik']){
                    $data['key'] = $key;
                    $data['query_user'] = User::get();
                    return view('users.menu-users', $data);
                }
            }else{
                Session::flash('alert-login', 'You are forced to logout because there is no access.');
                return redirect('/login');
            }

        }else{
            if(isset($_COOKIE['cookie-storage'])){
                $cookie = $_COOKIE['cookie-storage'];
                $data['query_nik'] = User::where('nik', $cookie)->first();
                if($data['query_nik']){
                    $data['key'] = $key;
                    $data['query_user'] = buku::with('pengarang')->get();
                    return view('buku.menu-buku', $data);
                }
            }else{
                Session::flash('alert-login', 'You are forced to logout because there is no access.');
                return redirect('/login');
            }
        }
       
        
    }

    public function bukuDelete(Request $request)
    {  
        echo $course_id = Crypt::decrypt($request->input('key')); 

        $bukuDelete = buku::find($course_id); 
        $bukuDelete->delete();
        Session::flash('alert-success-karyawan', 'Berhasil Delete Karyawan.');
        return redirect('/buku/data-buku');
    }

}
