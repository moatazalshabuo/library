@extends('layouts.master')

@section('content')
@include('navbar')
<div class="container" style="margin-top: 120px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-3" style="background-color: #33ccc5;color:#fff;font-size:20px">التسجيل</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.storer') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">الاسم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_number" class="col-md-4 col-form-label text-md-end">الرقم الوطني</label>

                            <div class="col-md-6">
                                <input id="id_number" type="number" class="form-control @error('id_number') is-invalid @enderror" value="{{ old('id_number') }}" name="id_number" required >

                                @error('id_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="id_number" class="col-md-4 col-form-label text-md-end">الرقم الكاديمي</label>

                            <div class="col-md-6">
                                <input id="No_academic" type="number" class="form-control @error('No_academic') is-invalid @enderror" value="{{ old('No_academic') }}" name="No_academic" required >

                                @error('No_academic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_number" class="col-md-4 col-form-label text-md-end">نوع المستخدم</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option @selected(old('role') == 1) value="1">مسؤول النظام</option>
                                    <option @selected(old('role') == 2) value="2">عضو هيئة تدريس</option>
                                    <option @selected(old('role') == 3) value="3">طالب</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تاكيد كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
