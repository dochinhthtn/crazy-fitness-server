<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function workouts() {
        return $this->belongsToMany(Workout::class, 'challenges_workouts', 'challenge_id', 'workout_id')->withPivot('order');
    }
}
