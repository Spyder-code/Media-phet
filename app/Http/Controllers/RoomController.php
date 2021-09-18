<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Discussion;
use App\Models\Participant;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('admin.room.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required'
        ]);

        $code = $this->code(15);
        Room::create([
            'game_id' => $request->game_id,
            'creator_id' => Auth::id(),
            'code' => $code
        ]);

        return redirect()->route('room.join',['code'=>$code]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }

    public function join($code)
    {
        $room = Room::all()->where('code',$code)->first();
        if ($room==null) {
            return abort(404);
        }else{
            $participant = Participant::all()->where('user_id',Auth::id())->where('room_id',$room->id)->first();
            if($participant==null){
                Participant::create([
                    'user_id' => Auth::id(),
                    'room_id' => $room->id,
                    'score' => 0,
                ]);
            }
            return redirect()->route('play',['game'=>$room->game_id,'code'=>$room->code]);
        }
    }

    public function send(Request $request)
    {
        $data = Discussion::create([
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'text' => $request->text,
        ]);

        $user = User::find($request->user_id);
        if ($request->user_id==Auth::id()) {
            $data = '<p class="userText my-2"><span><sup class="mr-3"><small>'.$user->username.'</small></sup>'.$request->text.'</span></p>';
            $data1 = '<p class="botText my-2"><span> '.$request->text.'<sup class="ml-3"><small>'.$user->username.'</small></sup></span></p>';
        } else {
            $data = '<p class="botText my-2"><span> '.$request->text.'<sup class="ml-3"><small>'.$user->username.'</small></sup></span></p>';
            $data1 = '<p class="userText my-2"><span><sup class="mr-3"><small>'.$user->username.'</small></sup>'.$request->text.'</span></p>';
        }
        broadcast(new SendMessage($data1))->toOthers();
        // event(new SendMessage($data1));
        return response($data);
    }

    private function code($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
