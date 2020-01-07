<?php

namespace Maqalist;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $table = 'categories';

   protected $fillable = ['id', 'name','slug'];

    public function posts()
    {
       return $this->hasMany('Maqalist\Post', 'category_id');
       //return $this->hasMany(Post::class);
    }
    public function sub_categories()
    {
        //return $this->belongsTo('Maqalist\SubCategory', 'sub_category_id');
        return $this->hasMany('Maqalist\SubCategory');
    }
}
