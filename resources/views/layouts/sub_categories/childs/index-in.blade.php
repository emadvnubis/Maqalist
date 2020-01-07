@extends('layouts.sub_categories.index')

@extends('layouts.components')


@section('title', __('Authors show'))

@section('sub_categories_content')
<div class="col-sm-12 row hold_posts_single">
  <div class="col-sm-12 posts_single">
    <div class="single_title">
      <h2 class="post_title">
        <?php //echo $post->name; ?>
    </h2>

    <?php foreach($posts as $post) { ?>

      <div class="col-sm-12">
      </div>
    <div class="col-sm-12 col-md-12 row cat_categories">
      <div class="col-sm-12 col-md-3 row">
        <div class="col-sm-12 hold_right_post">
          <img class="img-responsive img-thumbnail img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
        </div>
      </div>
      <div class="col-sm-12 col-md-9 text-center">
      <div class="row">
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             <a href="{{ action('PostController@show', array($post->id, $post->slug) ) }}">
             {{ $post->title }}
             </a>
           </h2>
         </div>
         <div class="col-sm-12">
           <h2 class="cat_post_title">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</h2>
         </div>
         <div class="col-sm-12 col-md-6">
           <span class="cat_rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
          </span>
         </div>
         <div class="col-sm-12 col-md-6">
           <a class="view_more" href="posts/{{ $post->id }}/{{ $post->slug }}">{{ __('View More') }}</a>
         </div>
       </div>
      </div>
    </div>
    </div>
  <?php } ?>
      </div>
</div>
<div class="col-sm-12">
  {!! $posts->links() !!}
</div>
@endsection
