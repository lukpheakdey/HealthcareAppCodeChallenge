<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'age', 'phone', 'start_date', 'deadline', 'follow_up'
    ];
}
