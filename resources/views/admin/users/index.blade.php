<?php /*
=====================================================
--- Users Index Template
-- sections based in:

_ [admin/users/childs/index-child.blade.php]
_ [admin.adminComponents.blade.php]
=====================================================
*/ ?>
@yield('header')
  @yield('navbar')
    <div class="row">
      <div class="col-sm-12 col-md-4">
        @yield('admin_sidebar')
      </div>
      <div class="col-sm-12 col-md-8">
        @yield('content')
      </div>
  </div>
@yield('footer_content')
@yield('footer')
