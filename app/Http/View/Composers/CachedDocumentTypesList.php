<?php

namespace App\Http\View\Composers;

use App\DocumentType;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedDocumentTypesList 
{
    private $document_type;
    
    public function __construct(DocumentType $document_type)
    {
        // Dependencies automatically resolved by service container...
        $this->document_type = $document_type;
    }

    public function compose(View $view)
    {
        $view->with('document_types', Cache::remember('document_types.enable', 600, function () {
            return $this->document_type->all();
        }));
    }
}
