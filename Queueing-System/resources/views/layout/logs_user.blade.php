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
                            <path d="M4.13346 2.46129L2.9735 1.75776L1.08342 0.611381C0.683023 0.372106 0 0.543527 0 0.886368V3.11126V5.11474C0 5.45758 0.683023 5.629 1.08342 5.38616L4.13346 3.53624C4.62218 3.2434 4.62218 2.75771 4.13346 2.46129Z" fill="#535261" />
                        </svg>
                        <input class="input-date-service" type="date">
                    </div>

                </div>
            </div>

            <div class="area-search">
                <p class="text-status-device">Từ khóa</p>
                <div class="input-search">
                    <input class="search-menubar-device" type="text" placeholder="Nhập từ khóa">
                    <button class="btn-search-menubar-device" type="submit">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.5 17.5L13.875 13.875" stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        <div class="table-list-loguser">

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
                    <tr class="color-tr-white">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>

                    <tr class="color-tr-or">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>
                    <tr class="color-tr-white">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>

                    <tr class="color-tr-or">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>
                    <tr class="color-tr-white">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>

                    <tr class="color-tr-or">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>
                    <tr class="color-tr-white">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>

                    <tr class="color-tr-or">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>
                    <tr class="color-tr-white">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>

                    <tr class="color-tr-or">
                        <td>
                            tuyetnguyen@12
                        </td>
                        <td class="border-table">
                            01/12/2021 15:12:17
                        </td>
                        <td class="border-table">
                            192.168.3.1
                        </td>
                        <td>Cập nhật thông tin dịch vụ DV_01</td>
                    </tr>

                </tbody>
            </table>

            <div class="area-pagination-page">
                <ul class="pagination-page">
                    <li>
                        <a href="#"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L1 6L7 11" fill="#A9A9B0" />
                                <path d="M7 1L1 6L7 11L7 1Z" stroke="#A9A9B0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </li>
                    <li class="active-pagina-page"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href="">5</a></li>
                    <li><a href="">...</a></li>
                    <li><a href="">10</a></li>
                    <li>
                        <a href="#"><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L7 6L1 1" fill="#7E7D88" />
                                <path d="M1 11L7 6L1 1L1 11Z" stroke="#7E7D88" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</main>
@endsection