<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBook extends Model
{
    use HasFactory;
    protected $table = "requests_book";
    protected $fillable = [
        'id',
        "user_id",
        "request_url",
        "status",
        "title",
        "created_at"
    ];
}
