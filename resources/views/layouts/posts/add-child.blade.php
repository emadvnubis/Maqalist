@extends('layouts.add')

@extends('layouts.components')


<!-- define [add-product] body content -->

@section('form')
<div class="add_post_form">
  <h1>Add New Post</h1>

<?php


echo Form::open([
  'action' => 'PostController@add',
  'method' => 'post' ,
  'class' => '',
  'file' => true,
  'enctype' => 'multipart/form-data',
  ]);


  echo Form::text('title', null, // auto populated with old input in case of error
   array(
     'class' => 'form-control field required',
     'id' => 'name',
     'placeholder' => 'Add New Post . .',
   ) // end array
 );
 echo Form::text('slug', null, // auto populated with old input in case of error
  array(
    'class' => 'form-control field required',
    'id' => 'slug',
    'placeholder' => 'write post slug',
  ) // end array
);
  echo Form::textarea('body', null,
  array(
    'id' => 'editor',
    'class' => 'textarea'
      )
  ); ?>
  <div class="form-group">
  <label for="sel1">Select Category:</label>
  <select name="category_id" class="form-control" id="sel1">
    <?php
    foreach ($categories as $category) {
      echo "<option value='".$category->id."'>". $category->name ."</option>";
    }
     ?>
  </select>
</div>
  <div class='form_thumb row'>
  <div class='col-md-6'>
    <h2>Upload The Thumbnail</h2>
  </div>
  <div class='col-md-6'>
  {{ Form::file('image') }}
  </div>
  </div>
<?php
  echo Form::submit('Publish',['class' => 'btn btn-primary']);
  ?>
{{ Form::close() }}
</div>

@endsection
