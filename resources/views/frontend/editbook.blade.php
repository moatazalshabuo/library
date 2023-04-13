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
            <form id="contact" action="{{ route('book.update',$data->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PATCH') }}
              <div class="row">
                <div class="col-lg-8">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>تعديل كتاب </h6>
                          <h2>تعديل<em> {{ $data->book_name }}</em> </h2>
                        </div>
                      </div>
                      @if (session()->has('add'))
                          <div class="alert alert-success">{{ session()->get('add'); }}</div> 
                      @endif
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label>اسم الكتاب</label>
                            <fieldset>
                              
                              <input type="name" name="book_name" id="name" value="{{ old('book_name',$data->book_name) }}" placeholder="اسم الكتاب" autocomplete="on" required="">
                            </fieldset>
                            @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>اسم الكاتب</label>
                            <fieldset>
                              
                              <input type="text" name="autor_name" id="surname" value="{{ old('autor_name',$data->autor_name) }}" placeholder="اسم المؤلف" autocomplete="on" required="">
                            </fieldset>
                            @error('autor_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> دار النشر </label>
                            <fieldset>
                              <input type="text" name="pulblishing_house" id="email" value="{{ old('pulblishing_house',$data->publishing_house) }}"  placeholder="دار النشر" required="">
                            </fieldset>
                            @error('pulblishing_house')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>سنة النشر</label>
                            <fieldset>
                              <input type="number" min="1900" max="2099" step="1" name="year_pu" value="{{ old('year_pu',$data->yaer) }}" placeholder="سنة النشر" autocomplete="on">
                            </fieldset>
                            @error('year_pu')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> رقم الكتاب الدولي</label>
                            <fieldset>                    
                                  <input type="number" name="isbn" value="{{ old('isbn',$data->isbn) }}" placeholder="رقم الكتاب الدولي" autocomplete="on">
                                </fieldset>
                                @error('isbn')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>فئة الكتاب</label>
                            <fieldset>
                                  <select class="form-control" name="catogry">
                                      <option value="">اختر فئة الكتاب</option>
                                      @foreach ($catogry as $item)
                                        <option  @if (old('catogry',$data->catogry) == $item->id)
                                            selected
                                        @endif  value="{{$item->id}}">{{ $item->cat_name }}</option>
                                      @endforeach
                                  </select>
                              </fieldset>
                              @error('catogry')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>طبعة الكتاب</label>
                            <fieldset>
                                <input type="number" name="copy" value="{{ old('copy',$data->copy) }}" placeholder=" طبعة الكتاب " autocomplete="on">
                              </fieldset>
                              @error('copy')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                        </div>
                          <div class="col-lg-6">
                            <label>ملف الكتاب</label>
                            <fieldset>
                                  <input type="file" name="file_up" >
                              </fieldset>
                              @error('file_up')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>صورة الغلاف</label>
                            <fieldset>
                                <input type="file" name="image_book">
                            </fieldset>
                            @error('image_book')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button ">تعديل الكتاب</button>
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

@endsection