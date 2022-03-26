@extends('front.layout.master')

@section('title','Login')

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
                                <h2>Login</h2>
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
                                <a href="{{route('dang-ky')}}" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign in now</h3>
                                    
                                <form class="row contact_form" action="{{route('login')}}" method="POST" novalidate="novalidate">
                                @csrf    
                                <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
                                        @if ($errors->has('email'))
                                        <strong class="text-danger">
                                            {{$errors->first('email')}}
                                        </strong>
                                    @endif
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                        @if ($errors->has('password'))
                                        <strong class="text-danger">
                                            {{$errors->first('password')}}
                                        </strong>
                                    @endif
                                    </div>
                                   
                                    <div class="col-md-12 form-group">
                                        <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="remember">
                                            <label for="f-option">Remember me</label>
                                        </div>
                                        <button type="submit" id="btn_test" name="user_group_action" value="user_login" class="btn_3">
                                            log in
                                        </button>
                                        <a type="submit" href="updatePassUser.php" style="text-align: center" class="btn_3">
                                            Update
                                        </a>
                                        <a class="lost_pass" href="#">forget password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    @endsection
