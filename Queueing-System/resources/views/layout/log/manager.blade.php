@extends('master')
@section('content')
<main>
    <div class="content-device">

        <div class="menubar-device">
            <div class="area-filter">
                <div class="area-date-logsuser">
                    <p class="text-status-device">Chọn thời gian</p>
                    <div class="area-input-date">
                        <input class="input-date-service" type="date" name="" id="">
                        <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.13346 2.46129L2.9735 1.75776L1.08342 0.611381C0.683023 0.372106 0 0.543527 0 0.886368V3.11126V5.11474C0 5.45758 0.683023 5.629 1.08342 5.38616L4.13346 3.53624C4.62218 3.2434 4.62218 2.75771 4.13346 2.46129Z"
                                fill="#535261" />
                        </svg>
                        <input class="input-date-service" type="date">
                    </div>

                </div>
            </div>

            <div class="area-search">
                <p class="text-status-device">Từ khóa</p>
                <form action="{{ route('logs.search') }}" method="get">
                    <div class="input-search">
                        <input name="search_logs" class="search-menubar-device" type="text" placeholder="Nhập từ khóa" value="{{ $searchTerm ?? '' }}">
                        <button class="btn-search-menubar-device" type="submit" >
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

        <div class="table-list-loguser">
            @if ($logs->count() == 0)
            <p>Không có kết quả nào được tìm thấy ! </p>
            @else
            <table>
                <thead>
                    <tr>
                        <th scope="col" class="th-border-left">Tên đăng nhập</th>
                        <th scope="col" class="border-table">Thời gian tác động</th>
                        <th scope="col" class="border-table">IP thực hiện</th>
                        <th scope="col" class="th-border-right">Thao tác thực hiện</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>
                            {{ $log->username }}
                        </td>
                        <td class="border-table">
                            {{ date('d/m/Y h:i:s', strtotime($log->action_time)) }}
                        </td>
                        <td class="border-table">
                            {{ $log->ip_address }}
                        </td>
                        <td> {{ $log->action }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <!-- ===== Phân Trang -->
            @if ($logs->lastPage() > 1)
            <div class="area-pagination-page">
                <ul class="pagination-page">
                    @if ($logs->currentPage() > 1)
                    <a
                        href="{{ $logs->previousPageUrl() }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}">
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

                    @if ($logs->lastPage() <= 6) @for ($i=1; $i <=$logs->lastPage(); $i++)
                        <li class="{{ ($logs->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                            <a
                                href="{{ $logs->url($i) }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}">{{ $i }}</a>
                        </li>
                        @endfor
                        @else
                        <li class="{{ ($logs->currentPage() == 1) ? 'active-pagina-page' : '' }}">
                            <a
                                href="{{ $logs->url(1) }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}">1</a>
                        </li>
                        @if ($logs->currentPage() > 3 && $logs->lastPage() > 6)
                        <li><span>...</span></li>
                        @endif
                        @for ($i = max(2, $logs->currentPage() - 2); $i <= min($logs->currentPage() + 2,
                            $logs->lastPage() - 1); $i++)
                            <li class="{{ ($logs->currentPage() == $i) ? 'active-pagina-page' : '' }}">
                                <a
                                    href="{{ $logs->url($i) }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}">{{ $i }}</a>
                            </li>
                            @endfor
                            @if ($logs->currentPage() < $logs->lastPage() - 2 && $logs->lastPage() > 6)
                                <li><span>...</span></li>
                                @endif
                                <li
                                    class="{{ ($logs->currentPage() == $logs->lastPage()) ? 'active-pagina-page' : '' }}">
                                    <a
                                        href="{{ $logs->url($logs->lastPage()) }}&search_service={!!isset($searchTerm) ? $searchTerm : '' !!}">{{ $logs->lastPage() }}</a>
                                </li>
                                @endif

                                @if ($logs->currentPage() < $logs->lastPage())
                                    <a
                                        href="{{ $logs->nextPageUrl() }}&search_service={!! isset($searchTerm) ? $searchTerm : '' !!}">
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