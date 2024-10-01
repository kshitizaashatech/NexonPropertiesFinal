<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomerUser extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'customer_usertable';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
}
=======
}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
