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
        // return $this->hasManyThrough('App\TechnologyMaster', 'App\UserTechRelate', );
        return $this->hasManyThrough('App\TechnologyMaster', 'App\UserTechRelate', 'user_info_id', 'id', null, 'technology_master_id');
    }

    public function UserTechRelates()
    {
        return $this->hasMany('App\UserTechRelate');
    }

}