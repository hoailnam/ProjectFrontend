@extends('front.layout.master')

@section('title','Register')

@section('body')

    @if(session('message'))
        <span class="alert alert-danger">
            <strong>{{session('message')}}</strong>
        </span>
    @endif
<main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Register</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <a href="{{route('dang-nhap')}}" class="btn_3">Login Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Register in now</h3>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <form class="row contact_form" action="{{route('register')}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf     
                                <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="name" value="" placeholder="Account">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="login_email" name="email" value="" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="repassword" value="" placeholder="Re-Password">
                                    </div>


                                    <div class="col-md-12 form-group p_star">
                                        <input type="file" class="form-control" name="avatar" value="" > 
                                    </div>


                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="phone" value="" placeholder="Phone">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="address" value="" placeholder="Address">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" id="btn_test" name="user_group_action" value="user_create" class="btn_3">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>

    @endsection