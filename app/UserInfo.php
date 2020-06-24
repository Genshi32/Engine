<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{

    protected $table = 'user_infoes';

    public function User()
    {
        return $this->hasOne('App\User');
    }

    public function TechnologyMasters()
    {
        return $this->hasManyThrough('App\TechnologyMaster', 'App\UserTechRelate');
    }

    public function UserTechRelates()
    {
        return $this->hasMany('App\UserTechRelate');
    }

}