@extends('master')
@section('content')

<main>
    <div class="content-add-service">
        <div class="title-heading">
            <p>Quản lý dịch vụ</p>
        </div>

        <div class="area-form-add-service">
            <p class="infomation-device">Thông tin dịch vụ</p>
            @if(isset($service->service_code))
            <form id="form-add-service" action="{{ route('service.update', ['id' => $service->id]) }}" method="POST">
                @method('PUT')
                @else
                <form id="form-add-service" action="{{ route('service.store') }}" method="POST">
                    @endif
                    @csrf
                    <div class="form-add-device">
                        <div>
                            <div class="item-form-add-device">
                                <label for="service_code">Mã dịch vụ: <svg width="6" height="6" viewBox="0 0 6 6"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                            fill="#FF4747" />
                                    </svg>
                                    @if($errors->has('service_code'))
                                    <div class="alert-danger">{{ $errors->first('service_code') }}</div>
                                    @endif
                                </label>

                                <input name="service_code" type="text" placeholder="Nhập mã thiết bị"
                                    value="{{ isset($service->service_code) ? $service->service_code : '' }}">

                            </div>
                            <div class="item-form-add-device">
                                <label for="service_name">Tên dịch vụ: <svg width="6" height="6" viewBox="0 0 6 6"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                            fill="#FF4747" />
                                    </svg>
                                    @if($errors->has('service_name'))
                                    <div class="alert-danger">{{ $errors->first('service_name') }}</div>
                                    @endif
                                </label>
                                <input name="service_name" type="text" placeholder="Nhập tên dịch vụ"
                                    value="{{ isset($service->service_name) ? $service->service_name : '' }}">

                            </div>
                        </div>

                        <div>
                            <div class="item-form-add-device">
                                <label for="description">Mô tả:
                                    @if($errors->has('description'))
                                    <div class="alert-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </label>
                                <textarea class="textarea-describe" name="description" id="description"
                                    placeholder="Mô tả dịch vụ">{{ isset($service->description) ? $service->description : '' }}</textarea>

                            </div>

                        </div>
                    </div>

                    <div class="area-number-level-rules">
                        <p class="heading-number-level-rules">Quy tắc cấp số</p>
                        @if ($errors->has('at_least_one_selected'))
                        <div class="alert-danger">{{ $errors->first('at_least_one_selected') }}</div>
                        @endif
                        <div class="items-checkbox-service">
                            <div class="left-checkbox-service">
                                <input class="checkbox-service" type="checkbox" name="auto_increment"
                                    id="auto_increment" value="1"
                                    {{ isset($service) ? old('auto_increment', $service->auto_increment) == true ? 'checked' : '' : '' }}>
                                <p>Tăng tự động từ:</p>
                            </div>

                            <div class="right-checkbox-service">
                                <input type="text" placeholder="0001" disabled>
                                <p>đến</p>
                                <input type="text" placeholder="9999" disabled>
                            </div>
                        </div>

                        <div class="items-checkbox-service">
                            <div class="left-checkbox-service">
                                <input class="checkbox-service" type="checkbox" name="prefix" id="prefix" value="1"
                                    {{ isset($service) ? old('prefix', $service->prefix) == true ? 'checked' : '' : '' }}>
                                <p>Prelix: </p>
                            </div>

                            <div class="right-checkbox-service">
                                <input type="text" placeholder="0001" disabled>
                            </div>
                        </div>

                        <div class="items-checkbox-service">
                            <div class="left-checkbox-service">
                                <input class="checkbox-service" type="checkbox" name="surfix" value="1" id="surfix"
                                    {{ isset($service) ? old('surfix', $service->surfix) == true ? 'checked' : '' : '' }}>
                                <p>Surfix: </p>
                            </div>

                            <div class="right-checkbox-service">
                                <input type="text" placeholder="0001" disabled>
                            </div>
                        </div>

                        <div class="items-checkbox-service">
                            <div class="left-checkbox-service">
                                <input class="checkbox-service" type="checkbox" name="reset_daily" value="1"
                                    {{ isset($service) ? old('reset_daily', $service->reset_daily) == true ? 'checked' : '' : '' }}>
                                <p>Reset mỗi ngày</p>
                            </div>
                        </div>
                    </div>

                    <span class="note-form-add-device"><svg width="6" height="6" viewBox="0 0 6 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z"
                                fill="#FF4747" />
                        </svg> Là trường thông tin bắt buộc</span>
                </form>
        </div>

        <div class="area-button-add_device">
            <a href="/service">
                <button class="btn-add-device-abort" type="button">Hủy bỏ</button>
            </a>
            @if(isset($service->service_code))
            <button form="form-add-service" class="btn-add-device-add" type="submit">Cập nhật</button>
            @else
            <button form="form-add-service" class="btn-add-device-add" type="submit">Thêm dịch vụ</button>
            @endif
        </div>
    </div>
</main>
<script>
const checkboxes = document.querySelectorAll('.checkbox-service');

checkboxes.forEach(function(checkbox) {
    checkbox.onclick = function() {
        if (checkbox.checked) {
            checkbox.value = 1;
        } else {
            checkbox.value = 0;
        }
    }
});
</script>
@endsection