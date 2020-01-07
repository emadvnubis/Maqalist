@extends('layouts.edit')

@extends('layouts.components')


@section('edit_form')
<form action="/edit/<?php echo $post->id; ?>" method="POST" class="form-horizontal">
<?php echo Form::token(); ?>
  <div class="form-group">
    <label class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" name="name" value="<?php echo $post->title ?>">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">update</button>
  </div>
</form>
@endsection



<!-- define [add-product] body content -->

@section('form')
<?php


echo Form::open([
  'action' => ['PostController@edit', $post->id],
  'method' => 'post' ,
  'class' => 'add_prod_form',
  'file' => true,
  'enctype' => 'multipart/form-data',
  ]);

  echo Form::token();

  echo Form::text('title', $post->title, // auto populated with old input in case of error
   array(
     'class' => 'field required',
     'id' => 'name',
     'placeholder' => 'Add New Product . .',
   ) // end array
 );
  echo Form::submit('Click Me!');
  ?>
{{ Form::close() }}

@endsection
