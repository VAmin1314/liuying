<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu">
            <li class="@yield('index')">
                <a href="/backend">
                    <i class="icon-dashboard"></i>
                    <span>后台首页</span>
                </a>
            </li>
            <li class="sub-menu @yield('photo')">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>图片发布</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="@yield('photoList')">
                        <a href="/backend/photoList">图片列表</a>
                    </li>
                    <li class="@yield('issuePhoto')">
                        <a href="/backend/issuePhoto">发布图片</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>