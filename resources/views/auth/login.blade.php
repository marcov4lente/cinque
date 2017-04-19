@extends('base.auth')

@section('pageTitle', 'Login')
@section('sideBarState', 'fixed')

@section('content')
    <div class="row">
        <div class="col s12 m12 white-text">
            <div class="section">
                <a href="/" class="logo-login"><img src="{{ asset('img/shopx-logo.png') }}" alt="ShopX"></a>
                <h3 class="white-text">Welcome to ShopX</h3>
                <p>
                    Not sure what ShopX is all about? View this quick video to get a glimpse of one of the world's most exciting Retail Business Simulations!
                </p>
            </div>
        </div>
        <div class="col s12 m7 z-depth-5" style="position:relative;height:469px !important;">
            <iframe src="https://www.youtube.com/embed/deaZCS2Bjs0?ecver=2" width="100%" height="439" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe>
        </div>
        <div class="col s12 m1">
            &nbsp;
        </div>
        <div class="col s12 m4 white z-depth-5">
            <div class="section">
                <h3>Already a member?</h3>
                <form role="form" method="POST" action="{{ route('login') }}">
                    <div class="section">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <input id="email" type="text" name="email" class="validate" value="{{ old('email') }}" required>
                            <label for="email">Email address</label>
                            @if ($errors->has('email'))
                                <strong class="red-text">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                        <div class="input-field">
                            <input id="password" type="password" name="password" class="validate" required>
                            <label for="password">Password</label>
                            @if ($errors->has('Password'))
                                <strong class="red-text">{{ $errors->first('Password') }}</strong>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="checkbox" id="remember" />
                            <label for="remember">Remember me</label>
                        </div>
                    </div>
                    <div class="section">
                        <div class="input-field">
                            <br>
                            <button type="submit" id ="login" class="btn waves-effect">
                                Login
                            </button>
                            <br>
                            <br>
                            <a href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
