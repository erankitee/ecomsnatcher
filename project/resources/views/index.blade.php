@extends('includes.master')
@section('content')

<style>.at-share-close-control .at4-arrow {float: right !important;}</style>
<script type="text/javascript">
 //<![CDATA[
    if (typeof EM == 'undefined') EM = {};
    EM.Quickview = {
        QS_FRM_WIDTH    :"1000",
        QS_FRM_HEIGHT   : "730"
    };
 //]]   
</script> 
<section class="go-slider">
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

    <!-- Indicators -->
    {{--<ol class="carousel-indicators">--}}
        {{--@for ($i = 0; $i < count($sliders); $i++)--}}
            {{--@if($i == 0)--}}
                {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}" class="active"></li>--}}
            {{--@else--}}
                {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}"></li>--}}
            {{--@endif--}}
        {{--@endfor--}}
    {{--</ol>--}}

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">

        @for ($i = 0; $i < count($sliders); $i++)
            @if($i == 0)
                <!-- Third Slide -->
                    <div class="item active">

                        <!-- Slide Background -->
                        <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text {{$sliders[$i]->text_position}}">

                                    <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                    <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
            @else
            <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text {{$sliders[$i]->text_position}}">
                        <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                        <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>
                    </div>
                </div>
                <!-- End of Slide -->
            @endif
    @endfor


    </div><!-- End of Wrapper For Slides -->

        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div> <!-- End  bootstrap-touch-slider Slider -->

</section>
<div class="shop_now-banner wow fadeInUp go-services hideme">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="shop_now">
                    <img src="{{url('/assets/images/service/4rY3.jpg')}}" alt="">
                    <a href="#">SHOP NOW</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shop_now">
                    <img src="{{url('/assets/images/service/BfMUntitled-1.jpg')}}" alt="">
                     <a href="#">SHOP NOW</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shop_now">
                    <img src="{{url('/assets/images/service/Cxf2.jpg')}}" alt="">
                     <a href="#">SHOP NOW</a>
               </div>
            </div>
        </div>
    </div>
</div>



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
                            <h2>WEEKLY LATEST PRODUCTS</h2>
                        </div>
                        <div class="col-md-12">
                           <div id="featured_product" class="hide-ratting owl-top-narrow">
                              <div class="filter-products">
                                 <div class="products owl-carousel">

                                  @foreach($latests as $product)
                                    <div class="item">
                                       <div class="item-area">
                                          <div class="product-image-area">
                                             <div class="loader-container">
                                                <div class="loader">
                                                   <i class="ajax-loader medium animate-spin"></i>
                                                </div>
                                             </div>
                                             <!-- <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="quickview-icon">
                                                <i class="fa fa-file-video-o" aria-hidden="true"></i><span>Quick View</span>
                                             </a> -->
                                             <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" title="Sample Product" class="product-image">
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
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">
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

<!-- Start OF parallax -->
<div class="custom_parallax">
    <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">        
        <div class="caption">
          <p>Up to <span>40%</span>off</p>
          <h3>SPECIAL PROMO</h3>
          <a href="#">PURCHASE NOW</a>
        </div>
      </div>

      <div class="item">
        <div class="caption">
         <p>Up to <span>40%</span>off</p>
          <h3>SPECIAL PROMO</h3>
          <a href="#">PURCHASE NOW</a>
        </div>
      </div>
      <div class="item">
        <div class="caption">
          <p>Up to <span>40%</span>off</p>
          <h3>SPECIAL PROMO</h3>
          <a href="#">PURCHASE NOW</a>
        </div>
      </div>
  
    </div>
  </div>
</div>
</div>
<!-- End OF parallax -->

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
                            <h2>WEEKLY FEATURED PRODUCTS</h2>
                        </div>
                        <div class="col-md-12">
                           <div id="featured_product" class="hide-ratting owl-top-narrow">
                              <div class="filter-products">
                                 <div class="products owl-carousel">
                                   @foreach($features as $product)
                                     <div class="item">
                                       <div class="item-area">
                                          <div class="product-image-area">
                                             <div class="loader-container">
                                                <div class="loader">
                                                   <i class="ajax-loader medium animate-spin"></i>
                                                </div>
                                             </div>
                                             <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="quickview-icon">
                                                <i class="fa fa-file-video-o" aria-hidden="true"></i><span>Quick View</span>
                                             </a>
                                             <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" title="Sample Product" class="product-image">
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
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">
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



<!-- BLog -->
<div class="go-products custom_blog">
    <div class="container">
         <div class="row">
             <h2>FROM THE BLOG</h2>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="post-image">
                    <img src="{{url('/assets/images/service/VCt3.jpg')}}" alt="">
                </div>
                <div class="post-content">
                  <div class="postTitle">
                    <h2><a href="#">Post Format – Video</a></h2>
                  </div>
                  <div class="post-date">
                    08-DEC-2016
                  </div>
                  <div class="postContent"><p>Lorem Ipsum is simply dummy text the printing and type setting...</p></div> 
                  <a class="read-more" href="#">Read More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
         </div>
         <div class="col-md-6">
                 <div class="post-image">
                    <img src="{{url('/assets/images/service/jz52.jpg')}}" alt="">
                </div>
                <div class="post-content">
                  <div class="postTitle">
                    <h2><a href="#">Post Format – Video</a></h2>
                  </div>
                  <div class="post-date">
                    08-DEC-2016
                  </div>
                  <div class="postContent"><p>Lorem Ipsum is simply dummy text the printing and type setting...</p></div> 
                  <a class="read-more" href="#">Read More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
         </div>
    </div>
</div>
<!-- Blog -->

@stop

@section('footer')
<script>

</script>
@stop