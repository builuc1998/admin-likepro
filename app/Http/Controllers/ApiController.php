<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Vip;
use App\history;
use Carbon\Carbon;
use App\User;
use App\transaction;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function me(){
        return response()->json([
            'name'=>auth::user()->name,
            'fbid'=>auth::user()->fbid,
            'email'=>auth::user()->email,
            'money'=>number_format(auth::user()->money).' VNĐ',
            'level'=>auth::user()->level,
            'status'=>auth::user()->status,
            'avatar'=>auth::user()->avatar
        ],200);
    }
    public function infouser(){
        $user = User::where('id',Input::get('id'))->first();
        return response()->json([
            'name'=>$user->name,
            'fbid'=>$user->fbid,
            'email'=>$user->email,
            'money'=>number_format($user->money).' VNĐ',
            'level'=>$user->level,
            'status'=>$user->status,
            'avatar'=>$user->avatar
        ],200);
    }
    public function alluser(){
        $his = User::all();
        return \response()->json($his);   
    }
    
    public function searchuser(){
        $his = User::where('name','LIKE','%'.Input::get('key').'%')->orWhere('email','LIKE','%'.Input::get('key').'%')->orWhere('fbid','LIKE','%'.Input::get('key').'%')->get();
        return \response()->json($his);   
    }
    public function history(){
        $his = history::where('me','0')->orderBy('updated_at','DESC')->get();
        return \response()->json($his);
    }
    
    public function viewtask(){
        $his = vip::select('vip.uid','vip.updated_at','vip.action','users.name','users.id')->join('users', 'users.id', '=', 'vip.userid')->get();
        foreach($his as $h){
            $count = history::select('id')->where('uid',$h->uid)->where('me','0')->where('action',$h->action)->count();
            $json[] = array(
                'uid' => $h->uid,
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', $h->updated_at)->format('Y-m-d H:i:s'),
                'action' => $h->action,
                'total_postid' => $count,
                'name' => $h->name,
                'userid' => $h->id
            ); 
        }
        return \response()->json($json);
    }
    public function transaction(){
        $transaction = transaction::select(['transaction.userid','transaction.money','transaction.created_at','transaction.id','transaction.status','users.name'])->join('users', 'users.id', '=', 'transaction.userid')->get();
        return $transaction;
    }
    public function ConfirmTransaction(Request $request){
        if(auth::user()->level == 1){
            $transaction = transaction::select(['userid','money','status'])->where('id',$request->id)->first();
            if($transaction && $transaction->status != 'done'){
                transaction::where('id',$request->id)->update(['status'=>'done','admin'=>auth::user()->id,'updated_at'=>date('Y-m-d H:i:s',time())]);
                User::where('id',$transaction->userid)->update(['money'=>DB::raw('money +'.$transaction->money)]);   
            }else{
                return response()->json(['success'=>'false','message'=>'Giao dịch không tồn tại hoặc đã được xử lý!']);
            }
            return response()->json(['success'=>'true','message'=>'Xác nhận giao dịch thành công!']);
        }else{
            return response()->json(['success'=>'false','message'=>'Bạn không có quyền thực hiện hành động này!']);
        }
    }
}
