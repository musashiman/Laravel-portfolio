<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\User;

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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy("updated_at","DESC")->paginate($limit_count);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    // users that are followed by this user
    public function following() 
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }
    
    // users that follow this user
    public function followers() 
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }
}
