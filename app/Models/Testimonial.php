<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'designation',
        'review',
        'rating',
        'image',
        'status'
    ];
    protected $casts = [
        'image' => 'array', // Handle multi-image upload as an array
    ];

<<<<<<< HEAD
}
=======
}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
