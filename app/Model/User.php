<?php

namespace App\Model;

use App\Notifications\MailResetPasswordToken;
use App\Notifications\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'pseudo', 'email', 'password', 'birthday', 'nbateam_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // On ajoute une méthode pour lier les roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
