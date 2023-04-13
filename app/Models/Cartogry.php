<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartogry extends Model
{
    use HasFactory;
    protected $table = 'catogry';
    protected $fillable = ['id','cat_name'];
}
