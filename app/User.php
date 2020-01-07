<?php

namespace Maqalist;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'Avatar'
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


    public function getAvatarAttribute() {
       return $this->profile_image;
    }

    public function posts()
    {
       return $this->hasMany('Maqalist\Post');
       //return $this->hasMany(Post::class);
    }

    public function comments()
    {
       return $this->hasMany('Maqalist\Comment', 'comment_user_id');
       //return $this->hasMany(Post::class);
    }

    public function roles()
    {
      return $this->belongsToMany('Maqalist\Role');
    }

    public function hasAnyRoles($roles)
    {
      if($this->roles()->whereIn('name', $roles)->first()){
        return true;
      }
      return false;
    }
    public function hasRole($role)
    {
      if($this->roles()->where('name', $role)->first()){
        return true;
      }
      return false;
    }

    public function profile(){
      return $this->hasOne('Maqalist\Profile', 'user_id');
    }
}
