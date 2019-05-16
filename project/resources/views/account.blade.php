@extends('includes.master')

@section('content')

    <section class="go-section inner_dashboard">
        <div class="container">

            <div class="col-sm-3">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                        <h3>@lang('account.my_account')</h3>
                        <li class="active">
                            <a href="{{route('dashboard.index')}}">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                @lang('account.account_dashboard') 
                            </a>
                        </li>
                        <li class="">
                            <a href="#tab2" data-toggle="tab">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                @lang('account.account_information')
                            </a>
                        </li>
                        <li class="">
                            <a href="#tab3" data-toggle="tab">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                @lang('account.address')
                            </a>
                        </li>
                        
                        <li class="">
                            <a href="#tab4" data-toggle="tab">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                 @lang('account.my_order')
                            </a>
                        </li>
                        <li class="">
                            <a href="#tab5" data-toggle="tab">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                @lang('account.wishlist')
                            </a>
                        </li>
                        <li class="">
                             <a href="#tab6" data-toggle="tab">
                               <i class="fa fa-caret-right" aria-hidden="true"></i>
                                @lang('account.change_password')</a>
                        </li>
                        <!-- <li class="active"><a href="#tab1" data-toggle="tab">Dashboard</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab">Update Profile</a></li>
                        <li class=""><a href="#tab3" data-toggle="tab">Change Password</a></li> -->
                        <li class="">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> @lang('account.logout')
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
                    <h4 class="pull-right ">
                        @lang('account.welcome') 
                        <span class="text-uppercase">
                            <b>{{Auth::user()->name}}</b>
                        </span>
                    </h4>
                    <div class="col-md-8">
                        <h2>@lang('account.my_dashboard')</h2>
                    </div>
                    <div class="col-md-12">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact_information">
                                <div class="contact_information_top">
                                    @lang('account.contact_information')
                                </div>
                                <div class="contact_information_button">
                                    <p>{{$user->name ?? ''}}
                                        <br/>
                                       {{$user->email ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact_information">
                                <div class="contact_information_top">
                                    @lang('account.address_book')
                                </div>

                                <div class="contact_information_button">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <h2>@lang('account.default_billing_address')</h2>
                                        @if(!empty($user->full_address))
                                            {{$user->full_address}}
                                        @else
                                            <p>@lang('account.not_set_default_billing_address')</p>
                                        @endif
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane text-style" id="tab2">

                    <h2>@lang('account.update_profile_informations')</h2>
                    <hr>
                    <form method="POST" action="{{ action('UserProfileController@update',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                         <div class="col-md-12">
                            <h3>@lang('account.account_informations')</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>@lang('account.first_name')<span>*</span></label>
                                    <input name="name" value="{{$user->name}}" placeholder="@lang('account.first_name')" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>@lang('account.last_name') <span>*</span></label>
                                    <input name="name" value="{{$user->name}}" placeholder="@lang('account.last_name')" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <label>@lang('account.email_address') <span>*</span></label>
                                    <input name="phone" value="{{$user->email}}" placeholder="@lang('account.email_address')" class="form-control"  type="email" disabled required>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="city" placeholder="@lang('account.city')" value="{{$user->city}}" class="form-control"  type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="zip" placeholder="@lang('account.postal_code')" class="form-control" value="{{$user->zip}}" type="text" required>
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
                                <button type="submit" class="button style-10" id="LoginButton">
                                    <strong>
                                        @lang('account.update_profile')
                                    </strong>
                                </button>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane text-style" id="tab3">
                   <!--  <h2>Change Password</h2>
                    <hr>
                    <form method="POST" action="{{ action('UserProfileController@passchange',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="cpass" placeholder="Current Password" class="form-control" type="password" required>

                                </div>
                            </div>
                        </div> -->
                        <!-- Text input-->
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="newpass" placeholder="New Password" class="form-control"  type="password" required>

                                </div>
                            </div>
                        </div> -->

                        <!-- Text input-->
                       <!--  <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="renewpass" placeholder="Confirm New Password" class="form-control"  type="password" required>

                                </div>
                            </div>
                        </div>

                        <div id="resp" class="col-md-6">
                            @if ($errors->has('error'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div> -->
                        <!-- Button -->
                        <!-- <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-5 col-md-offset-1">
                                    <button type="submit" class="button style-10" id="LoginButton"><strong>Update Password</strong></button>
                                </div>
                            </div>
                            @if(Auth::guest())
                                <p>Logged</p>
                            @else
                                <p>Guest</p>
                            @endif
                        </div>
                    </form> -->
                   
                    <h2>@lang('account.add_new_address')</h2>
                   
                    <hr>
                    <form method="POST" action="{{ action('UserProfileController@update',['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <h3>@lang('account.contact_info')</h3>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.first_name') <span>*</span></label>
                                    <input name="name" value="{{$user->name}}" placeholder="@lang('account.first_name')" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.last_name') <span>*</span></label>
                                    <input name="name" value="{{$user->name}}" placeholder="@lang('account.last_name')" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('account.company') <span>*</span></label>
                                    <input name="name" value="{{$user->name}}" placeholder="@lang('account.company')" class="form-control" type="text" required>
                                    <!-- <input name="phone" value="{{$user->email}}" placeholder="Email" class="form-control"  type="email" disabled required> -->

                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.telephone') <span>*</span></label>
                                    <input name="phone" value="{{$user->phone}}" placeholder="@lang('account.telephone')" class="form-control"  type="Number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.fax') <span>*</span></label>
                                    <input name="fax" placeholder="@lang('account.fax')" value="{{$user->fax}}" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>
                      <div class="col-md-12">
                        <h3>@lang('account.add_new_address')</h3>
                      </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('account.street_address') <span>*</span></label>
                                    <input name="address" value="{{$user->address}}" 
                                    placeholder="@lang('account.address')" class="form-control" type="text" required>
                                    <input name="address" value="{{$user->address}}"
                                     placeholder="@lang('account.address')" class="form-control Street" type="text" required>
                                    <!-- <textarea name="address" placeholder="Address" class="form-control" required>{{$user->address}}</textarea>
                                    <textarea name="address" placeholder="Address" class="form-control" required>{{$user->address}}</textarea> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.street_address') <span>*</span></label>
                                    <input name="city" placeholder="@lang('account.city')" value="{{$user->city}}" class="form-control"  type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.state_province') <span>*</span></label>
                                    <input name="city" placeholder="@lang('account.state_province')" value="{{$user->city}}" class="form-control"  type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.zip_postal') <span>*</span></label>
                                    <input name="zip" placeholder="@lang('account.postal_code')" class="form-control" value="{{$user->zip}}" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('account.country') <span>*</span></label>
                                    <input name="zip" placeholder="@lang('account.country')" class="form-control" value="{{$user->zip}}" type="text" required>
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
                                <button type="submit" class="button style-10" id="LoginButton">
                                    <strong>@lang('account.update_profile')</strong>
                                </button>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane text-style" id="tab4">
                   <h2>@lang('account.my_orders')MY ORDERS</h2>
                   <div class="col-md-12"></div><br>
                   <div class="">
                       <table class="table table-striped">
                            <thead>
                            <tr class="info">
                                <th>@lang('account.order_id')</th>
                                <th>@lang('account.product')</th>
                                <th>@lang('account.quantity')</th>
                                <th>@lang('account.date')</th>
                                <th>@lang('account.status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            @foreach(array_combine($order->products, $order->quantities) as $product => $quantity)
                                <tr>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{\App\Product::findOrFail($product)->title}}</td>
                                    <td>{{$quantity}}</td>
                                    <td>{{$order->booking_date}}</td>
                                    <td>{{ucfirst($order->status)}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane text-style" id="tab5">
                 <h2>MY WISHLIST </h2>
                 <div class="col-md-12"></div>
                    <div class="">
                       <table class="table table-striped">
                            <thead>
                            <tr class="info">
                                <th>Title</th>
                                <th>Price</th>
                                <th>Previous Price</th>
                                <th>Stock</th>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlists as $wishlist)
                                <tr>
                                    <td>{{$wishlist->product->title ?? ''}}</td>
                                    <td>${{$wishlist->product->price ?? ''}}</td>
                                    <td>${{$wishlist->product->previous_price ?? ''}}</td>
                                    <td>{{$wishlist->product->stock ?? ''}}</td>
                                    <td>{{$wishlist->product->sizes ?? ''}}</td>
                                    <td><a
                                         href="#"
                                         id="{{$wishlist->id}}"
                                         url="{{route('wishlist.destroy', $wishlist->id)}}"
                                         class="deletewishlist">
                                            <i class="fa fa-trash" aria-hidden="true" style="font-size:18px;color:red"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane text-style" id="tab6">
              <h2>CHANGE PASSWORD</h2>
              <hr>
              <form method="POST" action="{{ action('UserProfileController@passchange',['id' => $user->id]) }}">
                 {{ csrf_field() }}
                 <div class="col-md-12">
                    <h3>SET NEW PASSWORD</h3>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <label>Current Password <span>*</span></label>
                            <input name="currentPassword" placeholder="Current Password" class="form-control"  type="password" required>
                        </div>
                     </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                        <div class="form-group">
                          <label>New Password <span>*</span></label>
                          <input name="newPassword"  placeholder="New Password" class="form-control"  type="password" required>
                       </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Confirm Password <span>*</span></label>
                          <input name="confimNewPassword" placeholder="Confirm New Password" class="form-control"  type="password" required>
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
                       <div class="col-md-3">
                          <button type="submit" class="button style-10" id="LoginButton"><strong>Update</strong></button>
                       </div>
                    </div>
                 </div>

              </form>
           </div>
            </div>


            </div>
        </div>
    </section>

@stop

@section('footer')
<script>
  $('.deletewishlist').click(function(e){
    var url = $(this).attr('url');
    var wishlistid = $(this).attr('id');
    $.ajax({
            type: "DELETE",
            data: {
              "_token": "{{ csrf_token() }}",
              "wishlistid":wishlistid,
            },
            url: url,
            success:function(data){
              $.notify(data['msg']);
             setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 2000);
            }
    });
  });
</script>
@stop