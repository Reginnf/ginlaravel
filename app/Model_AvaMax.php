<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_AvaMax extends Model
{
  protected $table = "tb_avamax";
  protected $fillable = ['judul','pencipta','durasi','image','rilis'];
}
