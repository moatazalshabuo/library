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
        <div class="card-header">
            <h3 class="card-title">الكتب المحمله</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>#</th>
                    <th>اسم الكتاب</th>
                    <th>تاريخ التحميل</th>
                    <th>الحاله </th>
                    <th>تحكم</th>
                </thead>
                <tbody>
                    @foreach ($books as $key => $item)
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>@if ($item->status == 0)
                            <span class="bg-warning">لم تتم المراجعه</span>
                            @elseif($item->status == 1)
                            <span class="bg-info"> تتم ارسال المراجعه في انتظار الموافقة</span>
                            @else
                            <span class="bg-success">بنجاح تتم المراجعه</span>
                        @endif</td>
                        <td>
                        <button class="btn btn-primary revewclick" id="{{$item->id}}">تقديم مراجعة</button>
                        <a href="/upload/book/pdf/{{$item->url}}" class="btn btn-outline-primary">تحميل</a>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-danger" id="error"></div>
        <form id="form-revew">
            @csrf
            <div class="form-group">
                <label for="customRange2" class="form-label">تقييم من 5</label>
                <input type="range" class="form-range" name="revew" min="0" max="5" step="0.5" id="customRange2">
                <span id="rengetext"></span>
            </div>
            <div class="form-group">
                <input type="hidden" id="id_revew" name="id_revew">
                <label for="customRange2" class="form-label">ملخص الكتاب</label>
                <textarea name="descripe" class="form-control"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saverevew">Save changes</button>
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
                axios.get("{{ route('revew.check','') }}/"+$(this).attr('id')).then((res)=>{
                    $("#id_revew").val($(this).attr('id'))
                    $("#revewmodal").modal("show")
                }).catch((res)=>{

                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'تم تقديم المراجعة لهذا الكتاب ',
                        })
                })
            })

            $("#customRange2").change(function(){
                $("#rengetext").text($(this).val())
                if($(this).val() > 2.5){
                    $("#rengetext").removeClass("text-danger")
                    $("#rengetext").addClass("text-success")
                }else{
                    $("#rengetext").addClass("text-danger")
                    $("#rengetext").removeClass("text-success")
                }
            })
            $("#saverevew").click(function(){
                $("#error").text("")
                axios.post("{{ route('add.revew') }}",$("#form-revew").serialize()).then((res)=>{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'تم تقديم المراجعة لهذا الكتاب ',
                        }).then(()=>{
                            location.reload()
                        })
                }).catch((res)=>{
                    // console.log(res);
                    var error = res.response.data.errors;
                    var rev = (error.revew != undefined)?error.revew:"";
                    var dec = (error.descripe != undefined)?error.descripe:"";
                    $("#error").html(`${rev} <br> ${des}`)
                })
            });
        })
    </script>
@endsection
