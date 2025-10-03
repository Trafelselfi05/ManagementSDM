<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'project_user';

    /**
     * Menonaktifkan fitur timestamps (created_at dan updated_at) bawaan Laravel.
     * Tabel ini hanya memiliki kolom 'assigned_at'.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'user_id',
        'assigned_at',
    ];

    /**
     * Atribut yang harus di-casting.
     *
     * @var array
     */
    protected $casts = [
        'assigned_at' => 'datetime',
    ];

    /**
     * Relasi ke model Project.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}