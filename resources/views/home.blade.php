@extends('layouts.master')
@section('style')
<style>

img {
    width: 100%;
    height: auto;
}

.section-contact {
    width: 100%;
}

.section-contact h2 {
    text-align: center;
    color: #0072ce;
    margin-bottom: 20px;
}

.section-contact .contact-card {
    width: 80%;
    max-width: 500px;
    margin: 0 auto;
    background-color: #0072ce;
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.74);
    color: #fff;
    padding: 30px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.section-contact .contact-card .card-image {
    /* background-color: red; */
    margin-bottom: 20px;
}

.section-contact .contact-card .card-image .point {
    width: 200px;
    height: 200px;
  object-fit: cover;
  border-radius: 50%;
    border: 3px solid #fff;
}
.section-contact .contact-card .card-image .point h2{
    font-size: 110px;
    text-align: center;
    margin-top: 25px;

}
.section-contact .contact-card .card-image h2 {
    color: #fff;
    font-size: 30px;
    margin: 0;
    font-weight: 400;
}

.section-contact .contact-card .card-image h5 {
    text-transform: uppercase;
    color: #eeeeee;
}


/* ========= Card-text ============ */
.section-contact .contact-card .card-text p {
    font-size: 16px;
    margin-bottom: 10px;
    color: #eeeeee
}

.section-contact .contact-card .card-text .btn {
    display: inline-block;
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    padding: 15px 30px;
    border-radius: 5px;
    background-color: #eb367b;
    border: 2px solid transparent;
}

.section-contact .contact-card .card-text .btn:hover {
    background-color: #fff;
    color: #eb367b;
    border: 2px solid #eb367b;
}




@media screen and (min-width: 600px) {
    .section-contact .contact-card {
        flex-direction: row;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .section-contact .contact-card .card-image {
        margin-bottom: 0px;
        padding-right: 20px;
    }
}
</style>
@endsection
@section('content')
    @include('navbar')
    <div class="main-banner wow fadeIn animated" style="margin-top: -80px" id="top" data-wow-duration="1s"
        data-wow-delay="0.5s"
        style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
        <div class="container">
            <div class="row">
                @if (Auth::user()->role == 1)
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="left-content header-text wow fadeInLeft animated" data-wow-duration="1s"
                                    data-wow-delay="1s"
                                    style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 1s; -moz-animation-delay: 1s; animation-delay: 1s;">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <a href={{ route('book.index') }}>
                                                <div class="skill-item wow fadeIn animated" data-wow-duration="1s"
                                                    data-wow-delay="0.2s"
                                                    style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                                    <div class="progress" data-percentage="100">
                                                        <span class="progress-left">
                                                            <span class="progress-bar"></span>
                                                        </span>
                                                        <span class="progress-right">
                                                            <span class="progress-bar"></span>
                                                        </span>
                                                        <div class="progress-value">
                                                            <div style="font-size:15px">

                                                                الكتب
                                                            </div>

                                                        </div>
                                                    </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="{{ route('Scie') }}">
                                            <div class="skill-item wow fadeIn animated" data-wow-duration="1s"
                                                data-wow-delay="0.4s"
                                                style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                                                <div class="progress" data-percentage="100">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">
                                                        <div style="font-size:15px">

                                                            المجلات العلمية
                                                        </div>
                                                    </div>
                                                </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{ route('indexPeper') }}">
                                        <div class="skill-item last-skill-item wow fadeIn animated" data-wow-duration="1s"
                                            data-wow-delay="0.6s"
                                            style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                            <div class="progress" data-percentage="100">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">
                                                    <div style="font-size:15px">

                                                        الورقات العلمية
                                                    </div>
                                                </div>
                                            </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{ route('departs.show') }}">
                                    <div class="skill-item wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0s"
                                        style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0s; -moz-animation-delay: 0s; animation-delay: 0s;">
                                        <div class="progress" data-percentage="100">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value">
                                                <div style="font-size:15px">

                                                    المحاضرات الدراسية
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                <section class="section-contact">
                    <div class="contact-card">
                        <div class="card-image">
                            <div class="point">
                                <h2>{{ Auth::user()->point }}</h2>
                            </div>
                            <h2>عدد النقاط</h2>
                            <h5>{{ Auth::user()->name }}</h5>
                        </div>
                        <div class="card-text">
                            <p>البريد الالكتروني : {{ Auth::user()->email }}</p>
                            <p>الصفة : {{ Auth::user()->role() }}</p>
                            <p>عدد الكتب المحملة : {{ Auth::user()->Revew() }}</p>
                            <p>عدد المراجعات : {{ Auth::user()->RevewDone() }}</p>
                            <a class="btn m-1" href="{{ route('revew.book') }}">القيام بمراجعه</a>
                            <a href="#" class="btn">تعديل البيانات</a>
                        </div>
                    </div>
                </section>
                @endif
            </div>
        </div>
    </div>
@endsection
