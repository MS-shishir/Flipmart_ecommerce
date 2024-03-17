<!DOCTYPE html>
<html lang="en">

<head>

  @include('backend.includes.header')
  @include('backend.includes.css')
<style>
   .fileuplode {
      height: calc(2.25rem + 2px);
      width: 100%;
      color: #6c757d;
      padding: 0px;
      background-clip: padding-box;
      border: 0.5px solid #ced4da;
      border-radius: 2px;
      font-size: 0.875rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .fileuplode:focus {
      border: 0.5px solid #006d2f;
    }
   ::-webkit-file-upload-button {
      border: none;
      outline: none;
      border-top-right-radius: 40px;
      border-bottom-right-radius: 40px;
      background-color: #6c757d;
      padding-left: 15px;
      padding-right: 15px;
      margin-right: 10px;
      cursor: pointer;
      height: 100%;
      color: white;
    }
</style>

</head>

<body>

  @include('backend.includes.menu')
  @include('backend.includes.topbar')
  @include('backend.includes.rightsidebar')


  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">

   @yield('body')
   
  </div><!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  @include('backend.includes.script')
</body>

</html>