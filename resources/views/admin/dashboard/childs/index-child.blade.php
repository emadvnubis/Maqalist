<?php /*
=====================================================
--- Dashboard Index Child Template
-- Which Connected With DashboardController
=====================================================
*/ ?>
@extends('admin.dashboard.index')
@extends('admin.adminComponents')

@section('dashboard_content')
<a href="{{ url('/') }}">front Home Page</a>
<table class="table table-inverse|reflow|striped|bordered|hover|sm">
  <thead>
    <tr>
      <th>#</th>
      <th>User Name</th>
      <th>Email</th>
      <th>Roles</th>
      <?php if(!Gate::denies('edit-users')){ ?>
      <th>Action</th>
    <?php }  ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <th scope="row"><?php echo $user->id; ?></th>
      <td><?php echo $user->name; ?></td>
      <td><?php echo $user->email; ?></td>
      <td>
        {{ implode( ', ' , $user->roles()->get()->pluck('name')->toArray() ) }}
      </td>
  <?php if(!Gate::denies('edit-users')){ ?>
      <td>
        <a href="{{ route('admin.users.edit', $user->id)}}">
          <button type="button" class="btn btn-primary">
            Edit
          </button>
        </a>
        <form class="" action="{{ route('admin.users.destroy', $user)}}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-warning">
            Delete
          </button>
        </form>
      </td>
    <?php } ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
@endsection
