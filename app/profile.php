<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function collaborator() {
        return $this->hasMany(Collaborator::class);
    }
}
