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

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = strtoupper($value);
    }
}
