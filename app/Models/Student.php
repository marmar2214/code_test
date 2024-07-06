<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Notifications\Notifiable;
// use \Illuminate\Auth\Authenticatable;
// use \Illuminate\Auth\Passwords\CanResetPassword;
// use \Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'user_id'];
    
    // Ensure the Student model is authorizable
    


}
