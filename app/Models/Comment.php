<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Forum;

class Comment extends Model
{
  public function belongsToForum()
  {
    return $this->belongsTo('App\Models\Forum','forum_id','id');
  }
}
