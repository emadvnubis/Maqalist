<?php

namespace Maqalist;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  protected $table = 'sub_categories';

  protected $fillable = ['id', 'name', 'cat_id','image'];

  public function categories()
  {
     //return $this->belongsTo('Maqalist\Category');
     return $this->belongsTo('Maqalist\Category');
  }

  // public function posts()
  // {
  //    return $this->hasMany('Maqalist\Post', 'sub_cat_id');
  //    //return $this->hasMany(Post::class);
  // }
  public function posts()
  {
     return $this->hasMany('Maqalist\Post', 'sub_category_id');
     //return $this->hasMany(Post::class);
  }
}
