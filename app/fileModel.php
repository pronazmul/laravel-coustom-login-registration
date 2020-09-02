<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fileModel extends Model
{
   protected $table = 'file';
   protected $primaryKey='id';
   protected $keyType = 'int';
   public $incrementing =true;
   public $timestamps = false;
}
