<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevewBook extends Model
{
    use HasFactory;
    protected $table = "revewbook";
    protected $fillable = ["book_id","user_id","revew","descripe","descripe_to","status"];
}
