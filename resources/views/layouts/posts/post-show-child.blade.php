@extends('layouts.post-show')

@extends('layouts.components')


@section('title', __('Posts show'))


@section('posts_show_content')
<div class="row hold_posts_single">
  <div class="col-sm-12 posts_single">
       @foreach($posts as $post)
       <div class="single_title">
         <h2 class="post_title">
           {{ $post->title }}
       </h2>
       </div>
       <div class="single_image">
         <img class="img-responsive img-thumbnail" src="{{$post->image}}" alt="">
       </div>
       <div class="single_content">
         <p>
         {{ $post->body }}
       </p>
     </div>
         @endforeach
      </div>
</div>
@endsection


@section('show_comments')
<!-- Contenedor Principal -->
 <div class="comments-container">
   <h1>{{ __('Comments') }}</h1>

   <ul id="comments-list" class="comments-list">
     <li>
       <div class="comment-main-level">
         <!-- Avatar -->
         <!-- <div class="comment-avatar">
           <img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt="">
         </div> -->
         <!-- Contenedor del Comentario -->
         @foreach ($post->comments as $comment)

         <div class="comment-box">
           <div class="comment-head">
             <h6 class="comment-name by-author">
                 <a href="{{ $comment->comment_user_id == null ? "" : action('AuthorsController@show', array($comment->comment_user_id,$comment->name))}}">
               <?php// } ?>
               {{ $comment->name }}
               </a>
             </h6>
             <span>hace 20 minutos</span>
             <i class="fa fa-reply"></i>
             <i class="fa fa-heart"></i>
           </div>
           <div class="comment-content">
             {!! $comment->comment !!}
           </div>
         </div>
         @endforeach
       </div>
       <!-- Respuestas de los comentarios -->
       <!-- <ul class="comments-list reply-list">
         <li>
           <div class="comment-avatar">
             <img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt="">
           </div>
           @foreach ($post->comments as $comment)

           <div class="comment-box">
             <div class="comment-head">
               <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{ $comment->name }}</a></h6>
               <span>hace 20 minutos</span>
               <i class="fa fa-reply"></i>
               <i class="fa fa-heart"></i>
             </div>
             <div class="comment-content">
               {!! $comment->comment !!}
             </div>
           </div>
           @endforeach
         </li>
       </ul> -->
     </li>
   </ul>
 </div>
@endsection


@auth
@section('form')
<div class="add_post_form comments">
  <h1 class="add_new_comment">{{ __("Add New Comment") }}</h1>


<?php
foreach($posts as $post) {
  $user = auth()->user();
echo Form::open([
  'action' => ['CommentsController@store', $post->id],
  'method' => 'POST' ,
  'class' => 'comments__form',
  'file' => true,
  'enctype' => 'multipart/form-data',
]); ?>
<div class="comments__form-info">


  <div class="comments__form-field">
    <input type="hidden" name="comment_post_id" class="form-control" value="{{ $post->id }}">
    <input type="hidden" id="sel1" name="comment_user_id" class="form-control" value="{{ $user->id }}">
    <input type="hidden" name="name" value="{{ $user->name }}">
    <h2>
      @if (Auth::user()->can('manage-users'))
          <span style="color:red">{{ $user->name }}</span>
          @else
          {{ $user->name }}

      @endif
    </h2>
    <label class="comments__form-label" for="comments__form-label-name">
      <span class="comments__form-label-text">Name</span>
    </label>
  </div>

  <div class="comments__form-text">
   <div class="comments__form-field">
     <?php
     echo Form::textarea('comment', null,
     array(
       'id' => 'editor',
       'class' => 'textarea comments__form-textarea',
       'placeholder' =>'Express your thoughts',
         )
     );
      ?>
     <label class="comments__form-label" for="comments__form-label-text">
       <span class="comments__form-label-text">Express your thoughts</span>
     </label>
   </div>
  </div>
  @can('manage-users')
  <div class="form-group">
  <label for="sel1">Approved ?</label>
  <select name="approved" class="form-control" id="sel1">
    <option value="1">Published</option>
    <option value="0">Drafted</option>
  </select>
</div>
@endcan
<?php

  echo Form::submit(__('Send'), ['class' => 'btn btn-primary comments__form-submit']);
  ?>
  </div>
  {{ Form::close() }}
<?php } ?>
</div>
@endsection
@endauth
@guest
@section('form')
  <div class="add_post_form comments">
    <h1 class="add_new_comment">{{ __("Add New Comment") }}</h1>
  <?php
  echo Form::open([
    'action' => ['CommentsController@store', $post->id],
    'method' => 'POST' ,
    'class' => 'comments__form'
    ]); ?>
    <div class="comments__form-info">

      <div class="comments__form-field">
        <?php  echo Form::text('name', null, // auto populated with old input in case of error
           array(
             'class' => 'form-control comments__form-input field required',
             'id' => 'name',
             'placeholder' => __('Add  Your Name'),
           ) // end array
         ); ?>
        <label class="comments__form-label" for="comments__form-label-name">
          <span class="comments__form-label-text">{{ __('Name') }}</span>
        </label>
      </div>
      <div class="comments__form-field">
        <?php  echo Form::text('email', null, // auto populated with old input in case of error
           array(
             'class' => 'form-control comments__form-input field required',
             'id' => 'email',
             'placeholder' => __('Write E-mail, we wont publish it'),
           ) // end array
         ); ?>
        <label class="comments__form-label" for="comments__form-label-name">
          <span class="comments__form-label-text">{{ __('Email') }}</span>
        </label>
      </div>
      <div class="comments__form-text">

       <div class="comments__form-field">
         <?php
         echo Form::textarea('comment', null,
         array(
           'id' => 'editor',
           'class' => 'textarea comments__form-textarea',
           'placeholder' =>'Express your thoughts',
             )
         );
          ?>
         <label class="comments__form-label" for="comments__form-label-text">
           <span class="comments__form-label-text">Express your thoughts</span>
         </label>
       </div>
      </div>
    <input type="hidden" id="sel1" name="comment_post_id" class="form-control" value="{{ $post->id }}">
   <?php
    echo Form::submit(__('Send'), ['class' => 'btn btn-primary comments__form-submit']);
    ?>
    </div>
    {{ Form::close() }}
  </div>
  @endsection
@endguest
