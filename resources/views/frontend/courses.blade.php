@extends('layouts.master')
@section('content')
@include('navbar')
@section('style')
    <style>
        .heddin{
            display: none !important;
        }
        </style>
@endsection
<div id="features" class="features section" >
    <div class="container">
      <h2 style="color:#33ccc5" class="p-3">المقررات الدراسية </h2>
      <div class="row">
        @if (session()->has('delete'))
            <div class="alert alert-warning">{{ session()->get('delete') }}</div>            
        @endif
        <div class="col-lg-12">
          <div class="features-content px-2">
            <div class="row">
              <div class="col-lg-12 m-3">
                <form action="{{ route('search_book') }}" class="w-50 m-auto"  method="get">
                  <div class="input-group mb-3">
                    <input type="text" id="inputString" style="width: 60%;border-radius: 0px 10px 10px 0px;" name="name_book" class="form-control" placeholder="البحث ......" aria-label="Text input with dropdown button">
                    {{-- <input type="submit" class="btn btn-outline-primary" style="width: 10%;border-radius: 10px 0px 0px 10px;" value="بحث"> --}}
                  </div>
                </form>
              </div>
              <ul class="list-group list-group-numbered row" id="ul" style="height:350px;overflow-y:scroll">
                @foreach ($data as $item)
                <div class="col-md-4">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <img style="width: 120px" src="/upload/course.jpg"><a href="{{route('lectures.index',$item->course_code)}}">
                        {{ $item->course_name }} - {{$item->course_code}}
                      </a>
                </li>
                </div>
                @endforeach  
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}
@section('script')
<script>
    jQuery("#inputString").keyup(function () {
    var filter = jQuery(this).val();
    console.log(jQuery("#ul li"));
    jQuery("#ul li").each(function () {
        if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
            jQuery(this).addClass('heddin');
        } else {
            jQuery(this).removeClass("heddin")
        }
    });
})
</script>
@endsection
<!-- Modal -->
@endsection