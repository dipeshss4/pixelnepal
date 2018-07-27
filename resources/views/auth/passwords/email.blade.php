<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>World Cup | Login</title>

    <!-- Bootstrap -->



    <link href="{{asset('backend/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->

    <link href="{{asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/animate/animate.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/util.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

    <!-- NProgress -->

    <link href="{{asset('backend/assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->

    <link href="{{asset('backend/assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('backend/assets/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div class="" align="center">
    <div class="container-login100">
        <div class="row">
            @if(session('status'))
                {{session('status')}}
            @endif
            <form class="login100-form validate-form" action="{{  route('password.email')  }}" method="POST">
                @csrf
                <label class="login100-form"> Reset password</label>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>



            </form>
        </div>
    </div>
</div>



</body>

</html>
