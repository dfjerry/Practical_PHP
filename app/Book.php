<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $fillable = [
        "author_id",
        "title",
        "ISBN",
        "pub_year",
        "available",
    ];
    public function Author(){
        return $this->belongsTo("\App\Author", "author_id");
    }
}
