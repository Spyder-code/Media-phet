<?php

use App\Models\Participant;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('room.{roomId}', function ($user, $roomId) {
    $data = Participant::all()->where('room_id',$roomId)->where('user_id',$user->id)->first();
    if ($data!=null) {
        return true;
    }
});

Broadcast::channel('join.{roomId}', function ($user, $roomId) {
    $data = Participant::all()->where('room_id',$roomId)->where('user_id',$user->id)->first();
    if ($data!=null) {
        return true;
    }
});
