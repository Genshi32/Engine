<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyMaster extends Model
{
    public function UserInfoes()
    {
        return $this->hasManyThrough('App\UserInfo', 'App\UserTechRelate', 'technology_master_id', 'id', null, 'user_info_id');
    }

    // public function USerTechRelatesFromTechnologyMaster()
    // {
    //     return $this->hasMany('App\UserTechRelate');
    // }
}
