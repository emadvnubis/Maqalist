@section('header')
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
        <link href="{{ asset('css/app-ltr.css') }}" rel="stylesheet">
          @elseif(App::getLocale() == 'ar')
          <link href="{{ asset('css/app-rtl.css') }}" rel="stylesheet">
          @endif
          <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/media_query.css') }}" rel="stylesheet">
    </head>
    <body>
@endsection

@section('navbar')
<!-- define navbar -->
<header class="navbar front_header row">
  <!-- Start nav one -->
   @if (Auth::check())
   <nav class="hold_top_nav">
     <div class="top_nav">
       <ul class="row">
         @php $locale = session()->get('locale'); @endphp
         <li class="col-md-3 nav-item dropdown list_home_top">
           <a id="navbarDropdown" class="nav-link dropdown-toggle left_m" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             @switch($locale)
                 @case('en')
                 {{ __('English')}}
                 @break
                 @default
                 {{ __('Arabic')}}
             @endswitch
           </a>

           <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ url('/lang/ar') }}">{{ __('Arabic')}}</a>
               <a class="dropdown-item" href="{{ url('/lang/en') }}">{{ __('English')}}</a>
           </div>
         </li>
         <li class="col-md-3 nav-item list_home_top">
           <a class="nav-link" href="">
             <i class="fas fa-users fa-2x" aria-hidden="true"></i>
             {{ __("My Posts") }}
           </a>
         </li>
         <li class="col-md-3 nav-item dropdown list_home_top">
           <a id="navbarDropdown" class="nav-link dropdown-toggle left_m" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             <i class="fas fa-users-cog fa-2x" aria-hidden="true"></i>
             {{ __("Settings") }}
           </a>
           <div class="dropdown-menu dropdown-menu-right position_fix" aria-labelledby="navbarDropdown">


             <?php $user_id_name = auth()->user(); ?>

             <a class="nav-link dropdown-item" href="{{ route('profile')}}">
               <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                 {{ __('Edit My Profile') }}
             </a>

             <a class="nav-link dropdown-item" href="{{ action('AuthorsController@show', array($user_id_name->id, $user_id_name->name))}}">
               <i class="fas fa-user fa-2x" aria-hidden="true"></i>
                 {{ __('My Profile') }}
             </a>

             @can('manage-users')

             <a class="nav-link  dropdown-item a_header" href="{{ route('admin.index') }}">
               <i class="fas fa-tachometer-alt fa-2x" aria-hidden="true"></i>
               {{ __("Admin Dashboard") }}
             </a>
             @endcan
             <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                 <i class="fas fa-sign-out-alt fa-2x" aria-hidden="true"></i>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
           </div>
         </li>
       </ul>
     </div>
   </nav>

    <nav class="row col-sm-12 navbar log_nav">
      <!-- <div class="col-sm-12">
        <img width="300" src="{{ url('adv.jpg') }}" alt="">
      </div> -->

      <!-- Start LEFT nav ONE -->
      <div class="col-sm-12 col-md-4">
        <ul class="row">
          <li class="list_home_top">
            <!-- <img width="50" src="{{ url('/') }}/uploads/logo.jpeg" alt=""> -->

            <a class="site-title" href="{{ url('/') }}">
              {{ __("MaqaList")}} <span>{{ __("beta") }}</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- Start LEFT nav ONE -->
      <div class="col-sm-12 col-md-4">
        <ul class="">
          <li class="list_home_top text-center">
            <?php $user_id_name = auth()->user(); ?>
              <a id="navbarDropdown" class="nav-link" href="{{ action('AuthorsController@show', array($user_id_name->id, $user_id_name->name)) }}">
                {{ __("Welcome") }} , {{ Auth::user()->name }}
                <span class="caret"></span>
              </a>
                </li>
        </ul>
      </div>
      <!-- Start RIGHT nav ONE -->
      <!-- <div class="col-sm-12 col-md-3">
        <ul class="">
                <li class="list_home_top nav-item">

                  @if (auth()->user()->Avatar)
                      <img src="{{ asset(auth()->user()->Avatar) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                  @endif
          </li>
        </ul>
      </div> -->
      <!-- Start RIGHT nav ONE -->
      <div class="col-sm-12 col-md-4">
        <ul class="">
        <li>

              <a id="navbarDropdown" class="nav-link" href="{{ action('PostController@add')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>

                    {{ __('Add Post') }}
                    <span class="caret"></span>

                  </a>
                </li>
        </ul>
      </div>
    </nav>
    <!-- Start nav two  -->
    <!-- header start -->
       <div class="header-classic">

           <!-- navigation start -->
               <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       <nav class="navbar navbar-expand-lg navbar-classic">
                           <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                               <span class="icon-bar top-bar mt-0"></span>
                               <span class="icon-bar middle-bar"></span>
                               <span class="icon-bar bottom-bar"></span>
                           </button>

                           <?php $categories = DB::table('categories')->get();
                           foreach ($categories->slice(0,5) as $category) { ?>

                           <div class="collapse navbar-collapse" id="navbar-classic">
                               <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                                   <li class="nav-item dropdown mega-dropdown">

                                     <a href="{{ action('CategoryController@show', array($category->id, $category->slug )) }}" class="nav-link dropdown-toggle" href="" id="menu-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <span class="caret"></span>
                                       {{ $category->name}}
                                     </a>


                                    <?php


                                     $sub_categories = DB::table('sub_categories')->where('sub_categories.cat_id', $category->id)->get();
                                      ?>


                                       <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="menu-4">
                                         <li>
                                           <a class="dropdown-item prod_a" href="{{ action('CategoryController@show', array($category->id, $category->slug )) }}">
                                             {{ __("Main Section") }} - {{ $category->name }}
                                           </a>
                                         </li>
                                           <li class="row">

                                              <?php foreach ($sub_categories as $sub_category) {
                                                $posts = DB::table('posts')->where('posts.sub_category_id', $sub_category->id)->get(); ?>
                                               <ul class="col">

                                                   <li>
                                                     <a class="dropdown-item prod_a" href="{{ action('SubCategoryController@show', array($sub_category->id, $sub_category->slug )) }}">
                                                       {{ $sub_category->name}}
                                                     </a>
                                                   </li>
                                                   <li class="">
                                                       <?php foreach ($posts as $post) { ?>
                                                         <a class="dropdown-item prod_a nav_post_title" href="{{ action('SubCategoryController@show', array($sub_category->id, $sub_category->slug )) }}">

                                                         {{ \Illuminate\Support\Str::limit($post->title, 40, $end='..') }}

                                                       </a>
                                                       <div>
                                                         <img class="nav_post_image" src="{{ $post->image }}">
                                                       </div>
                                                     <?php }   ?>
                                                   </li>
                                               </ul>
                                             <?php } ?>
                                           </li>
                                       </ul>
                                   </li>
                               </ul>

                           </div>
                         <?php } ?>
                       </nav>
                   </div>
               </div>
           <!-- navigation close -->
       </div>
       <!-- header close -->

      @else
      <nav class="hold_top_nav">
        <div class="top_nav">
          <ul class="row">
            @php $locale = session()->get('locale'); @endphp
            <li class="col-md-3 nav-item dropdown list_home_top">
              <a id="navbarDropdown" class="nav-link dropdown-toggle left_m" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  @switch($locale)
                      @case('en')
                      {{ __('English')}}
                      @break
                      @default
                      {{ __('Arabic')}}
                  @endswitch
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/lang/ar') }}">{{ __('Arabic')}}</a>
                  <a class="dropdown-item" href="{{ url('/lang/en') }}">{{ __('English')}}</a>
              </div>
            </li>
            <li class="col-md-3 nav-item list_home_top">
              <a class="nav-link" href="/login">
                <i class="fas fa-sign-in-alt fa-2x" aria-hidden="true"></i>
                {{ __("Log In") }}
              </a>
            </li>
            <li class="col-md-3 nav-item list_home_top">
              <a class="nav-link" href="/register">
                <i class="fas fa-user-plus fa-2x" aria-hidden="true"></i>
                {{ __("Register") }}
              </a>
            </li>
          </ul>
        </div>
      </nav>
  <nav class="row col-sm-12 navbar log_nav">
    <!-- <div class="col-sm-12">
      <img width="300" src="{{ url('adv.jpg') }}" alt="">
    </div> -->

    <!-- Start LEFT nav ONE -->
    <div class="col-sm-12 col-md-3">
      <ul class="row">
        <li class="list_home_top">
          <!-- <img width="50" src="{{ url('/') }}/uploads/logo.jpeg" alt=""> -->

          <a class="site-title" href="{{ url('/') }}">
            {{ __("MaqaList")}} <span>{{ __("beta") }}</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- Start LEFT nav ONE -->
    <div class="col-sm-12 col-md-6">
          <a class="encyc" href="{{ action('EncyclopediaController@index') }}">
            {{ __("Encyclopedia")}}
          </a>
    </div>
    <!-- Start RIGHT nav ONE -->
    <div class="col-sm-12 col-md-3">
      <form class="">
        <fieldset class="form-group">
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ __('Write and hit Enter') }}">
        </fieldset>
      </form>
    </div>
  </nav>
  <!-- Start nav two  -->
  <!-- header start -->
     <div class="header-classic">

         <!-- navigation start -->
             <div class="row">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <nav class="navbar navbar-expand-lg navbar-classic">
                         <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="icon-bar top-bar mt-0"></span>
                             <span class="icon-bar middle-bar"></span>
                             <span class="icon-bar bottom-bar"></span>
                         </button>

                         <?php $categories = DB::table('categories')->get();
                         foreach ($categories->slice(0,5) as $category) { ?>

                         <div class="collapse navbar-collapse" id="navbar-classic">
                             <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                                 <li class="nav-item dropdown mega-dropdown">

                                   <a href="{{ action('CategoryController@show', array($category->id, $category->slug )) }}" class="nav-link dropdown-toggle" href="" id="menu-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <span class="caret"></span>
                                     {{ $category->name}}
                                   </a>


                                  <?php


                                   $sub_categories = DB::table('sub_categories')->where('sub_categories.cat_id', $category->id)->get();
                                    ?>


                                     <ul class="dropdown-menu mega-dropdown-menu" aria-labelledby="menu-4">
                                       <li>
                                         <a class="dropdown-item prod_a" href="{{ action('CategoryController@show', array($category->id, $category->slug )) }}">
                                           {{ __("Main Section") }} - {{ $category->name }}
                                         </a>
                                       </li>
                                         <li class="row">

                                            <?php foreach ($sub_categories as $sub_category) {
                                              $posts = DB::table('posts')->where('posts.sub_category_id', $sub_category->id)->get(); ?>
                                             <ul class="col">

                                                 <li>
                                                   <a class="dropdown-item prod_a" href="{{ action('SubCategoryController@show', array($sub_category->id, $sub_category->slug )) }}">
                                                     {{ $sub_category->name}}
                                                   </a>
                                                 </li>
                                                 <li class="">
                                                     <?php foreach ($posts as $post) { ?>
                                                       <a class="dropdown-item prod_a nav_post_title" href="{{ action('SubCategoryController@show', array($sub_category->id, $sub_category->slug )) }}">

                                                       {{ \Illuminate\Support\Str::limit($post->title, 40, $end='..') }}

                                                     </a>
                                                     <div>
                                                       <img class="nav_post_image" src="{{ $post->image }}">
                                                     </div>
                                                   <?php }   ?>
                                                 </li>
                                             </ul>
                                           <?php } ?>
                                         </li>
                                     </ul>
                                 </li>
                             </ul>

                         </div>
                       <?php } ?>
                     </nav>
                 </div>
             </div>
         <!-- navigation close -->
     </div>
     <!-- header close -->
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
       <div class="col-sm-12 col-md-4">
         <img class="side_image" src="{{ $post->image }}" alt="">
       </div>
       <div class="col-sm-12 col-md-8 side_title">
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
          <div class="col-sm-12 col-md-4">
            <img class="side_image" src="{{ $latest->image }}" alt="">
          </div>
          <div class="col-sm-12 col-md-8 side_title">
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

