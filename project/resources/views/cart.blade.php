@extends('includes.master')

@section('content')

    <section class="container" style="margin-top: 20px;">

        <div class="content-push">

            <!-- <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/cart')}}">My Cart</a>
            </div> -->
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="information-blocks">
                 <div class="col-md-12"><h2>SHOPPING CART</h2></div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                    <table class="cart-table">
                        <tr>
                            <th class="column-1"></th>
                            <th class="column-2"></th>
                            <th class="column-3">Product Name</th>
                            <th class="column-4">Unit Price</th>
                            <th class="column-5">Qty</th>
                            <th class="column-6">Subtotal</th>
                            
                        </tr>
                        <tr id="cartempty"></tr>
                        @forelse($carts as $cart)
                        <tr id="item{{$cart->product}}">
                            <td>
                              <a class="remove-button" onclick="getDelete({{$cart->product}})"><i class="fa fa-times"></i>
                              </a>
                            </td>
                            <td>
                                <div class="traditional-cart-entry">
                                    <a href="#" class="image"><img src="{{url('/assets/images/products')}}/{{$cart->products->feature_image}}" alt=""></a>
                                </div>
                            </td>
                            <td>
                                <div class="traditional-cart-entry">
                                    <div class="content">
                                        <div class="cell-view">
                                            {{--<a href="#" class="tag">woman clothing</a>--}}
                                            <a href="{{url('/product')}}/{{$cart->product}}/{{str_replace(' ','-',strtolower($cart->products->title))}}" class="title">{{$cart->title}}</a>
                                            {{--<div class="inline-description">S / Dirty Pink</div>--}}
                                            {{--<div class="inline-description">Zigzag Clothing</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td id="price{{$cart->product}}" class="prices">${{$cart->products->price}}</td>
                            <td>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="entry number-minus" id="minus{{$cart->product}}">&nbsp;</div>
                                    <div class="entry number" id="number{{$cart->product}}">{{$cart->quantity}}</div>
                                    <div class="entry number-plus" id="plus{{$cart->product}}">&nbsp;</div>
                                </div>
                            </td>
                            <td><div class="subtotal" id="subtotal{{$cart->product}}">${{$cart->cost}}</div></td>
                            

                            <form id="citem{{$cart->product}}">
                                {{csrf_field()}}
                                @if(Session::has('uniqueid'))
                                    <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
                                @else
                                    <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
                                @endif
                                <input type="hidden" name="title" value="{{$cart->title}}">
                                <input type="hidden" name="product" value="{{$cart->product}}">
                                <input type="hidden" id="cost{{$cart->product}}" name="cost" value="{{$cart->cost}}">
                                <input type="hidden" id="quantity{{$cart->product}}" name="quantity" value="{{$cart->quantity}}">
                            </form>

                        </tr>

                        @empty
                            <tr>
                                <td>
                                    <h3>Your Cart is Empty.</h3>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                        @endforelse

                    </table>
                    <div class="countinue_buttons">
                      <div class="row">
                         <div class="col-md-3">
                          <a class="button style-10" href="{{url('/')}}">Continue Shopping</a></div>
                         <!--<div class="col-md-5">
                            <a class="button style-12" href="{{url('/')}}">Clear Shopping Cart</a></div> -->
                         <div class="col-md-4">
                           <a class="button style-12" href="{{url('/')}}">Clear Shopping Cart</a></div>
                       </div>
                     </div>
                </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart-submit-buttons-box">
                            <div class="row">
                                <a class="pull-right button style-10" href="http://localhost/snatchr/checkout">Proceed To Checkout</a>
                       </div>
                        <!-- <div class="row">
                            <div id="main">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Discount Codes
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                         <p>Enter your coupon code if you have one. </p>
                                         <input type="text" class="form-control" id="usr">
                                          <a class="pull-right button style-10" href="http://localhost/snatchr/checkout">Apply Coupon</a>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Estimate Shipping and Tax
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                         <p>Enter your destination to get a shipping estimate.</p>
                                         <form>
                                            <div class="form-group">
                                              <label for="sel1">Country *</label>
                                              <select class="form-control" id="sel1">
                                                <option>United State</option>
                                                <option>India</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="sel1">State/Province</label>
                                              <select class="form-control" id="sel1">
                                                <option value="">Please select region, state or province</option>
                                              <option value="63">West Virginia</option><option value="64">Wisconsin</option><option value="65">Wyoming</option>
                                              </select>
                                            </div>
                                          </form>
                                          <label>Zip/Postal Code</label>
                                         <input type="text" class="form-control" id="usr">
                                          <a class="pull-right button style-10" href="http://localhost/snatchr/checkout">Get a Quote</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div> -->
                            <div class="row" style="margin: 0">
                            <div class="cart-summary-box pull-right col-md-12" style="margin: 0">
                                <h2>Cart Totals</h2>
                                <div class="grand-total">Subtotal <span id="grandtotal">$719.99</span></div>
                                <!-- <div class="grand-total">Total <span id="grandtotal">${{round($sum,2)}}</span></div> -->
                                <a class="col-md-12 pull-right button style-10" href="{{route('user.checkout')}}">Proceed To Checkout</a>
                                <!-- <a class="checkout" href="#" title="Checkout with Multiple Addresses">Checkout with Multiple Addresses</a> -->
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@stop

@section('footer')
<script>

</script>
@stop