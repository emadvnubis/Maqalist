<?php

namespace Maqalist;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';
  protected $fillable = ['id', 'name', 'email','comment','comment_user_id','approved', 'comment_post_id'];

  public function posts()
  {
    return $this->belongsTo('Maqalist\Post');
  }
  public function users()
  {
    return $this->belongsTo('Maqalist\User');
  }
}
