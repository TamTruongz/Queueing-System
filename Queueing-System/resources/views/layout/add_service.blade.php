@extends('master')
@section('content')
<main>
    <div class="content-add-service">
        <div class="title-heading">
            <p>Quản lý dịch vụ</p>
        </div>

        <div class="area-form-add-service">
            <p class="infomation-device">Thông tin dịch vụ</p>

            <form class="" action="" method="">
                <div class="form-add-device">
                    <div>
                        <div class="item-form-add-device">
                            <label for="">Mã dịch vụ: <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z" fill="#FF4747" />
                                </svg>
                            </label>
                            <input type="text" placeholder="Nhập mã thiết bị" value="201">
                        </div>
                        <div class="item-form-add-device">
                            <label for="">Tên dịch vụ: <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z" fill="#FF4747" />
                                </svg>
                            </label>
                            <input type="text" placeholder="Nhập tên dịch vụ" value="Khám tim mạch">
                        </div>
                    </div>

                    <div>
                        <div class="item-form-add-device">
                            <label for="">Mô tả: <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z" fill="#FF4747" />
                                </svg>
                            </label>
                            <textarea class="textarea-describe" name="" id="" placeholder="Mô tả dịch vụ"></textarea>
                        </div>
                    </div>
                </div>

                <div class="area-number-level-rules">
                    <p class="heading-number-level-rules">Quy tắc cấp số</p>

                    <div class="items-checkbox-service">
                        <div class="left-checkbox-service">
                            <input class="checkbox-service" type="checkbox">
                            <p>Tăng tự động từ:</p>
                        </div>

                        <div class="right-checkbox-service">
                            <input type="text" placeholder="0001">
                            <p>đến</p>
                            <input type="text" placeholder="9999">
                        </div>
                    </div>

                    <div class="items-checkbox-service">
                        <div class="left-checkbox-service">
                            <input class="checkbox-service" type="checkbox">
                            <p>Prelix: </p>
                        </div>

                        <div class="right-checkbox-service">
                            <input type="text" placeholder="0001">
                        </div>
                    </div>

                    <div class="items-checkbox-service">
                        <div class="left-checkbox-service">
                            <input class="checkbox-service" type="checkbox">
                            <p>Surfix: </p>
                        </div>

                        <div class="right-checkbox-service">
                            <input type="text" placeholder="0001">
                        </div>
                    </div>

                    <div class="items-checkbox-service">
                        <div class="left-checkbox-service">
                            <input class="checkbox-service" type="checkbox">
                            <p>Reset mỗi ngày</p>
                        </div>
                    </div>
                </div>

                <span class="note-form-add-device"><svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.8999 3.9191L4.20076 3L5.8999 2.0809C5.99565 2.0291 6.0284 1.91449 5.97315 1.82473L5.5729 1.17516C5.51765 1.08551 5.39527 1.05469 5.29952 1.10648L3.60038 2.02559V0.1875C3.60038 0.0839062 3.51075 0 3.40025 0H2.59975C2.48925 0 2.39962 0.0839062 2.39962 0.1875V2.0257L0.700478 1.1066C0.604727 1.0548 0.482351 1.08563 0.4271 1.17527L0.0268467 1.82473C-0.0284038 1.91438 0.00434648 2.0291 0.100097 2.0809L1.79924 3L0.100097 3.9191C0.00434648 3.9709 -0.0284038 4.08563 0.0268467 4.17527L0.4271 4.82484C0.482351 4.91449 0.604727 4.9452 0.700478 4.89352L2.39962 3.97441V5.8125C2.39962 5.91609 2.48925 6 2.59975 6H3.40025C3.51075 6 3.60038 5.91609 3.60038 5.8125V3.9743L5.29952 4.8934C5.39527 4.9452 5.51765 4.91449 5.5729 4.82473L5.97315 4.17516C6.0284 4.08551 5.99565 3.9709 5.8999 3.9191Z" fill="#FF4747" />
                    </svg> Là trường thông tin bắt buộc</span>
            </form>
        </div>

        <div class="area-button-add_device">
            <button class="btn-add-device-abort" type="button">Hủy bỏ</button>
            <button class="btn-add-device-add" type="button">Thêm dịch vụ</button>
        </div>
    </div>
</main>
@endsection