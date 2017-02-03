<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
  protected $table='forums';

  public function belongsToUser()
  {
    return $this->belongsTo('App\Models\User','user_id','id');
  }

  public function hasManyComments()
  {
    return $this->hasMany('App\Models\Comment','forum_id','id');
  }
}
