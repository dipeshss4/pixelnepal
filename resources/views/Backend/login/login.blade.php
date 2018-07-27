<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>World Cup | Admin Login</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->

    <link href="{{asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->

    <link href="{{asset('backend/assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->

    <link href="{{asset('backend/assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('backend/assets/build/css/custom.min.css')}}" rel="stylesheet">

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ route('admin.login')}}" method="POST">

                    {{csrf_field()}}
                    <h1>Admin Login</h1>
                    <br/>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}"  placeholder="Username" autofocus/>
                        @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>Please enter your email</strong>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Password"/>
                        @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <strong>Please enter your password</strong>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                       <input type="hidden" name="_type" value="admin">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Log In</button>
                        <a class="reset_pass" href="#">Forgot Your Password?</a>
                    </div>
                    <br/>
                    <div class="form-group separator">
                        <br/>
                        <br/>
                        <div class="form-group">
                            <h1><i class="fa fa-globe"></i> PhotoPayo</h1>
                            <p>©Photopayo .</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>

</html>
