<?php /*
=====================================================
--- Dashboard Index Template
-- sections based in:

_ [admin/dashboard/childs/index-child.blade.php]
_ [admin.adminComponents.blade.php]
=====================================================
*/ ?>
@yield('admin_header')
  @yield('admin_navbar')
    <div class="row">
      <div class="col-sm-12 col-md-4">
        @yield('admin_sidebar')
      </div>
      <div class="col-sm-12 col-md-8">
        @yield('dashboard_content')
      </div>
  </div>
@yield('admin_footer_content')
@yield('admin_footer')
