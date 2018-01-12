<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use App\clone2;
use App\Vip;

class agentApiController extends Controller
{
    public function updateClone(){
        $uid = Input::get('uid');
        $status = Input::get('status');
        $clone = clone2::where('uid',$uid)->update(['status'=>$status]);
        return \response()->json($clone);
    }
    public function DoVipLike(){
        $vipid = Vip::select('uid','action')->orderBy('updated_at','ASC')->lockForUpdate()->first();
        return response()->json($vipid);
    }
}
