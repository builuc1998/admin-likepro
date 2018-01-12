<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Viplike;
use App\Vipcomment;
use App\Vip;
use App\Share;
use App\Follow;
use App\Review;
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
    public function install(Request $request){
        if($request->uid == ''){
            return \response()->json(['success'=>'false','message'=>'Vui lòng nhập UID'],200);
        }else if($request->type == ''){
            return \response()->json(['success'=>'false','message'=>'Vui lòng chọn loại cảm xúc'],200);
        }
        $check = Vip::where('uid',$request->uid)->where('action',$request->action)->first();

        if($check){
            return \response()->json(['success'=>'false','message'=>'UID đã tồn tại'],200);
        }
        if($request->time == ''){
            $time = '';
        }else{
            $time = $request->time;
        }
        $create = Vip::create([
                    'uid' => $request->uid,
                    'action' => $request->action,
                    'time' => $time,
                    'price' => $request->package * 1000 * ($request->time / 15) ,
                    'user_id' => auth::user()->id
                ]);
        
        
        if($create){
            if($request->action == 'like'){
            $create = Viplike::create([
                'vipid' => $create->id,
                'limit' => $request->package,
                'type' => json_encode($request->type),
                'speed' => $request->speed
            ]);
            return \response()->json(['success'=>'true','message'=>'Chúc mừng bạn đã thanh toán thành công'],200);
            }
            if($request->action == 'comment'){
            $create = Vipcomment::create([
                'vipid' => $create->id,
                'limit' => $request->package,
                'speed' => $request->speed,
                'content' => $request->content
            ]);
            return \response()->json(['success'=>'true','message'=>'Chúc mừng bạn đã thanh toán thành công'],200);
            }
            if($request->action == 'share'){
            $create = Share::create([
                'vipid' => $create->id,
                'limit' => $request->package,
                'speed' => $request->speed
            ]);
            return \response()->json(['success'=>'true','message'=>'Chúc mừng bạn đã thanh toán thành công'],200);
            }
            if($request->action == 'review'){
            $create = Review::create([
                'vipid' => $create->id,
                'limit' => $request->package,
                'content' => $request->content,
                'rate' => $request->rate
            ]);
            return \response()->json(['success'=>'true','message'=>'Chúc mừng bạn đã thanh toán thành công'],200);
            }
            if($request->action == 'follow'){
            $create = Follow::create([
                'vipid' => $create->id,
                'limit' => $request->package
            ]);
            return \response()->json(['success'=>'true','message'=>'Chúc mừng bạn đã thanh toán thành công'],200);
            }
        }
    }
    public function getViplikeID(){
        $action = Input::get('action');
        if($action == 'like'){
            $vipid = Vip::select('vip.uid','viplike.limit','vip.time','vip.active','viplike.type','viplike.speed')->where('user_id',auth::user()->id)->where('action',Input::get('action'))->join('viplike', 'vip.id', '=', 'viplike.vipid')->paginate(10);
            return \response()->json($vipid);
        }
        if($action == 'comment'){
            $vipid = Vip::select('vip.uid','vipcomment.limit','vip.time','vip.active','vipcomment.content','vipcomment.speed')->where('user_id',auth::user()->id)->where('action',Input::get('action'))->join('vipcomment', 'vip.id', '=', 'vipcomment.vipid')->paginate(10);
            return \response()->json($vipid);
        }
        if($action == 'share'){
            $vipid = Vip::select('vip.uid','vipshare.limit','vip.time','vip.active','vipshare.speed')->where('user_id',auth::user()->id)->where('action',Input::get('action'))->join('vipshare', 'vip.id', '=', 'vipshare.vipid')->paginate(10);
            return \response()->json($vipid);
        }
        if($action == 'review'){
            $vipid = Vip::select('vip.uid','review.limit','vip.time','vip.active','review.content','review.rate')->where('user_id',auth::user()->id)->where('action',Input::get('action'))->join('review', 'vip.id', '=', 'review.vipid')->paginate(10);
            return \response()->json($vipid);
        }
        if($action == 'follow'){
            $vipid = Vip::select('vip.uid','follow.limit','vip.time','vip.active','follow.dachay','follow.no')->where('user_id',auth::user()->id)->where('action',Input::get('action'))->join('follow', 'vip.id', '=', 'follow.vipid')->paginate(10);
            return \response()->json($vipid);
        }
    }

}
