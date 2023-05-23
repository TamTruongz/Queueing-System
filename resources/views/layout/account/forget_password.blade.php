@extends('master')
@section('content')
<div class="main-login">
    <div class="area-login">
        <div class="area-form">
            <div class="logo-login">
                <img src="\images\Logo\alta.svg" width="170" alt="">
            </div>

            <div class="form-login">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="text-forget">
                        <p class="heading-forget">Đặt lại mật khẩu</p>
                        <p class="text-forget">Vui lòng nhập email để đặt lại mật khẩu *</p>
                    </div>
                    <div class="box">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div>
                        @error('email')
                        <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="button-forget">
                        <a href="/login"><button class="cancel-forget" type="button">Hủy</button></a>
                        <button class="continue-forget" type="submit">Tiếp tục</button>
                    </div>
                </form>
            </div>



        </div>
        <div class="area-img">
            <img style="margin: 120px 0 0 25px" src="\images\FrameForgot.svg" width="550px" alt="">
        </div>  
    </div>
</div>
@endsection