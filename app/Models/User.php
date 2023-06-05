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
        'name',
        'email',
        'password',
        'id_number',
        'No_academic',
        "role",
        "status",
        "point"
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

    public function role(){
        switch ($this->role) {
            case '1':
                return "الادمن الرئيسي";
                break;
            case '2':
                return "مدرس";
                break;
            case '3':
                return "طالب";
                break;

        }
    }

    public function Revew(){
        return count(RevewBook::where("user_id",$this->id)->get());
    }

    public function RevewDone(){
        return count(RevewBook::where(["user_id"=>$this->id,"status"=>1])->get());
    }
}
