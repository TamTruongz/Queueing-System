@extends('master')
@section('content')

<main>
    <div class="content-device">


        <div class="title-heading">
            <p>Quản lý dịch vụ</p>
        </div>

        <div class="menubar-device">
            <div class="area-filter">
                <div class="dropdown status-device">
                    <p class="text-status-device">Trạng thái hoạt động</p>
                    <select class="btn-select-device" name="filter_status_service" id="filter_status_service">
                        <option value=" ">Tất cả</option>
                        <option {!! (request()->input('filter_status')) == 'active' ? 'selected' : '' !!}
                            value="active">Hoạt động</option>
                        <option {!! (request()->input('filter_status')) == 'inactive' ? 'selected' : '' !!}
                            value="inactive">Ngưng hoạt động</option>
                    </select>
                    <span class="vector"><img src="/images/Vector.svg" alt=""></span>
                </div>

                <div class="area-date">
                    <p class="text-status-device">Chọn thời gian</p>
                    <form action="{{ route('service.filter') }}" method="get">
                        <div class="area-input-date">
                            <input class="input-date-service" type="date" name="dateStart" id="dateStart">
                            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.13346 2.46129L2.9735 1.75776L1.08342 0.611381C0.683023 0.372106 0 0.543527 0 0.886368V3.11126V5.11474C0 5.45758 0.683023 5.629 1.08342 5.38616L4.13346 3.53624C4.62218 3.2434 4.62218 2.75771 4.13346 2.46129Z"
                                    fill="#535261" />
                            </svg>
                            <input class="input-date-service" type="date" name="dateEnd" id="dateEnd">
                        </div>
                    </form>


                </div>
            </div>

            <div class="area-search">
                <p class="text-status-device">Từ khóa</p>
                <form action="{{ route('service.search') }}" method="get">
                    <div class="input-search">
                        <input name="search_service" class="search-menubar-device" type="text"
                            placeholder="Nhập từ khóa" value="{{ $searchTerm ?? '' }}">
                        <button class="btn-search-menubar-device" type="submit">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
                                    stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.5 17.5L13.875 13.875" stroke="#FF7506" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                    </div>
                </form>
            </div>
        </div>

        <div class="table-list-device">
            <!-- ==== Nút thêm dịch vụ ==== -->
            <a href="/service/create">
                <div class="button-add-device">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.8884 2.33301H9.11171C4.86504 2.33301 2.33337 4.86467 2.33337 9.11134V18.8763C2.33337 23.1347 4.86504 25.6663 9.11171 25.6663H18.8767C23.1234 25.6663 25.655 23.1347 25.655 18.888V9.11134C25.6667 4.86467 23.135 2.33301 18.8884 2.33301ZM18.6667 14.8747H14.875V18.6663C14.875 19.1447 14.4784 19.5413 14 19.5413C13.5217 19.5413 13.125 19.1447 13.125 18.6663V14.8747H9.33337C8.85504 14.8747 8.45837 14.478 8.45837 13.9997C8.45837 13.5213 8.85504 13.1247 9.33337 13.1247H13.125V9.33301C13.125 8.85467 13.5217 8.45801 14 8.45801C14.4784 8.45801 14.875 8.85467 14.875 9.33301V13.1247H18.6667C19.145 13.1247 19.5417 13.5213 19.5417 13.9997C19.5417 14.478 19.145 14.8747 18.6667 14.8747Z"
                            fill="#FF9138" />
                    </svg>
                    <p>Thêm dịch vụ</p>
                </div>
            </a>
            @if ($services->count() == 0)
            <p>Không có kết quả nào được tìm thấy ! </p>
            @else
            <table>
                <thead>
                    <tr>
                        <th scope="col" class="th-border-left">Mã dịch vụ</th>
                        <th scope="col" class="border-table">Tên dịch vụ</th>
                        <th scope="col" class="border-table">Mô tả</th>
                        <th scope="col" class="border-table">Trạng thái hoạt động</th>
                        <th scope="col" class="border-table"></th>
                        <th scope="col" class="th-border-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="color-tr-white">
                        <td>
                            {{ $service -> service_code}}
                        </td>
                        <td class="border-table">
                            {{ $service -> service_name}}
                        </td>
                        <td class="border-table">
                            {{ $service -> description}}
                        </td>
                        <td class="border-table">

                            {!! ($service -> status) == 'active' ? '<svg width="8" height="9" viewBox="0 0 8 9"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#34CD26" />
                            </svg> Hoạt động' :
                            '<svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#EC3740" />
                            </svg> Ngưng hoạt động' !!}
                        </td>
                        <td class="border-table"><a href="{{ route('service.info', ['id' => $service->id]) }}">Chi
                                tiết</a></td>
                        <td><a href="{{ route('service.edit', ['id' => $service->id]) }}">Cập nhật</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <!-- ==== Phân trang ==== -->
            @if ($services->lastPage() > 1)
            <div class="area-pagination-page">
                <ul class="pagination-page">
                    @if ($services->currentPage() > 1)
                    <a
                        href="{{ $services->previousPageUrl() }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}&filter_status={!! isset($filter_status) ? $filter_status : '' !!}&dateStart={!! isset($dateStart) ? $dateStart : '' !!}&dateEnd={!! isset($dateEnd) ? $dateEnd : '' !!}">
                        <li>
                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L1 6L7 11" fill="#A9A9B0" />
                                <path d="M7 1L1 6L7 11L7 1Z" stroke="#A9A9B0" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </li>
                    </a>
                    @endif

                    @if ($services->lastPage() <= 6) @for ($i=1; $i <=$services->lastPage(); $i++)
                        <a
                            href="{{ $services->url($i) }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}&filter_status={!! isset($filter_status) ? $filter_status : '' !!}&dateStart={!! isset($dateStart) ? $dateStart : '' !!}&dateEnd={!! isset($dateEnd) ? $dateEnd : '' !!}">
                            <li class="{{ ($services->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                                {{ $i }}
                            </li>
                        </a>
                        @endfor
                        @else
                        <a
                            href="{{ $services->url(1) }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}&filter_status={!! isset($filter_status) ? $filter_status : '' !!}&dateStart={!! isset($dateStart) ? $dateStart : '' !!}&dateEnd={!! isset($dateEnd) ? $dateEnd : '' !!}">
                            <li class="{{ ($services->currentPage() == 1) ? 'active-pagina-page' : '' }}">1</li>
                        </a>

                        @if ($services->currentPage() > 3 && $services->lastPage() > 6)
                        <li><span>...</span></li>
                        @endif
                        @for ($i = max(2, $services->currentPage() - 2); $i <= min($services->currentPage() + 2,
                            $services->lastPage() - 1); $i++)
                            <a
                                href="{{ $services->url($i) }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}&filter_status={!! isset($filter_status) ? $filter_status : '' !!}&dateStart={!! isset($dateStart) ? $dateStart : '' !!}&dateEnd={!! isset($dateEnd) ? $dateEnd : '' !!}">
                                <li class="{{ ($services->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                                    {{ $i }}
                                </li>
                            </a>
                            @endfor
                            @if ($services->currentPage() < $services->lastPage() - 2 && $services->lastPage() > 6)
                                <li><span>...</span></li>
                                @endif
                                <a
                                    href="{{ $services->url($services->lastPage()) }}&search_service={!!isset($searchTerm) ? $searchTerm : '' !!}&filter_status={!! isset($filter_status) ? $filter_status : '' !!}&dateStart={!! isset($dateStart) ? $dateStart : '' !!}&dateEnd={!! isset($dateEnd) ? $dateEnd : '' !!}">
                                    <li
                                        class="{{ ($services->currentPage() == $services->lastPage()) ? 'active-pagina-page' : '' }}">
                                        {{ $services->lastPage() }}
                                    </li>
                                </a>
                                @endif

                                @if ($services->currentPage() < $services->lastPage())
                                    <a
                                        href="{{ $services->nextPageUrl() }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}&filter_status={!! isset($filter_status) ? $filter_status : '' !!}&dateStart={!! isset($dateStart) ? $dateStart : '' !!}&dateEnd={!! isset($dateEnd) ? $dateEnd : '' !!}">
                                        <li>
                                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 11L7 6L1 1" fill="#7E7D88" />
                                                <path d="M1 11L7 6L1 1L1 11Z" stroke="#7E7D88" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </li>
                                    </a>
                                    @endif
                </ul>
            </div>
            @endif
        </div>
    </div>
</main>
<script>
$(document).ready(function() {
    $('#filter_status_service').change(function() {
        var filter_status_service_id = $('#filter_status_service').val();
        var url = '{{ route("service.filter") }}?filter_status=' + filter_status_service_id;
        window.location.href = url;
    });
});
</script>
@endsection