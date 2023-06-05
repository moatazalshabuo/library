
  <!-- ***** Header Area Start ***** -->
  <header dir="rtl" class="header-area header-sticky wow slideInDown animated" data-wow-duration="0.75s" data-wow-delay="0s" style="visibility: visible;-webkit-animation-duration: 0.75s; -moz-animation-duration: 0.75s; animation-duration: 0.75s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ route('home') }}" class="logo">

              <h4>المكتبة الالكترونية <img src="{{URL::asset('assets/images/logo-icon.png')}}" alt=""></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              @if (Auth::user()->role == 3)
              <li class="scroll-to-section"><a href="{{ route('home') }}" class="active">الرئيسية</a></li>
              <li class="scroll-to-section"><a href="{{ route('book.index') }}">الكتب</a></li>
              <li class="scroll-to-section"><a href="{{ route("indexPeper") }}">الاوراق العلمية</a></li>
              <li class="scroll-to-section"><a href="{{ route("Scie") }}">المجلات العلمية</a></li>
              <li class="scroll-to-section"><a href="{{ route('departs.show') }}">المقررات الدراسية</a></li>
              @endif

              @if (Auth::user()->role == 2)
              <li class="scroll-to-section"><a href="{{ route('home') }}" class="active">الرئيسية</a></li>
              <li class="scroll-to-section"><a href="{{ route('book.index') }}">الكتب</a></li>
              <li class="scroll-to-section"><a href="{{ route("Scie") }}">المجلات العلمية</a></li>
              <li class="scroll-to-section">
                <div class="dropdown">
                  <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    الاورق العلمية
                  </a>

                  <ul class="dropdown-menu text-black">
                    <a class="dropdown-item" href="{{route('add_pepertech')}}"> اضافة ورقة علمية</a>
                    <hr>
                    <a class="dropdown-item" href="{{ route('indexPepertech') }}">ادارة اوراق العلمية</a>
                  </ul>
                </div>
              </li>
              <li class="scroll-to-section"><a href="{{ route('departs.show') }}">المقررات الدراسية</a></li>
              @endif
              @if (Auth::user()->role == 1)
              <li class="scroll-to-section"><a href="{{ route('home') }}" class="">الرئيسية</a></li>

              <li class="scroll-to-section">
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    الكتب
                  </a>

                  <ul class="dropdown-menu ">
                    <a class="dropdown-item text-dark" href="{{route('book.create')}}">اضافة</a>
                    <hr>
                    <a class="dropdown-item" href="{{ route('book.index') }}"> الكتب</a>
                  </ul>
                </div>
              </li>
              <li class="scroll-to-section">
                <div class="dropdown">
                  <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    المجلات العلمية
                  </a>

                  <ul class="dropdown-menu text-black">
                    <a class="dropdown-item" href="{{ route('addScie') }}">اضافة</a>
                    <hr>
                    <a class="dropdown-item" href="{{ route("Scie") }}"> المجلات العلمية</a>
                  </ul>
                </div>
              </li>
              <li class="scroll-to-section">
                <div class="dropdown">
                  <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  الرسائل العلمية
                  </a>

                  <ul class="dropdown-menu text-black">
                    <a class="dropdown-item" href="{{ route('add_peper') }}">اضافة رسالة علمية</a>
                    <hr>
                    <a class="dropdown-item" href="{{ route("indexPeper") }}">الرسائل العلمية </a>
                    <a class="dropdown-item" href="{{ route("indexPeper",1) }}"> الرسائل العلميةالغير مفعلة </a>
                  </ul>
                </div>
                </li>
                <li class="scroll-to-section">
                <div class="dropdown">
                  <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  المقررات الدراسية
                  </a>

                  <ul class="dropdown-menu text-black">
                    <a class="dropdown-item" href="{{ route("depart.index") }}">الاقسام العلمية</a>
                    <a class="dropdown-item" href="{{ route("course_index") }}">المقررات الدراسية</a>
                    <a class="dropdown-item" href="{{ route("lectures.create") }}">اضافة محاضرة</a>
                    <hr>
                    <a class="dropdown-item" href="{{ route('departs.show') }}">المحاضرات</a>
                  </ul>
                </div>
                </li>

              @endif
              @auth


                {{-- <li class="scroll-to-section"><a href="">Change password</a></li>  --}}
                {{-- <li class="scroll-to-section"><div class="main-blue-button"><a href="">logout</a></div></li>     --}}
                <li class="scroll-to-section">
                  <div class="dropdown">
                    <a class=" dropdown-toggle btn btn-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu text-black">
                      <a class="dropdown-item" href="{{ route('user.profile',Auth::id()) }}">البيانات الشخصية</a>
                      <a class="dropdown-item" href="{{ route("request.index") }}">الكتب المطلوبة</a>
                      @if (Auth::user()->role == 1)
                    <a class="dropdown-item" href="{{ route("user.indexr") }}">المستخدمين</a>
                    <a class="dropdown-item" href="{{ route("revewadmin.book") }}">المراجعات</a>
                    <a class="dropdown-item" href="{{ route("user.creater") }}">اضافة مستخدم</a>
                    @else
                    <a class="dropdown-item" >عدد النقاط {{Auth::user()->point}}</a>
                    @endif
                    <hr>
                      <a class="dropdown-item" href="{{ route('logout') }}">تسجيل الخروج</a>
                    </ul>
                  </div>
                  </li>
                @endauth
              </ul>
            <a class="menu-trigger">
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
