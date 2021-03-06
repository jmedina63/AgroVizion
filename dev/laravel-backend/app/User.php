<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Model implements AuthenticatableContract,
                                    //AuthorizableContract,
                                    CanResetPasswordContract
{
    use SearchableTrait, EntrustUserTrait;
    use Notifiable;
    use Authenticatable, CanResetPassword;
    protected $searchable = [
        'columns' => [
            'users.name' => 1,
            'users.email' => 200,
            'users.location' => 3,
            'users.country' => 4,
            'users.website' => 5,
            'users.gender' => 6
        ],
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'site',
        'gender',
        'avatar_url',
        'status',
        'phone',
        'department',
        'title',
        'timezone',
        'language',
        'confirmation_code',
        'online',
        'rfc'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function Task()
    {
        return $this->hasMany('App\Task');
    }
    public function Message()
    {
        return $this->hasMany('App\Message');
    }
    public function Participate()
    {
        return $this->hasMany('App\Participate');
    }
    public function Comment()
    {
        return $this->hasMany('App\Comment');
    }
    public function getAuthPassword() {
        return $this->password;
    }
   #### import fields
    public  $import_fields=['email','password','role','name','gender','status','phone','site','department','title','timezone','language'];

}
