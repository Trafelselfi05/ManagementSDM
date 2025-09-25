<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'start_date',
        'deadline',
        'director_id',
        'level',
        'status',
        'description',
    ];

    // Relasi
    public function director()
    {
        return $this->belongsTo(User::class, 'director_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
