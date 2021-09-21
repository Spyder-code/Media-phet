@extends('layouts.user')
@section('style')
    <link rel="stylesheet" href="{{ asset('/') }}static/css/chat.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        @if ($room!=null)
                        <div class="table-responsive">
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
                                        <td colspan="2" width="max-content"><b id="code-room">{{ $room->code }}</b><button data-clipboard-target="#code-room" class="ml-2 btn btn-sm btn-rounded btn-secondary copy"><i class="fa fa-clipboard"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td width="300px">Link</td>
                                        <td width="20px">:</td>
                                        <td colspan="2" width="max-content"><b id="link-room">{{ route('room.join',['code'=>$room->code]) }}</b><button data-clipboard-target="#link-room" class="ml-2 btn btn-sm btn-rounded btn-secondary copy"><i class="fa fa-clipboard"></i></button></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="{{ route('play.game',['game'=>$game->id]) }}" target="d_blank" class="btn btn-primary">Play Game</a>
                            </div>
                            {{-- @include('game.1') --}}
                        </div>
                        @if ($room!=null)
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
                                    <tbody id="tbody">
                                        @foreach ($participant as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->score }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Our class area end-->

    <!-- CHAT BAR BLOCK -->
    @if ($room!=null)
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
                                @foreach ($discussion as $item)
                                    @if (Auth::id()!=$item->user_id)
                                        <p class="botText my-2">
                                            <span>{{ $item->text }} <sup class="ml-3 {{ $item->user_id==$room->creator_id?'bg-success y-1':'' }}"><small>{{ $item->user_id==$room->creator_id?'Teacher':$item->user->username }}</small></sup></span>
                                        </p>
                                    @else
                                        <p class="userText my-2">
                                            <span><sup class="mr-3 {{ $item->user_id==$room->creator_id?'bg-success p-1 rounded':'' }}" ><small>{{ $item->user_id==$room->creator_id?'Teacher':$item->user->username }}</small></sup> {{ $item->text }}</span>
                                        </p>
                                    @endif
                                @endforeach
                                <div id="response"></div>
                            </div>
                            <!-- User input box -->
                            <div class="chat-bar-input-block">
                                <div id="userInput">
                                    <input id="textInput" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message">
                                    <p></p>
                                </div>
                                <div class="chat-bar-icons">
                                    {{-- <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart" onclick="heartButton()"></i> --}}
                                    <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send" onclick="sendMessage()"></i>
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
    @endif

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
<script>
    new ClipboardJS('.copy');
</script>
@if ($room!=null)
        <script src="{{ asset('/') }}static/scripts/responses.js"></script>
        <script src="{{ asset('/') }}static/scripts/chat.js"></script>
        @if (Auth::check())
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $('#textInput').keypress(function (e) {
                if(e.keyCode==13){
                    sendMessage();
                }
            });
            var room = {!! json_encode($room->id) !!};
            Echo.private(`room.${room}`)
            .listen('SendMessage', (e) => {
                $('#response').append(e.message);
            });

            Echo.private(`join.${room}`)
            .listen('JoinRoom', (e) => {
                $('#tbody').append(e.data);
            });

            function sendMessage(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = {!! json_encode(route('send')) !!}
                var text = $('#textInput').val();
                var user_id = {!! json_encode(Auth::id()) !!};
                var room_id = {!! json_encode($room->id) !!};
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {text:text,user_id:user_id,room_id:room_id},
                    success: function (data) {
                        $('#textInput').val('');
                        $('#response').append(data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        </script>
        @endif
    @endif
@endsection
