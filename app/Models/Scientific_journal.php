<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scientific_journal extends Model
{
    use HasFactory;
    protected $table="scientific_journal";
    protected $fillable = ['id','scientific_name','scientific_place','name_reserch','issn',"id_sce",'file'];

}
