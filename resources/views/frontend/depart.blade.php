@extends('layouts.master')
@section('content')
@include('navbar')

<div id="features" class="features section">
    <div class="container">
      <h2 style="color:#33ccc5" class="p-3">الاقسام  </h2>
      <div class="row">
        @if (session()->has('delete'))
        <div class="alert alert-warning">{{ session()->get('delete') }}</div>            
        @endif
        <div class="col-lg-12">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-lg-4">
                        <div class="service-item wow bounceInUp animated" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                          <div class="row">
                            <div class="col-lg-4">
                              {{-- <div class="icon"> --}}
                                <img src="/upload/portrait-default.png" alt="">
                              
                            </div>
                            <div class="col-lg-8">
                              <div class="right-content">
                                <h4>{{$item->depart_name}}</h4>
                                <a href="{{ route("course.show",$item->id) }}">عرض المقرارات</a>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </div>
              </div>
        </div>
        
        <div class="col-lg-12 col-md-12 mt-3">
        {{ $data->withQueryString()->links() }}  
        </div>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
@endsection