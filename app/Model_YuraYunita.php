<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_YuraYunita extends Model
{
  protected $table = "tb_yurayunita";
  protected $fillable = ['judul','pencipta','durasi','image','rilis'];
}
