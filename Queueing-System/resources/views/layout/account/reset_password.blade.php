@extends('master')
@section('content')
<div class="main-login">
    <div class="area-login">
        <div class="area-form">
            <div class="logo-login">
                <img src="\images\Logo\alta.svg" width="170" alt="">
            </div>

            <div class="form-login">
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="text-forget">
                        <p class="heading-forget">Đặt lại mật khẩu mới</p>
                    </div>
                    <input type="hidden" name="email" value="{{ $reset_email }}">
                    <div class="box">
                        <label class="d-flex" for="password">Mật khẩu *
                            @if($errors->has('password'))
                            <div class="alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </label>
                        <input type="password" name="password" required
                            class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="box">
                        <label class="d-flex" for="">Nhập lại mật khẩu *
                            @if($errors->has('password_confirmation'))
                            <div class="alert-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </label>
                        <input type="password" name="password_confirmation" required
                            class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="button-login mt-4">
                        <button class="continue-forget" type="submit">Xác nhận</button>
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