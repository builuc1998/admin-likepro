<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\clone2;
use App\User;
use Carbon\Carbon;


class CloneController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function upOne(){
		
		$uid = Input::get('uid');
		
		$checkClone = clone2::where('uid', $uid)->first();
		
		if($checkClone){
			return \response()->json('clone already exists', 200);
		}
		$uid = Input::get('uid');
		$email = Input::get('email');
		$password = Input::get('password');
		$token = Input::get('token');
        $cookie = Input::get('cookie');
		$status = Input::get('status');
		$note = Input::get('note');
		$lastname = Input::get('lastname');
		$firstname = Input::get('firstname');
		$birthday = Input::get('birthday');
        $country = Input::get('country');
        $sex = Input::get('sex');
		if($country){
		  $country = $country;
		}else{
            $country = '';
        }
		$a = clone2::create([
			'uid' => $uid,
			'email' => $email,
			'cookie' => $cookie,
            'password' => $password,
			'token' => $token,
			'status' => 'new',
			'note' => 'null',
			'lastname' => $lastname,
			'firstname' => $firstname,
            'birthday' => $birthday,
            'country' => $country,
            'sex' => $sex,
            'linksp' => 'null',
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time()),
            'xoaytua' => date('Y-m-d H:i:s',time())
		]);
		
		return \response()->json($a, 200);
	}
    public function updateClone(){
        $uid = Input::get('uid');
        $photoid = Input::get('photoid');
        $cmtid = Input::get('cmtid');
        $linksp = Input::get('linksp');
        $status = Input::get('status');
	$email = Input::get('email');

        
        $cl0ne = clone2::where('uid', $uid)->first();
        if(!$cl0ne){
            return 'UID hợp lệ';
        }
        if ($photoid != ''){
            $cl0ne->photoid = $photoid;
        }

        if ($cmtid != ''){
            $cl0ne->cmtid = $cmtid;
        }

        if ($status != ''){
            $cl0ne->status = $status;
        }        
	if ($email != ''){
            $cl0ne->email = $email;
        }


        if ($linksp != ''){
            $cl0ne->linksp = $linksp;
        }
        $cl0ne->updated_at = date('Y-m-d H:i:s',time());
        $cl0ne->save();

        return response()->json($cl0ne, 200);
    }
    public function getClone(){
        $cl0ne = clone2::where('status','new')->orderBy('xoaytua','ASC')->first();
        clone2::where('id',$cl0ne->id)->update(['xoaytua'=>date('Y-m-d H:i:s',time())]);
        /*$cl0ne->updated_at = date('Y-m-d H:i:s',time());
        $cl0ne->save();*/
        return response()->json($cl0ne, 200);
    }
    public function getCloneByStatus(){
        $status = Input::get('status');
        $cl0ne = clone2::where('status','like','%'.$status.'%')->orderBy('xoaytua','ASC')->first();
        //clone2::where('id',$cl0ne->id)->update(['xoaytua'=>date('Y-m-d H:i:s',time())]);
        $cl0ne->xoaytua = date('Y-m-d H:i:s',time());
        $cl0ne->save();
        return response()->json($cl0ne, 200);
    }
    
    public function getCloneByUID(){
        /*$cl0ne = clone2::limit(1000)->orderBy('updated_at','DESC')->get();
        foreach($cl0ne as $cl){
            if(strtotime($cl->updated_at) > strtotime('2018-01-19 15:13:17')){
                clone2::where('id',$cl->id)->update(['updated_at'=>date('Y-m-d H:i:s',time())]);
            }
        }*/
        $status = Input::get('uid');
        $cl0ne = clone2::where('uid','like','%'.$status.'%')->orderBy('xoaytua','ASC')->first();
        clone2::where('id',$cl0ne->id)->update(['xoaytua'=>date('Y-m-d H:i:s',time())]);
        
        return response()->json($cl0ne, 200);
    }
    public function doTakeCare(){
        $cl0ne = clone2::select('id','uid','token')->orderBy('updated_at','ASC')->first();
        clone2::where('id',$cl0ne->id)->update(['updated_at'=>date('Y-m-d H:i:s',time())]);
        /*$cl0ne->updated_at = date('Y-m-d H:i:s',time());
        $cl0ne->save();*/
        return response()->json($cl0ne, 200);
    }

    public function deleteClone(){
        $status = Input::get('status');
        clone2::where('status',$status)->delete();
        //clone2::where('status','!=','used')->delete();
        echo 'ok';
    }
    public function addUsed(){
        $id = Input::get('id');
        clone2::where('id',$id)->update(['status'=>'used','used'=>auth::user()->name,'updated_at'=>date('Y-m-d H:i:s',time())]);
        return redirect('/clone/used');
    }
    public function getCMT(){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $clone = clone2::where('id',Input::get('id'))->first();
        $url = '125.212.245.115:88/IDRequest.ashx?name='.urlencode($clone->lastname.' '.$clone->firstname).'&gender='.$clone->sex.'&dob='.urlencode(date('d-m-Y',strtotime($clone->birthday)));
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        $id = explode('=',$data);
        clone2::where('id',Input::get('id'))->update(['cmtid'=>$id[1]]);
        return redirect('/clone/used');
    }
    public function chucvu(Request $r){
        $id = $r->id;
        $chucvu = $r->chucvu;
        User::where('id',$id)->update(['level'=>$chucvu]);
        return 'ok';
    }
    public function viewClone($st = '')
    {
        if($st == ''){
            $clone = clone2::where('status','new')->paginate(20);   
        }else{
            $clone = clone2::where('status',$st)->orderBy('updated_at','ASC')->paginate(20);
            
        }
        $status = clone2::select('status')->distinct()->get();
        $array = ['clone'=>$clone,'status'=>$status];
        return $array;
    }
}
