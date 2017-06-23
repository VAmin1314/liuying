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
                    <li class="@yield('list')">
                        <a href="/backend/photo">图片列表</a>
                    </li>
                    <li class="@yield('issue')">
                        <a href="/backend/photo/create">发布图片</a>
                    </li>
                </ul>
            </li>
            <li class="sub-menu @yield('music')">
                <a href="javascript:;" class="">
                    <i class="icon-book"></i>
                    <span>音乐列表</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="@yield('musicList')">
                        <a href="/backend/musicList">音乐列表</a>
                    </li>
                    <li class="@yield('issueMusic')">
                        <a href="/backend/issueMusic">添加音乐</a>
                    </li>
                </ul>
            </li>
            <li class="sub-menu @yield('setting')">
                <a href="javascript:;">
                    <i class="icon-book"></i>
                    <span>系统设置</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="@yield('commonSetting')">
                        <a href="/backend/setting">通用设置</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>