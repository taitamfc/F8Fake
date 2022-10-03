<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span
                    class="user-avatar user-avatar-lg"><img
                        src="{{ asset('AdminTheme/assets/images/avatars/profile.jpg') }}" alt=""></span> <span
                    class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
                    class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                        class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span>
                        Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span
                            class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a
                        class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item"
                        href="#">Keyboard Shortcuts</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <li class="menu-item has-active">
                        <a href="index.html" class="menu-link"><span class="menu-icon fas fa-home"></span> <span
                                class="menu-text">Trang Chủ</span></a>
                    </li>
                    <li class="menu-header">NGUỒN LỰC </li>
                    @can('viewAny', App\Models\User::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('users.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-person"></span> <span class="menu-text">Nhân Viên</span></a>
                    </li>
                    @endcan
                    <!-- /.menu-item -->
                    <!-- .menu-item -->
                    @can('viewAny', App\Models\Group::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('groups.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-people"></span> <span class="menu-text">Nhóm Nhân Viên</span></a>

                    </li>
                    @endcan
                    <!-- /.menu-item -->
                    <!-- .menu-item -->
                    @can('viewAny', App\Models\Student::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('students.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-people"></span> <span class="menu-text">Học Viên</span></a>

                    </li>
                    @endcan
                    <!-- /.menu-item -->

                    <li class="menu-header">HỌC</li><!-- /.menu-header -->
                    <!-- .menu-item -->
                    @can('viewAny', App\Models\Course::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('courses.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-puzzle-piece"></span> <span class="menu-text">Khóa Học</span></a>
                    </li>
                    @endcan
                    <li class="menu-item has-child">
                        <a href="{{ route('steps.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-puzzle-piece"></span> <span class="menu-text">Lộ Trình</span></a>

                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="{{ route('tracks.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-pencil"></span> <span class="menu-text">Chương Học</span></a>

                    </li><!-- /.menu-item -->
                    <!-- .menu-item -->
                    @can('viewAny', App\Models\TrackStep::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('tracksteps.index') }}" class="menu-link"><span
                                class="menu-icon fas fa-table"></span> <span class="menu-text">Bài Học</span></a>

                    </li>
                    @endcan
                    <!-- /.menu-item -->
                    <!-- .menu-item -->
                    @can('viewAny', App\Models\Level::class)
                        <li class="menu-item has-child">
                            <a href="{{ route('levels.index') }}" class="menu-link"><span
                                    class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Cấp Độ</span></a>
                        </li><!-- /.menu-item -->
                    @endcan
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="{{ route('blogs.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Bài Viết</span></a>
                    </li>
                    <li class="menu-item has-child">
                        <a href="{{ route('comments.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Bình Luận</span></a>
                    </li>
                    @can('viewAny', App\Models\Banner::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('banners.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-list-rich"></span> <span class="menu-text">Ảnh Bìa</span></a>
                    </li>
                    @endcan
                    @can('viewAny', App\Models\WillLearn::class)
                    <li class="menu-item has-child">
                        <a href="{{ route('Will-learns.index') }}" class="menu-link"><span
                                class="menu-icon oi oi-list-rich"></span> <span class="menu-text">will
                                learns</span></a>
                    </li>
                    @endcan
                    <li class="menu-item has-child">
                        <a href="{{ route('comments.index') }}" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span
                                class="menu-text">Bình Luận</span></a>
                    </li>
                    <li class="menu-item has-child">
                        <a href="{{ route('banners.index') }}" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span
                                class="menu-text">Ảnh Bìa</span></a>
                    </li>
                    <li class="menu-item has-child">
                        <a href="{{ route('WillLearns.index') }}" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span
                                class="menu-text">will learns</span></a>
                    </li>
                    <li class="menu-item has-child">
                        <a href="{{ route('requirements.index') }}" class="menu-link"><span class="menu-icon oi oi-list-rich"></span> <span
                                class="menu-text">Yêu Cầu</span></a>
                    </li>

                </ul>
            </nav>
        </div>
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span
                    class="d-compact-menu-none">Chế Độ Ban Đêm</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
</aside>
