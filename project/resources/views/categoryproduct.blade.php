@extends('includes.master')

@section('content')

<style>
 .filter-products .products div.item {
    float: left;
    padding: 10px;
    width: 33.33%;
}
</style>
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


    <div id="wrapper" class="go-section">
        <section class="wow fadeInUp go-products">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" style="padding: 0">
                   <div class="snacher_filter">   
                    <div class="row">
                     <div class="snacher_filter">
                        <h3 class="allcats">All Categories</h3>
                        <div id="left" class="span3">
                            <ul id="menu-group-1" class="nav menu">
                                @foreach($menus as $menu)
                                    <li class="item-1 deeper parent">
                                        <a class="" href="{{url('/category')}}/{{$menu->slug}}">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$menu->slug}}-1" class="sign"><i class="fa fa-plus"></i><div class="lbl">{{$menu->name}}</div></span>
                                            <!-- <span class="lbl">{{$menu->name}}</span> -->
                                        </a>
                                        <ul class="children nav-child unstyled small collapse" id="{{$menu->slug}}-1">
                                            @foreach(\App\Category::where('mainid',$menu->id)->where('role','sub')->get() as $submenu)

                                                <li class="item-2 deeper parent">
                                                    <a class="" href="{{url('/category')}}/{{$submenu->slug}}">
                                                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$submenu->slug}}-1" class="sign"><i class="fa fa-plus"></i>
                                                         <div class="lbl">{{$submenu->name}}</div>
                                                     </span>
                                                    </a>

                                                    <ul class="children nav-child unstyled small collapse" id="{{$submenu->slug}}-1">

                                                            @foreach(\App\Category::where('subid',$submenu->id)->where('role','child')->get() as $childmenu)
                                                            <li class="item-3">
                                                                <a class="" href="{{url('/category')}}/{{$childmenu->slug}}">
                                                                    <span class="sign"><i class="fa fa-chevron-right"></i></span>
                                                                    <span class="lbl">{{$childmenu->name}}</span>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                      </div>
                    </div>

                        
                        </div>
                    </div>

                    <div class="col-md-9">
                      <div class="snacher_filter2"> 
                        <div class="row">
                            <div class="col-md-4">
                               <div class="row">
                                <div class="pull-left">
                                    <h3 class="allcats">Sort By</h3>
                                </div>
                                <div class="col-md-8">
                                    <select id="sortby" class="filter-option form-control">
                                    @if($sort == "new")
                                        <option value="new" selected>Sort by Latest Products</option>
                                    @else
                                        <option value="new">Sort by Latest Products</option>
                                    @endif
                                    @if($sort == "old")
                                        <option value="old" selected>Sort by Oldest Products</option>
                                    @else
                                        <option value="old">Sort by Oldest Products</option>
                                    @endif
                                    @if($sort == "low")
                                        <option value="low" selected>Sort by Lowest Price</option>
                                    @else
                                        <option value="low">Sort by Lowest Price</option>
                                    @endif
                                    @if($sort == "high")
                                        <option value="high" selected>Sort by Highest Price</option>
                                    @else
                                        <option value="high">Sort by Highest Price</option>
                                    @endif

                                    </select>
                                </div>
                               </div>
                            </div>
                        </div>
                     </div>
                        <div class="wrapper">
                         <div class="page">       
                            <div class="top-container">
                               <div id="slideshow">
                                  <div class="">
                                    
                                     <div class="row">
                                        <div class="col-md-12">
                                           <div id="featured_product" class="hide-ratting owl-top-narrow">
                                              <div class="filter-products">
                                                 <div class="products">
                                                   <div class="row">
                                                      @forelse($products as $product)
                                                        <div class="item">
                                                           <div class="item-area">
                                                              <div class="product-image-area">
                                                                 <div class="loader-container">
                                                                    <div class="loader">
                                                                       <i class="ajax-loader medium animate-spin"></i>
                                                                    </div>
                                                                 </div>
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
                                                        @empty
                                                        <h3>No Product Found in This Category.</h3>
                                                     @endforelse
                                                   </div>
                                                  
                                                
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

                    <!-- <div id="products">
                    @forelse($products as $product)
                    <div class="col-xs-6 col-sm-4 product">
                        <article class="col-item">
                            <div class="photo">
                                <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}"> <img src="{{url('/assets/images/products')}}/{{$product->feature_image}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details">
                                        <a href="{{url('/product')}}/{{$product->id}}/{{str_replace(' ','-',strtolower($product->title))}}" class="row" style="min-height: 60px">
                                            <h1>{{$product->title}}</h1>
                                        </a>
                                        <div class="pull-left">
                                            @if($product->previous_price != "")
                                                <span class="price-old">${{$product->previous_price}}</span>
                                            @else
                                            @endif
                                            <span class="price-new">${{$product->price}}</span>
                                        </div>
                                        <div class="pull-right">
                                            <span class="review">
                                                @for($i=1;$i<=5;$i++)
                                                    @if($i <= \App\Review::where('productid',$product->id)->avg('rating'))
                                                        <i class="fa fa-star"></i>
                                                    @else
                                                        <i class="fa fa-star-o"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                        </div>

                                    </div>

                                </div>
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
                                        @if($product->stock != 0)
                                            <button type="button" class="button style-10 to-cart">Add to cart</button>
                                        @else
                                            <button type="button" class="button style-10 to-cart" disabled>Out Of Stock</button>
                                        @endif
                                        {{--<button type="button" class="button style-10 hidden-sm to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>--}}
                                        </p>
                                    </form>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                    @empty
                        <h3>No Product Found in This Category.</h3>
                    @endforelse
                    </div> -->
                        @if(count($products) > 0)
                            <div class="col-sm-12 col-xs-12 col-md-12 text-center" style="margin-top: 15px;">
                                <input type="hidden" id="page" value="2">
                                <div class="col-md-12">
                                <img id="load" src="{{url('/assets/images')}}/default.gif" style="display: none;width: 80px;"></div>
                                <button type="button" id="load-more" class="button style-3">Load More</button>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </section>
    </div>

@stop

@section('footer')
<script>

    $("#sortby").change(function () {
        var sort = $("#sortby").val();
        window.location = "{{url('/category')}}/{{$category->slug}}?sort="+sort;
    });

    $("#load-more").click(function () {
        $("#load").show();
        var slug = "{{$category->slug}}";
        var page = $("#page").val();
        var sort = $("#sortby").val();
        $.get("{{url('/')}}/loadcategory/"+slug+"/"+page+"?sort="+sort, function(data, status){
            $("#load").fadeOut();
            $("#products").append(data);
            //alert("Data: " + data + "\nStatus: " + status);
            $("#page").val(parseInt($("#page").val())+1);
            if ($.trim(data) == ""){
                $("#load-more").fadeOut();
            }

        });
    });
</script>
@stop