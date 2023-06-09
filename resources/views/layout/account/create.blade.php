@extends('master')
@section('content')

<main>
    <div class="content-add-device">
        <div class="title-heading">
            <p>Thêm tài khoản</p>
        </div>

        <div class="area-form-add-device">
            <p class="infomation-device">Thông tin tài khoản</p>

            <form id="form-add-account" class="form-add-device"
                action="{{ isset($account) ? route('account.update', ['id' => $account->id]) : route('account.store') }}"
                method="POST">
                @csrf

                @if(isset($account->id))
                @method('PUT')
                
                @endif
                <div class="item-form-add-device">
                    <label for="name">Họ tên: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('name'))
                        <div class="alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </label>
                    <input name="name" type="text" placeholder="Nhập họ tên"
                        value="{{ isset($account) ? $account->name : old('name') }}" class="form-control @error('name') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">
                    <label for="username">Tên đăng nhập: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('username'))
                        <div class="alert-danger">{{ $errors->first('username') }}</div>
                        @endif
                    </label>
                    <input name="username" type="text" placeholder="Nhập tên đăng nhập"
                        value="{{ isset($account) ? $account->username : old('username') }}" class="form-control @error('username') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">
                    <label for="phone">Số điện thoại: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('phone'))
                        <div class="alert-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </label>
                    <input name="phone" type="number" placeholder="Nhập số điện thoại"
                        value="{{ isset($account) ? $account->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">
                    <label for="password">Mật khẩu: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('password'))
                        <div class="alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </label>
                    <input name="password" type="password" placeholder="Nhập mật khẩu" value="" class="form-control @error('password') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">
                    <label for="email">Email: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('email'))
                        <div class="alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </label>
                    <input name="email" type="email" placeholder="Nhập email"
                        value="{{ isset($account) ? $account->email : old('email') }}" class="form-control @error('email') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">
                    <label for="password_confirmation">Nhập lại mật khẩu: <svg width="6" height="6" viewBox="0 0 6 6"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('password'))
                        <div class="alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </label>
                    <input name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu xác nhận"
                        value="" class="form-control @error('password_confirmation') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">
                    <label for="role">
                        Vai trò
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('role'))
                        <div class="alert-danger">{{ $errors->first('role') }}</div>
                        @endif
                    </label>
                    <select name="role">
                        @foreach ($roles as $role)
                        <option {{ isset($account) ? $account->role == $role->name ? 'selected' : '' : '' }}
                            value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item-form-add-device">
                    <label for="status">Tình trạng <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                    </label>
                    <select name="status">
                        <option value="active"
                            {{ isset($account) ? $account->status == 'active' ? 'selected' : '' : '' }}>Hoạt
                            động</option>
                        <option value="inactive"
                            {{ isset($account) ? $account->status == 'inactive' ? 'selected' : '' : '' }}>Ngưng
                            hoạt động</option>
                    </select>
                </div>


                <span class="note-form-add-device">
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                            fill="#FF4747" />
                    </svg> Là trường thông tin bắt buộc</span>
            </form>
        </div>

        <div class="area-button-add_device">
            <a href="/account"><button class="btn-add-device-abort" type="button">Hủy bỏ</button></a>

            @if(isset($account))
            <button form="form-add-account" class="btn-add-device-add" type="submit">Cập nhật</button>
            @else
            <button form="form-add-account" class="btn-add-device-add" type="submit">Thêm</button>
            @endif
        </div>
    </div>
</main>
@endsection