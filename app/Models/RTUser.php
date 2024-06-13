<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTUser extends Model
{
    use HasFactory;

    protected $table = 'rt_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'RT'];
}
