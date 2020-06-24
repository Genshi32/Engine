<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTechRelate extends Model
{
    public function TechnologyMaster()
    {
        return $this->belongsTo('App\TechnologyMaster');
    }
}
