@extends('layouts.auth')

@section('autentikasi')

    <div class="limiter">
        <div class="container-login100 gradreg" style="background-image: url('img/bg/care-ser-bg.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form"  method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- <span class="login100-form-title p-t-20 p-4">
                        Login
                    </span> -->

                    <div class="wrap-input100 validate-input mb-3">
                        <input class="input100" type="text" id="name" name="name" placeholder="Nama">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3">
                        <input class="input100" type="text" id="username" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3">
                        <input class="input100" type="text" id="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3" data-validate="Password is required">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3">
                        <input class="input100" type="password" id="password-confirm" name="password_confirmation" placeholder="password confirm">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input mb-3">
                        <input class="input100" type="text" id="school" name="school" placeholder="Nama Sekolah">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-university"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn pt-3">
                        <button class="login100-form-btn">
                            Daftar
                        </button>
                    </div>

                    <!-- <div class="text-center w-full pt-3 pb-230">
                        <a href="#" class="txt1">
                            Lupa Username / Password?
                        </a>
                    </div> -->

                    <div class="justify-content-center mt-3 w-full">
                        <a class="txt1" href="{{ route('login') }}">
                            Sudah mempunyai akun
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection