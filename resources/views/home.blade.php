@extends('layouts.master')

@section('content')
@include('navbar')
<div class="main-banner wow fadeIn animated" style="margin-top: -80px" id="top" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 align-self-center">
              <div class="left-content header-text wow fadeInLeft animated" data-wow-duration="1s" data-wow-delay="1s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;">
                <div class="row">
                    <div class="col-lg-3">
                        <a href={{ route('book.index') }}><div class="skill-item wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <div class="progress" data-percentage="100">
                          <span class="progress-left">
                            <span class="progress-bar"></span>
                          </span>
                          <span class="progress-right">
                            <span class="progress-bar"></span>
                          </span>
                          <div class="progress-value">
                            <div style="font-size:15px">
                              
                              الكتب
                            </div>

                          </div>
                        </div>
                    </a>
                      </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{ route("Scie") }}"><div class="skill-item wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.4s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                        <div class="progress" data-percentage="100">
                          <span class="progress-left">
                            <span class="progress-bar"></span>
                          </span>
                          <span class="progress-right">
                            <span class="progress-bar"></span>
                          </span>
                          <div class="progress-value">
                            <div style="font-size:15px">
                              
                              المجلات العلمية
                            </div>
                          </div>
                        </div>
                    </a>
                      </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{ route("indexPeper") }}"><div class="skill-item last-skill-item wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                        <div class="progress" data-percentage="100">
                          <span class="progress-left">
                            <span class="progress-bar"></span>
                          </span>
                          <span class="progress-right">
                            <span class="progress-bar"></span>
                          </span>
                          <div class="progress-value">
                            <div style="font-size:15px">
                             
                              الورقات العلمية
                            </div>
                          </div>
                        </div>
                    </a>
                      </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{ route('departs.show') }}">
                            <div class="skill-item wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;">
                          <div class="progress" data-percentage="100">
                            <span class="progress-left">
                              <span class="progress-bar"></span>
                            </span>
                            <span class="progress-right">
                              <span class="progress-bar"></span>
                            </span>
                            <div class="progress-value">
                              <div style="font-size:15px">
                               
                                المحاضرات الدراسية
                              </div>
                            </div>
                          </div>
                        </div>
                    </a>
                      </div>
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
