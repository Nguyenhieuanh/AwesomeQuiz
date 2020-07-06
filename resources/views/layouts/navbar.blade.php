@extends('master')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark bg-primary m-0">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
        <span class="material-icons">menu</span>
    </button>

    <!-- Brand -->
    <a href="student-dashboard.html" class="navbar-brand"><i class="material-icons">
            school</i> Trắc nghiệm</a>

    <!-- Search -->
    <form class="navbar-search-form d-none d-md-flex">
        <input type="text" class="form-control" placeholder="Tìm kiếm">
        <button class="btn" type="button"><i class="material-icons">
                search</i></button>
    </form>
    <!-- // END Search -->

    <div class="navbar-spacer"></div>

    <!-- Menu -->
    <ul class="nav navbar-nav d-none d-md-flex">
        <li class="nav-item">
            <a class="nav-link" href="student-forum.html">Diễn đàn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="student-help-center.html">Trợ giúp</a>
        </li>
    </ul>

    <!-- Menu -->
    <ul class="nav navbar-nav">

        <li class="nav-item">
            <a href="student-cart.html" class="nav-link">
                <i class="material-icons">shopping_cart</i>
            </a>
        </li>

        <!-- User dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img
                    src="assets/images/people/50/guy-6.jpg" alt="Avatar" class="rounded-circle" width="40"></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="student-account-edit.html">
                    <i class="material-icons">edit</i> Thay đổi tài khoản
                </a>
                <a class="dropdown-item" href="student-profile.html">
                    <i class="material-icons">person</i> Thông tin cá nhân
                </a>
                <a class="dropdown-item" href="guest-login.html">
                    <i class="material-icons">lock</i> Thoát
                </a>
            </div>
        </li>
        <!-- // END User dropdown -->

    </ul>
    <!-- // END Menu -->

</nav>
<!-- // END Navbar -->

<div class="mdk-drawer-layout js-mdk-drawer-layout flex" data-fullbleed data-push data-has-scrolling-region>
    <div class="mdk-drawer-layout__content mdk-drawer-layout__content--scrollable">
        @yield('content')
    </div>


    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content ">
            <div class="sidebar sidebar-left sidebar-light sidebar-transparent-sm-up o-hidden">
                <div class="sidebar-p-y" data-simplebar data-simplebar-force-enabled="true">
                    <div class="sidebar-heading">APPLICATIONS</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" href="student-dashboard.html">
                                <i class="red sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    account_box</i> Học sinh
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    school</i> Instructor
                            </a>
                        </li>
                    </ul>
                    <div class="sidebar-heading">Layout</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" href="student-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    dashboard</i> Fluid Layout
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="fixed-student-dashboard.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    dashboard</i> Fixed Layout
                            </a>
                        </li>
                    </ul>

                    {{-- Student --}}
                    <div class="sidebar-heading">Student</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-browse-courses.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    search</i> Đề kiểm tra
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-view-course.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Xem đề
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-take-course.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    class</i> Danh sách học sinh
                                <span class="sidebar-menu-badge badge badge-default ml-auto">PRO</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-take-quiz.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    dvr</i> Nhóm học sinh
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-quiz-results.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    poll</i> Câu hỏi
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-account-edit.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    account_box</i> Tài khoản
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-my-courses.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    school</i> Đề đã làm
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-messages.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    comment</i> Tin nhắn
                                <span class="sidebar-menu-badge badge badge-default ml-auto">2</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="student-billing.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    monetization_on</i> Đơn hàng
                                <span class="sidebar-menu-badge badge badge-default ml-auto">$25</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="guest-login.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    lock_open</i> Thoát
                            </a>
                        </li>
                    </ul>
                    
                    {{-- instructor --}}
                    <div class="sidebar-heading">Instructor</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-courses.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>
                                Course Manager
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-quizzes.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> Quiz
                                Manager
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-profile.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">language</i> Public
                                Profile
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-account-edit.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i>
                                Account Settings
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-messages.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">comment</i> Messages
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-earnings.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">trending_up</i>
                                Earnings
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="instructor-statement.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i>
                                Statement
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="guest-login.html">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                            </a>
                        </li>
                    </ul>
                    <!-- Components menu -->
                    <div class="sidebar-heading">UI Components</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse"
                                href="#ui-components">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">tune</i>
                                UI Components
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu sm-condensed collapse" id="ui-components">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-buttons.html">
                                        Buttons</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-cards.html">
                                        Cards</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-tabs.html">
                                        Tabs</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-tree.html">
                                        Tree</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-nestable.html">
                                        Nestable</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-notifications.html">
                                        Notifications</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-progress.html">
                                        Progress Bars</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-forms.html">
                                        Forms</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-tables.html">
                                        Tables</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-charts.html">
                                        Charts</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-calendar.html">
                                        Calendar</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="ui-maps-vector.html">
                                        Maps Vector</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- // END Components Menu -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
