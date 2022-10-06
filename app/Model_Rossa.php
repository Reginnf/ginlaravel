<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Rossa extends Model
{
  protected $table = "tb_rossa";
  protected $fillable = ['judul','pencipta','durasi','image','rilis'];
}
