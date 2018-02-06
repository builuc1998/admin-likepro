<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\clone2;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function index2()
    {
        var_dump(auth::user());
        //return view('welcome');
    }
    public function viewClone($st = '')
    {
        if($st == ''){
         
        $clone = clone2::where('status','new')->paginate(20);   
        }else{
        $clone = clone2::where('status',$st)->orderBy('updated_at','ASC')->paginate(20);
            
        }
        $status = clone2::select('status')->distinct()->get();
        return view('viewClone',['clone' => $clone,'status' => $status,'st2'=>$st]);
    }

}
