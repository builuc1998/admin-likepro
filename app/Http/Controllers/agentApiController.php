<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\DB;

use App\clone2;
use App\Viplike;
use App\Vipcomment;
use App\Vip;
use App\Share;
use App\Follow;
use App\Review;
use App\history;

class agentApiController extends Controller
{
    public function updateClone(){
        $uid = Input::get('uid');
        $status = Input::get('status');
        $clone = clone2::where('uid',$uid)->update(['status'=>$status]);
        return \response()->json($clone);
    }
    public function DoVipLike($type = 'like'){
        $i = 0;
        /*if($type == 'like'){
            $vipid = Vip::where('action','like')->orderBy('updated_at','ASC')->first();            
        }else{
            $vipid = Vip::where('action','comment')->orderBy('updated_at','ASC')->first();
        }*/
        $vipid = Vip::whereIn('action', ['like','comment'])->orderBy('updated_at','ASC')->first();
        Vip::where('id',$vipid->id)->update([
            'updated_at'=>date('Y-m-d H:i:s',time())
        ]);
        $access_token = 'EAAAAUaZA8jlABAG36LcfQtZBqyYFoizJLYSs0v0Mnn4vWYrWqFVdzKdbDb8w7nejJZBvFXIshhVZByiijbOAd2qGb8vV3A7AS1JSYOPjFW6JAXbBoQmzZBgLyTnZCza8ekJvc345AY8QjCioljlFF2RbgMjbYGCoEZD';
        $clone = clone2::orderBy('updated_at','ASC')->first();
        
        clone2::where('id',$clone->id)->update([
            'updated_at'=>date('Y-m-d H:i:s',time())
        ]);
        $client = new Client();
        if($vipid->action == 'like'){
            $limit = Viplike::select('speed','limit','type')->where('vipid',$vipid->id)->first();
            $response = $client->get('https://graph.facebook.com/'.$vipid->uid.'/feed?fields=id,privacy,story,created_time&limit=5&access_token='.$access_token);
            $list_id = json_decode($response->getBody()->getContents(),true);
            $type = (array) json_decode($limit->type);
            foreach($list_id['data'] as $postid){
                $check_postid = history::where('postid',$postid['id'])->where('me',0)->where('type','like')->first();
                if(!$check_postid){
                    $cpostid = history::create([
                        'userid' => $vipid->user_id,
                        'postid' => $postid['id'],
                        'type' => $vipid->action,
                        'status' => 'wait',
                        'me' => 0,
                        'uid' => $vipid->uid,                        
                        'dachay' => 0,
                        'tong' => '300',
                        'content' => 'Mẹ',
                    ]);
                }else{
                    $cpostid = $check_postid;
                }
                $total_like = $client->get('https://graph.facebook.com/'.$postid['id'].'/reactions?fields=&summary=true&access_token='.$access_token);
                $total_like = json_decode($total_like->getBody()->getContents(),true);
                if($total_like['summary']['total_count'] < 300 && $postid['privacy']['value'] != 'SELF' && $postid['privacy']['value'] != 'ALL_FRIENDS'){
                    return response()->json([
                                                'user_id' => $vipid->user_id,
                                                'action' => $vipid->action,
                                                'postid' => $postid['id'],
                                                'type' => $type[array_rand($type,1)],
                                                'me' => $cpostid->id,
                                                'uid' => $clone->uid,
                                                'token' => $clone->token
                                            ]);
                }
            }
        }
        
        
        if($vipid->action == 'likepage'){
            $limit = Viplike::select('speed','limit')->where('vipid',$vipid->id)->first();
            return response()->json([
                'speed' => $limit->speed,
                'action' => $vipid->uid,
                'postid' => $postid['id'],
                'uid' => $clone->uid,
                'token' => $clone->token
            ]);
        }
        
        if($vipid->action == 'comment'){
            $limit = Vipcomment::select('speed','limit','content')->where('vipid',$vipid->id)->first();
            $response = $client->get('https://graph.facebook.com/'.$vipid->uid.'/feed?fields=id,privacy,story,created_time&limit=5&access_token='.$access_token);
            $list_id = json_decode($response->getBody()->getContents(),true);
            $message = explode('|',$limit->content);
            foreach($list_id['data'] as $postid){
                $check_postid = history::where('postid',$postid['id'])->where('me',0)->where('type','comment')->first();
                if(!$check_postid){
                    $cpostid = history::create([
                        'userid' => $vipid->user_id,
                        'postid' => $postid['id'],
                        'type' => $vipid->action,
                        'status' => 'wait',
                        'me' => 0,
                        'uid' => $vipid->uid,                        
                        'dachay' => 0,
                        'tong' => '300',
                        'content' => 'Mẹ',
                    ]);
                }else{
                    $cpostid = $check_postid;
                }
                $total_like = $client->get('https://graph.facebook.com/'.$postid['id'].'/reactions?fields=&summary=true&access_token='.$access_token);
                $total_like = json_decode($total_like->getBody()->getContents(),true);
                return response()->json([
                                'user_id' => $vipid->user_id,
                                'speed' => $limit->speed,
                                'message' => $message[array_rand($message,1)],
                                'action' => $vipid->action,
                                'postid' => $postid['id'],
                                'me' => $cpostid->id,
                                'uid' => $clone->uid,
                                'token' => $clone->token
                            ]);
            }
        }
        if($vipid->action == 'share'){
            $limit = Share::select('speed','limit')->where('vipid',$vipid->id)->first();
            $response = $client->get('https://graph.facebook.com/'.$vipid->uid.'/feed?fields=id,privacy,story,created_time&limit=5&access_token='.$access_token);
            $list_id = json_decode($response->getBody()->getContents(),true);
            foreach($list_id['data'] as $postid){
                $total_like = $client->get('https://graph.facebook.com/'.$postid['id'].'/sharedposts?fields=&summary=true&access_token='.$access_token);
                $total_like = json_decode($total_like->getBody()->getContents(),true);
                return response()->json([
                                'speed' => $limit->speed,
                                'action' => $vipid->action,
                                'postid' => $postid['id'],
                                'uid' => $clone->uid,
                                'token' => $clone->token
                            ]);
            }
        }
    }
    public function upClone(){
        $str = '';
        $str = explode(PHP_EOL,$str);
        foreach($str as $st){
            $s = explode('|',$st);
            $clone = clone2::create([
                'uid' => $s[0],
                'email' => $s[1],
                'password' => $s[2],
                'cookie' => $s[4],
                'token' => $s[5],
                'note' => 'null',
                'birthday' => 'null',
                'lastname' => 'null',
                'firstname' =>'null',
                'linksp' =>'null'
            ]);
            //return response()->json($clone);
        }
    }
    public function DoResult(){
        $userid = Input::get('userid');
        $postid = Input::get('postid');
        $content = Input::get('content');
        $me = Input::get('me');
        $action = Input::get('action');
        $status = Input::get('status');
        $uid = Input::get('uid');
        
        $tong = history::where('id',$me)->first();
        history::where('id',$tong->id)->update(['dachay'=>$tong->dachay + 1]);
        history::create([
            'userid' => $userid,
            'content' => $content,
            'postid' => $postid,
            'type' => $action,
            'me' => $me,
            'uid' => $uid,
            'status' => $status
        ]);
        return 'true';
    }
    public function history(){
        file_put_contents('/var/www/laravel/public/log', Input::get('userid').' '.Input::get('content').PHP_EOL, FILE_APPEND);

    } 
}