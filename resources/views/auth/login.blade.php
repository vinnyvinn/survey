@extends('layouts.auth')

@section('content')
 <div class="row">

        <div class="col-xs-12 col-sm-8"></div>
        <div class="col-xs-12 col-sm-4">
            
            <div class="login-form">
                <div class="logo">
                    <img src="/images/logo.png">
                </div>
                <h4>Login to  {{ config('app.name', 'Laravel') }}</h4>
                  <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf


                    <div class="form-group">
                                                    <label for="email">{{ __('E-Mail Address') }}</label>
                       
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div><!--form-group-->

                    <div class="form-group">
                       <label for="password">{{ __('Password') }}</label>
                       
                             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                           <span class="invalid-feedback">
                               <strong>{{ $errors->first('password') }}</strong>
                           </span>
                       @endif
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div><!--col-md-6-->
                    
                        <div class="col-md-6 ">
                           

                           <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        </div><!--col-md-6-->
                    </div><!--form-group-->
                    <div class="form-group">
                        <div class="col-sm-12">
                              <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </div>

                    </form>

            </div>
        </div>

    </div><!--row-->
@endsection
