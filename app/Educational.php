<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educational extends Model
{
    //
    public function lebel()
    {
        return $this->hasMany('App\Label', 'educational_id','id');
    }
}
