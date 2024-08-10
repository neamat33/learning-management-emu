<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMU Coaching | Student Login</title>
    <meta name="title" content="East Foundation Barisal">
    <meta name="keywords" content="East Foundation, Foundation Barisal, East Foundation Barishal">
    <meta name="author" content="Md Monirul Islam">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/asset/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="login-box" style="min-height: 470px!important;">
        <form class="login-form" method="POST" action="{{ route('student_register')}}">
            @csrf
            <h3 class="login-head"><img src="{{ asset('images')}}/logo.png" alt="" width="50"> SIGN UP</h3>
            <div class="form-group">
                <label class="control-label">Phone Number <span class="text-danger">*</span></label>
                <input class="form-control" name="phone_number" type="number" placeholder="phone number" autofocus>
                @error('phone_number')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Email <span class="text-danger">*</span> </label>
                <input class="form-control" name="email" type="email" placeholder="Email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Password <span class="text-danger">*</span></label>
                <input class="form-control" name="password" type="password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert" style="color: red;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <a href="{{route('login')}}">
                                <i class="fa fa-sign-in fa-lg fa-fw"></i> <span class="label-text">Already Register! please Login</span>
                            </a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" style="background-color: #034774;"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
            </div>
            <div style="text-align: center!important; margin-top: 5px">
                <spna>
                    <a href="{{Url('/')}}">
                        <i class="fa fa-backward" aria-hidden="true"></i>  Back to Home
                    </a>
                </spna>
            </div>
        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{asset('admin/asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/asset/js/popper.min.js')}}"></script>
<script src="{{asset('admin/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/asset/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('admin/asset/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>