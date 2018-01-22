<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
  public function user()
  {
    return $this->belongsToMany('App\Models\User');
  }
}
