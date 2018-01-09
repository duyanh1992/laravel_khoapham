@extends('user.master')
@section('content')
<section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
        <?php  
          $featuredProducts = DB::table('products')
                                ->select('id','name','price', 'image')
                                ->get();
        ?>
        @foreach($featuredProducts as $featuredProduct)
        <li class="col-lg-3  col-sm-6">
          <a class="prdocutname" href="{!! url('guest/product', $featuredProduct->id) !!}">{!! $featuredProduct->name !!}</a>
          <div class="thumbnail">
            <!-- <span class="sale tooltip-test">Sale</span> -->
            <a href="#"><img alt="" src="{!! url('public/images/'.$featuredProduct->image) !!}"></a>
            <!-- <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div> -->
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! route('addToCart',[$featuredProduct->id, $featuredProduct->name]) !!}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!! $featuredProduct->price !!}</div>
                <div class="priceold">{!! $featuredProduct->price !!}</div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
  <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
      <ul class="thumbnails">
        <?php  
          $latestProducts = DB::table('products')
                                ->select('id','name','price', 'image')
                                ->skip(0)->take(4)
                                ->get();
        ?>
        @foreach($latestProducts as $latestProduct)
        <li class="col-lg-3 col-sm-6">
          <a class="prdocutname" href="product.html">{!!$latestProduct->name!!}</a>
          <div class="thumbnail">
            <a href="#"><img alt="" src="{!! url('public/images/'.$latestProduct->image) !!}"></a>
            <!-- <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div> -->
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">{!!$latestProduct->price!!}</div>
                <div class="priceold">{!!$latestProduct->price!!}</div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Section  Banner Start-->
 
  <!-- Section  End-->
  
  <!-- Popular Brands-->
 
  
  <!-- Newsletter Signup-->
  @endsection()
