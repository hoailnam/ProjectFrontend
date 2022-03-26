@extends('front.layout.master')

@section('title','Shop')

@section('body')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach ($brands as $brand)
                            <a href="shop/{{ $brand->name }}" class="nav-item nav-link active" role="tab">{{ $brand->name }}</a>
                            @endforeach
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <form action="">
                    <div class="select-this">
                        <div class="select-itms">
                            <select name="sort_by" id="select1" onchange="this.form.submit();">
                                <option {{ request('sort_by')=='price-ascending'? 'selected': '' }} value="price-ascending">Sorting: Price Ascending</option>
                                <option {{ request('sort_by')=='price-descending'? 'selected': '' }} value="price-descending">Sorting: Price Descending</option>
                                <option {{ request('sort_by')=='latest'? 'selected': '' }} value="latest">Sorting: Latest</option>
                                <option {{ request('sort_by')=='oldest'? 'selected': '' }} value="oldest">Sorting: Oldest</option>
                                <option {{ request('sort_by')=='name-ascending'? 'selected': '' }} value="name-ascending">Sorting: Name A-Z</option>
                                <option {{ request('sort_by')=='name-descending'? 'selected': '' }} value="name-descending">Sorting: Name Z-A</option>
                            </select><br><br>
                            <select name="show" id="select1" onchange="this.form.submit();">
                                <option {{ request('show')=='3'? 'selected': '' }} value="3">Show: 3</option>
                                <option {{ request('show')=='9'? 'selected': ''  }} value="9">Show: 9</option>
                                <option {{ request('show')=='15'? 'selected': ''  }} value="15">Show: 15</option>
                            </select>
                        </div>
                    </div>

                </form>

            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="front/assets/img/gallery/{{$product->productImages[0]->path}}" alt="">
                                    <div class="img-cap">
                                        <span><a href="{{url('/Cart/addCart/'.$product->id)}}">Add to cart</a></span>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop/product/{{ $product->id }}">{{$product->name}}</a></h3>
                                    <span>{{ number_format($product->price, 2) }} VND</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="front/assets/img/gallery/{{$product->productImages[0]->path}}" alt="">
                                    <div class="img-cap">
                                        <span><a href="{{url('/Cart/addCart/'.$product->id)}}">Add to cart</a></span>
                                    </div>
                                    <div class=" favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop/product/{{ $product->id }}">{{$product->name}}</a></h3>
                                    <span>{{ number_format($product->price, 2) }} VND</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Card three -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="front/assets/img/gallery/{{$product->productImages[0]->path}}" alt="">
                                    <div class="img-cap">
                                        <!-- <span><a href="{{url('/addCart/'.$product->id)}}">Add to cart</a></span> -->
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="shop/product/{{ $product->id }}">{{$product->name}}</a></h3>
                                    <span>{{ number_format($product->price, 2) }} VND</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $products ->links() }}
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->
</main>
@endsection