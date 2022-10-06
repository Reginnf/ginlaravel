<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Lyodra extends Model
{
  protected $table = "tb_lyodra";
  protected $fillable = ['judul','pencipta','durasi','image','rilis'];

}
