@extends('includes.master')

@section('content')

    <div id="wrapper" class="go-section">
        <div class="row">
            <div class="container">
                <div class="login_registation">
                  <div class="col-md-12">
                    <!-- Form Name -->
                    <h2 class="text-center marginbottom">Create a Account</h2>

                    <form action="{{route('user.reg.submit')}}" method="post" id="login-form">
                        {{csrf_field()}}
                        <div class="col-md-12">
                             <h3>NEW CUSTOMERS</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>First Name <span>*</span></label>
                                    <input name="name" placeholder="Full Name" class="form-control" type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle Name/Initial</label>
                                    <input name="name" placeholder="Full Name" class="form-control" type="text">
                                    <p id="nameError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name <span>*</span></label>
                                    <input name="name" placeholder="Full Name" class="form-control" type="text" required>
                                    <p id="nameError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address <span>*</span></label>
                                    <input name="email" placeholder="Email" class="form-control"  type="email" required>
                                    <p id="emailError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone <span>*</span></label>
                                    <input name="phone" placeholder="Phone" class="form-control"  type="phone" required>
                                    <p id="emailError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        
                        <!-- Text input-->
                        <div class="col-md-12">
                            <label class="checkbox2"> Sign Up for Newsletter
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-12">
                             <h3>LOGIN INFORMATION</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Password<span>*</span></label>
                                    <input name="password" placeholder="Password" class="form-control"  type="password" required>
                                    <p id="passError" class="errorMsg"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Confirm Password <span>*</span></label>
                                    <input name="password_confirmation" placeholder="Confirm Password" class="form-control"  type="password" required>
                                    <p id="passError" class="errorMsg"></p>
                                </div>
                            </div>
                        </div>
                        <div id="resp" class="col-md-6 col-md-offset-3">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>* {{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>* {{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>* {{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="row">
                          <div class="col-md-10">
                            <div class="form-group text-center login">
                                <div style="margin-top: 10px;">
                                    <a href="{{route('user.login')}}" class="text-center"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Back</a>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-md-12 control-label"></label>
                                <div class="col-md-12">
                                    <button type="submit" id="RegButton" class="button style-10" ><strong>Submit</strong></button>
                                </div>
                            </div>
                          </div>
                        </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop

@section('footer')

@stop