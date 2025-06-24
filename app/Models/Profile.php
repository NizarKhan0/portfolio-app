<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'job_title', 'description', 'image',
        'location', 'email', 'phone'
    ];
}
