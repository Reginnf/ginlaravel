<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Coldplay extends Model
{
  protected $table = "tb_coldplay";
  protected $fillable = ['judul','pencipta','durasi','image','rilis'];
}
