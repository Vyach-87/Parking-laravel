<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
  protected $primaryKey = 'phone';
  public $incrementing = false;
    public function cars()
    {
      return $this->hasMany('Car');
    }
}
