<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background: url('images/office17.jpg');background-size: cover;background-repeat: no-repeat;
            }
            input[type=text], input[type=password],select,button {
                /*width: 20%;*/
                padding: 12px 20px;
                margin: 8px 0;
                margin-left: 2%;
                /*display: inline-block;*/
                /*border: 1px solid #ccc;*/
                /*box-sizing: border-box;*/
            }
            button {
                background-color: #059ce1 !important;
                color: white;
                /*padding: 14px 20px;*/
                /*margin: 8px 0;*/
                border: none;   
                cursor: pointer;
                /*margin-left: 2%;*/
                width: 70%;
            }

            button:hover {
                opacity: 0.8;
            }


            .imgcontainer {
              text-align: center;
              /*margin: 24px 0 12px 0;*/
            }

            img.avatar {
              width: 40%;
              border-radius: 50%;
            }

            .container {
              text-align: center;
            }

            span.psw {
              float: right;
              padding-top: 16px;
            }

            #loginFrm{
                margin-left: 5%    
            }
            .help-block{                
                text-align: center;
            }
            .help-block > strong{                
                background: snow;color: #cc0d0d !important;
            }
            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
              span.psw {
                 display: block;
                 float: none;
              }
              .cancelbtn {
                 width: 100%;
              }
            
            }
        </style>
    </head>
    <body>
        <div style="margin-top: 5%">
            @if (\Session::has('message'))
            <div class="alert alert-dismissible alert-success text-center" style="width: 20%;margin: auto;margin-bottom: 20px;">
                    <strong>{!! \Session::get('message') !!}</strong>
                </div>  
            @endif
            <div class="imgcontainer">
                <img src="images/logo.png" alt="Avatar" class="avatar1" style="width: 15%">
                <h1 style="margin-top:15px;font-family:Century Gothic, CenturyGothic, AppleGothic, sans-serif;font-size: 36px;font-style: normal;font-variant: normal;font-weight: bold;letter-spacing: 5px;color:#fff;">INSIGHTS <b style="color:#fff">PRO</b></h1>
            </div>            
            <form class="form-horizontal" id="loginFrm" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <input id="username" type="text" class="form-control" name="username" placeholder="Enter Username" value="{{ old('username') }}"  autofocus >
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password"> 
                        @if ($errors->has('password'))
                            <span class="help-block" style="text-align: center;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <select name="emptype" id="emptype" class="form-control" placeholder="Employee Type" >
                            <option value="">-Select User Type-</option>
                            <option value="A">Admin</option>
                            <option value="SIA">Supervisor Analyst</option>
                            <option value="SOP">Enterprise</option> 
                            <option value="IA">Analyst</option><option value="Client_p">Professional</option>
                        </select>
                        @if ($errors->has('emptype'))
                        <span class="help-block" style="text-align: center;">
                            <strong>{{ $errors->first('emptype') }}</strong>
                        </span>
                        @endif       
                    </div>
                    <div class="col-md-3">                        
                        <button id="login" class="btn btn-primary submit" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>    
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     $("#login").click(function(e){
        //         e.preventDefault()
        //         $.ajax({
        //             url:'/login',
        //             type:'POST',
        //             data:$('#loginFrm').serialize(),
        //             success:function(result){
        //                 console.log(result);
        //             }
        //         });
        //     });
        // });
</script>
</html>
