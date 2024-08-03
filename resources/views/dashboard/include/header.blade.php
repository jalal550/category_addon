<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    @yield('title')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('resources/assets/img/timesLogo.png') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/bootstrap-datetimepicker.min.css') }}">


    <script src="{{ asset('resources/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('resources/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('resources/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('resources/assets/js/script.js') }}"></script>
    <script src="{{ asset('resources/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('resources/assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('resources/assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('resources/assets/js/tableToExcel.js') }}"></script>
</head>



<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="{{ route('dash.home') }}" class="logo">
                    <img src="{{ asset('resources/assets/img/logo.png') }}" alt="">
                </a>
                <a href="#" class="logo-small">
                    <img src="{{ asset('resources/assets/img/logo-sm.png') }}" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>
            {{-- {{route("dash.home")}} --}}
            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item d-none">
                    <div class="top-nav-search">

                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="{{ asset('resources/assets/img/icons/closes.svg') }}"
                                            alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img
                                    src="{{ asset('resources/assets/img/icons/search.svg') }}" alt="img"></a>
                        </form>
                    </div>
                </li>



            </ul>




        </div>


        {{-- Alert --}}

        @if (session()->has('message'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ empty(session()->get('type')) ? 'success' : 'error' }}',
                    title: '{{ session()->get('message') }}',
                    showConfirmButton: false,
                    timer: 2500
                })
            </script>
        @endif

{{--        @if ($errors->any())--}}
{{--            <script>--}}
{{--                Swal.fire({--}}
{{--                    icon: 'error',--}}
{{--                    title: 'Oops...',--}}
{{--                    text: '{{ $errors->first() }}',--}}
{{--                })--}}
{{--            </script>--}}
{{--        @endif--}}
