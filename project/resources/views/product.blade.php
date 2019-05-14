@extends('includes.master')

@section('content')

    <section class="container" style="margin-top: 20px;">
        <div class="content-push">

            <!-- <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/category')}}/{{\App\Category::where('id',$productdata->category[0])->first()->slug}}">{{\App\Category::where('id',$productdata->category[0])->first()->name}}</a>
                @if($productdata->category[1] != "")
                <a href="{{url('/category')}}/{{\App\Category::where('id',$productdata->category[1])->first()->slug}}">{{\App\Category::where('id',$productdata->category[1])->first()->name}}</a>
                @endif
                @if($productdata->category[2] != "")
                <a href="{{url('/category')}}/{{\App\Category::where('id',$productdata->category[2])->first()->slug}}">{{\App\Category::where('id',$productdata->category[2])->first()->name}}</a>
                @endif
                <a href="{{url('/product')}}/{{$productdata->id}}/{{str_replace(' ','-',strtolower($productdata->title))}}">{{$productdata->title}}</a>
            </div> -->

            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-4 information-entry">
                        <div class="product-preview-box">
                            <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-zoom-image">
                                            <img src="{{url('/')}}/assets/images/products/{{$productdata->feature_image}}" alt="" data-zoom="" />
                                        </div>
                                    </div>
                                    @forelse($gallery as $galdta)
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('/')}}/assets/images/gallery/{{$galdta->image}}" alt="" data-zoom="" />
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="pagination"></div>
                                <div class="product-zoom-container">
                                    <div class="move-box">
                                        <img class="default-image" src="" alt="" />
                                        <img class="zoomed-image" src="" alt="" />
                                    </div>
                                    <div class="zoom-area"></div>
                                </div>
                            </div>
                            <div class="swiper-hidden-edges">
                                <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide selected">
                                            <div class="paddings-container">
                                                <img src="{{url('/')}}/assets/images/products/{{$productdata->feature_image}}" alt="" />
                                            </div>
                                        </div>
                                        @forelse($gallery as $galdta)
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="{{url('/')}}/assets/images/gallery/{{$galdta->image}}" alt="" />
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse


                                    </div>
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-5 information-entry">
                        <div class="product-detail-box">
                            <h1 class="product-title">{{$productdata->title}}</h1>

                            @if($productdata->owner != "admin")
                             <div class="rating-box">
                                @for($i=1;$i<=5;$i++)
                                    @if($i <= \App\Review::ratings($productdata->id))
                                        <div class="star"><i class="fa fa-star"></i></div>
                                    @else
                                        <div class="star"><i class="fa fa-star-o"></i></div>
                                    @endif
                                @endfor

                                <div class="rating-number">{{\App\Review::where('productid',$productdata->id)->count()}} Reviews</div>
                            </div>
                            <div class="product-description detail-info-entry" style="border-bottom: #c1c1c1 solid 1px;">{{substr(strip_tags($productdata->description), 0, 600)}}... <a id="showmore">Show More</a>
                            </div>
                               <!--  <strong class="">Vendor: <a href="{{url('/shop')}}/{{$productdata->vendorid}}/{{str_replace(' ','-',strtolower(\App\Vendors::findOrFail($productdata->vendorid)->shop_name))}}" target="_blank">{{\App\Vendors::findOrFail($productdata->vendorid)->shop_name}}</a></strong> -->
                            @else

                            @endif

                            @if($productdata->stock != 0 || $productdata->stock === null )
                                <h3 class="product-subtitle"><!-- <i class="fa fa-check-circle fa-fw"></i> --> Available: In stock</h3>
                            @else
                                <h3 class="product-subtitle2"><i class="fa fa-times-circle fa-fw"></i> Not in Stock</h3>
                            @endif

                            
                            
                            <div class="price detail-info-entry">
                                <p>Only <span>7</span> left</p>
                                @if($productdata->previous_price != "")
                                    <div class="prev">${{$productdata->previous_price}}</div>
                                @else
                                @endif
                                <div class="current">$<span id="price">{{$productdata->price}}</span></div>
                            </div>
                            @if($productdata->sizes != null)
                            <div class="size-selector detail-info-entry">
                                <div class="detail-info-entry-title">Size</div>
                                @foreach(explode(',',$productdata->sizes) as $size)
                                    <div class="entry">{{$size}}</div>
                                @endforeach
                                <div class="spacer"></div>
                            </div>
                            @endif
                        <div class="row">
                          <div class="col-md-4">
                            <div class="quantity-selector detail-info-entry">
                                <div class="detail-info-entry-title">Quantity</div>
                                <div class="entry number-minus">&nbsp;</div>
                                <div class="entry number">1</div>
                                <div class="entry number-plus">&nbsp;</div>
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="detail-info-entry">
                                <form id="cartfrom">
                                    {{csrf_field()}}
                                    @if(Session::has('uniqueid'))
                                        <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
                                    @else
                                        <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
                                    @endif
                                    <input type="hidden" name="title" value="{{$productdata->title}}">
                                    <input type="hidden" name="product_id" value="{{$productdata->id}}">
                                    <input type="hidden" id="size" name="size" value="">
                                    <input type="hidden" id="cost" name="cost" value="{{$productdata->price}}">
                                    <input type="hidden" id="quantity" name="quantity" value="1">
                                    @if($productdata->stock != 0 || $productdata->stock === null )
                                        <button type="button" class="button style-10 to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        Add to cart</button>
                                        <a href="#" class="custom_heart"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="custom_heart"><i class="fa fa-signal" aria-hidden="true"></i></a>
                                    @else
                                        <button type="button" class="button style-10 to-cart" disabled>Out Of Stock</button>
                                    @endif
                                    {{--<button type="button" class="button style-10 to-cart">Add to cart</button>--}}
                                </form>
                                <div class="clear"></div>
                            </div>
                            </div>
                        </div>
                            <div class="share-box detail-info-entry">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.geniusocean.com"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_google_plus"></a>
                                    <a class="a2a_button_linkedin"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                                <div class="title">Share in social media</div>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-3 information-entry">
                        <div class="custom-block custom-block-1">
                        <div>
                        <i class="fa fa-truck" aria-hidden="true"></i><h3>FREE<br>SHIPPING</h3>
                        </div>
                        <div>
                        <i class="fa fa-money" aria-hidden="true"></i><h3>100% MONEY<br>BACK GUARANTEE</h3>
                        </div>
                        <div>
                        <i class="fa fa-phone" aria-hidden="true"></i><h3>ONLINE<br>SUPPORT 24/7</h3>
                        </div>
                        </div>
                    <div class="custom-block"><img src="http://emergingncr.com/snatchr/media/wysiwyg/porto/product/sidebar-banner.jpg" class="img-responsive" alt=""></div>
                    </div>
                    <div class="clear visible-xs visible-sm"></div>

                </div>
            </div>

            <div class="information-blocks">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#policy" aria-controls="profile" role="tab" data-toggle="tab"> Tags</a></li>
                        <li role="presentation"><a href="#reviews" aria-controls="messages" role="tab" data-toggle="tab">Reviews({{\App\Review::where('productid',$productdata->id)->count()}})</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            {!! $productdata->description !!}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="policy">
                            {!! $productdata->policy !!}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            <h3>Write a Review</h3>
                            <hr>
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-6">
                                    <div class='starrr' id='star1'></div>
                                    <div>
                                        <span class='your-choice-was' style='display: none;'>
                                            Your rating is: <span class='choice'></span>.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('review.submit')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="rating" id="rate" value="5">
                                <input type="hidden" name="productid" value="{{$productdata->id}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="name" placeholder="Full Name" class="form-control" type="text" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" placeholder="Your Email" class="form-control" type="email" required>

                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="review" rows="6" placeholder="Review Description" class="form-control"></textarea>
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
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="submit" class="button style-10" id="LoginButton"><strong>Submit Review</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3>Reviews:</h3>
                            <hr>
                            @forelse($reviews as $review)
                                <div class="row rating-row">
                                    <div class="col-md-3">
                                        <strong>{{$review->name}}</strong>
                                        <div class="rating-box">
                                            @for($i=1;$i<=5;$i++)
                                                @if($i <= $review->rating)
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                @else
                                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-date">{{$review->review_date}}</div>
                                    </div>
                                    <div class="col-md-8">
                                        {{$review->review}}
                                    </div>
                                </div>
                            @empty
                                <h4>No review has given yet.</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <section class="wow fadeInUp also_purchased">
        <div class="wow fadeInUp go-products">
             <div class="wrapper">
                 <div class="page">
                    <div class="mobile-nav-overlay close-mobile-nav"></div>
                    <script type="text/javascript"></script>        
                    <div class="top-container">
                       <div id="slideshow">
                          <div class="container">
                             <div class="row">
                                <div class="weekly_products">
                                    <h2 style="text-align: left;">ALSO PURCHASED</h2>
                                </div>
                                <div class="col-md-12">
                                   <div id="featured_product" class="hide-ratting owl-top-narrow">
                                      <div class="filter-products">
                                         <div class="products owl-carousel">
                                           @foreach($relateds  as $product)
                                             <div class="item">
                                               <div class="item-area">
                                                  <div class="product-image-area">
                                                     <div class="loader-container">
                                                        <div class="loader">
                                                           <i class="ajax-loader medium animate-spin"></i>
                                                        </div>
                                                     </div>
                                                     <a href="#" class="quickview-icon">
                                                        <i class="fa fa-file-video-o" aria-hidden="true"></i><span>Quick View</span>
                                                     </a>
                                                     <a href="#" title="Sample Product" class="product-image">
                                                     <img class="defaultImage porto-lazyload" data-src="{{url('/assets/images/products')}}/{{$product->feature_image}}" width="300" height="300"/>
                                                     <img class="hoverImage" src="{{url('/assets/images/service/fashion_dress-3.jpg')}}" width="300"  alt="Sample Product"/>
                                                     </a>
                                                     <div class="product-label" style="right: 10px;"><span class="sale-product-icon">Sale</span></div>
                                                     <div class="product-label" style="right: 10px; top: 40px;"><span class="new-product-icon">New</span></div>
                                                  </div>
                                                  <div class="details-area">
                                                     <div class="ratings">
                                                       <i class="fa fa-star" aria-hidden="true"></i>
                                                       <i class="fa fa-star" aria-hidden="true"></i>
                                                       <i class="fa fa-star" aria-hidden="true"></i>
                                                       <i class="fa fa-star" aria-hidden="true"></i>
                                                       <i class="fa fa-star" aria-hidden="true"></i>
                                                     </div>
                                                     <h2 class="product-name"><a href="sample-product.html" title="Sample Product">{{$product->title}}</a></h2>
                                                     <div class="price-box">
                                                        <p class="old-price">
                                                           <span class="price-label">Regular Price:</span>
                                                           <span class="price" id="old-price-21">
                                                           ${{$product->previous_price}}              </span>
                                                        </p>
                                                        <p class="special-price">
                                                           <span class="price-label">Special Price</span>
                                                           <span class="price" id="product-price-21">
                                                           ${{$product->price}}            </span>
                                                        </p>
                                                     </div>
                                                     <div class="actions">
                                                          <div class="separator clear-left">
                                                                <form>
                                                                    <p>
                                                                        {{csrf_field()}}
                                                                        @if(Session::has('uniqueid'))
                                                                            <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
                                                                        @else
                                                                            <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
                                                                        @endif
                                                                        <input type="hidden" name="title" value="{{$product->title}}">
                                                                        <input type="hidden" name="product" value="{{$product->id}}">
                                                                        <input type="hidden" id="cost" name="cost" value="{{$product->price}}">
                                                                        <input type="hidden" id="quantity" name="quantity" value="1">
                                                                        @if($product->stock != 0 || $product->stock === null )
                                                                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                                                                        <i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                         <a href="javascript:void(0)" class="addtocart to-cart" title="Add to Cart" onclick="#"><i class="fa fa-shopping-cart"></i>
                                                                         <span>&nbsp;Add to Cart</span></a>
                                                                            
                                                                        @else
                                                                            <a href="javascript:void(0)" class="addtocart to-cart" title="Add to Cart" onclick="#"><i class="fa fa-shopping-cart"></i>
                                                                         <span>&nbsp; Out of Stock</span></a>
                                                                        @endif
                                                                       
                                                                    </p>
                                                                </form>

                                                            </div>
                                                         
                                                        <div class="clearer"></div>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                            @endforeach

                                         </div>
                                      </div>
                                   </div>
                                   <script type="text/javascript">
                                      jQuery(function($){
                                        $("#featured_product .filter-products .owl-carousel").owlCarousel({lazyLoad: true,    itemsCustom: [ [0, 2], [320, 2], [480, 2], [768, 3], [992, 4], [1200, 4] ],    responsiveRefreshRate: 50,    slideSpeed: 200,    paginationSpeed: 500,    scrollPerPage: false,    stopOnHover: true,    rewindNav: true,    rewindSpeed: 600,    pagination: false,    navigation: false,    autoPlay: true,    navigationText:["<i class='icon-left-open'></i>","<i class='icon-right-open'></i>"]});
                                      });
                                   </script>
                                </div>
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
    $('#star1').starrr({
        rating: 5,
        change: function(e, value){
            if (value) {
                $('.your-choice-was').show();
                $('.choice').text(value);
                $('#rate').val(value);
            } else {
                $('.your-choice-was').hide();
            }
        }
    });

    $("#showmore").click(function() {
        $('html, body').animate({
            scrollTop: $("#description").offset().top - 200
        }, 1000);
    });

</script>
@stop