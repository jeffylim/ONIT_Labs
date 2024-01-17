<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surname',
        'name',
        'middle',
        'birthday',
        'nationality',
        'sex',
        'email',
        'phone',
        'login',
        'password',
        'photo',
        'mailing'
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function havePermission($required_permission){
        foreach ($this->permissions as $permission) {
            if (fnmatch($permission->permission, $required_permission)) {
                return true;
            }
        }
        return false;
    }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
