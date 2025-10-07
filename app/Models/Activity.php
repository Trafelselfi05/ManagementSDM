<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'user_id',
        'work_hours',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
