<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function hotel() {
        return $this->belongsTo('App\Hotel');
    }
}
