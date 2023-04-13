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
            <form id="contact" action="{{ route('course_store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-5">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>اضافة مقرر دراسي </h6>
                        </div>
                      </div>
                      @if (session()->has('add'))
                          <div class="alert alert-success">{{ session()->get('add'); }}</div> 
                      @endif
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>اسم المقرر</label>
                            <fieldset>
                              
                              <input type="name" name="course_name" id="name" value="{{ old('course_name') }}" placeholder="اسم المقرر" autocomplete="on" required="">
                            </fieldset>
                            @error('depart_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>رمز المقرر</label>
                            <fieldset>
                              
                              <input type="text" name="course_code" id="surname" value="{{ old('course_code') }}" placeholder="رمز المقرر" autocomplete="on" required="">
                            </fieldset>
                            @error('course_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>اختر القسم</label>
                            <fieldset>
                              <select name="depart" class="form-control">
                                @foreach ($depart as $item)
                                    <option value="{{ $item->id }}">{{$item->depart_name}}</option>
                                @endforeach
                              </select>
                            </fieldset>
                            @error('course_code')
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
                        <h4 class="card-header">المقررات</h4>
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
                            <table classc="table">
                                <thead>
                                  <tr>
                                    <th>اسم المقرر</th>
                                    
                                    <th>رمز المقرر</th>
                                    <th>اسم القسم</th>
                                    <th>تحكم</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($course as $item)
                                    <tr>
                                        <td>{{ $item->course_name }}</td>
                                        <td>{{ $item->course_code }}</td>
                                        <td>{{ $item->depart_name }}</td>
                                        <td ><a class="btn btn-danger btn-icon" href="{{route("course_delete",$item->id)}}"><i class="fa fa-trash"></i></a></td>        
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