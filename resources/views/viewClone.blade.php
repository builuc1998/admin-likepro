<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="{{ asset('awesome/css/font-awesome.min.css') }}" />
        <!-- Theme style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('alt/skins.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('alt/AdminLTE.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('alt/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('js/pace/pace.min.css') }}" />
        <script src="{{ asset('js/pace/pace.min.js') }}"></script>
        <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('alt/adminlte.min.js') }}"></script>
        <script src="{{ asset('toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('js/lucdeptrai.js') }}"></script>
        <title>Auto Facebook</title>
    </head>
    <body class="skin-blue sidebar-mini" style="overflow: scroll;">
        <div class="pace  pace-inactive pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div></div>
        <div class="" style="padding-left: 15px;">
            <label>Chọn trạng thái - id {{auth::user()->id}}</label>
        </div>
        <div class="form-group" style="padding-left: 15px;">
            <select onchange="change()" id="change" class="form-control col-md-3" style="width: 20% !important;">
                <option value="new">Chọn trạng thái </option>
                @foreach($status as $st)
                   <option <?=$st2 == $st->status ? 'selected' : '' ?> value="{{$st->status}}">{{$st->status}}</option>     
                @endforeach
            </select>
        </div>
        <table class="table">
    <thead>
      <tr>
        <th>Uid</th>
        <th>Email</th>
        <th>Password</th>
        <th>CMTID</th>
        <th>PHOTOID</th>
        <th>Sex</th>
        <th>Link Suport</th>
        <th>Fist Name</th>
        <th>Lsst Name</th>
        <th>Birthday</th>
        <th>Time Create</th>
        <th>Time Update</th>
        <th>User</th>
        <th>Xoay Tua</th>
        <th style="display: none;">Token</th>
      </tr>
    </thead>
    <tbody>
        @foreach($clone as $cl)
      <tr>
        <td><a href="https://fb.com/{{$cl->uid}}" target="_blank">{{$cl->uid}}</a>
        
        </td>
        <td>{{$cl->email}}</td>
        <td>@if($cl->status == 'used' && auth::user()->name != $cl->used)
                hihi
            @elseif(auth::user()->level == 2 || auth::user()->level == 1)
                {{$cl->password}}
            @elseif(auth::user()->level == 0)
                hihihi
            @else
                {{$cl->password}}
            @endif
        </td>
        <td>
            @if($cl->status == 'new' && auth::user()->level != 0)
                <a href="/api/addUsed?id={{$cl->id}}">Use</a>
            @elseif($cl->cmtid == 'null' && $cl->status == 'used' && auth::user()->level != 0)
                <a href="/api/getCMT?id={{$cl->id}}">Get CMT</a>
            @elseif($cl->cmtid != 'null' && auth::user()->level != 0)
                <a href="http://125.212.245.115:88/IDRequest.ashx?id={{$cl->cmtid}}" target="_blank">{{$cl->cmtid}}</a>
            @else
                hihihi   
            @endif
        </td>
        <td>{{$cl->photoid}}</td>
        <td>{{$cl->sex}}</td>
        <td>
            @if(auth::user()->level == 2 || auth::user()->level == 1)
                {{$cl->linksp}}
            @else
                hihi
            @endif</td>
        <td>{{$cl->lastname}}</td>
        <td>{{$cl->firstname}}</td>
        <td>{{$cl->birthday}}</td>    
        <td>{{$cl->created_at}}</td>
        <td>{{$cl->updated_at}}</td>
        <td>{{$cl->used}}</td>
        <td  style="display: none;">
            @if($cl->status=='used' || auth::user()->level == 2)
                {{$cl->token}}
            @else
                hihi
            @endif
        </td>
        <td>{{$cl->xoaytua}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $clone->links() }}
        <!--<div id="app">
            <router-view></router-view>
        </div>-->
    </body>
<!---jquery--->
<!--<script src="{{mix('js/app.js')}}" type="text/javascript"></script>-->
</html>
<script>
function change(){
    var change = $('#change').val();
    location.href='/clone/'+change;
}
</script>
