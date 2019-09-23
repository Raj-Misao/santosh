<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Lockscreen - IPFK</title>
    </head>
    <body >
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="lockscreen-content">
            <div class="logo" style="text-align: center;">
                <img src="images/logo.png" width="32%" height="62%">
            </div>
            <div class="lock-box">
                <img class="rounded-circle user-image" src="images/{{Auth::user()->profile_img}}">
                <h4 class="text-center user-name">{{ Auth::user()->name }}</h4>
                <p class="text-center text-muted">{{Auth::user()->user_type}} </p>
                @if (\Session::has('message'))
                    <div class="alert alert-dismissible alert-danger text-center">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>{!! \Session::get('message') !!}</strong>
                    </div>  
                @endif
                <form method="post" class="unlock-form" action="{{ route('unlocked') }}">
                    {{ csrf_field() }}  
                    <input type="hidden"  name="preUrl" id="preUrl" value="{{ url()->previous() }}">
                    <div class="form-group">
                        <label class="control-label">PASSWORD</label>
                        <input class="form-control" name="password" type="password" placeholder="Password" autofocus required="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group btn-container">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-unlock fa-lg"></i>UNLOCK </button>
                    </div>
                </form>
                <p><a href="notLocked">Not {{ Auth::user()->name }} ? Login Here.</a></p>
            </div>
        </section>
        <!-- Essential javascripts for application to work-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>        
    </body>

    <script type="text/javascript">
        $(function() {
            window.location.hash="no-back-button";
            window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
            window.onhashchange=function(){window.location.hash="no-back-button";}
            // var n = localStorage.getItem('on_load_counter'); 
            // if (n === 'null') {
            //     n = 0;
            // } 
            // n++;
            // // /alert(n)
            // $.ajax({
            //     url:'/preUrl',
            //     type:'get',
            //     data:{'count':n,'url':$('#preUrl').val()},
            //     success:function(result){
            //         localStorage.setItem("on_load_counter", n);                    
            //     }
            // })
        });

    </script>
</html>