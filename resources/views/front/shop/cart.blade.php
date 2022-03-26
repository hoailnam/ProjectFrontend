@extends('front.layout.master')

@section('title','Product')

@section('body')

<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Cart List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->

    <section class="cart_area section_padding">

        <div class="container">

            <div class="cart_inner">
                <div class="table-responsive">
                    @if(Cart::count() > 0)
                    <table class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $items)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$items->name}}</p>
                                            <!-- <p>{{$items->rowId}}</p> -->
                                        </div>
                                    </div>
                                </td>
                                <td><p>{{$items->options["brand"]}}</p></td>
                                <td>
                                    <h5>{{number_format($items->price)}} VND</h5>
                                </td>
                                <td>
                                    <!-- <form method="post" action="{{url('/Cart/removeCart/'.$items->rowId)}}"> -->
                                    <div class=" product_count">
                                        <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" name="qty" value="{{$items->qty}}" min="0" max="10">
                                        <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{number_format($items->price*$items->qty)}} VND</h5>
                                </td>
                                <td>
                                    <a class="btn_2" href="{{url('/Cart/updateCart/'.$items->rowId)}}">Update Cart</a>
                                    <!-- <button class="btn_2" type="button">Update Cart</button> -->
                                    <!-- </form> -->
                                    <a class="btn_2" href="{{url('/Cart/removeCart/'.$items->rowId)}}">Remove Cart</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h4>Subtotal</h4>
                                </td>
                                <td>
                                    <h4>{{Cart::subtotal()}} VND</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="./shop">Continue Shopping</a>
                        <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                    @else
                    <h1>Cart empty</h1>
                    @endif
                </div>
            </div>
    </section>


    <!--================End Cart Area =================-->
</main>
@endsection