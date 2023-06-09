@extends('master')
@section('content')
<main>
    <div class="content-device">

        <div class="area-date-report">
            <p class="text-status-device">Chọn thời gian</p>
            <form action="{{ route('report.filter') }}" method="get">
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
        <div class="table-list-device">
            <!-- nút tải về-->
            <a href="">
                <div class="button-add-device">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.9166 11.888H20.545C17.78 11.888 15.5283 9.63634 15.5283 6.87134V3.49967C15.5283 2.85801 15.0033 2.33301 14.3616 2.33301H9.41496C5.82163 2.33301 2.91663 4.66634 2.91663 8.83134V19.168C2.91663 23.333 5.82163 25.6663 9.41496 25.6663H18.585C22.1783 25.6663 25.0833 23.333 25.0833 19.168V13.0547C25.0833 12.413 24.5583 11.888 23.9166 11.888ZM14.3266 18.4097L11.9933 20.743C11.9116 20.8247 11.8066 20.8947 11.7016 20.9297C11.5966 20.9763 11.4916 20.9997 11.375 20.9997C11.2583 20.9997 11.1533 20.9763 11.0483 20.9297C10.955 20.8947 10.8616 20.8247 10.7916 20.7547C10.78 20.743 10.7683 20.743 10.7683 20.7313L8.43496 18.398C8.09663 18.0597 8.09663 17.4997 8.43496 17.1613C8.77329 16.823 9.33329 16.823 9.67163 17.1613L10.5 18.013V13.1247C10.5 12.6463 10.8966 12.2497 11.375 12.2497C11.8533 12.2497 12.25 12.6463 12.25 13.1247V18.013L13.09 17.173C13.4283 16.8347 13.9883 16.8347 14.3266 17.173C14.665 17.5113 14.665 18.0713 14.3266 18.4097Z"
                            fill="#FF7506" />
                        <path
                            d="M20.335 10.2779C21.4434 10.2896 22.9834 10.2896 24.3017 10.2896C24.9667 10.2896 25.3167 9.50792 24.85 9.04125C23.17 7.34958 20.16 4.30458 18.4334 2.57792C17.955 2.09958 17.1267 2.42625 17.1267 3.09125V7.16292C17.1267 8.86625 18.5734 10.2779 20.335 10.2779Z"
                            fill="#FF7506" />
                    </svg>

                    <p>Tải về</p>
                </div>
            </a>
            @if ($tickets->count() == 0)
            <p>Không có kết quả nào được tìm thấy ! </p>
            @else
            <table>
                <thead>
                    <tr>
                        <form action="{{ route('report.filter') }}" method="get">
                            @csrf
                            <th scope="col" class="th-border-left th-table-report">
                                <div class="thead-table-report">
                                    <p>Số thứ tự</p>
                                    <button role="button" id="dropdownCodeService" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg width="12" height="13" viewBox="0 0 12 13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.13807 0.907263L4.01241 2.19611L2.17821 4.29621C1.79537 4.74109 2.06964 5.5 2.61819 5.5L6.17802 5.5L9.38359 5.5C9.93213 5.5 10.2064 4.74109 9.81785 4.29621L6.85799 0.907263C6.38944 0.364247 5.61233 0.364247 5.13807 0.907263Z"
                                                fill="white" />
                                            <path
                                                d="M6.86193 12.0927L7.98759 10.8039L9.82179 8.70379C10.2046 8.25891 9.93036 7.5 9.38181 7.5L5.82198 7.5L2.61641 7.5C2.06787 7.5 1.79359 8.25891 2.18215 8.70379L5.14201 12.0927C5.61056 12.6358 6.38767 12.6358 6.86193 12.0927Z"
                                                fill="white" />
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end list-table-codeservice"
                                        aria-labelledby="dropdownCodeService">
                                        <li><a class="dropdown-item active-date-stats item-date-stats"
                                                href="{{ route('report') }}">Tất cả</a></li>
                                        @foreach($filter_ticket as $item)
                                        <li>
                                            <button class="dropdown-item item-date-stats" type="submit" name="codeid"
                                                value="{{ $item->id }}">{{ $item->id }}
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </th>

                            <th scope="col" class="border-table th-table-report">
                                <div class="thead-table-report">
                                    <p>Tên dịch vụ</p>
                                    <button role="button" id="dropdownCodeService" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg width="12" height="13" viewBox="0 0 12 13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.13807 0.907263L4.01241 2.19611L2.17821 4.29621C1.79537 4.74109 2.06964 5.5 2.61819 5.5L6.17802 5.5L9.38359 5.5C9.93213 5.5 10.2064 4.74109 9.81785 4.29621L6.85799 0.907263C6.38944 0.364247 5.61233 0.364247 5.13807 0.907263Z"
                                                fill="white" />
                                            <path
                                                d="M6.86193 12.0927L7.98759 10.8039L9.82179 8.70379C10.2046 8.25891 9.93036 7.5 9.38181 7.5L5.82198 7.5L2.61641 7.5C2.06787 7.5 1.79359 8.25891 2.18215 8.70379L5.14201 12.0927C5.61056 12.6358 6.38767 12.6358 6.86193 12.0927Z"
                                                fill="white" />
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end list-table-codeservice"
                                        aria-labelledby="dropdownCodeService">
                                        <li class="items-checkbox-dropdown-report">
                                            <p>Tất cả</p><input type="checkbox" name="all_services">
                                        </li>
                                        @foreach($filter_service as $item)
                                        <li class="items-checkbox-dropdown-report">
                                            <p>{{ $item->service_name }}</p><input type="checkbox" name="service[]"
                                                value="{{ $item->service_name }}">
                                        </li>
                                        @endforeach
                                    </ul>
                                    <button type="submit" class="btn-filter-search"><i
                                            class='bx bx-search-alt'></i></button>
                                </div>
                            </th>

                            <th scope="col" class="border-table th-table-report">
                                <div class="thead-table-report">
                                    <p>Thời gian cấp</p>
                                    <button role="button" id="dropdownCodeService" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg width="12" height="13" viewBox="0 0 12 13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.13807 0.907263L4.01241 2.19611L2.17821 4.29621C1.79537 4.74109 2.06964 5.5 2.61819 5.5L6.17802 5.5L9.38359 5.5C9.93213 5.5 10.2064 4.74109 9.81785 4.29621L6.85799 0.907263C6.38944 0.364247 5.61233 0.364247 5.13807 0.907263Z"
                                                fill="white" />
                                            <path
                                                d="M6.86193 12.0927L7.98759 10.8039L9.82179 8.70379C10.2046 8.25891 9.93036 7.5 9.38181 7.5L5.82198 7.5L2.61641 7.5C2.06787 7.5 1.79359 8.25891 2.18215 8.70379L5.14201 12.0927C5.61056 12.6358 6.38767 12.6358 6.86193 12.0927Z"
                                                fill="white" />
                                        </svg></button>

                                    <ul class="dropdown-menu dropdown-menu-end list-table-codeservice"
                                        aria-labelledby="dropdownCodeService">
                                        <li><button type="submit" name="time" value=" "
                                                class="dropdown-item active-date-stats item-date-stats">Tất
                                                cả</button>
                                        </li>
                                        @foreach($filter_ticket as $item)
                                        <li><button type="submit" name="time[]]" value="{{ $item->issued_at }}"
                                                class="dropdown-item item-date-stats">{{ date('H:i - d/m/Y', strtotime($item-> issued_at)) }}</button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </th>

                            <th scope="col" class="border-table th-table-report">
                                <div class="thead-table-report">
                                    <p>Tình trạng</p>
                                    <button role="button" id="dropdownCodeService" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg width="12" height="13" viewBox="0 0 12 13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.13807 0.907263L4.01241 2.19611L2.17821 4.29621C1.79537 4.74109 2.06964 5.5 2.61819 5.5L6.17802 5.5L9.38359 5.5C9.93213 5.5 10.2064 4.74109 9.81785 4.29621L6.85799 0.907263C6.38944 0.364247 5.61233 0.364247 5.13807 0.907263Z"
                                                fill="white" />
                                            <path
                                                d="M6.86193 12.0927L7.98759 10.8039L9.82179 8.70379C10.2046 8.25891 9.93036 7.5 9.38181 7.5L5.82198 7.5L2.61641 7.5C2.06787 7.5 1.79359 8.25891 2.18215 8.70379L5.14201 12.0927C5.61056 12.6358 6.38767 12.6358 6.86193 12.0927Z"
                                                fill="white" />
                                        </svg></button>

                                    <ul class="dropdown-menu dropdown-menu-end list-table-codeservice"
                                        aria-labelledby="dropdownCodeService">
                                        <li>
                                            <button class="dropdown-item active-date-stats item-date-stats"
                                                type="submit" name="status" value=" ">Tất cả</button>
                                        </li>
                                        <li><button class="dropdown-item item-date-stats" type="submit" name="status"
                                                value="pending">Đang chờ</button></li>
                                        <li><button class="dropdown-item item-date-stats" type="submit" name="status"
                                                value="used">Đã
                                                sử dụng</button></li>
                                        <li>
                                            <button class="dropdown-item item-date-stats" type="submit" name="status"
                                                value="skipped">
                                                Bỏ qua</button>
                                        </li>
                                    </ul>
                                </div>
                            </th>

                            <th scope="col" class="th-border-right th-table-report">
                                <div class="thead-table-report">
                                    <p>Nguồn cấp</p>
                                    <button role="button" id="dropdownCodeService" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg width="12" height="13" viewBox="0 0 12 13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.13807 0.907263L4.01241 2.19611L2.17821 4.29621C1.79537 4.74109 2.06964 5.5 2.61819 5.5L6.17802 5.5L9.38359 5.5C9.93213 5.5 10.2064 4.74109 9.81785 4.29621L6.85799 0.907263C6.38944 0.364247 5.61233 0.364247 5.13807 0.907263Z"
                                                fill="white" />
                                            <path
                                                d="M6.86193 12.0927L7.98759 10.8039L9.82179 8.70379C10.2046 8.25891 9.93036 7.5 9.38181 7.5L5.82198 7.5L2.61641 7.5C2.06787 7.5 1.79359 8.25891 2.18215 8.70379L5.14201 12.0927C5.61056 12.6358 6.38767 12.6358 6.86193 12.0927Z"
                                                fill="white" />
                                        </svg></button>

                                    <ul class="dropdown-menu dropdown-menu-end list-table-codeservice"
                                        aria-labelledby="dropdownCodeService">
                                        <li><button type="submit" name="source" value=" "
                                                class="dropdown-item item-date-stats">Tất
                                                cả</button>
                                        </li>
                                        <li><button type="submit" name="source" value="kiosk"
                                                class="dropdown-item item-date-stats">Kiosk</button></li>
                                        <li><button type="submit" name="source" value="system"
                                                class="dropdown-item item-date-stats active-date-stats">Hệ
                                                thống</button></li>
                                    </ul>
                                </div>
                            </th>
                        </form>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>
                            {{ $ticket-> sequence_number}}
                        </td>
                        <td class="border-table">
                            {{ $ticket-> service_name}}
                        </td>
                        <td class="border-table">
                            {{ date('H:i - d/m/Y', strtotime($ticket-> issued_at)) }}
                        </td>
                        <td class="border-table">
                            @if($ticket -> status == 'pending')
                            <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#4277FF" />
                            </svg> Đang chờ
                            @elseif ($ticket -> status == 'used')
                            <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#7E7D88" />
                            </svg> Đã sử dụng
                            @else
                            <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4.5" r="4" fill="#E73F3F" />
                            </svg> Bỏ qua
                            @endif
                        </td>
                        <td>{{ $ticket -> source == 'system' ? 'Hệ thống' : 'Kiosk' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <!-- ==== Phân trang ==== -->
            @if ($tickets->lastPage() > 1)
            <div class="area-pagination-page">
                <ul class="pagination-page">
                    @if ($tickets->currentPage() > 1)
                    <a href="{{ $tickets->previousPageUrl() }}&status={!! isset($selectedStatus) ? $selectedStatus : '' !!}&source={!! isset($selectedSource) ? $selectedSource : '' !!}">
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

                    @if ($tickets->lastPage() <= 6) @for ($i=1; $i <=$tickets->lastPage(); $i++)
                        <a href="{{ $tickets->url($i) }}&status={!! isset($selectedStatus) ? $selectedStatus : '' !!}&source={!! isset($selectedSource) ? $selectedSource : '' !!}">
                            <li class="{{ ($tickets->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                                {{ $i }}
                            </li>
                        </a>
                        @endfor
                        @else
                        <a href="{{ $tickets->url(1) }}&status={!! isset($selectedStatus) ? $selectedStatus : '' !!}&source={!! isset($selectedSource) ? $selectedSource : '' !!}">
                            <li class="{{ ($tickets->currentPage() == 1) ? 'active-pagina-page' : '' }}">
                                1
                            </li>
                        </a>
                        @if ($tickets->currentPage() > 3 && $tickets->lastPage() > 6)
                        <li><span>...</span></li>
                        @endif
                        @for ($i = max(2, $tickets->currentPage() - 2); $i <= min($tickets->currentPage() + 2,
                            $tickets->lastPage() - 1); $i++)
                            <a href="{{ $tickets->url($i) }}&status={!! isset($selectedStatus) ? $selectedStatus : '' !!}&source={!! isset($selectedSource) ? $selectedSource : '' !!}">
                                <li class="{{ ($tickets->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                                    {{ $i }}
                                </li>
                            </a>
                            @endfor
                            @if ($tickets->currentPage() < $tickets->lastPage() - 2 && $tickets->lastPage() > 6)
                                <li><span>...</span></li>
                                @endif
                                <a href="{{ $tickets->url($tickets->lastPage()) }}&status={!! isset($selectedStatus) ? $selectedStatus : '' !!}&source={!! isset($selectedSource) ? $selectedSource : '' !!}">
                                    <li
                                        class="{{ ($tickets->currentPage() == $tickets->lastPage()) ? 'active-pagina-page' : '' }}">
                                        {{ $tickets->lastPage() }}
                                    </li>
                                </a>
                                @endif


                                @if ($tickets->currentPage() < $tickets->lastPage())
                                    <a href="{{ $tickets->nextPageUrl() }}&status={!! isset($selectedStatus) ? $selectedStatus : '' !!}&source={!! isset($selectedSource) ? $selectedSource : '' !!}">
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
@endsection