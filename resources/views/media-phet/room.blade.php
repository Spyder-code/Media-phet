@extends('layouts.user')

@section('isi')

 <!--Breadcrumb area start-->

 <div class="text-bread-crumb d-flex align-items-center style-seven">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
               <h2>Join Room and Discuss with your friend</h2>
               <div class="bread-crumb-line"><span><a href="">for Science / </a> </span>& Math</div>
            </div>
        </div>
    </div>
</div>

 <!--Breadcrumb area end-->

     <!--Our class area start-->
    <div class="our-class-area">
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="area-heading font-per style-two">Room Simulation</h1>
                    <p class="heading-para">we promised you that, we always try to take care of your childdren. Early child care is a very important and often overlooked component of child development</p>
                </div>
            </div>
            <div class="class-are-inner-width">
                @if (!Auth::check())
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <h1 class="area-heading font-info style-two"><strong>Login required for access it</strong></h1>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row" style="{{ Auth::check()?'':'opacity: 50%; pointer-events:none;' }}">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="area-heading text-success style-two">Create Room</h1>
                                <form action="">
                                    @csrf
                                    <label>Simulation</label>
                                    <select name="game_id" class="form-control" id="">
                                        <option value="">A</option>
                                        <option value="">B</option>
                                        <option value="">C</option>
                                    </select>
                                    <div class="mt-2 float-right">
                                        <button type="submit" class="btn btn-rounded btn-success">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="area-heading text-primary style-two">Create Room</h1>
                                <form action="">
                                    @csrf
                                    <label>Room Code</label>
                                    <input type="text" name="" id="" class="form-control">
                                    <div class="mt-2 float-right">
                                        <button type="submit" class="btn btn-rounded btn-primary">Join</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::check())
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="area-heading text-primary style-two">My Room</h1>
                                    <table class="table table-bordered text-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Room Code</th>
                                                <th scope="col">Participant Count</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created on</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>@mdo</td>
                                                <td>
                                                    <div class="alert alert-success">Active</div>
                                                </td>
                                                <td>Mark</td>
                                                <td class="d-flex justify-content-center">
                                                    <form action="">
                                                        @csrf
                                                        <button type="submit" class="btn btn-rounded mx-2 btn-danger">Delete</button>
                                                    </form>
                                                    <form action="">
                                                        @csrf
                                                        <button type="submit" class="btn btn-rounded mx-2 btn-warning">Disabled</button>
                                                    </form>
                                                    <a class="btn btn-rounded mx-2 btn-primary" href="">Detail</a>
                                                    <button type="button" class="btn btn-rounded mx-2 btn-secondary">Copy link</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>@fat</td>
                                                <td>
                                                    <div class="alert alert-secondary">Inactive</div>
                                                </td>
                                                <td>Jacob</td>
                                                <td class="d-flex justify-content-center">
                                                    <form action="">
                                                        @csrf
                                                        <button type="submit" class="btn btn-rounded mx-2 btn-danger">Delete</button>
                                                    </form>
                                                    <form action="">
                                                        @csrf
                                                        <button type="submit" class="btn btn-rounded mx-2 btn-success">Actived</button>
                                                    </form>
                                                    <a class="btn btn-rounded mx-2 btn-primary" href="">Detail</a>
                                                    <button type="button" class="btn btn-rounded mx-2 btn-secondary">Copy link</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--Our class area end-->

@endsection
