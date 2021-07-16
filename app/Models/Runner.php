<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;

    protected $primary = 'runner_id';

    protected $fillable = [
        'runner_id',
        'Firstname',
        'Lastname',
        'Age',
        'Distance'
    ];

}
