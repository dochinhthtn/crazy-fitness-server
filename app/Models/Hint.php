<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    use HasFactory;

    protected $fillable = ['info', 'operation', 'value'];

    public function plans () {
        return $this->belongsToMany(Plan::class, 'hints_plans', 'hint_id', 'plan_id');
    }
}
