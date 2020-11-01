<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function exercises() {
        return $this->belongsToMany(Exercise::class, 'workouts_exercises', 'workout_id', 'exercise_id')->withPivot('order', 'counter');
    }
}
