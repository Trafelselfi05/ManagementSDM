<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory;

  protected $table = "users";

  protected $fillable = [
    "name",
    "division",
    "email",
    "password",
    "nik",
    "telegram_link",
    "employment_status",
    "address",
    "phone",
    "birth_date",
    "join_date",
    "last_education",
    "role",
    "image",
    "dashboard_status",
    "status_description",
  ];

  protected $hidden = ["password"];
  protected $rememberTokenName = null;

  // Relasi
  public function projects()
  {
    return $this->belongsToMany(Project::class, "project_user");
  }

  public function tasks()
  {
    return $this->hasMany(Task::class, "assigned_to");
  }

  public function leaves()
  {
    return $this->hasMany(Leave::class);
  }

  public function activities()
  {
    return $this->hasOne(Activity::class);
  }

  public function workHours()
  {
    return $this->hasMany(WorkHour::class);
  }

  // === Helpers role ===
  public function isDirector()
  {
    return $this->role === "director";
  }

  public function isKaryawan()
  {
    return $this->role === "karyawan";
  }

  public function isAdmin()
  {
    return $this->email === "admin@gmail.com";
  }
}
