@extends('master')
@section('content')
<main>
    <div class="content-codes-new">
        <div class="title-heading">
            <p>Quản lý cấp số</p>
        </div>

        <div class="area-codes-new">
            <p class="heading-codes-new">CẤP SỐ MỚI</p>
            <p class="text-codes-new">Dịch vụ khách hàng lựa chọn</p>

            <!-- <div class="dropdown status-device">
                <a class="btn-select-choose-service" role="button" id="dropdownMenuNameService" data-bs-toggle="dropdown" aria-expanded="false"> Chọn dịch vụ
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" fill="#FF7506" />
                        <path d="M1 1L7 7L13 1H1Z" stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>

                <ul class="dropdown-menu list-choose-service-codenew" aria-labelledby="dropdownMenuNameService">
                    <li><a class="dropdown-item item-date-stats" href="#">Khám sản - Phụ khoa</a></li>
                    <li><a class="dropdown-item item-date-stats" href="#">Khám răng hàm mặt</a></li>
                    <li><a class="dropdown-item item-date-stats active-date-stats" href="#">Khám tim mạch</a></li>
                    <li><a class="dropdown-item item-date-stats" href="#">Khám hô hấp</a></li>
                    <li><a class="dropdown-item item-date-stats" href="#">Khám tai mũi họng</a></li>
                </ul>
            </div> -->
            <form id="form-add-ticket" action="{{ route('ticket.store') }}" method="post">
                @csrf
                <select class="btn-select-choose-service" name="service_name" id="">
                    <option value="Khám tim mạch">Khám tim mạch</option>
                    <option value="Khám sản - Phụ khoa">Khám sản - Phụ khoa</option>
                    <option value="Khám răng hàm mặt">Khám răng hàm mặt</option>
                    <option value="Khám tai mũi họng">Khám tai mũi họng</option>
                </select>
            </form>


            <div class="area-button-codenew">
                <button class="btn-codenew-abort">Hủy bỏ</button>
                <button form="form-add-ticket" class="btn-codenew-inso" type="submit">Cấp số</button>
                <!-- Popup Button -->
                <button class="btn-codenew-inso" data-bs-toggle="modal" data-bs-target="#staticBackdrop">In
                    số</button>
            </div>
        </div>

    </div>

    <!-- ==== Popup ==== -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close-popup" data-bs-dismiss="modal" aria-label="Close"><svg width="24"
                        height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#FF9138" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="#FF9138" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="content-header">
                    <h3>Số thứ tự được cấp</h3>
                    <h2>2001201</h2>
                    <p>DV: Khám răng hàm mặt <b>(tại quầy số 1)</b></p>
                </div>
                <div class="content-footer">
                    <div>
                        <div class="text-datetime">
                            <p>Thời gian cấp:</p>
                            <p>09:30 11/10/2021</p>
                        </div>
                        <div class="text-datetime">
                            <p>Hạn sử dụng:</p>
                            <p>17:30 11/10/2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection