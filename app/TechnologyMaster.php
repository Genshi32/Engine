<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyMaster extends Model
{
    public function UserInfoes()
    {
        return $this->hasManyThrough('App\UserInfo', 'App\UserTechRelate');
    }

    // public function USerTechRelatesFromTechnologyMaster()
    // {
    //     return $this->hasMany('App\UserTechRelate');
    // }
}
