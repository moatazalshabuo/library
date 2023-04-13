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
            <form id="contact" action="{{ route('lectures.update',$data->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-8">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>تعديل محاضرة </h6>
                         
                        </div>
                      </div>
                      @if (session()->has('edit'))
                          <div class="alert alert-success">{{ session()->get('edit'); }}</div> 
                      @endif
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>بيان المحاضر</label>
                            <fieldset>
                              
                              <input type="name" name="descripe" id="name" value="{{ old('descripe',$data->descripe) }}" placeholder="المحاضرة رقم ...." autocomplete="on" required="">
                            </fieldset>
                            @error('descripe')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>المقرر</label>
                            <fieldset>
                              <select  name="course_id" class="form-control">
                                <option value="">اختر المادة</option>
                                @foreach ($courses as $item)
                                    <option @selected(old('course_id',$data->course_id) == $item->id) value="{{ $item->id }}">{{ $item->course_name }}</option>
                                @endforeach
                              </select>
                            </fieldset>
                            @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> المحاضر</label>
                            <fieldset>
                              <input type="text" name="tech" id="email" value="{{ old('tech',$data->tech) }}"  placeholder="المحاضر" required="">
                            </fieldset>
                            @error('tech')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>الفصل الدراسي</label>
                            <fieldset>
                              <select name="semester" class="form-control">
                                <option @selected(old('semester') == "الخريف") value="الخريف">الخريف</option>
                                <option @selected(old('semester') == "الشتاء") value="الشتاء">الشتاء</option>
                                <option @selected(old('semester') == "الربيع") value="الربيع">الربيع</option>
                                <option @selected(old('semester') == "الصيف") value="الصيف">الصيف</option>
                              </select>
                            </fieldset>
                            @error('semester')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> السنة</label>
                            <fieldset>                    
                                  <input type="number" name="year" min="1900" max="2100" value="{{ old('year',$data->year) }}" placeholder="السنة الدراسية" autocomplete="on">
                                </fieldset>
                                @error('year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <div class="col-lg-12">
                            <label>ملف </label>
                            <fieldset>
                                  <input type="file" name="file" >
                              </fieldset>
                              @error('file')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                         
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
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

  
  <!-- Modal -->
  <div class="modal fade" id="input_cat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">اضافة قسم</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('addcat') }}" method="POST">
        <div class="modal-body">
          <div class="form">
            @csrf
            <div class="form-group">
                <label>اسم الفئة</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection