@extends('master')
@section('content')
<main class="content-dashboard">
    <div class="content-middle">
        <div class="title-heading">
            <p>Biểu đồ cấp số</p>
        </div>
        <div class="stats-bar">
            <a href="/ticket">
                <div class="item-stats">
                    <div class="icon-text-stats">
                        <div><img src="/images/Frame-1.svg" alt=""></div>
                        <p>Số thứ tự đã cấp</p>
                    </div>

                    <div class="index-stats">
                        <div class="number-stats-big">
                            <p>{{ $tickets->count() }}</p>
                        </div>
                        <div class="number-stats-small-up">
                            <svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.80099 6.52148C2.70154 6.52148 2.60615 6.48198 2.53583 6.41165C2.4655 6.34132 2.42599 6.24594 2.42599 6.14648L2.42599 1.80173L0.816494 3.41198C0.781628 3.44685 0.740237 3.47451 0.694682 3.49338C0.649127 3.51225 0.600302 3.52196 0.550994 3.52196C0.501686 3.52196 0.452861 3.51225 0.407306 3.49338C0.361752 3.47451 0.32036 3.44685 0.285494 3.41198C0.250628 3.37712 0.222971 3.33573 0.204102 3.29017C0.185232 3.24462 0.175521 3.19579 0.175521 3.14648C0.175521 3.09718 0.185232 3.04835 0.204102 3.0028C0.222971 2.95724 0.250628 2.91585 0.285494 2.88098L2.53549 0.630984C2.57033 0.596061 2.61171 0.568355 2.65727 0.54945C2.70283 0.530545 2.75167 0.520814 2.80099 0.520814C2.85032 0.520814 2.89916 0.530545 2.94472 0.54945C2.99028 0.568355 3.03166 0.596061 3.06649 0.630984L5.31649 2.88098C5.35136 2.91585 5.37902 2.95724 5.39789 3.0028C5.41676 3.04835 5.42647 3.09718 5.42647 3.14648C5.42647 3.19579 5.41676 3.24462 5.39789 3.29017C5.37902 3.33573 5.35136 3.37712 5.31649 3.41198C5.24608 3.4824 5.15058 3.52196 5.05099 3.52196C5.00169 3.52196 4.95286 3.51225 4.90731 3.49338C4.86175 3.47451 4.82036 3.44685 4.78549 3.41198L3.17599 1.80173L3.17599 6.14648C3.17599 6.24594 3.13649 6.34132 3.06616 6.41165C2.99583 6.48198 2.90045 6.52148 2.80099 6.52148Z"
                                    fill="#FF9138" />
                            </svg>
                            <p>32,41%</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/ticket/filter?filter_name=%20&filter_status=used&filter_source=">
                <div class="item-stats">
                    <div class="icon-text-stats">
                        <div><img src="/images/Frame-2.svg" alt=""></div>
                        <p>Số thứ tự đã sử dụng</p>
                    </div>

                    <div class="index-stats">
                        <div class="number-stats-big">
                            <p>{{ $tickets->where('status', 'used')->count() }}</p>
                        </div>
                        <div class="number-stats-small-down">
                            <svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.80098 0.521485C2.70152 0.521485 2.60614 0.560994 2.53581 0.63132C2.46549 0.701646 2.42598 0.797028 2.42598 0.896485L2.42598 5.24124L0.816479 3.63098C0.781613 3.59612 0.740221 3.56846 0.694667 3.54959C0.649112 3.53072 0.600287 3.52101 0.550979 3.52101C0.501671 3.52101 0.452846 3.53072 0.407291 3.54959C0.361737 3.56846 0.320345 3.59612 0.285479 3.63098C0.250613 3.66585 0.222956 3.70724 0.204087 3.7528C0.185217 3.79835 0.175505 3.84718 0.175505 3.89648C0.175505 3.94579 0.185217 3.99462 0.204087 4.04017C0.222956 4.08573 0.250613 4.12712 0.285479 4.16198L2.53548 6.41198C2.57031 6.44691 2.6117 6.47461 2.65725 6.49352C2.70281 6.51242 2.75165 6.52216 2.80098 6.52216C2.8503 6.52216 2.89915 6.51242 2.9447 6.49352C2.99026 6.47461 3.03165 6.44691 3.06648 6.41198L5.31648 4.16198C5.35135 4.12712 5.379 4.08573 5.39787 4.04017C5.41674 3.99462 5.42645 3.94579 5.42645 3.89648C5.42645 3.84718 5.41674 3.79835 5.39787 3.7528C5.379 3.70724 5.35135 3.66585 5.31648 3.63098C5.24606 3.56057 5.15056 3.52101 5.05098 3.52101C5.00167 3.52101 4.95285 3.53072 4.90729 3.54959C4.86174 3.56846 4.82034 3.59612 4.78548 3.63098L3.17598 5.24123L3.17598 0.896485C3.17598 0.797028 3.13647 0.701646 3.06614 0.63132C2.99582 0.560993 2.90043 0.521485 2.80098 0.521485Z"
                                    fill="#E73F3F" />
                            </svg>

                            <p>32,41%</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/ticket/filter?filter_name=%20&filter_status=pending&filter_source=">
                <div class="item-stats">
                    <div class="icon-text-stats">
                        <div><img src="/images/Frame-3.svg" alt=""></div>
                        <p>Số thứ tự đang chờ</p>
                    </div>

                    <div class="index-stats">
                        <div class="number-stats-big">
                            <p>{{ $tickets->where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="number-stats-small-up">
                            <svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.80099 6.52148C2.70154 6.52148 2.60615 6.48198 2.53583 6.41165C2.4655 6.34132 2.42599 6.24594 2.42599 6.14648L2.42599 1.80173L0.816494 3.41198C0.781628 3.44685 0.740237 3.47451 0.694682 3.49338C0.649127 3.51225 0.600302 3.52196 0.550994 3.52196C0.501686 3.52196 0.452861 3.51225 0.407306 3.49338C0.361752 3.47451 0.32036 3.44685 0.285494 3.41198C0.250628 3.37712 0.222971 3.33573 0.204102 3.29017C0.185232 3.24462 0.175521 3.19579 0.175521 3.14648C0.175521 3.09718 0.185232 3.04835 0.204102 3.0028C0.222971 2.95724 0.250628 2.91585 0.285494 2.88098L2.53549 0.630984C2.57033 0.596061 2.61171 0.568355 2.65727 0.54945C2.70283 0.530545 2.75167 0.520814 2.80099 0.520814C2.85032 0.520814 2.89916 0.530545 2.94472 0.54945C2.99028 0.568355 3.03166 0.596061 3.06649 0.630984L5.31649 2.88098C5.35136 2.91585 5.37902 2.95724 5.39789 3.0028C5.41676 3.04835 5.42647 3.09718 5.42647 3.14648C5.42647 3.19579 5.41676 3.24462 5.39789 3.29017C5.37902 3.33573 5.35136 3.37712 5.31649 3.41198C5.24608 3.4824 5.15058 3.52196 5.05099 3.52196C5.00169 3.52196 4.95286 3.51225 4.90731 3.49338C4.86175 3.47451 4.82036 3.44685 4.78549 3.41198L3.17599 1.80173L3.17599 6.14648C3.17599 6.24594 3.13649 6.34132 3.06616 6.41165C2.99583 6.48198 2.90045 6.52148 2.80099 6.52148Z"
                                    fill="#FF9138" />
                            </svg>
                            <p>56,41%</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/ticket/filter?filter_name=%20&filter_status=skipped&filter_source=">
                <div class="item-stats">
                    <div class="icon-text-stats">
                        <div><img src="/images/Frame-4.svg" alt=""></div>
                        <p>Số thứ tự đã bỏ qua</p>
                    </div>

                    <div class="index-stats">
                        <div class="number-stats-big">
                            <p>{{ $tickets->where('status', 'skipped')->count() }}</p>
                        </div>
                        <div class="number-stats-small-down">
                            <svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.80098 0.521485C2.70152 0.521485 2.60614 0.560994 2.53581 0.63132C2.46549 0.701646 2.42598 0.797028 2.42598 0.896485L2.42598 5.24124L0.816479 3.63098C0.781613 3.59612 0.740221 3.56846 0.694667 3.54959C0.649112 3.53072 0.600287 3.52101 0.550979 3.52101C0.501671 3.52101 0.452846 3.53072 0.407291 3.54959C0.361737 3.56846 0.320345 3.59612 0.285479 3.63098C0.250613 3.66585 0.222956 3.70724 0.204087 3.7528C0.185217 3.79835 0.175505 3.84718 0.175505 3.89648C0.175505 3.94579 0.185217 3.99462 0.204087 4.04017C0.222956 4.08573 0.250613 4.12712 0.285479 4.16198L2.53548 6.41198C2.57031 6.44691 2.6117 6.47461 2.65725 6.49352C2.70281 6.51242 2.75165 6.52216 2.80098 6.52216C2.8503 6.52216 2.89915 6.51242 2.9447 6.49352C2.99026 6.47461 3.03165 6.44691 3.06648 6.41198L5.31648 4.16198C5.35135 4.12712 5.379 4.08573 5.39787 4.04017C5.41674 3.99462 5.42645 3.94579 5.42645 3.89648C5.42645 3.84718 5.41674 3.79835 5.39787 3.7528C5.379 3.70724 5.35135 3.66585 5.31648 3.63098C5.24606 3.56057 5.15056 3.52101 5.05098 3.52101C5.00167 3.52101 4.95285 3.53072 4.90729 3.54959C4.86174 3.56846 4.82034 3.59612 4.78548 3.63098L3.17598 5.24123L3.17598 0.896485C3.17598 0.797028 3.13647 0.701646 3.06614 0.63132C2.99582 0.560993 2.90043 0.521485 2.80098 0.521485Z"
                                    fill="#E73F3F" />
                            </svg>

                            <p>22,41%</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="area-board">
            <div class="stats-board">
                <div class="header-stats-board">
                    <div class="header-right-stats-board">
                        <p class="title-stats-board">Bảng thống kê theo
                            {{ request()->input('filterDate') ? strtolower(request()->input('filterDate')) : 'ngày' }}
                        </p>
                        <p class="date-stats-board">Tháng <?php echo date('m'); ?>/<?php echo date('Y'); ?></p>
                    </div>

                    <div class="header-left-stats-board">
                        <p>Xem theo</p>
                        <form action="{{ route('dashboard') }}" method="get">
                            <button class="btn-select-stats" role="button" id="dropdownMenuDate"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">{{ request()->input('filterDate') ? request()->input('filterDate') : 'Ngày' }}
                                <svg
                                    width="14" height="8" viewBox="0 0 14 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L7 7L13 1" fill="#FF7506" />
                                    <path d="M1 1L7 7L13 1H1Z" stroke="#FF7506" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu list-date-stats" aria-labelledby="dropdownMenuDate">
                                <li><button name="filterDate" value="Ngày"
                                        class="dropdown-item item-date-stats {{ request()->input('filterDate') == 'Ngày' ? 'active-date-stats' : ''}}">Ngày</button>
                                </li>
                                <li><button name="filterDate" value="Tuần"
                                        class="dropdown-item item-date-stats {{ request()->input('filterDate') == 'Tuần' ? 'active-date-stats' : ''}}">Tuần</button>
                                </li>
                                <li><button name="filterDate" value="Tháng"
                                        class="dropdown-item item-date-stats {{ request()->input('filterDate') == 'Tháng' ? 'active-date-stats' : ''}}">Tháng</button>
                                </li>
                            </ul>

                        </form>
                    </div>
                </div>

                <div>
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div class="content-right">
        <div class="title-content-right">
            <p>Tổng quan</p>
        </div>

        <div class="overview">
            <a href="{{ route('device') }}">
                <div class="overview-rect">
                    <div class="diagram-device">
                        <canvas id="myChartDevice" style="width: 80px; height: 80px" ></canvas>
                        <span class="percent">{{ $active_devices_percentage }}%</span>
                    </div>

                    <div class="overview-number">
                        <p class="number">{{ $devices->count() }}</p>
                        <p class="text-device">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.75675 1.16699H10.2376C12.3142 1.16699 12.8334 1.68616 12.8334 3.75699V7.44949C12.8334 9.52616 12.3142 10.0395 10.2434 10.0395H3.75675C1.68591 10.0453 1.16675 9.52616 1.16675 7.45533V3.75699C1.16675 1.68616 1.68591 1.16699 3.75675 1.16699Z"
                                    stroke="#FF7506" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 10.0449V12.8333" stroke="#FF7506" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M1.16675 7.58301H12.8334" stroke="#FF7506" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4.375 12.833H9.625" stroke="#FF7506" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg> <span>Thiết bị</span>
                        </p>
                    </div>

                    <div class="overview-status">
                        <div>
                            <p>
                                <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#FFD130" />
                                </svg>
                                Đang hoạt động
                            </p>
                            <span class="span-device">{{ $devices->where('active_status', 'active')->count() }}</span>
                        </div>

                        <div>
                            <p>
                                <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#7E7D88" />
                                </svg>
                                Ngưng hoạt động
                            </p>
                            <span class="span-device">{{ $devices->where('active_status', 'inactive')->count() }}</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('service') }}">
                <div class="overview-rect">
                    <div class="diagram-service">
                    <canvas id="myChartService" style="width: 80px; height: 80px" ></canvas>
                        <span class="percent">{{ $active_service_percentage }}%</span>
                    </div>

                    <div class="overview-number">
                        <p class="number">{{ $services->count() }}</p>
                        <p class="text-service">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.7704 5.7304C14.7704 7.04284 14.0591 8.22267 12.9266 9.04368C12.8874 9.07098 12.8658 9.11778 12.8639 9.16459L12.8149 10.4419C12.809 10.6135 12.6189 10.713 12.4739 10.6213L11.3864 9.94074C11.3864 9.94074 11.3864 9.94074 11.3845 9.94074C11.3218 9.89978 11.2453 9.88808 11.1748 9.90954C10.5282 10.1104 9.82472 10.2216 9.08797 10.2216C9.07817 10.2216 9.06837 10.2216 9.05857 10.2216C9.07817 10.0928 9.08797 9.96219 9.08797 9.82958C9.08797 7.99841 7.2108 6.51436 4.89472 6.51436C4.41857 6.51436 3.96201 6.57676 3.53485 6.69182C3.44863 6.38175 3.40356 6.05802 3.40356 5.7265C3.40356 3.24398 5.94695 1.2334 9.08601 1.2334C12.227 1.2373 14.7704 3.24983 14.7704 5.7304Z"
                                    stroke="#4277FF" stroke-width="1.10526" stroke-miterlimit="10" />
                                <path
                                    d="M3.53675 6.69531C1.88884 7.14189 0.703369 8.37828 0.703369 9.83308C0.703369 10.8003 1.22851 11.6721 2.06324 12.2785C2.09263 12.3 2.1083 12.3331 2.11026 12.3682L2.14553 13.3102C2.14945 13.4369 2.29053 13.5091 2.3983 13.4428L3.20168 12.9396C3.20756 12.9357 3.2154 12.9299 3.22128 12.926C3.25067 12.9026 3.28986 12.8948 3.32513 12.9065C3.81108 13.0625 4.34013 13.1483 4.89662 13.1483C7.04419 13.1483 8.81555 11.871 9.06048 10.2251"
                                    stroke="#4277FF" stroke-width="1.10526" stroke-miterlimit="10" />
                            </svg>
                            <span>Dịch vụ</span>
                        </p>
                    </div>

                    <div class="overview-status">
                        <div>
                            <p>
                                <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#4277FF" />
                                </svg>
                                Đang hoạt động
                            </p><span class="span-service">{{ $services->where('status', 'active')->count() }}</span>
                        </div>

                        <div>
                            <p><svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#7E7D88" />
                                </svg>
                                Ngưng hoạt động
                            </p>
                            <span class="span-service">{{ $services->where('status', 'inactive')->count() }}</span>
                        </div>

                    </div>
                </div>
            </a>


            <a href="{{ route('ticket') }}">
                <div class="overview-rect">
                    <div class="diagram-numberlevel">
                    <canvas id="myChartTicket" style="width: 80px; height: 80px" ></canvas>
                        <span class="percent">{{ $used_ticket_percentage }}%</span>
                    </div>

                    <div class="overview-number">
                        <p class="number">{{ $tickets->count() }}</p>
                        <p class="text-numberlevel">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_201_18602)">
                                    <g clip-path="url(#clip1_201_18602)">
                                        <path d="M1.16663 9.91699L6.99996 12.8337L12.8333 9.91699" stroke="#35C75A"
                                            stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1.16663 7L6.99996 9.91667L12.8333 7" stroke="#35C75A"
                                            stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M6.99996 1.16699L1.16663 4.08366L6.99996 7.00033L12.8333 4.08366L6.99996 1.16699Z"
                                            stroke="#35C75A" stroke-width="1.16667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_201_18602">
                                        <rect width="14" height="14" fill="white" />
                                    </clipPath>
                                    <clipPath id="clip1_201_18602">
                                        <rect width="14" height="14" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>Cấp số</span>
                        </p>
                    </div>
                    <div class="overview-status">
                        <div>
                            <p><svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#35C75A" />
                                </svg>
                                Đã sử dụng
                            </p>
                            <span class="span-numberlevel">{{ $tickets->where('status', 'used')->count() }}</span>
                        </div>

                        <div>
                            <p>
                                <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#7E7D88" />
                                </svg> Đang sử dụng
                            </p>
                            <span class="span-numberlevel">{{ $tickets->where('status', 'pending')->count() }}</span>
                        </div>
                        <div>
                            <p>
                                <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="4" height="4" rx="2" fill="#F178B6" />
                                </svg> Bỏ qua
                            </p><span
                                class="span-numberlevel">{{ $tickets->where('status', 'skipped')->count() }}</span>
                        </div>

                    </div>
                </div>
            </a>

        </div>

        <div class="calendar">
            <div class="header-calendar">
                <button class="prev">&#10094;</button>
                <div class="month">
                    <p><span class="day"></span> <span class="month-name"></span> <span class="year"></span></p>
                </div>
                <button class="next">&#10095;</button>
            </div>

            <ul class="weekdays">
                <li>Mo</li>
                <li>Tu</li>
                <li>We</li>
                <li>Th</li>
                <li>Fr</li>
                <li>Sa</li>
                <li>Su</li>
            </ul>

            <ul class="days"></ul>
        </div>
    </div>
</main>
<script>
// biểu đồ đường
const counts = {!!json_encode($counts) !!};
const labels = {!!json_encode($labels) !!};

// biểu đồ tròn thiết bị
var active_devices_count = <?php echo $active_devices_count; ?>;
var inactive_devices_count = <?php echo $inactive_devices_count; ?>;

// biểu đồ tròn dịch vụ
var active_service_count = <?php echo $active_service_count; ?>;
var inactive_service_count = <?php echo $inactive_service_count; ?>;

// biểu đồ tròn cấp số
var used_ticket_count = <?php echo $used_ticket_count; ?>;
var pending_ticket_count = <?php echo $pending_ticket_count; ?>;
var skipped_ticket_count = <?php echo $skipped_ticket_count; ?>;

</script>
@endsection