<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
  protected $primaryKey = 'g_num';
  public $incrementing = false;
  public function car()
  {
    return $this->belongsTo(App\models\client::class);
  }
}
