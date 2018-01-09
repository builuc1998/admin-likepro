<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Viplike;
use Carbon\Carbon;


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
    public function installViplike(Request $request){
        if($request->uid == ''){
            return \response()->json(['success'=>'false','message'=>'Vui lòng nhập UID'],200);
        }else if($request->type == ''){
            return \response()->json(['success'=>'false','message'=>'Vui lòng chọn loại cảm xúc'],200);
        }else{
            $query = Viplike::where('uid',$request->uid)->first();
            if($query){
                return \response()->json(['success'=>'false','message'=>'UID đã tồn tại'],200);
            }else{
                $create = Viplike::create([
                    'uid' => $request->uid,
                    'package' => $request->package,
                    'type' => json_encode($request->type),
                    'speed' => $request->speed,
                    'time' => $request->time,
                    'buytime' => Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')),
                    'user_id' => auth::user()->id
                ]);
                return \response()->json(['success'=>'true','message'=>'Chúc mừng bạn đã thanh toán thành công'],200);
            }
        }
    }
    public function getViplikeID(){
        $all = Viplike::where('user_id',auth::user()->id)->get();
        return \response()->json($all);
    }

}
