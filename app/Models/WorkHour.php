<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    use HasFactory;

    protected $table = 'work_hours';

    protected $fillable = [
        'user_id',
        'date',
        'hours',
        'source_task_id',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'source_task_id');
    }
}
