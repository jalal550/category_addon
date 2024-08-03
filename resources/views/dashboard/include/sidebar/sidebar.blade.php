<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="times_link @if (Route::currentRouteName() == 'dash.home') active @endif">
                    <a href="{{ route('dash.home') }}"><img src="{{ asset('resources/assets/img/icons/dashboard.svg') }}"
                            alt="img"><span>
                            Dashboard</span> </a>
                </li>




                    <li class="times_link submenu @if (preg_match('/^categories/', Route::currentRouteName())) royal @endif">
                        <a href="javascript:void(0);">
                            <i class="fas fa-list text-muted"></i>
                            <span>Categories</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>

                                <li class="times_link">
                                    <a class="@if (Route::currentRouteName() == 'categories.index') activex @endif"
                                       href="{{ route('categories.index') }}"> All categories </a>
                                </li>

                        </ul>
                    </li>



            </ul>
        </div>
    </div>
</div>


<style>
    .activex {
        background: #1b2850d9;
        color: #fff !important;
        border-radius: 5px;
    }
</style>
