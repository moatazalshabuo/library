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
            <form id="contact" action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-8">
                    <div class="col-lg-12 ">
                        <div class="section-heading">
                          <h6>اضافة كتاب </h6>
                          <h2>اضافة كتب الى <em>النظام</em> </h2>
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
                              
                              <input type="name" name="book_name" id="name" value="{{ old('book_name') }}" placeholder="اسم الكتاب" autocomplete="on" required="">
                            </fieldset>
                            @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>اسم الكاتب</label>
                            <fieldset>
                              
                              <input type="text" name="autor_name" id="surname" value="{{ old('autor_name') }}" placeholder="اسم المؤلف" autocomplete="on" required="">
                            </fieldset>
                            @error('autor_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> دار النشر </label>
                            <fieldset>
                              <input type="text" name="pulblishing_house" id="email" value="{{ old('pulblishing_house') }}"  placeholder="دار النشر" required="">
                            </fieldset>
                            @error('pulblishing_house')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-lg-6">
                            <label>سنة النشر</label>
                            <fieldset>
                              <input type="number" min="1900" max="2099" step="1" name="year_pu" value="{{ old('year_pu') }}" placeholder="سنة النشر" autocomplete="on">
                            </fieldset>
                            @error('year_pu')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                          </div>
                          <div class="col-lg-6">
                            <label> رقم الكتاب الدولي</label>
                            <fieldset>                    
                                  <input type="number" name="isbn" value="{{ old('isbn') }}" placeholder="رقم الكتاب الدولي" autocomplete="on">
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
                                        <option  @if (old('catogry') == $item->id)
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
                                <input type="number" name="copy" value="{{ old('copy') }}" placeholder=" طبعة الكتاب " autocomplete="on">
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
                                <input type="file"  name="image_book">
                            </fieldset>
                            @error('image_book')
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
                <div class="col-lg-4">
                  <div class="contact-info">
                    <div class="card border-0">
                        <h4 class="card-header">الاقسام</h4>
                        <div class="card-body" style="max-height: 250px;overflow-y:scroll">
                            @if (session()->has('add-cat'))
                                <div class="alert alert-success">{{ session()->get('add-cat'); }}</div> 
                            @endif
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <table class="table table-striped">
                                
                                <tbody>
                                    @foreach ($catogry as $item)
                                    <tr>
                                        <td>{{ $item->cat_name }}</td>
                                        <td ><a class="btn btn-danger btn-icon" id="{{$item->id}}"><i class="fa fa-trash"></i></a></td>        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#input_cat">اضافة قسم</button>
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