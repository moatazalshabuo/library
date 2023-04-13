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
            <form id="contact" action="{{ route('storePeper') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-8">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>اضافة رسالات علمية </h6>
                          <h2>اضافة رسالة علمية الى <em>النظام</em> </h2>
                        </div>
                      </div>
                      @if (session()->has('add'))
                          <div class="alert alert-success">{{ session()->get('add'); }}</div> 
                      @endif
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>اسم الرسالة العلمية</label>
                            <fieldset>
                              
                              <input type="name" name="peper_name" value="{{ old('peper_name') }}" placeholder="اسم الرسالة العلمية" autocomplete="on" required="">
                            </fieldset>
                            @error('peper_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>رقم الرسالة العلمية</label>
                            <fieldset>
                              
                              <input type="text" name="sp_id" value="{{ old('sp_id') }}" placeholder="الرقم الرسالة العلمية" autocomplete="on" required="">
                            </fieldset>
                            @error('sp_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>المجلة الالكترونية</label>
                            <fieldset>
                              <input type="text" name="emz" value="{{ old('emz') }}"  placeholder="المجلة الالكترونية" required="">
                            </fieldset>
                            @error('emz')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> اسم الباحث </label>
                            <fieldset>
                              <select class="form-control" name="name_reserch">
                                <option value="">اختر الباحث</option>
                                @if ($instruct)
                                    @foreach ($instruct as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                              </select>
                            </fieldset>
                            @error('name_reserch')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div> 
                          <div class="col-lg-6">
                            <label>سنة النشر</label>
                            <fieldset>                    
                                  <input type="number" name="year" min="1800" max="2100" value="{{ old('year') }}" placeholder=" سنة النشر" autocomplete="on">
                                </fieldset>
                                @error('year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                         
                          <div class="col-lg-6">
                            <label>ملف الورقة</label>
                              <fieldset>
                                  <input type="file" name="file" >
                              </fieldset>
                              @error('file')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button ">حفظ</button>
                            </fieldset>
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