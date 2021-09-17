@extends('layouts.user')
@section('isi')
<div class="text-bread-crumb d-flex align-items-center style-seven">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>My Profile</h2>
            </div>
        </div>
    </div>
</div>
    <!--Our class area start-->
    <div class="our-class-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="">
                        <form action="{{ route('profile.update.image',['id'=>Auth::id()]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" id="avatar" name="avatar" onchange="submit()" hidden>
                            <div class="user-content">
                                <label for="avatar" style="cursor: pointer"><img src="{{ Auth::user()->avatar }}" class="img-fluid rounded"></label>
                            </div>
                    </div>
                    <h1 class="area-heading font-per style-two">{{ Auth::user()->name }}</h1>
                    <p class="heading-para">{{ Auth::user()->email }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <form class="login100-form validate-form" method="POST" action="{{ route('profile.update',['id' => Auth::id()]) }}">
                        @csrf
                        @method('PUT')
                        <div class="wrap-input100 validate-input mb-3">
                            <input class="input100" type="text" value="{{ Auth::user()->name }}" id="name" name="name">
                        </div>
                        <div class="wrap-input100 validate-input mb-3">
                            <input class="input100" type="text" value="{{ Auth::user()->username }}" id="username" name="username">
                        </div>
                        <div class="wrap-input100 validate-input mb-3">
                            <input class="input100" type="text" readonly value="{{ Auth::user()->email }}" id="email" name="email">
                        </div>
                        <div class="container-login100-form-btn pt-3">
                            <button class="login100-form-btn">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <form class="login100-form validate-form" method="POST" action="{{ route('profile.update.password',['id' => Auth::id()]) }}">
                        @csrf
                        @method('PUT')
                        <div class="wrap-input100 validate-input mb-3" data-validate="Password is required">
                            <input class="input100" type="password" id="password" name="password" placeholder="Old Password">
                        </div>
                        <div class="wrap-input100 validate-input mb-3" data-validate="Password is required">
                            <input class="input100" type="password" id="password" name="password" placeholder="New Password">
                        </div>
                        <div class="wrap-input100 validate-input mb-3" data-validate="Password is required">
                            <input class="input100" type="password" id="password" name="password" placeholder="Confirm Password">
                        </div>
                        <div class="container-login100-form-btn pt-3">
                            <button class="login100-form-btn">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="class-are-inner-width mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="area-heading font-per style-two">History Score</h1>
                                <p class="heading-para">in Simulation Class</p>
                                <table class="table table-bordered text-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Simulation name</th>
                                            <th scope="col">Room code</th>
                                            <th scope="col">Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histori as $h)
                                        @if($h->user_id==Auth::id())
                                        <tr>
                                            <th scope="row">{{ $h->id }}</th>
                                            <td>{{ $h->room_id }}</td>
                                            <td>{{ $h->room_id }}</td>
                                            <td>{{ $h->score }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Our class area end-->

@endsection
