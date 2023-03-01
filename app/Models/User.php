<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\History;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLES = [
        "Admin" => "Admin",
        "Librarian" => "Librarian",
        "Member" => "Member"
    ];
    protected $guarded = [
        'id',
    ];

    public function histories(){
        return $this->hasMany(History::class);
    }

}
