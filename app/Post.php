<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','description','content','image','category_id'];
    public function get_category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
