<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_superuser',
        'is_staff',
        'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function isSuperUser()
    {
        return $this->is_superuser;
    }
    public function isStaffUser()
    {
        return $this->is_staff;
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($roles){
        return !! $roles->intersect($this->roles)->all();
    }

    public function hasPermission($permission){

    return $this->permissions->contains('name',$permission->name) || $this->hasRole($permission->roles);

    }
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Product::class);

    }
    public function comments(){

        return $this->hasMany(Comment::class);
    }
    public  function orders(){

        return $this->hasMany(Order::class);
    }

    public function information(){

        return $this->hasOne(Information::class);
    }



}
