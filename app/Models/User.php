<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\CustomVerifyEmail);
    }

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

    public function getFullNameAttribute()
    {
        if ($this->role === 'Client') {
            return $this->client ? $this->client->full_name : $this->first_name . " " . $this->last_name;
        }
        if ($this->role === 'Lawyer') {
            return $this->lawyer ? $this->lawyer->full_name : $this->first_name . " " . $this->last_name;
        }
        if ($this->role === 'Manager') {
            return $this->manager ? $this->manager->full_name : $this->first_name . " " . $this->last_name;
        }
        if ($this->role === 'Secretary') {
            return $this->secretary ? $this->secretary->full_name : $this->first_name . " " . $this->last_name;
        }

        return 'N/A';
    }
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function lawyer()
    {
        return $this->hasOne(Lawyer::class, 'id');
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
            ->withTimestamps();
    }
    public function tasks_created()
    {
        return $this->hasMany(Task::class, 'created_by');
    }
}
