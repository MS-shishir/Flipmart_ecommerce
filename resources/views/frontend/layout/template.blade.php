<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.include.header')
    @include('frontend.include.css')
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
    @include('frontend.include.topbar')
    @include('frontend.include.navber')

  
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      @include('frontend.include.menu')
      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      @yield('body')
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
  </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.include.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
@include('frontend.include.script')
</body>
</html>