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
                            <a href="{{route('wishlist.index')}}">
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