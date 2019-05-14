@extends('includes.master')

@section('content')

<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <div class="login_registation">
                <div class="col-md-12">
                <!-- Form Name -->
                <h2 class="text-center marginbottom">LOGIN OR CREATE AN ACCOUNT</h2>

                <form role="form" method="POST" action="{{ route('user.login.submit') }}" id="login-form">

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                          <div class="create_account">
                            <h3>NEW CUSTOMERS</h3>
                             <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                        <a href="{{route('user.reg')}}" class="text-center" style="color: #fff;">Create a New Account</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <h3>REGISTERED CUSTOMERS</h3>
                                 <p>If you have an account with us, please log in.</p>
                             </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Address <span>*</span></label>
                                    <input name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" type="email" required>
                                    <p id="emailError" class="errorMsg"></p>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password <span>*</span></label>
                                    <input name="password" placeholder="Password" class="form-control"  type="password" required>
                                    <p id="passError" class="errorMsg"></p>
                                </div>
                            </div>

                            <div id="resp" class="col-md-6 col-md-offset-3">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <!-- Button -->
                            <div class="row">
                                <div class="login">
                                  <div class="row">
                                    <div class="col-md-8">
                                        <a href="{{route('user.forgotpass')}}">Forgot Password?</a>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="button style-10" id="LoginButton"><strong>Login</strong></button>
                                    </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    <div class="form-group text-center">

                    </div>
                </form>
                </div>
              </div>
           </div>
        </div>
     </div>

@stop

@section('footer')

@stop