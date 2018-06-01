<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Returns a random eight-character string to be used as a password.
     *
     */
    public static function password_generate()
    {
        $password = '';

        $valid_characters = [
            'abcdefghjkmnpqrstuvwxyz',
            'ABCDEFGHJKMNPQRSTUVWXYZ',
            '23456789',
            '!@#$%&*?.'
        ];

        for ($i = 0; $i < 8; $i++) {
            if ($i <= 3) {
                $valid_index = $i;
            } else {
                $valid_index = rand(0, 1);
            }

            $password.=$valid_characters[$valid_index][rand(0, strlen($valid_characters[$valid_index])-1)];
        }

        return str_shuffle($password);
    }

    public function departments()
    {
        return $this->belongsToMany('App\Departments')->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany('App\Projects')->withTimestamps();
    }

    public function issues()
    {
        return $this->belongsToMany('App\Issues')->withTimestamps();
    }
}
