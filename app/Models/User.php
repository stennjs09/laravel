<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Mail\WelcomeUserMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
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
        'name',
        'username',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function($user){
            $data = $user->profile()->create([
                'title' => 'Profil de  ' . $user->username
            ]);

            Mail::to($data->user->email)->send(new WelcomeUserMail($data->user));

        });
    }


    public function getRouteKeyName()
    {
        return 'username';
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    
    public function following()
    {
        return $this->belongsToMany('App\Models\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post')->orderBy('created_at', 'DESC');
    }
}
