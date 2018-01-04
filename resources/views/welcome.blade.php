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
        <title>LikePro</title>
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="pace  pace-inactive pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div></div>
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
<!---jquery--->
<script src="{{mix('js/app.js')}}" type="text/javascript"></script>
</html>
