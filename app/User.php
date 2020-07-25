<?php

namespace App;

use App\Models\ExamPack;
use App\Models\ExamTest;
use App\Models\PaymentInfo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

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

    public function examPack(){
        return $this->belongsToMany(ExamPack::class);
    }

    public function examTest(){
        return $this->belongsToMany(ExamTest::class)->withPivot('score');
    }

    public function payments(){
        return $this->hasMany(PaymentInfo::class);
    }
}
