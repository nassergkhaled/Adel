<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'completeRegistration',
        'phone_number',
        'address',
        'avatar',
        'office_id',
        'id_number',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function lawyer()
    {
        return $this->hasOne(Lawyer::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
    public function secretary()
    {
        return $this->hasOne(Secretary::class);
    }
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function tasks_assigned()
    {
        return $this->belongsToMany(Task::class, 'user_task', 'user_id', 'task_id')
            ->withPivot('assigned_date')
            ->withTimestamps();
    }
    public function tasks_created()
    {
        return $this->hasMany(Task::class, 'created_by');
    }
}
