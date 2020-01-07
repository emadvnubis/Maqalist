<?php /*
=====================================================
--- Users Index Child Template
-- Which Connected With UserController
=====================================================
*/ ?>
@extends('admin.users.index')
@extends('admin.adminComponents')

@section('content')



@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            <a href="{{ url('/') }}">{{ __('MaqaList') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       @endguest
@auth

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
@endauth
@endsection

@section('admin_sidebar')
admin sidebar
@endsection
