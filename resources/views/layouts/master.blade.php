<html lang="ar" dir="rtl">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    
    <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <!-- Additional CSS Files -->
    {{-- <link rel="stylesheet" href="{{URL::asset('assets/css/bulma-rtl.min.css')}}"> --}}
    <link rel="stylesheet" href="{{URL::asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/templatemo-seo-dream.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/owl.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->
@yield('style')
<style>
@import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
 *{
  font-family: 'Droid Arabic Kufi', serif;
}
  .dropdown-item{
    color: #33ccc5 !important;
    text-align: right !important;
    width: 100%;
  } 
  .dropdown hr{
    background-color: #33ccc5 !important;
    margin: 0px;
  }

   .dropdown-item:hover{
    background-color: #33ccc5 !important;
    color: #fff !important;
  }
  .header-area .main-nav .nav li a{
    font-size: 12px;
  }
  .header-area .main-nav .logo h4{
    font-size: 25px
  }
</style>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader loaded">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
<div style="margin-top:80px"></div>
@yield('content')
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2021 SEO Dream Co., Ltd. All Rights Reserved. 
          
          <br>Web Designed by <a rel="nofollow" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/owl-carousel.js')}}"></script>
  {{-- <script src="{{URL::asset('assets/js/animation.js')}}"></script> --}}
  <script src="{{URL::asset('assets/js/imagesloaded.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  {{-- bootstrap.min --}}
  @yield('script')
  <script>
 	
		Filevalidation = () => {
			const fi = document.getElementById('file');
			// Check if any file is selected.
			if (fi.files.length > 0) {
				for (const i = 0; i <= fi.files.length - 1; i++) {
		
					const fsize = fi.files.item(i).size;
					const file = Math.round((fsize / 1024));
					// The size of the file.
					if (file >= 4096) {
						alert(
						"File too Big, please select a file less than 4mb");
					} else if (file < 2048) {
						alert(
						"File too small, please select a file greater than 2mb");
					} else {
						document.getElementById('size').innerHTML = '<b>'
						+ file + '</b> KB';
					}
				}
			}
		}

    $(function(){
      $("select").select2()
    })
    </script>
</body>
</html>