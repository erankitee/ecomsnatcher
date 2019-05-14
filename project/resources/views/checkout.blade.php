@extends('includes.master')
@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">
                 <div class="login_registation">
                   <div class="col-md-12">
                      <div class="col-md-9">
                        <h2 class="text-center">CHECKOUT</h2>
                       </div>
                       <div class="col-md-3">
                           <h3 class="text-center">Your Checkout Progress</h3>
                       </div>
                   </div>
                 </div>
                <div class="col-md-offset-2 col-md-8">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12 text-center">
                    <div class="col-md-12 order-div">
                        <div class="col-md-9 order-left">
                          
                <div class="row">
                            <div id="main">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          1 Checkout Method
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="content">
                                                   <h3>Checkout as a Guest or Register</h3>
                                                   <p>Register with us for future convenience:</p>
                                                  <ul class="form-list">
                                                      <li class="control">
                                                            <input type="radio" name="checkout_method" id="login:guest" value="guest" class="radio"><label for="login:guest">Checkout as Guest</label>
                                                      </li>
                                                      <li class="control">
                                                        <input type="radio" name="checkout_method" id="login:register" value="register" class="radio"><label for="login:register">Register</label>
                                                     </li>
                                                 </ul>
                                                <h4>Register and save time!</h4>
                                                <p>Register with us for future convenience:</p>
                                                <ul class="ul">
                                                    <li>Fast and easy check out</li>
                                                    <li>Easy access to your order history and status</li>
                                                </ul>
                                             </div>
                                             <div class="buttons-set">
                                                <button type="button" class="button" onclick="checkout.setMethod();"><span><span>Continue</span></span></button>
                                            </div>
                                            </div>

                                            <div class="col-md-6">
                                                <form role="form" method="POST" action="{{ route('user.login.submit') }}" id="login-form">
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
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          2 Billing Information
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body login_registation">
                                         <form class="col-md-12" action="{{route('payment.submit')}}" method="post" id="payment_form">
                                {{csrf_field()}}
                                @if(Auth::guard('profile')->guest())
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" class="form-control" name="name" value="" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" class="form-control" name="phone" value="" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" name="address" value="" placeholder="Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address<span>*</span></label>
                                            <input type="text" class="form-control" name="city" value="" placeholder="City" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>City<span>*</span></label>
                                        <input type="text" class="form-control" name="zip" value="" placeholder="Postal Code" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State/Province<span>*</span></label>
                                            <div class="form-group">
                                                <select class="form-control" onChange="meThods(this)" id="formac" name="method" required>
                                                    <option value="Paypal" selected>Please select region, state or province</option>
                                                    <option value="Stripe">Credit Card</option>
                                                    <option value="Cash">Cash On Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Zip/Postal Code<span>*</span></label>
                                        <input type="text" class="form-control" name="zip" value="" placeholder="Postal Code" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country<span>*</span></label>
                                            <div class="form-group">
                                                <select class="form-control" onChange="meThods(this)" id="formac" name="method" required>
                                                    <option value="Paypal" selected>Country</option>
                                                    <option value="Stripe">Credit Card</option>
                                                    <option value="Cash">Cash On Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Telephone<span>*</span></label>
                                        <input type="text" class="form-control" name="zip" value="" placeholder="Postal Code" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input type="text" class="form-control" name="city" value="" placeholder="City" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Password<span>*</span></label>
                                        <input type="text" class="form-control" name="zip" value="" placeholder="Postal Code" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm Password<span>*</span></label>
                                            <input type="text" class="form-control" name="city" value="" placeholder="City" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="content">
                                    <ul class="form-list">
                                      <li class="control">
                                            <input type="radio" name="checkout_method" id="login:guest" value="guest" class="radio"><label for="login:guest">Checkout as Guest</label>
                                      </li>
                                      <li class="control">
                                        <input type="radio" name="checkout_method" id="login:register" value="register" class="radio"><label for="login:register">Register</label>
                                     </li>
                                    </ul>
                                  </div>
                               </div>
                                   <!--  <input type="hidden" name="customer" value="0" />
                                @else
                                <div class="form-group">
                                    <label>State/Province<span>*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::guard('profile')->user()->name}}" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Zip/Postal Code<span>*</span></label>
                                    <input type="text" class="form-control" name="phone" value="{{Auth::guard('profile')->user()->phone}}" placeholder="Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <label>Country<span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{Auth::guard('profile')->user()->email}}" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Telephone<span>*</span></label>
                                    <input type="text" class="form-control" name="address" value="{{Auth::guard('profile')->user()->address}}" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <label>Telephone<span>*</span></label>
                                    <input type="text" class="form-control" name="city" value="{{Auth::guard('profile')->user()->city}}" placeholder="City" required>
                                </div>
                                <div class="form-group">
                                    <label>Telephone<span>*</span></label>
                                    <input type="text" class="form-control" name="zip" value="{{Auth::guard('profile')->user()->zip}}" placeholder="Postal Code" required>
                                </div>

                                    <input type="hidden" name="customer" value="{{Auth::guard('profile')->user()->id}}" /> -->
                                @endif
                                
                                <div id="stripes" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="card" placeholder="Card">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cvv" placeholder="Cvv">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="month" placeholder="Month">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="year" placeholder="Year">
                                    </div>
                                </div>

                                <input type="hidden" name="total" value="{{round($total,2)}}" />
                                <input type="hidden" name="products" value="{{$product}}" />
                                <input type="hidden" name="quantities" value="{{$quantity}}" />
                                <input type="hidden" name="sizes" value="{{$sizes}}" />

                                <div id="paypals">
                                    <input type="hidden" name="cmd" value="_xclick" />
                                    <input type="hidden" name="no_note" value="1" />
                                    <input type="hidden" name="lc" value="UK" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                </div>
                                <!-- <button type="submit" class="button style-10"> Order Now</button> -->
                            </form>
                                         <!--  <label>Zip/Postal Code</label>
                                         <input type="text" class="form-control" id="usr">
                                          <a class="pull-right button style-10" href="http://localhost/snatchr/checkout">Get a Quote</a> -->
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          3 Shipping Information
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                      <div class="panel-body">
                                        <div class="login_registation">
                                            <div class="col-md-12">
                                             <dl class="sp-methods">
                                                <dt>Flat Rate</dt>
                                                 <dd>
                                                   <ul>
                                                    <li>
                                                    <label for="s_method_flatrate_flatrate">Fixed                                                                        
                                                    <span class="price">$10.00</span>
                                                    </label>
                                                   </li>
                                                  </ul>
                                                 </dd>
                                             </dl>
                                            
                                           </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                              <p class="back-link"><a href="#" onclick="checkout.back(); return false;"><small>« </small>Back</a></p>
                                            <div class="buttons-set">
                                                <button type="button" class="button" onclick="checkout.setMethod();"><span><span>Continue</span></span></button>
                                            </div>
                                            </div>
                                           </div>
                                         </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                          4 Payment Information
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                      <div class="panel-body">
                                        <div class="col-md-12">
                                         <div class="content">
                                            <ul class="form-list">
                                              <li class="control">
                                                    <input type="radio" name="checkout_method" id="login:guest" value="guest" class="radio"><label for="login:guest">Credit Card (saved)</label>
                                              </li>
                                              <li class="control">
                                                <input type="radio" name="checkout_method" id="login:register" value="register" class="radio"><label for="login:register">Check / Money order</label>
                                             </li>
                                            </ul>
                                            <div class="row">
                                              <p class="back-link"><a href="#" onclick="checkout.back(); return false;"><small>« </small>Back</a></p>
                                            <div class="buttons-set">
                                                <button type="button" class="button" onclick="checkout.setMethod();"><span><span>Continue</span></span></button>
                                            </div>
                                           </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="pricing-list">
                                   <div class="dt">
                                      <h3>Billing Address <span>Change</span></h3>
                                      <div class="dt_botton"></div>
                                  </div>
                                  <div class="dt">
                                      <h3>Shipping Address  <span>Change</span></h3>
                                      <div class="dt_botton"></div>
                                  </div>
                                  <div class="dt">
                                      <h3>Shipping Method <span>Change</span></h3>
                                      <div class="dt_botton"></div>
                                  </div>
                                  <div class="dt">
                                      <h3>Payment Method <span>Change</span></h3>
                                      <div class="dt_botton"></div>
                                  </div>
                                <!-- <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th width="20%">Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartdata as $cart)
                                    <tr>
                                        <td><a href="{{url('/product')}}/{{$cart->product_id}}/{{str_replace(' ','-',strtolower($cart->products->title))}}" target="_blank">{{$cart->title}}</a></td>
                                        <td>{{$cart->quantity}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table> -->
                                <!-- <table class="table">
                                    {{--<tr>--}}
                                        {{--<td><strong>Shipping Cost:</strong></td>--}}
                                        {{--<td width="20%"><strong>${{round($settings[0]->shipping_cost,2)}}</strong></td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <td><h3 class="pricing-count" style="margin: 0">Total Cost:</h3></td>
                                        <td width="30%"><h3 class="pricing-count" style="margin: 0">${{round($total,2)}}</h3></td>
                                    </tr>
                                </table> -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop
@section('footer')
    <script type="text/javascript">
        function meThods(val) {
            var action1 = "{{route('payment.submit')}}";
            var action2 = "{{route('stripe.submit')}}";
            var action3 = "{{route('cash.submit')}}";
            if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#stripes").hide();
            }
            if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#stripes").show();
            }
            if (val.value == "Cash") {
                $("#payment_form").attr("action", action3);
                $("#stripes").hide();
            }
        }
    </script>
@stop