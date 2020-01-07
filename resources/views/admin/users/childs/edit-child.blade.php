@extends('admin.users.edit')
@extends('admin.adminComponents')

@section('edit_users')

<h1>Edit Users {{ $user->name }}</h1>
<form class="" action="{{ route('admin.users.update', $user)}}" method="POST">
  @csrf
  {{ method_field('PUT') }}
  <div class="form-group">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" value="<?php echo $user->name ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-10">
      <input type="text" name="email" value="<?php echo $user->email ?>">
    </div>
  </div>

  @foreach($roles as $role)
    <div class="form-check">
      <label>
        <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked=checked @endif/>
        {{ $role->name}}
      </label>
    </div>
  @endforeach
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<a href="{{ url()->previous() }}">back</a>
@endsection
