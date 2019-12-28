<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function collaborator() {
        return $this->hasMany(Collaborator::class);
    }
}
