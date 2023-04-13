<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReperScience extends Model
{
    use HasFactory;
    protected $table = "reper_science";
    protected $fillable = ['id','sp_id',"sp_name","file","tech_id","status","emz","year_post"];
}
