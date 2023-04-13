@extends('layouts.master')

@section('style')
<style>
  label{
    text-align: right !important;
    color: #7a7a7a
  }
</style>
@endsection
@section('content')
@include('navbar')
<div class="container" style="margin-top:80px">

    <div class="row">
        <div class="col-lg-12" data-wow-duration="0.5s" data-wow-delay="0.25s" style="visibility: visible;-webkit-animation-duration: 0.5s; -moz-animation-duration: 0.5s; animation-duration: 0.5s;-webkit-animation-delay: 0.25s; -moz-animation-delay: 0.25s; animation-delay: 0.25s;">
            <form id="contact" action="{{ route('depart.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-5">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>اضافة قسم </h6>
                        </div>
                      </div>
                      @if (session()->has('add'))
                          <div class="alert alert-success">{{ session()->get('add'); }}</div> 
                      @endif
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>اسم القسم</label>
                            <fieldset>
                              
                              <input type="name" name="depart_name" id="name" value="{{ old('depart_name') }}" placeholder="اسم القسم" autocomplete="on" required="">
                            </fieldset>
                            @error('depart_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>رمز القسم</label>
                            <fieldset>
                              
                              <input type="text" name="depart_code" id="surname" value="{{ old('depart_code') }}" placeholder="رمز القسم" autocomplete="on" required="">
                            </fieldset>
                            @error('depart_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button "> حفظ</button>
                            </fieldset>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-7">
                  <div class="contact-info">
                    <div class="card border-0">
                        <h4 class="card-header">الاقسام</h4>
                        @if (session()->has('delete'))
                        <div class="alert alert-success">{{ session()->get('delete'); }}</div> 
                    @endif
                        <div class="card-body" style="max-height: 250px;overflow-y:scroll">
                            @if (session()->has('add-cat'))
                                <div class="alert alert-success">{{ session()->get('add-cat'); }}</div> 
                            @endif
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <table class="table ">
                                
                                <tbody>
                                    @foreach ($departs as $item)
                                    <tr>
                                        <td>{{ $item->depart_name }}</td>
                                        <td>{{ $item->depart_code }}</td>
                                        <td ><a class="btn btn-danger btn-icon" href="{{route("delete_depart",$item)}}"><i class="fa fa-trash"></i></a></td>        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
</div>

<!-- Button trigger modal -->
@endsection