<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('app-assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('app-assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('app-assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('app-assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('app-assets/favicon/safari-pinned-tab.svg')}}" color="#0010f7">
    <meta name="msapplication-TileColor" content="#0010f7">
    <meta name="theme-color" content="#ffffff">

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugin/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/icons/iconly/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/icons/remix-icon/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "/googlecharts/loader.js"></script>
    <script src = "https://www.gstatic.com/charts/loader.js"></script>

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/base/font-control.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/base/typography.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/base/base.css')}}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/theme/colors-dark.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/theme/theme-dark.css')}}">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/sider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">

    <!-- Customizer -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/layouts/customizer.css')}}">

    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-contact.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/select2/select2.css')}}">

    @yield('css')

    <title>@yield('title', 'HI-Tech')</title>
</head>

<body>
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        <div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
            <div class="hp-sidebar-container">
                <div class="hp-sidebar-header-menu">
                    <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">
                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                            <button type="button" class="btn btn-text btn-icon-only">
                                <i class="ri-menu-unfold-line" style="font-size: 16px;"></i>
                            </button>
                        </div>

                        @include('partials.dashboard.logo')

                        <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                            <button type="button" class="btn btn-text btn-icon-only">
                                <i class="ri-menu-fold-line" style="font-size: 16px;"></i>
                            </button>
                        </div>
                    </div>

                    @include('partials.dashboard.sidebar')
                </div>
            </div>
        </div>

        <div class="hp-main-layout">
            @include('partials.dashboard.navbar')

            <div class="offcanvas offcanvas-start hp-mobile-sidebar" tabindex="-1" id="mobileMenu"
                aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-end me-16 ms-24 mt-16 p-0">

                    @include('partials.dashboard.logo')

                    <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                        <button type="button" class="btn btn-text btn-icon-only">
                            <i class="ri-close-fill lh-1 hp-text-color-black-80" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
                    <div class="hp-sidebar-container">
                        <div class="hp-sidebar-header-menu">
                            <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">
                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                                    <button type="button" class="btn btn-text btn-icon-only">
                                        <i class="ri-menu-unfold-line" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </div>

                            @include('partials.dashboard.sidebar')
                        </div>
                    </div>
                </div>
            </div>


            <div class="hp-main-layout-content">
                @yield('content')

                @yield('modal')
            </div>

            @include('partials.dashboard.footer')
        </div>
    </main>

    @include('partials.dashboard.custom-theme')

    @include('partials.logout')

    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px"
                width="16px" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z">
                    </path>
                </g>
            </svg>
        </button>
    </div>

    <!-- Plugin -->
    <script src="{{asset('app-assets/js/plugin/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="{{asset('app-assets/js/plugin/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/autocomplete.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/moment.min.js')}}"></script>
    <script src="{{asset('app-assets/js/croppie.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/apex-chart.js')}}"></script>
    <script src="{{asset('app-assets/js/plugin/apexcharts.min.js')}}"></script>
    

    <!-- Layouts -->
    <script src="{{asset('app-assets/js/layouts/header-search.js')}}"></script>
    <script src="{{asset('app-assets/js/layouts/sider.js')}}"></script>
    <script src="{{asset('app-assets/js/components/input-number.js')}}"></script>

    <!-- Charts -->
    <script src="{{asset('app-assets/js/charts/apex-chart.js')}}"></script>
    <script src="{{asset('app-assets/js/charts/apex-chart.min.js')}}"></script>

    <!-- Base -->
    <script src="{{asset('app-assets/js/base/index.js')}}"></script>

    <!-- Customizer -->
    <script src="{{asset('app-assets/js/customizer.js')}}"></script>

    <!-- PHP JS -->
    <script src="{{asset('app-assets/js/phpjs/variable.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{asset('app-assets/js/select2/select2.js')}}"></script>

    @yield('js')

</body>

</html>
