<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'position', 'social_media_links'];

    // Cast social_media_links to an array
    protected $casts = [
        'social_media_links' => 'array',
    ];
<<<<<<< HEAD
}
=======
}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
