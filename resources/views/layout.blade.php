<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="{{ asset('front/css/backend-plugin.mine209.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('front/css/backende209.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/%40icon/dripicons/dripicons.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="noteplus-layout ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    <!-- Wrapper Start -->
    <div class="wrapper" id="app">
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="#" class="header-logo">
                            <img src="{{ asset('front/images/logo.png') }}" class="img-fluid rounded-normal light-logo"
                                alt="logo">

                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="h1-dropdownSearch"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu"
                                        aria-labelledby="h1-dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                    placeholder="type here to search...">
                                                <a href="#" class="search-link"><i class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="index.html" class="header-logo">
                    <img src="{{ asset('front/images/logo.png') }}" class="img-fluid rounded-normal light-logo"
                        alt="logo">
                    <h4 class="logo-title ml-3">Protokollerim</h4>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <i class="las la-times wrapper-menu"></i>
                </div>
            </div>
            <div class="sidebar-caption dropdown">
                <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('front/images/user/1.jpg') }}" class="img-fluid rounded avatar-50 mr-3"
                        alt="user">
                    <div class="caption">
                        <h6 class="mb-0 line-height">Ümmühan </h6>
                    </div>
                    <i class="las la-angle-down"></i>
                </a>

            </div>

        </div>
        <div class="content-page">

            @yield('content')


        </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="text-secondary mr-1">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>©
                    </span> <a href="#" class="">NotePlus</a>.
                </div>
            </div>
        </div>
    </footer>
    <script src="//unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/1.9.0/axios.min.js"></script>
    <script src="{{ asset('front/js/backend-bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('front/js/tree.js') }}"></script>
    <script src="{{ asset('front/js/table-treeview.js') }}"></script>
    <script src="{{ asset('front/js/app.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
</body>

</html>
