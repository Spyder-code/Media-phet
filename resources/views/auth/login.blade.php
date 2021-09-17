@extends('layouts.auth')

@section('autentikasi')

    <div class="limiter">
        <div class="container-login100 gradlog" style="background-image: url('img/bg/wellcome-bg.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- <span class="login100-form-title p-t-20 p-4">
                        Login
                    </span> -->

                    <div class="wrap-input100 validate-input mb-3" data-validate="Username is required">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn pt-3">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <!-- <div class="text-center w-full pt-3 pb-230">
                        <a href="#" class="txt1">
                            Lupa Username / Password?
                        </a>
                    </div> -->

                    <div class="justify-content-center mt-3 w-full">
                        <div class="d-flex justify-content-between">
                            <a class="txt1 btn btn-success text-white btn-rounded" href="{{ url('/') }}">
                                Home
                                <i class="fa fa-home"></i>
                            </a>
                            <a class="txt1 ml-3 btn btn-primary text-white btn-rounded" href="{{ route('register') }}">
                                Register
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="container-login100-form-btn bg-warning pt-3">
                        <a href="{{ route('register') }}" class="login100-form-btn">
                            Buat akun baru
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

@endsection
