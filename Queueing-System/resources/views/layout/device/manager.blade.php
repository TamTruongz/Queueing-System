@extends('master')
@section('content')
<main>
    <div class="content-device">
        <div class="title-heading">
            <p>Danh sách thiết bị</p>
        </div>

        <div class="menubar-device">
            <div class="area-filter">
                <div class="status-device">
                    <p class="text-status-device">Trạng thái hoạt động</p>
                    <select class="btn-select-device" name="filter_status" id="filter_status">
                        <option value=" ">Tất cả</option>
                        <option {!! (request()->input('filter_status')) == 'active' ? 'selected' : '' !!}
                            value="active">Hoạt động</option>
                        <option {!! (request()->input('filter_status')) == 'inactive' ? 'selected' : '' !!}
                            value="inactive">Ngưng hoạt động</option>
                    </select>
                </div>

                <div class="status-connect">
                    <p class="text-status-device">Trạng thái kết nối</p>
                    <select class="btn-select-device" name="filter_connect" id="filter_connect">
                        <option value="">Tất cả</option>
                        <option {!! (request()->input('filter_connect')) == 'connected' ? 'selected' : '' !!}
                            value="connected">Kết nối</option>
                        <option {!! (request()->input('filter_connect')) == 'disconnected' ? 'selected' : '' !!}
                            value="disconnected">Ngưng kết nối</option>
                    </select>
                </div>
            </div>

            <div class="area-search">
                <p class="text-status-device">Từ khóa</p>
                <form action="{{ route('device.search') }}" method="get">
                    <div class="input-search">
                        <input name="search_device" class="search-menubar-device" type="text" placeholder="Nhập từ khóa"
                            value="{{ $searchTerm ?? '' }}">
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
            <!-- nút thêm thiết bị -->
            <a href="/device/create">
                <div class="button-add-device">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.8884 2.33301H9.11171C4.86504 2.33301 2.33337 4.86467 2.33337 9.11134V18.8763C2.33337 23.1347 4.86504 25.6663 9.11171 25.6663H18.8767C23.1234 25.6663 25.655 23.1347 25.655 18.888V9.11134C25.6667 4.86467 23.135 2.33301 18.8884 2.33301ZM18.6667 14.8747H14.875V18.6663C14.875 19.1447 14.4784 19.5413 14 19.5413C13.5217 19.5413 13.125 19.1447 13.125 18.6663V14.8747H9.33337C8.85504 14.8747 8.45837 14.478 8.45837 13.9997C8.45837 13.5213 8.85504 13.1247 9.33337 13.1247H13.125V9.33301C13.125 8.85467 13.5217 8.45801 14 8.45801C14.4784 8.45801 14.875 8.85467 14.875 9.33301V13.1247H18.6667C19.145 13.1247 19.5417 13.5213 19.5417 13.9997C19.5417 14.478 19.145 14.8747 18.6667 14.8747Z"
                            fill="#FF9138" />
                    </svg>
                    <p>Thêm thiết bị</p>
                </div>
            </a>
            @if ($devices->count() == 0)
            <p>Không có kết quả nào được tìm thấy ! </p>
            @else
            <table>
                <thead>
                    <tr>
                        <th scope="col" class="th-border-left">Mã thiết bị</th>
                        <th scope="col" class="border-table">Tên thiết bị</th>
                        <th scope="col" class="border-table">Địa chỉ IP</th>
                        <th scope="col" class="border-table">Trạng thái hoạt động</th>
                        <th scope="col" class="border-table">Trạng thái kết nối</th>
                        <th scope="col" class="border-table">Dịch vụ sử dụng</th>
                        <th scope="col" class="border-table"></th>
                        <th scope="col" class="th-border-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devices as $device)
                    <tr class="color-tr-white">
                        <td>
                            {{ $device->device_id }}
                        </td>
                        <td class="border-table">
                            {{ $device->name }}
                        </td>
                        <td class="border-table">
                            {{ $device->address }}
                        </td>
                        <td class="border-table">


                            {!! (($device->active_status) == 'active') ?
                            '<svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#34CD26" />
                            </svg> Hoạt động' :
                            '<svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#EC3740" />
                            </svg> Ngưng hoạt động' !!}
                        </td>
                        <td class="border-table">

                            {!! (( $device->connect_status) == 'connected') ?
                            ' <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#34CD26" />
                            </svg> Kết nối' :
                            '<svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#EC3740" />
                            </svg> Mất kết nối' !!}

                        </td>
                        <td class="border-table">

                            <p>{{ $device->service_use }}</p><a href="">Xem thêm</a>

                        </td>
                        <td class="border-table"><a href="{{ route('device.info', ['id' => $device->id]) }}">Chi
                                tiết</a></td>
                        <td><a href="{{ route('device.edit', ['id' => $device->id]) }}">Cập nhật</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <!-- ==== Phân trang ==== -->
            @if ($devices->lastPage() > 1)
            <div class="area-pagination-page">
                <ul class="pagination-page">
                    @if ($devices->currentPage() > 1)
                    <a
                        href="{{ $devices->previousPageUrl() }}&search_device={!! isset($searchTerm) ? $searchTerm : '' !!}">
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

                    @if ($devices->lastPage() <= 6) @for ($i=1; $i <=$devices->lastPage(); $i++)
                        <li class="{{ ($devices->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                            <a
                                href="{{ $devices->url($i) }}&search_device={!! isset($searchTerm) ? $searchTerm : '' !!}">{{ $i }}</a>
                        </li>
                        @endfor
                        @else
                        <li class="{{ ($devices->currentPage() == 1) ? 'active-pagina-page' : '' }}">
                            <a
                                href="{{ $devices->url(1) }}&search_device={!! isset($searchTerm) ? $searchTerm : '' !!}">1</a>
                        </li>
                        @if ($devices->currentPage() > 3 && $devices->lastPage() > 6)
                        <li><span>...</span></li>
                        @endif
                        @for ($i = max(2, $devices->currentPage() - 2); $i <= min($devices->currentPage() + 2,
                            $devices->lastPage() - 1); $i++)
                            <li class="{{ ($devices->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                                <a
                                    href="{{ $devices->url($i) }}&search_device={!! isset($searchTerm) ? $searchTerm : '' !!}">{{ $i }}</a>
                            </li>
                            @endfor
                            @if ($devices->currentPage() < $devices->lastPage() - 2 && $devices->lastPage() > 6)
                                <li><span>...</span></li>
                                @endif
                                <li
                                    class="{{ ($devices->currentPage() == $devices->lastPage()) ? 'active-pagina-page' : '' }}">
                                    <a
                                        href="{{ $devices->url($devices->lastPage()) }}&search_device={!!isset($searchTerm) ? $searchTerm : '' !!}">{{ $devices->lastPage() }}</a>
                                </li>
                                @endif

                                @if ($devices->currentPage() < $devices->lastPage())
                                    <a
                                        href="{{ $devices->nextPageUrl() }}&search_device={!! isset($searchTerm) ? $searchTerm : '' !!}">
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
    $('#filter_status, #filter_connect').change(function() {
        var filter_status_id = $('#filter_status').val();
        var filter_connect_id = $('#filter_connect').val();

        var url = '{{ route("device.filter") }}?filter_status=' + filter_status_id +
            '&filter_connect=' + filter_connect_id;
        window.location.href = url;
    });

});
</script>
@endsection