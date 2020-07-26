<?php

namespace App\Http\View\Composers;

use App\TechnologyMaster;
use Illuminate\View\View;

class TechnologyMasterComposer
{
    protected $technology_masters;

    public function __construct()
    {
        $this->technology_masters = TechnologyMaster::all();
    }

    public function compose(View $view)
    {
        $view->with('technology_masters', $this->technology_masters);
    }
}