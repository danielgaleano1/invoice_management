<?php

namespace App\Http\View\Composers;

use App\Collaborator;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedCollaboratorsList 
{
    private $collaborator;
    
    public function __construct(Collaborator $collaborator)
    {
        // Dependencies automatically resolved by service container...
        $this->collaborator = $collaborator;
    }

    public function compose(View $view)
    {
        $view->with('collaborators', Cache::remember('collaborator.enable', 600, function () {
            return $this->collaborator->all();
        }));
    }
}
