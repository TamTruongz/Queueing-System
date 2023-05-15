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

            <div class="status-device">

                <form id="form-add-ticket" action="{{ route('ticket.store') }}" method="post">
                    @csrf
                    <select class="btn-select-choose-service" name="service_name" id="">
                        @foreach($service as $service)
                        <option value="{{ $service->service_name }}">{{ $service->service_name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>


            <div class="area-button-codenew">
                <a href="{{ route('ticket') }}"><button class="btn-codenew-abort">Hủy bỏ</button></a>
                <!-- Popup Button -->
                <button type="submit" form="form-add-ticket" class="btn-codenew-inso" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">In
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
                    <h2 id="ticket-sequence_number"></h2>
                    <p>DV: <span id="ticket-service_name"></span> <b>(tại quầy số 1)</b></p>
                </div>
                <div class="content-footer">
                    <div>
                        <div class="text-datetime">
                            <p>Thời gian cấp:</p>
                            <p id="ticket-issued_at"></p>
                        </div>
                        <div class="text-datetime">
                            <p>Hạn sử dụng:</p>
                            <p id="ticket-expired_at"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection