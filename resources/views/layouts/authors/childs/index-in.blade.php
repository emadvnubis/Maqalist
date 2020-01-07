@extends('layouts.authors.index')

@extends('layouts.components')


@section('title', __('Posts show'))

@section('authors_content')
<div class="col-sm-12 row hold_posts_single">
  <div class="col-sm-12 posts_single">
    <div class="single_title">
      <h2 class="post_title">
    </h2>

    <?php foreach($users as $user) { ?>

      <div class="col-sm-12">
      </div>
    <div class="col-sm-12 col-md-12 row cat_categories">
      <div class="col-sm-12 col-md-3 row">
        <div class="col-sm-12 hold_right_post">
        </div>
      </div>
      <div class="col-sm-12 col-md-9 text-center">
      <div class="row">
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             User Name :
             <a href="{{ action('AuthorsController@show', array($user->id,$user->name) ) }}">
             {{ $user->name }}
             </a>
           </h2>
         </div>
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             Email :
             <a href="{{ action('AuthorsController@show', array($user->id,$user->name) ) }}">
             {{ $user->email }}
             </a>
           </h2>
         </div>
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             Avatar :
             <a href="{{ action('AuthorsController@show', array($user->id,$user->name) ) }}">
             {{ $user->Avatar }}
             </a>
           </h2>
         </div>
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             First Name :
             <a href="{{ action('AuthorsController@show', array($user->id,$user->name) ) }}">
              {{ !isset($user->profile->FirstName) ? "" : $user->profile->FirstName }}
             </a>
           </h2>
         </div>
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             Last Name :
             <a href="{{ action('AuthorsController@show', array($user->id,$user->name) ) }}">
               {{ !isset($user->profile->LastName) ? "" : $user->profile->LastName }}
             </a>
           </h2>
         </div>
         <div class="col-sm-12">
           <h2 class="cat_post_title">
             About Me :
             <a href="{{ action('AuthorsController@show', array($user->id,$user->name) ) }}">
               {{ !isset($user->profile->About_Me) ? "" : $user->profile->About_Me }}
             </a>
           </h2>
         </div>
       </div>
      </div>
    </div>
    </div>
  <?php } ?>
      </div>
</div>
@endsection
