@extends('includes.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<section class="go-section inner_dashboard">
   <div class="container">
      <div class="col-sm-3">
         <nav class="nav-sidebar">
            <ul class="nav tabs">
               <h3>My Account</h3>
               <li class="active">
                  <a href="#tab1" data-toggle="tab">
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    Account Dashboard</a>
               </li>
               <li class="">
                  <a href="#tab2" data-toggle="tab">
                     <i class="fa fa-caret-right" aria-hidden="true"></i>
                     Account information</a>
               </li>
               <li class="">
                  <a href="#tab3" data-toggle="tab">
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                     Address</a>
               </li>
               <li class="">
                  <a href="#tab6" data-toggle="tab">
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                     Change Password</a>
               </li>
               <li class="">
                   <a href="#tab4" data-toggle="tab">
                     <i class="fa fa-caret-right" aria-hidden="true"></i>
                     View Order</a>
               </li>
               <li class="">
                   <a href="#tab5" data-toggle="tab">
                     <i class="fa fa-caret-right" aria-hidden="true"></i>
                     Wishlist</a>
               </li>
               
               <li class="">
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <i class="fa fa-fw fa-power-off"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                  </form>
               </li>
            </ul>
         </nav>
      </div>
      <!-- tab content -->
      <div class="col-sm-9">
         @if(Session::has('message'))
         <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
         </div>
         @endif
         <div class="tab-content">
            <div class="tab-pane active text-style" id="tab1">
               <h4 class="pull-right">You Are Logged in As: {{Auth::user()->name}}</h4>
               <div class="col-md-8">
                  <h2>MY DASHBOARD</h2>
               </div>
               <div class="col-md-12">
                  <h5>Account Information</h5>
               </div>
               <div class="row">
                      <div class="col-md-6">
                          <div class="contact_information">
                              <div class="contact_information_top">
                                  CONTACT INFORMATION
                                  <a href="#">Edit</a>
                              </div>
                              <div class="contact_information_button">
                                  <p>Raj Singh
                                      <br/>
                                     rajsingh@clamourtechnologies.com</p>
                                  <a href="#">Change Password</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="contact_information">
                              <div class="contact_information_top">
                                  NEWSLETTERS
                                  <a href="#">Edit</a>
                              </div>
                              <div class="contact_information_button">
                                  <p>Raj Singh
                                      <br/>
                                     rajsingh@clamourtechnologies.com</p>
                                  <a href="#">Change Password</a>
                              </div>
                          </div>
                      </div>
                  </div>
               <div class="row">
                      <div class="col-md-12">
                          <div class="contact_information">
                              <div class="contact_information_top">
                                  ADDRESS BOOK
                                  <a href="#">Edit</a>
                              </div>

                              <div class="contact_information_button">
                                  <div class="row">
                                  <div class="col-md-6">
                                      <h2>Default Billing Address</h2>
                                  <p>You have not set a default billing address.</p>
                                  <a href="#">Edit Address</a>
                                  </div>
                                  <div class="col-md-6">
                                      <h2>Default Billing Address</h2>
                                  <p>You have not set a default billing address.</p>
                                  <a href="#">Edit Address</a>
                                  </div>
                              </div>

                              </div>
                          </div>
                      </div>
                  </div>
            </div>
            <div class="tab-pane text-style" id="tab2">
               <h2>Update Profile Informations</h2>
               <hr>
               <form method="POST" action="{{ action('UserProfileController@update',['id' => $user->id]) }}">
                  {{ csrf_field() }}
                  <div class="col-md-12">
                     <h3>ACCOUNT INFORMATION</h3>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>First Name <span>*</span></label>
                           <input name="name" value="{{$user->name}}" placeholder="Full Name" class="form-control" type="text" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Last Name <span>*</span></label>
                           <input name="name" value="{{$user->name}}" placeholder="Full Name" class="form-control" type="text" required>
                        </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Email Address <span>*</span></label>
                           <input name="phone" value="{{$user->email}}" placeholder="Email" class="form-control"  type="email" disabled required>
                        </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Current Password <span>*</span></label>
                           <input name="password" value="{{$user->phone}}" placeholder="Password" class="form-control"  type="password" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="checkbox">
                              <label>
                                <div id="flip">
                                    <input type="checkbox" value="">
                                </div>
                                Option 1
                              </label>
                            </div>
                      </div>
                  </div>
                  <div id="panel">
                      <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                               <input name="city" placeholder="City" value="{{$user->city}}" class="form-control"  type="text" required>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                               <input name="zip" placeholder="Postal Code" class="form-control" value="{{$user->zip}}" type="text" required>
                            </div>
                         </div>
                      </div>
                  </div>
                  <div id="resp" class="col-md-6">
                     @if ($errors->has('error'))
                     <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                  </div>
                  <!-- Button -->
                  <div class="row">
                     <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                           <button type="submit" class="button style-10" id="LoginButton"><strong>Update Profile</strong></button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="tab-pane text-style" id="tab3">
               <h2>ADD NEW ADDRESS</h2>
               <hr>
               <form method="POST" action="{{ action('UserProfileController@update',['id' => $user->id]) }}">
                  {{ csrf_field() }}
                  <div class="col-md-12">
                     <h3>CONTACT INFORMATION</h3>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>First Name <span>*</span></label>
                           <input name="name" value="{{$user->name}}" placeholder="Full Name" class="form-control" type="text" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Last Name <span>*</span></label>
                           <input name="name" value="{{$user->name}}" placeholder="Last Name" class="form-control" type="text" required>
                        </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Company <span>*</span></label>
                           <input name="name" value="{{$user->name}}" placeholder="Company" class="form-control" type="text" required>
                           <!-- <input name="phone" value="{{$user->email}}" placeholder="Email" class="form-control"  type="email" disabled required> -->
                        </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Telephone <span>*</span></label>
                           <input name="phone" value="{{$user->phone}}" placeholder="Phone Number" class="form-control"  type="Number" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Fax <span>*</span></label>
                           <input name="fax" placeholder="Fax" value="{{$user->fax}}" class="form-control"  type="text" required>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <h3>ADD NEW ADDRESS</h3>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Street Address <span>*</span></label>
                           <input name="address" placeholder="Address" class="form-control" type="text" required>
                           <input name="address" placeholder="Address" class="form-control Street" type="text" required>
                           
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Street Address <span>*</span></label>
                           <input name="city" placeholder="City" value="{{$user->city}}" class="form-control"  type="text" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>State/Province <span>*</span></label>
                           <input name="city" placeholder="City" value="{{$user->city}}" class="form-control"  type="text" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Zip/Postal Code <span>*</span></label>
                           <input name="zip" placeholder="Postal Code" class="form-control" value="{{$user->zip}}" type="text" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Country <span>*</span></label>
                           <input name="zip" placeholder="Postal Code" class="form-control" value="{{$user->zip}}" type="text" required>
                        </div>
                     </div>
                  </div>
                  <div id="resp" class="col-md-6">
                     @if ($errors->has('error'))
                     <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                  </div>
                  <!-- Button -->
                  <div class="row">
                     <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                           <button type="submit" class="button style-10" id="LoginButton"><strong>Update Profile</strong></button>
                        </div>
                     </div>
                  </div>

               </form>
            </div>
            <div class="tab-pane text-style" id="tab4">
               <h2>MY ORDERS</h2>
            </div>
            <div class="tab-pane text-style" id="tab5">
               <h2>MY WISHLIST </h2>
            </div>
            <div class="tab-pane text-style" id="tab6">
               <h2>CHANGE PASSWORD</h2>
               <hr>
               <form method="POST" action="{{ action('UserProfileController@update',['id' => $user->id]) }}">
                  {{ csrf_field() }}
                  <div class="col-md-12">
                     <h3>SET NEW PASSWORD</h3>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                           <label>Current Password <span>*</span></label>
                           <input name="password" value="{{$user->phone}}" placeholder="Password" class="form-control"  type="password" required>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                           <label>New Password <span>*</span></label>
                           <input name="password" value="{{$user->phone}}" placeholder="Password" class="form-control"  type="password" required>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                           <label>Confirm Password <span>*</span></label>
                           <input name="password" value="{{$user->phone}}" placeholder="Password" class="form-control"  type="password" required>
                        </div>
                     </div>
                  </div>
                  <!-- Text input-->
                  
                  <div id="resp" class="col-md-6">
                     @if ($errors->has('error'))
                     <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                  </div>
                  <!-- Button -->
                  <div class="row">
                     <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                           <button type="submit" class="button style-10" id="LoginButton"><strong>Upload</strong></button>
                        </div>
                     </div>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
}

#panel {
  display: none;
}
</style>
@stop
@section('footer')
@stop