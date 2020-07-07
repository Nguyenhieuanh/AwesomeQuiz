@extends('master')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark bg-primary m-0">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
        <span class="material-icons">menu</span>
    </button>

    <!-- Brand -->
    <a href="{{route('home')}}" class="navbar-brand"><i class="material-icons">
            school</i> AwesomeQuiz</a>

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
                <a class="dropdown-item" href="#">
                    <i class="material-icons">edit</i> Thay đổi tài khoản
                </a>
                <a class="dropdown-item" href="#">
                    <i class="material-icons">person</i> Thông tin cá nhân
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="material-icons">lock</i> Logout
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
        @yield('content_home')
    </div>


    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content ">
            <div class="sidebar sidebar-left sidebar-light sidebar-transparent-sm-up o-hidden">
                <div class="sidebar-p-y" data-simplebar data-simplebar-force-enabled="true">
                    <div class="sidebar-heading">APPLICATIONS</div>
                    <ul class="sidebar-menu">
                        @if (Auth::user()->role == 0)
                        <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" href="#">
                                <i class="red sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    account_box</i> Học sinh
                            </a>
                        </li>
                        @else
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    school</i> Instructor
                            </a>
                        </li>
                        @endif
                    </ul>

                    @if (Auth::user()->role == 0)
                    {{-- Student --}}
                    <div class="sidebar-heading">Student</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    search</i> Đề kiểm tra
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('categories.index')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Quiz Category
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Xem đề
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    class</i> Danh sách học sinh
                                <span class="sidebar-menu-badge badge badge-default ml-auto">PRO</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    poll</i> Câu hỏi
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    school</i> Đề đã làm
                            </a>
                        </li>


                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    lock_open</i> Logout
                            </a>
                        </li>
                    </ul>
                    @else
                    {{-- instructor --}}
                    <div class="sidebar-heading">Instructor</div>
                    <ul class="sidebar-menu">

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('categories.index')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Quiz Category
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('quiz.list') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> Quiz
                                Manager
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('question.index')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> Question
                                Manager
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('user.list')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> QuizPlayer Manager
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">language</i> Public
                                Profile
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                            </a>
                        </li>
                    </ul>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
