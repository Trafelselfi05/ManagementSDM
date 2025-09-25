<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'level',
        'estimated_hours',
        'status',
        'assigned_to',
        'created_by_admin_id',
        'created_by_user_id',
        'completed_at',
    ];

    // Relasi
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function workHours()
    {
        return $this->hasMany(WorkHour::class, 'source_task_id');
    }

    public function transfers()
    {
        return $this->hasMany(TaskTransfer::class);
    }
}
