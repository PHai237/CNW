<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users1 extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'email', 'password', 'role', 'created_at', 'updated_at'];
}
