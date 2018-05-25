<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>ProLog - The Beginning of Simple Project Management</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/materialize/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col s6 offset-s3">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h3 class="center-align">Sign In</h3>

                <div class="input-field">
                    <input type="text" name="email" id="email" placeholder="Email address" />
                </div>

                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>

                <br/>

                <div>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>{{ __('Remember Me') }}</span>
                    </label>
                </div>

                <br/>

                <div>
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-blue">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  Scripts-->
<script src="/jquery/jquery.min.js"></script>
<script src="/materialize/materialize.min.js"></script>

</body>
</html>