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


    <div class="navbar-spacer"></div>

    <!-- Menu -->
    <ul class="nav navbar-nav d-none d-md-flex">
        <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
        </li>
    </ul>

    <!-- Menu -->
    <ul class="nav navbar-nav">



        <!-- User dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img
                    src="assets/images/people/50/guy-6.jpg" alt="Avatar" class="rounded-circle" width="40"></a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('changePassword') }}">
                    <i class="material-icons">lock</i> Change password
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
                                    account_box</i> QuizPlayer
                            </a>
                        </li>
                        @elseif (Auth::user()->role == 1)
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    school</i> QuizManager
                            </a>
                        </li>
                        @else
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    engineering</i> OverLord
                            </a>
                        </li>
                        @endif
                    </ul>

                    @if (Auth::user()->role == 0)
                    {{-- Student --}}
                    <div class="sidebar-heading">QuizPlayer</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('quiz.list') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Quizzes
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('categories.index')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Quiz Category
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button"
                                href="{{ route('userQuiz.allResults', ['userId' => Auth::id()]) }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    school</i> History
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
                    <div class="sidebar-heading">QuizManager</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('quiz.list') }}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">sticky_note_2</i>
                                Quiz
                                Manager
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('categories.index')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                    import_contacts</i> Quiz Category List
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('question.index')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> Question
                                List
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="#">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">history</i>
                                Submitted Quizzes
                            </a>
                        </li>
                        @if (Auth::user()->role == 2)
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{route('user.list')}}">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_circle</i>
                                User List
                            </a>
                        </li>
                        @endif
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
