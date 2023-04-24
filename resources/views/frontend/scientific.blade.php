@extends('layouts.master')
@section('content')
@include('navbar')

<div id="features" class="features section">
    <div class="container">
      <div class="row">
        @if (session()->has('delete'))
        <div class="alert alert-warning">{{ session()->get('delete') }}</div>            
        @endif
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <div class="col-lg-12 m-3">
                <form action="{{ route("searchscie") }}" class="w-50 m-auto"  method="get">
                  
                  <div class="input-group mb-3">
                    <input type="text" style="width: 60%;border-radius: 0px 10px 10px 0px;" name="scientific_name" class="form-control" placeholder="البحث ......" aria-label="Text input with dropdown button">
                    <input type="submit" class="btn btn-outline-primary" style="width: 10%;border-radius: 10px 0px 0px 10px;" value="بحث">
                  </div>
                  
                </form>
              </div>
                @foreach ($scientific as $item)
                    <div class="col-lg-3">
                        <div class="features-item first-feature wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;">
                              
                              <div class="first-number number">
                                </div>
                                {{-- <div class="icon"></div><embed src="/upload/book/{{$item->file}}" width="80px" height="210px" /> --}}
                                <img style="width:150px;height:150px;border-radius: 10px;" class="img" src="/upload/book/img/images.jpg">
                                    <h4 class="mt-2">{{ $item->scientific_name }}</h4>
                                {{-- <div class="line-dec"></div> --}}
                                
                                    <p><span> اسماء الباحثين : {{ $item->name_reserch }}</span>
                                       <br><span>موقع النشر : {{ $item->scientific_place }}</span>/
                                      <span> الرقم الدولي : {{ $item->issn }} </span>
                                    </p>
                                    <p></p>
                                    <p> </p>
                                
                                <div class="d-flex justify-content-center mt-1">
                                  <a class="btn btn-primary btn-icon m-1 text-white" href="/upload/scienthfc/{{$item->file}}"><i class="fa fa-download"></i></a>                                        
                                    @if (Auth::user()->role == 1)
                                    {{-- <button class="btn btn-info btn-icon m-1 text-white hide-book" ><i class="fa fa-eye-slash"></i></button> --}}
                                    <a href="{{ route('deletescie',$item->id) }}" class="btn btn-danger btn-icon m-1 text-white"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-warning btn-icon m-1 text-white" href="{{ route('editscie',$item) }}"><i class="fa fa-edit"></i></a>
                                    @endif
                                </div>
                                {{-- <button cl></button> --}}
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
        
        <div class="col-lg-12 col-md-12 mt-3">
        {{ $scientific->withQueryString()->links() }}  
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