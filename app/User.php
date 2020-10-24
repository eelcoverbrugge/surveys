<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }
    
    public function userQuestions()
    {
        return $this->hasManyThrough('App\Question', 'App\Questionnaire');
    }
    
    public function userSurveys()
    {
        return $this->hasManyThrough('App\Survey', 'App\Questionnaire');
    }
}