@section('footer_content')
<!-- define Footer -->
  <footer class="hold_footer">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <!-- Start nav two  -->
        <div class="single_footer single_footer_address">
        <h4>{{ __("Categories") }}</h4>
          <ul class="row  hold_latest text-center">
            <?php $categories = DB::table('categories')->get();

            foreach ($categories->slice(0, 6) as $category) { ?>
              <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" href="{{ action('CategoryController@show', array($category->id, $category->slug )) }}">
                  {{ $category->name }}
                </a>
              </li>
            <?php } ?>
          </ul>

        </div>
      </div>
      <!--- END COL -->
      <div class="col-sm-12 col-md-4">
        <div class="single_footer single_footer_address">
          <h4>{{ __("Sub Categories") }}</h4>
          <ul class="row hold_latest text-center">
            <?php $sub_categories = DB::table('sub_categories')->get();

            foreach ($sub_categories->slice(0, 6) as $sub_category) { ?>
              <li class="col-sm-12 col-md-6 col-lg-6">
                <a class="prod_a" href="{{ action('SubCategoryController@show', array($sub_category->id, $sub_category->slug )) }}">
                  {{ $sub_category->name}}
                </a>
              </li>
            <?php } ?>
          </ul>
    </div>
    </div>
    <!--- END COL -->
    <div class="col-sm-12 col-md-4">
      <div class="single_footer single_footer_address text-center">
        <h4>{{ __('Subscribe') }}</h4>
        <ul class="row hold_latest text-center">

            <li class="col-sm-12 row">
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

    </div>


    <!--- END COL -->
  </div>
    <!--- END ROW -->
    <div class="row">
      <div class="col-sm-12 hold_copy">
        <p class="copyright">
          All Copyrights Reserved to ©
           <a href="#">Ragnar Lodbrok</a></p>
      </div>
      <!--- END COL -->
    </div>
    <!--- END ROW -->
  </footer>
@endsection


@section('footer')
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
