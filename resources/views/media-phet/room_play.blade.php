@extends('layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset('/') }}static/css/chat.css">
@endsection

@section('isi')

 <!--Breadcrumb area start-->

 <div class="text-bread-crumb d-flex align-items-center style-seven">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $game->name }}</h2>
                <div class="bread-crumb-line"><span><a href="">{{ $game->class }} / </a> </span> Math</div>
            </div>
        </div>
    </div>
</div>

<!--Breadcrumb area end-->
    <!--Our class area start-->
    <div class="our-class-area">
        <div class="container-fluid">
            <div class="class-are-inner-width">
                <div class="row">
                    <div class="col-12">
                        <table class="text-dark mb-5" style="border: none;">
                            <thead>
                                <tr>
                                    <td width="300px">Room created with</td>
                                    <td width="20px">:</td>
                                    <td colspan="2" width="max-content"><b>{{ $room->user->name }}</b></td>
                                </tr>
                                <tr>
                                    <td width="300px">Created on</td>
                                    <td width="20px">:</td>
                                    <td colspan="2" width="max-content"><b>{{ date('d F Y', strtotime($room->created_at)) }}</b></td>
                                </tr>
                                <tr>
                                    <td width="300px">Code</td>
                                    <td width="20px">:</td>
                                    <td colspan="2" width="max-content"><b>{{ $room->code }}</b><button class="ml-2 btn btn-sm btn-rounded btn-secondary"><small>Copy</small></button></td>
                                </tr>
                                <tr>
                                    <td width="300px">Link</td>
                                    <td width="20px">:</td>
                                    <td colspan="2" width="max-content"><b>{{ route('room.join',['code'=>$room->code]) }}</b><button class="ml-2 btn btn-sm btn-rounded btn-secondary"><small>Copy</small></button></td>
                                </tr>
                            </thead>
                        </table>
                        <div class="card bg-primary" style="width:100%; height:550px">

                        </div>
                        @if ($room->creator_id==Auth::id())
                        <div class="mt-5">
                            <table class="table table-bordered text-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Participan name</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participant as $item)
                                        @if($item->user_id!=$room->creator_id)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->score }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Our class area end-->

    <!-- CHAT BAR BLOCK -->
    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible active">Discussion
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>
        <div class="content" style="max-height: 500px;">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp">07:20</h5>
                            <p class="botText my-2">
                                <span>How's it going? <sup class="ml-3"><small>Almi</small></sup></span>
                            </p>
                            <p class="userText my-2">
                                <span><sup class="mr-3"><small>Almi</small></sup> Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore eius deserunt quibusdam magnam et numquam, amet facere ipsa dolor recusandae quisquam quidem ad non? Ipsam perspiciatis optio natus nobis id?</span>
                            </p>
                        </div>
                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>
                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart" onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send" onclick="sendButton()"></i>
                            </div>
                        </div>
                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('/') }}static/scripts/responses.js"></script>
    <script src="{{ asset('/') }}static/scripts/chat.js"></script>

    @if (Auth::check())
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            Echo.private(`room`)
            .listen('SendMessage', (e) => {
                console.log(e);
            });
        </script>
    @endif
@endsection
