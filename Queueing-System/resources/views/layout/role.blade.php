@extends('master')
@section('content')
<main>
    <div class="content-device">

        <div class="menubar-device">
            <div class="area-filter">
                <div class="title-heading">
                    <p>Danh sách vai trò</p>
                </div>
            </div>

            <div class="area-search">
                <p class="text-status-device">Từ khóa</p>
                <div class="input-search">
                    <input class="search-menubar-codes" type="text" placeholder="Nhập từ khóa">
                    <button class="btn-search-menubar-device" type="submit">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.5 17.5L13.875 13.875" stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        <div class="table-list-device">
            <!-- nút thêm thiết bị -->
            <a href="#">
                <div class="button-add-device">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8884 2.33301H9.11171C4.86504 2.33301 2.33337 4.86467 2.33337 9.11134V18.8763C2.33337 23.1347 4.86504 25.6663 9.11171 25.6663H18.8767C23.1234 25.6663 25.655 23.1347 25.655 18.888V9.11134C25.6667 4.86467 23.135 2.33301 18.8884 2.33301ZM18.6667 14.8747H14.875V18.6663C14.875 19.1447 14.4784 19.5413 14 19.5413C13.5217 19.5413 13.125 19.1447 13.125 18.6663V14.8747H9.33337C8.85504 14.8747 8.45837 14.478 8.45837 13.9997C8.45837 13.5213 8.85504 13.1247 9.33337 13.1247H13.125V9.33301C13.125 8.85467 13.5217 8.45801 14 8.45801C14.4784 8.45801 14.875 8.85467 14.875 9.33301V13.1247H18.6667C19.145 13.1247 19.5417 13.5213 19.5417 13.9997C19.5417 14.478 19.145 14.8747 18.6667 14.8747Z" fill="#FF9138" />
                    </svg>
                    <p>Thêm vai trò</p>
                </div>
            </a>

            <table>
                <thead>
                    <tr>
                        <th scope="col" class="th-border-left">Tên vai trò</th>
                        <th scope="col" class="border-table">Số người dùng</th>
                        <th scope="col" class="border-table">Mô tả</th>
                        <th scope="col" class="th-border-right"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-tr-white">
                        <td>
                            Kế toán
                        </td>
                        <td class="border-table">
                            6
                        </td>
                        <td class="border-table">
                            Thực hiện nhiệm vụ về thống kê số liệu và tổng hợp số liệu
                        </td>
                        <td><a href="#"> Cập nhật</a></td>
                    </tr>
                    <tr class="color-tr-or">
                        <td>
                            Bác sĩ
                        </td>
                        <td class="border-table">
                            6
                        </td>
                        <td class="border-table">
                            Thực hiện nhiệm vụ về thống kê số liệu và tổng hợp số liệu
                        </td>
                        <td><a href="#"> Cập nhật</a></td>
                    </tr>
                    <tr class="color-tr-white">
                        <td>
                            Lễ tân
                        </td>
                        <td class="border-table">
                            6
                        </td>
                        <td class="border-table">
                            Thực hiện nhiệm vụ về thống kê số liệu và tổng hợp số liệu
                        </td>
                        <td><a href="#"> Cập nhật</a></td>
                    </tr>
                    <tr class="color-tr-or">
                        <td>
                            Quản lý
                        </td>
                        <td class="border-table">
                            6
                        </td>
                        <td class="border-table">
                            Thực hiện nhiệm vụ về thống kê số liệu và tổng hợp số liệu
                        </td>
                        <td><a href="#"> Cập nhật</a></td>
                    </tr>
                    <tr class="color-tr-white">
                        <td>
                            Admin
                        </td>
                        <td class="border-table">
                            6
                        </td>
                        <td class="border-table">
                            Thực hiện nhiệm vụ về thống kê số liệu và tổng hợp số liệu
                        </td>
                        <td><a href="#"> Cập nhật</a></td>
                    </tr>
                    <tr class="color-tr-or">
                        <td>
                            Superadmin
                        </td>
                        <td class="border-table">
                            6
                        </td>
                        <td class="border-table">
                            Thực hiện nhiệm vụ về thống kê số liệu và tổng hợp số liệu
                        </td>
                        <td><a href="#"> Cập nhật</a></td>
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