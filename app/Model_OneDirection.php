<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_OneDirection extends Model
{
  protected $table = "tb_onedirection";
  protected $fillable = ['judul','pencipta','durasi','image','rilis'];
}
