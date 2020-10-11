<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id', 'order', 'workout_id', 'meal_id'];

    public function workout() {
        return $this->belongsTo(Workout::class);
    }

    public function meal() {
        return $this->belongsTo(Meal::class);
    }
}
