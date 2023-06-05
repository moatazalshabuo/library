@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<style>

    th ,td{
        font-size: 14px;
        text-align: right
    }
</style>
@endsection
@section('content')
    @include('navbar')
  <div class="container" style="margin-top: 170px !important">
    <div class="card">
        @if (session()->has('mssg'))
        <div class="alert alert-warning">{{ session()->get('mssg') }}</div>
        @endif
        <div class="card-header">
            <h3 class="card-title">الكتب المحمله</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>#</th>
                    <th>اسم الكتاب</th>
                    <th>تاريخ التحميل</th>
                    <th>المستخدم </th>
                    <th>تحكم</th>
                </thead>
                <tbody>
                    @foreach ($books as $key => $item)
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->user_name }}</td>
                        <td>
                        <button class="btn btn-primary revewclick"
                        data-name="{{ $item->name }}"
                        data-revew="{{ $item->revew }}"
                        data-descripe="{{ $item->descripe }}"
                        data-id="{{ $item->id }}"
                        >عرض مراجعة</button>

                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <div class="modal fade" id="revewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="text-center">
            <h3 id="title"></h3>
            <small id="revew"></small>
        </div>
        <div id="descripe">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">الغاء</button>
        <a href="" type="button" class="btn btn-primary" id="accept">الموافقة</a>
        <a href="" type="button" class="btn btn-danger" id="cancel">الرفض</a>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
        $(function(){
            $(".revewclick").click(function(){
                $("#title").text($(this).data('name'))
                $("#revew").text($(this).data('revew') + "/5")
                $("#descripe").text($(this).data('descripe'))
                $("#revewmodal").modal("show")
                $("#accept").attr("href",`/books/revew-admin/accept/${$(this).data('id')}`)
                $("#cancel").attr("href",`/books/revew-admin/unaccept/${$(this).data('id')}`)
            })

            $(".close").click(function(){
                $('#revewmodal').modal("hide");
            })
        })
    </script>
@endsection
