<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    
    protected $table = "books";
    protected $fillable = [
        'id','book_name',"autor_name","publishing_house",'yaer',"copy",'image_book',"catogry",'isbn','file','created_at'
    ];
}
