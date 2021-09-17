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
                                <form action="{{ route('room.store') }}" method="post">
                                    @csrf
                                    <label>Simulation</label>
                                    <select name="game_id" class="form-control" id="">
                                        @foreach ($game as $item)
                                            <option value="{{ $item->id }}" {{ $item->id==1?'selected':'' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-2 float-right">
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-rounded btn-success">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="area-heading text-primary style-two">Join Room</h1>
                                    <label>Room Code</label>
                                    <input type="text" id="code" class="form-control">
                                    <div class="mt-2 float-right">
                                        <a href="#" id="join" class="btn btn-rounded btn-primary">Join</a>
                                    </div>
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
                                            @foreach ($myroom as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->participant->count() }}</td>
                                                <td>
                                                    <div class="alert alert-success">Active</div>
                                                </td>
                                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <form action="{{ route('room.destroy',['room'=>$item->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-rounded mx-2 btn-danger" onclick="return confir('are you sure?')">Delete</button>
                                                    </form>
                                                    <form action="{{ route('room.change-status',['room'=>$item->id]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-rounded mx-2 btn-warning">Disabled</button>
                                                    </form>
                                                    <a class="btn btn-rounded mx-2 btn-primary" href="{{ route('play',['game'=>$item->game_id,'code'=>$item->code]) }}">Detail</a>
                                                    <button type="button" class="btn btn-rounded mx-2 btn-secondary">Copy link</button>
                                                </td>
                                            </tr>
                                            @endforeach
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

@section('script')
    <script>
        $(function(){
            $('#join').click(function (e) {
                var val = $('#code').val();
                var url = {!! json_encode(url('join/')) !!};
                if(confirm('are you sure?')){
                    window.location = url +'/'+ val;
                }
            });
        })
    </script>
@endsection
