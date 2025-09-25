<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTransfer extends Model
{
    use HasFactory;

    protected $table = 'task_transfers';

    protected $fillable = [
        'task_id',
        'from_user_id',
        'to_user_id',
        'performed_by_admin_id',
        'performed_by_user_id',
        'note',
    ];

    // Relasi
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function performedByUser()
    {
        return $this->belongsTo(User::class, 'performed_by_user_id');
    }
}
