@extends('master')
@section('content')

<main>
    <div class="content-add-device">
        <div class="title-heading">
            <p>Quản lý thiết bị</p>
        </div>

        <div class="area-form-add-device">
            <p class="infomation-device">Thông tin thiết bị</p>

            <form id="form-add-device" class="form-add-device" action="/device/create" method="POST">
                <div class="item-form-add-device">

                    <label for="device_id">Mã thiết bị: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('device_id'))
                        <div class="alert-danger">{{ $errors->first('device_id') }}</div>
                        @endif
                    </label>
                    <input name="device_id" type="text" placeholder="Nhập mã thiết bị" value="{{ old('device_id') }}" class="form-control @error('device_id') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">

                    <label for="device_type">Loại thiết bị: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('device_type'))
                        <div class="alert-danger">{{ $errors->first('device_type') }}</div>
                        @endif
                    </label>
                    <select class="input-choose-device" name="device_type" id="">
                        <option value="Kiosk">Kiosk</option>
                        <option value="Display Counter">Display Counter</option>
                    </select>
                </div>

                <div class="item-form-add-device">

                    <label for="name">Tên thiết bị: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('name'))
                        <div class="alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </label>
                    <input name="name" type="text" placeholder="Nhập tên thiết bị" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
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
                    <input name="username" type="text" placeholder="Nhập tên tài khoản" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">

                    <label for="address">Địa chỉ IP: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('address'))
                        <div class="alert-danger">{{ $errors->first('address') }}</div>
                        @endif
                    </label>
                    <input name="address" type="text" placeholder="Nhập địa chỉ IP" value="{{ $_SERVER['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : old('address') }}" class="form-control @error('address') is-invalid @enderror">
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
                    <input name="password" type="text" placeholder="Nhập mật khẩu" class="form-control @error('password') is-invalid @enderror">
                </div>

                <div class="item-form-add-device">

                    <label for="service_use">Dịch vụ sử dụng: <svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg>
                        @if($errors->has('service_use'))
                        <div class="alert-danger">{{ $errors->first('service_use') }}</div>
                        @endif
                    </label>
                    <input name="service_use" class="input-user-device" type="text" placeholder="Nhập dịch vụ sử dụng" value="{{ old('service_use') }}" class="form-control @error('service_use') is-invalid @enderror">
                </div>

                <span class="note-form-add-device"><svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                            fill="#FF4747" />
                    </svg> Là trường thông tin bắt buộc</span>
                @csrf
            </form>
        </div>

        <div class="area-button-add_device">
            <a href="/device">
                <button class="btn-add-device-abort" type="button">Hủy bỏ</button>
            </a>
            <button form="form-add-device" class="btn-add-device-add" type="submit">Thêm thiết bị</button>
        </div>
    </div>
</main>
@endsection