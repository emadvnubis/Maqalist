@extends('layouts.homepage')

@extends('layouts.components')

@section('is_login')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Categories</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
@endsection
@section('login')
<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
    @endguest
</ul>
@endsection


@section('timeline')
<div class="row">
  @foreach($categories as $category)
  <div class="col-sm-12 hold_card row">
    <div class="col-sm-12 hold_cat_name">
        <h4 class="cat_name">
          <a href="{{ action('CategoryController@show', [$category->id, $category->slug]) }}">
            {{ $category->name }}
          </a>
        </h4>

      </div>
      @foreach($category->posts->slice(0,5)  as $post)

      <div class="col-sm-12 row cat_categories">
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
           <div class="col-sm-12 col-md-4">
             <span class="cat_rating">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
            </span>
           </div>
           <div class="col-sm-12 col-md-8">
             <a class="view_more" href="posts/{{ $post->id }}/{{ $post->slug }}">{{ __('View More') }}</a>
           </div>
         </div>
        </div>
      </div>
      @endforeach

</div>
@endforeach
</div>
{!! $categories->links() !!}

@endsection
