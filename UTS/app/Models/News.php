<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    //menghubungkan model dengan tabel di database
    protected $table = "news";

    // field dalam tabel
    protected $fillable = ['id', 'title', 'author', 'description', 'content', 'url', 'url_image', 'published_at'];
}
