@if (Auth::check())
<nav class="menubar">
    <div class="logo-menubar">
        <img src="\images\Logo\alta.svg" alt="">
    </div>

    <ul class="menubar-ul">

        @if(count($menu)>0)
        @foreach($menu as $item)
        <li class="menubar-item {{ str_contains(Route::currentRouteName(), $item->route) ? 'active-menubar' : '' }}">
            <a href="/{{$item -> route}}" class="d-flex">
                <img src="/images/icon-menubar/{{$item -> icon}}" alt="">
                <p>{{$item -> name}}</p>
            </a>
        </li>
        @endforeach
        @endif

        <li
            class="menubar-item open-menu-setting-system {{ Route::currentRouteName() == 'role' 
            || Route::currentRouteName() == 'account' || Route::currentRouteName() == 'logs_user' ? 'active-menubar' : '' }}">
            <a class="menubar-setting-system d-flex">
                <img src="/images/icon-menubar/icon-setting.svg" alt="">
                <p>Cài đặt hệ thống</p>
            </a>
            <i class='bx bx-dots-vertical-rounded'></i>

            <!-- == Menu Setting System == -->

            <ul class="menu-setting-system">
                <li class="item-setting-system {{ Route::currentRouteName() == 'role' ? 'active-menubar' : '' }}"><a
                        href="/role">Quản lý vai trò</a></li>
                <li class="item-setting-system {{ Route::currentRouteName() == 'account' ? 'active-menubar' : '' }}"><a
                        href="/account">Quản lý tài khoản</a></li>
                <li
                    class="item-setting-system {{ Route::currentRouteName() == 'logs_account' ? 'active-menubar' : '' }}">
                    <a href="/logs_account">Nhật ký người dùng</a>
                </li>
            </ul>

        </li>

    </ul>

    <div class="d-flex justify-content-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="button-logout" type="submit">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3334 14.1663L17.5 9.99967L13.3334 5.83301" stroke="#FF7506" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M17.5 10H7.5" stroke="#FF7506" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M7.5 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H7.5"
                        stroke="#FF7506" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Đăng xuất
            </button>
        </form>
    </div>
</nav>
@endif