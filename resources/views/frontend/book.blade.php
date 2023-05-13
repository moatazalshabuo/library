@extends('layouts.master')
@section('content')
    @include('navbar')

    <div id="features" class="features section">
        <div class="container">
            <h2 style="color:#33ccc5" class="p-3">الكتب </h2>
            <div class="row">
                @if (session()->has('delete'))
                    <div class="alert alert-warning">{{ session()->get('delete') }}</div>
                @endif
                <div class="col-lg-12">
                    <div class="features-content">
                        <div class="row">
                            <div class="col-lg-12 m-3">
                                <form action="{{ route('search_book') }}" class="w-50 m-auto" method="get">

                                    <div class="input-group mb-3">
                                        <input type="text" style="width: 60%;border-radius: 0px 10px 10px 0px;"
                                            name="name_book" class="form-control" placeholder="البحث ......"
                                            aria-label="Text input with dropdown button">
                                        <select class="form-control" name="catogry" style="width: 30%">
                                            <option value="">اختر الفئة</option>
                                            @foreach ($catogry as $item)
                                                <option @if (old('catogry') == $item->id) selected @endif
                                                    value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="submit" class="btn btn-outline-primary"
                                            style="width: 10%;border-radius: 10px 0px 0px 10px;" value="بحث">
                                    </div>

                                </form>
                            </div>
                            @foreach ($book as $item)
                                <div class="col-lg-3">
                                    <div class="features-item first-feature wow fadeInUp animated" data-wow-duration="1s"
                                        data-wow-delay="0s"
                                        style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;">

                                        <div class="first-number number">
                                        </div>
                                        {{-- <div class="icon"></div><embed src="/upload/book/{{$item->file}}" width="80px" height="210px" /> --}}
                                        <img style="width:150px;height:150px;border-radius: 10px;" class="img"
                                            src="@if ($item->image_book) /upload/book/img/{{ $item->image_book }}@else /upload/book/img/book.jpg @endif">
                                        <h4 class="mt-2">{{ $item->book_name }}</h4>
                                        {{-- <div class="line-dec"></div> --}}

                                        <p><span> اسم المؤلف : {{ $item->autor_name }}</span>
                                            <br><span>دار النشر : {{ $item->publishing_house }}</span>/
                                            <span> سنة : {{ $item->yaer }} </span>
                                        </p>
                                        <p></p>
                                        <p> </p>

                                        <div class="d-flex justify-content-center mt-1">
                                            <button class="btn btn-primary btn-icon m-1 text-white " id="download"
                                               data-href="upload/book/pdf/{{ $item->file }}"
                                                ><i
                                                    class="fa fa-download"></i></button>
                                            @if (Auth::user()->role == 1)
                                                {{-- <button class="btn btn-info btn-icon m-1 text-white hide-book" ><i class="fa fa-eye-slash"></i></button> --}}
                                                <a href="{{ route('delete_book', $item->id) }}"
                                                    class="btn btn-danger btn-icon m-1 text-white"><i
                                                        class="fa fa-trash"></i></a>
                                                <a class="btn btn-warning btn-icon m-1 text-white"
                                                    href="{{ route('book.edit', $item) }}"><i class="fa fa-edit"></i></a>
                                            @endif
                                        </div>
                                        {{-- <button cl></button> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 mt-3">
                    {{ $book->withQueryString()->links() }}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-content" style="max-height: 350px;overflaw-y:scroll">
                        <div class="row" id="gogle">
                            <div class="col-lg-12 m-3">
                                <h3>نتيجة البحث من مواقع اخرى .....</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="min-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="" id="image" style="max-height: 300px;width:100%;">
                            <h3 id="title"></h3>
                            <p> عدد الصفحات : <span id="page-count"></span> </p>
                            <p> دار النشر : <span id="dar"></span> </p>
                            <p> سنة النشر : <span id="year"></span> </p>
                            <p> المؤلف : <span id="authr"></span> </p>
                        </div>
                        <div class="col-md-8">
                            <p id="descripe"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning req">طلب شراء الكتاب</button>
                </div>
            </div>
        </div>
    </div>
    @php
     $search = isset($_GET['name_book'])?$_GET['name_book']:"";
    @endphp
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(function() {
        
            
            var search = "{{$search}}"
            var data = []
            if (search != "" || search != undefined) {
                axios.get('https://www.googleapis.com/books/v1/volumes?q=' + search +
                        '&key=AIzaSyBn1K9APRJvsVhvjNzTaRwOtIhJYFbAezc')
                    .then(function(response) {
                        // handle success
                        data = response.data.items
                        html = ""
                        for (i = 0; i < data.length; i++) {
                            console.log(data[i].volumeInfo.imageLinks.smallThumbnail)

                            html += `<div class='col-lg-3'>
                        <div class='features-item first-feature wow fadeInUp animated' data-wow-duration='1s' data-wow-delay='0s' style='visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;'>
                              <div class='first-number number'>
                                </div>
                                <img style='width:150px;height:150px;border-radius: 10px;' class='img' src='` + data[i]
                                .volumeInfo.imageLinks.thumbnail + `'>
                                    <h4 class='mt-2'>` + data[i].volumeInfo.title.substr(0, 50) + `</h4>
                                    <p><span> اسم المؤلف :` + data[i].volumeInfo.authors + ` </span>
                                       <br><span>دار النشر : ` + data[i].volumeInfo.publisher + `</span>/
                                      <span> سنة : ` + data[i].volumeInfo.publishedDate +
                                ` </span>
                                    </p>
                                <button  class="btn btn-primary bo" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" id=` + i + `>عرض</button>
                        </div>
                    </div>`
                        }
                        // console.log(html)
                        $("#gogle").append(html)
                    })
                    .catch(function(error) {
                        // handle error
                        console.log(error);
                    });
            }
            $(document).on("click", ".bo", function() {
                id = $(this).attr('id')
                $("#image").attr("src", data[id].volumeInfo.imageLinks.thumbnail)
                $("#title").text(data[id].volumeInfo.title)
                $("#page-count").text(data[id].volumeInfo.pageCount)
                $("#dar").text(data[id].volumeInfo.publisher)
                $("#year").text(data[id].volumeInfo.publishedDate)
                $("#authr").text(data[id].volumeInfo.authors)
                $("#descripe").text(data[id].volumeInfo.description)
                console.log(data[id].volumeInfo.previewLink)
                $(".req").attr("data-url", data[id].volumeInfo.previewLink)
                $(".req").attr("data-title", data[id].volumeInfo.title)
            })

            $(".req").click(function() {
                $.ajax({
                    url: "{{ route('request.store') }}",
                    type: "post",
                    data: "_token={{ csrf_token() }}&url=" + $(this).data('url')+"&title="+$(this).data('title'),
                    success: function(res) {
                        if (res == 1) {
                            $("#exampleModalToggle").modal('hide')
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'تم ارسال الطلب بنجاح',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })
            })

            $("#download").click(function(){
                var url = $(this).data('href')
                axios.get("{{ route('point') }}").then(function(res){
                    
                    if(res.data == 1){
                        Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'تم ارسال الطلب بنجاح',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.open(url, "", "width=800,height=800");
                    }else{
                        Swal.fire({
                                position: 'top-end',
                                icon: 'warning',
                                title: 'عدد النقاط غير كافي',
                                showConfirmButton: false,
                                timer: 1500
                            }) 
                    }
                }).catch(function(res){

                });
            })
        })
    </script>
@endsection
