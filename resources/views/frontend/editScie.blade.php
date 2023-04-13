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
            <form id="contact" action="{{ route('updatescie',$data['id']) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-8">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>تعديل مجلة </h6>
                        </div>
                      </div>
                      @if (session()->has('add'))
                          <div class="alert alert-success">{{ session()->get('add'); }}</div> 
                      @endif
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>اسم المجلة</label>
                            <fieldset>
                              
                              <input type="name" name="scientific_name" id="name" value="{{ old('scientific_name',$data['scientific_name']) }}" placeholder="اسم المجلة" autocomplete="on" required="">
                            </fieldset>
                            @error('scientific_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>رقم الخاص للمجلة</label>
                            <fieldset>
                              
                              <input type="text" name="id_sce" id="" value="{{ old('id_sce',$data['id_sce']) }}" placeholder="الرقم الخاص" autocomplete="on" required="">
                            </fieldset>
                            @error('id_sce')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> موقع  النشر </label>
                            <fieldset>
                              <input type="text" name="scientific_place" id="email" value="{{ old('scientific_place',$data['scientific_place']) }}"  placeholder="موقع النشر" required="">
                            </fieldset>
                            @error('scientific_place')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> أسماء الباحثين </label>
                            <fieldset>
                              <input type="text" name="name_reserch" id="email" value="{{ old('name_reserch',$data['name_reserch']) }}"  placeholder="اسماء الباحثين" required="">
                            </fieldset>
                            @error('name_reserch')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div> 
                          <div class="col-lg-6">
                            <label> رقم الكتاب الدولي</label>
                            <fieldset>                    
                                  <input type="number" name="issn" value="{{ old('issn',$data['issn']) }}" placeholder="رقم المجلة الدولي" autocomplete="on">
                                </fieldset>
                                @error('issn')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                         
                          <div class="col-lg-6">
                            <label>ملف الكتاب</label>
                            <fieldset>
                                  <input type="file" name="file" >
                              </fieldset>
                              @error('file')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button ">تعديل</button>
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