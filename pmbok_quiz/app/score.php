<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
