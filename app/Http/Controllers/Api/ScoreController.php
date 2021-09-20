<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function changeScore()
    {
        $id = request()->participant_id;
        $score = request()->score;
        Participant::find($id)->update(['score'=>$score]);
        return response('Score updated');
    }
}
