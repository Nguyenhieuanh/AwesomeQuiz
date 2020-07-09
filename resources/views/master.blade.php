<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link type="text/css" href="{{ asset('assets/vendor/simplebar.css') }}" rel="stylesheet">

    <!-- MDK -->
    <link type="text/css" href="{{ asset('assets/vendor/material-design-kit.css') }}" rel="stylesheet">

    <!-- Sidebar Collapse -->
    <link type="text/css" href="{{ asset('assets/vendor/sidebar-collapse.min.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    {{-- Add sweetaler2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>
    @include('sweetalert::alert')

    @yield('content')

    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Simplebar -->
    <!-- Used for adding a custom scrollbar to the drawer -->
    <script src="{{ asset('assets/vendor/simplebar.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>
    <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

    <!-- Sidebar Collapse -->
    <script src="{{ asset('assets/vendor/sidebar-collapse.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('js/custom/customJs.js') }}"></script>
    <script>
        $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
</body>

</html>
