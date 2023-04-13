<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lactures extends Model
{
    use HasFactory;
    protected $table = "lectures";
    protected $fillable = ['descripe',"course_id","tech","semester","year","file"];
}
