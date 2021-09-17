<?php

namespace App\Http\Controllers;

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
        $room = Room::all()->where('code',$code)->where('game_id',$game->id)->first();
        $participant = Participant::all()->where('room_id',$room->id);
        return view('media-phet.room_play', compact('room','participant','game'));
    }
}
