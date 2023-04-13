@extends('layouts.master')
@section('content')
@include('navbar')

<div id="features" class="features section" >
    <div class="container">
      <div class="row">
        @if (session()->has('add'))
        <div class="alert alert-warning">{{ session()->get('add') }}</div>            
        @endif
        <div class="col-lg-12">
          <div class="features-content px-2" style="overflow: hidden">
            <div class="row">
              <div class="col-lg-12 m-3">
                <form action="{{ route('user.search') }}" class="w-50 m-auto"  method="get">
                  
                  <div class="input-group mb-3">
                    <input type="text" style="width: 60%;border-radius: 0px 10px 10px 0px;" name="name" class="form-control" placeholder="البحث ......" aria-label="Text input with dropdown button">
                    <select name="status" class="form-control" style="width: 30%">
                        <option value="">اختر الحالة</option>
                        <option value="1">المفعلة</option>
                        <option value="0">الغير مفعلة</option>
                    </select>
                    <input type="submit" class="btn btn-outline-primary" style="width: 10%;border-radius: 10px 0px 0px 10px;" value="بحث">
                  </div>
                  
                </form>
              </div>
              <table class="table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th> الوظيفي/رقم القيد</th>
                        <th>الرقم الوطني</th>
                        <th>البريد الالكتروني</th>
                        <th>الصفة</th>
                        <th>الحالة</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->No_academic }}</td>
                        <td>{{$item->id_number}}</td>
                        <td>{{ $item->email }}</td>
                        <td>@if ($item->role == 1)
                            مسؤؤول المكتبة
                        @elseif($item->role == 2) 
                            مدرس
                        @elseif($item->role == 3)
                        طالب
                        @endif</td>
                        <td>
                            @if ($item->status == 1)
                                <a href="{{ route('user.active',$item->id) }}" class="btn btn-outline-danger">الغاء تفعيل</a>
                            @else 
                                <a href="{{ route('user.active',$item->id) }}" class="btn btn-outline-success">تفعيل</a>
                            @endif
                        </td>
                        <td>
                          <a href="{{ route("user.profile",$item->id) }}" class="btn btn-outline-primary btn-icon"><i class="fa fa-user"></i>profile</a>
                          <a href="" class="btn btn-outline-warning btn-icon"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 mt-3">
            {{ $users->withQueryString()->links() }}  
            </div>
      </div>
    </div>
  </div>
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