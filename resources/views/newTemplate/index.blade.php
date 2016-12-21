@extends ('front.main')

@section ('content')

<div id="maincontainer">
  <!-- Slider Start-->
  <section class="slider">
    <div class="container">
      <div class="flexslider" id="mainslider">
        <ul class="slides">
          <li>
            <img src="{{ URL::asset('web_assets/img/banner1.jpg') }}" alt="" />
          </li>
          <li>
            <img src="{{ URL::asset('web_assets/img/banner2.jpg') }}" alt="" />
          </li>
          <li>
            <img src="{{ URL::asset('web_assets/img/banner1.jpg') }}" alt="" />
          </li>
          <li>
            <img src="{{ URL::asset('web_assets/img/banner2.jpg') }}" alt="" />
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Slider End-->
  
  <!-- Section Start-->
  <section class="container otherddetails">
    <div class="otherddetailspart">
      <div class="innerclass free">
        <h2>Free shipping</h2>
        All over in world over $200 </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass payment">
        <h2>Easy Payment</h2>
        Payment Gatway support </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass shipping">
        <h2>24hrs Shipping</h2>
        Free For UK Customers </div>
    </div>
    <div class="otherddetailspart">
      <div class="innerclass choice">
        <h2>Over 5000 Choice</h2>
        50,000+ Products </div>
    </div>
  </section>
  <!-- Section End-->
  
  <!-- Featured Product-->
  <section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
      <ul class="thumbnails">
      @foreach ($products as $product)
        <li class="span3">
          <a class="prdocutname" href="product.html">{{ $product->product_name }}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="#">
            @if ($product->photo != null)
            <img class="media-object img-responsive" src="{!! URL::route('get_photo', $product->photo) !!}">
            @else 
            <img class="media-object img-responsive" src="{{ URL::asset('web_assets/img/product1.jpg') }}">
            @endif
            </a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{!! URL::route('cart_add', $product->id) !!}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">$4459.00</div>
                <div class="priceold">$5000.00</div>
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
      @foreach ($products as $product)
        <li class="span3">
          <a class="prdocutname" href="product.html">{{ $product->product_name }}</a>
          <div class="thumbnail">
            <a href="#">
            @if ($product->photo != null)
            <img class="media-object img-responsive" src="{!! URL::route('get_photo', $product->photo) !!}">
            @else 
            <img class="media-object img-responsive" src="{{ URL::asset('web_assets/img/product1.jpg') }}">
            @endif
            </a>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">$4459.00</div>
                <div class="priceold">$5000.00</div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
      </ul> 
    </div>
  </section>

@stop