<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    public function label()
    {
        return $this->belongsTo('App\Label', 'id','label_id');
    }
}
