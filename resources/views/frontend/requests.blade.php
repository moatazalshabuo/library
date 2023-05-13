@extends('layouts.master')
@section('content')
@include('navbar')

<div id="features" class="card" >
    <div class="container">
      <div class="row">
        @if (session()->has('add'))
        <div class="alert alert-warning">{{ session()->get('add') }}</div>            
        @endif
        <div class="col-lg-12">
          <div class="card-body px-2" style="overflow: hidden">
            <div class="row">
              
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>عنوان الكتاب</th>
                        <th>المستخدم</th>
                        <th>الحالة</th>
                        @if (Auth::user()->role == 1)
                        <th>التحكم</th>
                        @endif
                        
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($request as $item)
                    <tr>
                        <td><a href="{{ $item->request_url }}">{{ $item->title}}</a></td>
                        <td>{{ $item->name }}</td>
                        <td>@if ($item->status == 0)
                            غير متتوفر
                        @elseif($item->status == 1) 
                            توفر
                        @endif</td>
                        @if (Auth::user()->role == 1)
                        <td>
                            @if ($item->status == 0)
                                <a href="{{ route('request.active',$item->id) }}" class="btn btn-outline-danger">تم التوفير</a>
                            @else 
                                <a href="{{ route('request.active',$item->id) }}" class="btn btn-outline-success">تراجع</a>
                            @endif
                        </td>
                        @endif
                        <td>
                          {{-- <a href="{{ route("user.profile",$item->id) }}" class="btn btn-outline-primary btn-icon"><i class="fa fa-user"></i>profile</a> --}}
                          <a href="{{ route('request.destroy',$item->id) }}" class="btn btn-outline-warning btn-icon"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
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