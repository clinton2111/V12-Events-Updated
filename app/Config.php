<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = strtolower($value);
    }
}
