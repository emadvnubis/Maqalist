@section('admin_header')
<!-- define HTML Basic DOCTYPE & HEAD -->
  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="{{ __('MaqaList') }} @yield('title')">
        <meta name="robots" content="index, follow">
        <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}">




        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('MaqaList - A Planet Of Articles And Encyclopedia') }} @yield('title')</title>
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pygments.css') }}" rel="stylesheet">

        <link href="{{ asset('css/easyzoom.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/app-ltr.css') }}" rel="stylesheet"> -->

        @if(App::getLocale() == 'en')
        <link href="{{ asset('css/admin/app-ltr.css') }}" rel="stylesheet">
          @elseif(App::getLocale() == 'ar')
          <link href="{{ asset('css/admin/app-rtl.css') }}" rel="stylesheet">
          @endif
          <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/media_query.css') }}" rel="stylesheet">
    </head>
    <body>
@endsection

@section('admin_navbar')
<!-- define navbar -->
<header class="navbar front_header row">
  <!-- Start nav one -->
   @if (Auth::check())
   <nav class="admin_hold_top_nav">
     <div class="admin_top_nav">
       <ul class="row">
         @php $locale = session()->get('locale'); @endphp
         <li class="col-md-3 nav-item dropdown admin_list_home_top">
           <a id="navbarDropdown" class="nav-link dropdown-toggle left_m" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             @switch($locale)
                 @case('en')
                 {{ __('English')}}
                 @break
                 @default
                 {{ __('Arabic')}}
             @endswitch
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ url('/lang/ar') }}">{{ __('Arabic')}}</a>
               <a class="dropdown-item" href="{{ url('/lang/en') }}">{{ __('English')}}</a>
           </div>
         </li>
         <li class="col-md-3 nav-item admin_list_home_top">
           <a class="nav-link admin_a_header" href="">
             <i class="fas fa-users fa-2x" aria-hidden="true"></i>
             {{ __("My Posts") }}
           </a>
         </li>
         <li class="col-md-3 nav-item dropdown admin_list_home_top">
           <a id="navbarDropdown" class="nav-link dropdown-toggle left_m admin_a_header" href="/login" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             <i class="fas fa-users fa-2x" aria-hidden="true"></i>
             {{ __("My Profile") }}
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             @can('manage-users')

             <a class="nav-link admin_a_header" href="{{ route('admin.users.index') }}">
               <i class="fas fa-users fa-2x" aria-hidden="true"></i>
               {{ __("Manage Users") }}
             </a>
             @endcan
             <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
               <i class="fas fa-sign-out-alt fa-2x" aria-hidden="true"></i>
                 {{ __('Logout') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
           </div>
         </li>
       </ul>
     </div>
   </nav>
 @endif
</header>

@endsection


@section('slider')
<div class="swiper-container text-center">
  <div class="swiper-wrapper">
     <div class="swiper-slide img-responsive img_prod" style="background-image: url('<?php echo url('/'); ?>/uploads/logo.jpeg')" alt="">
       <img width="50" src="<?php echo url('/'); ?>/uploads/logo.jpeg" alt="">


     <div class="overlay_prod">
     <h2 class="prod_name">
       <a href="">
         اسم المنتج
      </a>
   </h2>

     <span class="prod_span">
       القسم
     </span>

     <span class="prod_span">
       التقييم
     </span>
   </div>
   </div>
      </div>
</div>
@endsection

@section('admin_sidebar')
<h1>Admin Dashboard</h1>
<div class="list-group text-center">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">{{ __("Members")}}</h4>
    <p class="list-group-item-text">{{ __("Here You can Manage [edit,delete] Members")}}</p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">{{ __("Categories")}}</h4>
    <p class="list-group-item-text">{{ __("Here You can Manage [edit,delete] Categories")}}</p>
  </a>
  <a href="#" class="list-group-item active">
    <h4 class="list-group-item-heading">{{ __("Posts")}}</h4>
    <p class="list-group-item-text">{{ __("Here You can Manage [edit,delete] Posts")}}</p>
  </a>
</div>
@endsection

@section('sidebar')
<?php $posts = DB::table('posts')->get();  ?>

  <div id="sidebar" class="col-sm-12 jumbotron">
  <div class="hold_latest_added">
    <h1 class="latest_added">
      <i class="fas fa-chart-line"></i>
      {{ __('Trending') }}
    </h1>
    <ul class="latest_posts row">
   <?php foreach ($posts->slice(0, 4) as $post) { ?>
     <li class="col-sm-12 latest_li row">
       <div class="col-sm-12 col-md-6">
         <img class="side_image" src="{{ $post->image }}" alt="">
       </div>
       <div class="col-sm-12 col-md-6 side_title">
         <a class="" href="{{url('posts/' . $post->id  . '/' .$post->slug)}}">
           {{ $post->title }}
         </a>
       </div>
       </li>
    <?php } ?>
    </ul>

  </div>
    <div class="hold_latest_added">
      <h1 class="latest_added">
        <i class="fas fa-random"></i>
        {{ __('Random') }}
      </h1>
      <ul class="latest_posts row">

        <!-- Start nav two  -->
        <?php $random_posts = DB::table('posts')->inRandomOrder()->paginate(5); ?>
        @foreach($random_posts as $random)
        <li class="col-sm-12 latest_li row">
          <div class="col-sm-12 side_title text-center">
            <a class="" href="{{url('posts/' . $random->id  . '/' .$random->slug)}}">
              {{ $random->title }}
            </a>
          </div>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="hold_latest_added">
      <h1 class="latest_added">
        <i class="fas fa-random"></i>
        {{ __('Latest') }}
      </h1>
      <ul class="latest_posts row">

        <!-- Start nav two  -->
        <?php $latest_posts = DB::table('posts')->orderBy('id', 'desc')->take(5)->get(); ?>

        @foreach($latest_posts as $latest)
        <li class="col-sm-12 latest_li row">
          <div class="col-sm-12 col-md-6">
            <img class="side_image" src="{{ $latest->image }}" alt="">
          </div>
          <div class="col-sm-12 col-md-6 side_title">
            <a class="" href="{{url('posts/' . $latest->id  . '/' .$latest->slug)}}">
              {{ $latest->title }}
            </a>
          </div>
          </li>
        @endforeach
      </ul>
    </div>

    <div class="hold_latest_added">
      <h1 class="latest_added">
        {{ __('Subscribe') }}
      </h1>
      <ul class="latest_posts row">
        <li class="col-sm-12 latest_li row">
          <div class="col-sm-12">
            <input type="email" class="form-control input_con" placeholder="بريدك الاليكترونى" id="usr">
          </div>
          <div class="col-sm-12 side_title text-center">
            <button type="button" class="btn btn-primary border">
              سجل الآن
            </button>
          </div>
          </li>
      </ul>
    </div>
    <div class="hold_latest_added">
      <h1 class="latest_added">
        {{ __('Social Contacts') }}
      </h1>
      <ul class="latest_posts row">
        <li class="col-sm-12 latest_li row">
          <div class="col-sm-12 col-md-6">
            ماسنجر
          <i class="fab fa-facebook-messenger fa-lg msner"></i>
            </div>
          <div class="col-sm-12 col-md-6 side_title">
            انستجرام
            <i class="fab fa-instagram fa-lg insta"></i>
          </div>
          </li>
      </ul>
    </div>
</div>
@endsection

@section('admin_footer_content')
<!-- define Footer -->
  <footer class="hold_footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <!-- Start nav two  -->
        <div class="single_footer single_footer_address">
          <h4>أقسام رئيسية</h4>
          <ul class="row  hold_latest text-center">
            <?php $categories = DB::table('categories')->get();

            foreach ($categories->slice(0, 10) as $category) { ?>
              <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" href="{{ action('CategoryController@show', array($category->id, $category->slug )) }}">
                  {{ $category->name}}
                </a>
              </li>
            <?php } ?>
          </ul>

        </div>
      </div>
      <!--- END COL -->
      <div class="col-sm-12 col-md-4">
        <div class="single_footer single_footer_address">
          <h4>أحدث المنتجات</h4>
          <ul class="row hold_latest text-center">
            <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" id="" href="">
                  منتج تجريبى 1
                </a>
            </li>
            <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" id="" href="">
                  منتج تجريبى 2
                </a>
            </li>
            <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" id="" href="">
                  منتج تجريبى 3
                </a>
            </li>
            <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" id="" href="">
                  منتج تجريبى 4
                </a>
            </li>
            <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" id="" href="">
                  منتج تجريبى 5
                </a>
            </li>
            <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" id="" href="">
                  منتج تجريبى 6
                </a>
            </li>
          </ul>
    </div>
    </div>
    <!--- END COL -->
    <div class="col-sm-12 col-md-4">
      <div class="single_footer single_footer_address text-center">
        <h4>أحدث العروض</h4>
        <p>انتظرو قريبا الكثير من العروض</p>
      </div>

    </div>
    <!--- END COL -->
  </div>
    <!--- END ROW -->
    <div class="row">
      <div class="col-sm-12 hold_copy">
        <p class="copyright">
          جميع الحقوق محفوظة لـ
          @ <a href="#">.Emad Dev</a></p>
      </div>
      <!--- END COL -->
    </div>
    <!--- END ROW -->
  </footer>
@endsection


@section('admin_footer')
  <!-- Scripts -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
  <script src="{{ asset('js/popper.js') }}" defer></script>
  <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('js/all.min.js') }}" defer></script>
  <script src="{{ asset('js/plugins/jquery-slicknav-min.js') }}" defer></script>
  <script src="{{ asset('js/plugins/swiper.min.js') }}" defer></script>
  <script src="{{ asset('js/plugins/easyzoom.js') }}" defer></script>
  <script src="{{ asset('js/plugins/anime.min.js') }}" defer></script>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
  </html>
@endsection
