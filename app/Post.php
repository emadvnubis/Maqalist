<?php

namespace Maqalist;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $table = 'posts';

  protected $fillable = ['id','title', 'slug', 'body', 'category_id', 'sub_category_id','image'];

  public function categories()
  {
      return $this->belongsTo('Maqalist\Category', 'cat_id');
    //  return $this->belongsTo(Category::class, 'category_id');
  }

  public function sub_categories()
  {
      return $this->belongsTo('Maqalist\SubCategory');
    //  return $this->belongsTo(Category::class, 'category_id');
  }

  public function users()
    {
        return $this->belongsTo(User::class);
    }

  public function comments()
  {
    return $this->hasMany('Maqalist\Comment', 'comment_post_id');
  }
}
