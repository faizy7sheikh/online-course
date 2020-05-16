<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    public function educational()
    {
        return $this->belongsTo('App\Educational', 'id','educational_id');
    }
    
    public function chapter()
    {
        return $this->hasMany('App\Chapter', 'label_id','id');
    }
}
