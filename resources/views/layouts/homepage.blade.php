@yield('header')
  @yield('navbar')
    <div class="row">
      <div class="col-sm-12 col-md-8">
        @yield('timeline')
      </div>
      <div class="col-sm-12 col-md-4">
        @yield('sidebar')
      </div>
    </div>
  @yield('footer_content')
@yield('footer')
