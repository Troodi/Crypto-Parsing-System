<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['author', 'title', 'description', 'url', 'urlToImage', 'publishedAt', 'content', 'source_id', 'tag_id'];
}
