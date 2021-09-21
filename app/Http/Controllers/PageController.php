<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Game;
use App\Models\Participant;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function simulation()
    {
        $game = Game::all();
        return view('media-phet.simulation', compact('game'));
    }

    public function simulationGame(Game $game)
    {
        $room = null;
        return view('media-phet.room_play', compact('game','room'));
    }

    public function index()
    {
        return view('media-phet.index');
    }

    public function roomPlay()
    {
        return view('media-phet.room_play');
    }

    public function akun()
    {
        $histori = Participant::all()->where('user_id',Auth::id());
        return view('media-phet.akun', compact('histori'));
    }

    public function room()
    {
        $game = Game::all();
        $myroom = Room::all()->where('creator_id',Auth::id());
        return view('media-phet.room', compact('game','myroom'));
    }

    public function play(Game $game, $code)
    {
        $room = Room::all()->where('code',$code)->where('game_id',$game->id)->where('status',1)->first();
        if($room==null){
            return abort(404);
        } else {
            $participant = Participant::all()->where('room_id',$room->id);
            $join = Participant::all()->where('room_id',$room->id)->where('user_id',Auth::id())->first();
            $discussion = Discussion::all()->where('room_id',$room->id);
            session()->put('participant_id', $join->id);
        }
        if($join==null){
            return redirect()->route('room.join',['code'=>$code]);
        }else{
            return view('media-phet.room_play', compact('room','participant','game','discussion'));
        }
    }

    public function playGame(Game $game){
        if(Auth::check()){
            $participant_id = session()->get('participant_id');
            $name = Auth::user()->username;
        }else{
            $name = 'Player';
            $participant_id = 0;
        }
        $url = url()->previous();
        return view('media-phet.game', compact('game','name','url','participant_id'));
    }
}
