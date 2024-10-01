<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $table = 'faqs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'answer',
        'status', // status to determine if the FAQ is active or inactive
    ];

    /**
     * Get the status as a readable string.
     *
     * @return string
     */
    public function getStatusTextAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
