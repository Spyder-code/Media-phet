<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'game_id',
        'creator_id',
        'status'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class,'game_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function participant()
    {
        return $this->hasMany(Participant::class,'room_id');
    }
}
