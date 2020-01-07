@yield('header')
  @yield('navbar')
    <div class="row">
      <div class="col-sm-12 col-md-8 row mobile_m">
        <div class="col-sm-12">
          @yield('posts_show_content')
        </div>
        <div class="col-sm-12 row m-auto reset_padding">
          <div class="col-sm-1 col-sm-offset-1"></div>
          <div class="col-sm-10 reset_padding">
            @yield('show_comments')
          </div>
          <div class="col-sm-1 col-sm-offset-1"></div>
          <div class="col-sm-12 reset_padding">
            @yield('form')
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4 reset_padding">
        @yield('sidebar')
      </div>
  </div>
@yield('footer_content')
@yield('footer')
