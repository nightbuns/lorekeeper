<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        header("Permissions-Policy: interest-cohort=()");
    ?>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} -@yield('title')</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} -@yield('title')">
    <meta name="description" content="@if(View::hasSection('meta-desc')) @yield('meta-desc') @else {{ config('lorekeeper.settings.site_desc', 'A Lorekeeper ARPG') }} @endif">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url', 'http://localhost') }}">
    <meta property="og:image" content="@if(View::hasSection('meta-img')) @yield('meta-img') @else {{ asset('images/meta-image.png') }} @endif">
    <meta property="og:title" content="{{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} -@yield('title')">
    <meta property="og:description" content="@if(View::hasSection('meta-desc')) @yield('meta-desc') @else {{ config('lorekeeper.settings.site_desc', 'A Lorekeeper ARPG') }} @endif">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url', 'http://localhost') }}">
    <meta property="twitter:image" content="@if(View::hasSection('meta-img')) @yield('meta-img') @else {{ asset('images/meta-image.png') }} @endif">
    <meta property="twitter:title" content="{{ config('lorekeeper.settings.site_name', 'Lorekeeper') }} -@yield('title')">
    <meta property="twitter:description" content="@if(View::hasSection('meta-desc')) @yield('meta-desc') @else {{ config('lorekeeper.settings.site_desc', 'A Lorekeeper ARPG') }} @endif">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ asset('js/croppie.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lorekeeper.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    {{-- jQuery UI --}}
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

    {{-- Bootstrap Toggle --}}
    <link href="{{ asset('css/bootstrap4-toggle.min.css') }}" rel="stylesheet">


    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui-timepicker-addon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap4.css') }}" rel="stylesheet">

    @if(file_exists(public_path(). '/css/custom.css'))
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @endif

    @if(Auth::check() && Auth::user()->theme)
        @php $theme = Auth::user()->theme->cssUrl @endphp
        <link href="{{ Auth::user()->theme->cssUrl }}" rel="stylesheet">
    @elseif(isset($defaultTheme))
        @php $theme = $defaultTheme->CSSUrl @endphp
        <link href="{{ $defaultTheme->CSSUrl }}" rel="stylesheet">
    @else
        @php $theme = null @endphp
    @endif

</head>
<body>
    <div id="app">

        @if(Auth::check() && Auth::user()->theme)
            <div class="site-header-image text-center" id="header" style="background-image: url('{{ Auth::user()->theme->imageUrl }}');">
                <img src="{{ asset('images/logo.png') }}" style="margin-top: 2em; height: 150px; filter: drop-shadow(0 0 0.3em black);" />
            </div>
        @elseif(isset($defaultTheme) && isset($defaultTheme->imageUrl))
            <div class="site-header-image text-center" id="header" style="background-image: url('{{ $defaultTheme->imageUrl }}');">
                <img src="{{ asset('images/logo.png') }}" style="margin-top: 2em; height: 150px; filter: drop-shadow(0 0 0.3em black);" />
            </div>
        @else
            <div class="site-header-image text-center" id="header" style="background-image: url('{{ asset('images/header.png') }}');">
                <img src="{{ asset('images/logo.png') }}" style="margin-top: 2em; height: 150px; filter: drop-shadow(0 0 0.3em black);" />
            </div>
        @endif

        @include('layouts._nav')
        @if ( View::hasSection('sidebar') )
			<div class="site-mobile-header bg-secondary"><a href="#" class="btn btn-sm btn-outline-light" id="mobileMenuButton">Menu <i class="fas fa-caret-right ml-1"></i></a></div>
		@endif

        <main class="container-fluid">
            <div class="row no-gutters">

                <div class="sidebar col-lg-2 pt-5 pb-5" id="sidebar">
                    @yield('sidebar')
                </div>
                <div class="main-content col-lg-8 pt-5 pb-5">

                    <!-- this feature has been taken over by the speech bubble! -->
                    <!--<div>
                        @if(Auth::check() && !Config::get('lorekeeper.extensions.navbar_news_notif'))
                            @if(Auth::user()->is_news_unread)
                                <div class="alert alert-info"><a href="{{ url('news') }}">There is a new news post!</a></div>
                            @endif
                            @if(Auth::user()->is_sales_unread)
                                <div class="alert alert-info"><a href="{{ url('sales') }}">There is a new sales post!</a></div>
                            @endif
                        @endif
                        @include('flash::message')
                    </div> -->
                    @if(View::hasSection('right'))
                        <div>
                            @yield('content')
                        </div>
                    @elseif(View::hasSection('sidebar'))
                        <div class="main-card">
                            @yield('content')
                        </div>
                    @else
                        <div class="main-card-secondary">
                            @yield('content')
                        </div>
                    @endif
                </div>
                <div class="col-lg-2 pt-5 pb-5" id="right-splash">
                    @yield('right')
                </div> 
            </div>
        </main>

        <div class="site-footer" id="footer">
            @include('layouts._footer')
        </div>


        <div class="modal fade" id="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="modal-title h5 mb-0"></span>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>

        @yield('scripts')
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip({html: true});
                $('.cp').colorpicker();
                tinymce.init({
                    selector: '.wysiwyg',
                    height: 500,
                    menubar: false,
                    convert_urls: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen spoiler',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | spoiler-add spoiler-remove | removeformat | code',
                    content_css: [
                        '{{ asset('css/app.css') }}',
                        '{{ asset('css/lorekeeper.css') }}',
                        '{{ asset('css/custom.css') }}',
                        '{{$theme}}'
                    ],
                    spoiler_caption: 'Toggle Spoiler',
                    target_list: false
                });
                var $mobileMenuButton = $('#mobileMenuButton');
                var $sidebar = $('#sidebar');
                $('#mobileMenuButton').on('click', function(e) {
                    e.preventDefault();
                    $sidebar.toggleClass('active');
                });

                $('.inventory-log-stack').on('click', function(e) {
                    e.preventDefault();
                    loadModal("{{ url('items') }}/" + $(this).data('id') + "?read_only=1", $(this).data('name'));
                });

                $('.spoiler-text').hide();
                    $('.spoiler-toggle').click(function(){
                        $(this).next().toggle();
                    });
                });
            function checkMobileBorder(){
                let html = document.querySelector("html");
                let width = html.offsetWidth;

                if(width > "991"){
                    contentBorder();
                    return;
                }
            }

            function contentBorder(){
                let sidebar = document.querySelector(".sidebar ul");
                let main = document.querySelector(".main-card");

                let sidebarHeight = sidebar.offsetHeight;
                let mainHeight = main.offsetHeight;

                console.log(mainHeight, sidebarHeight);

                if(sidebarHeight < mainHeight){
                    main.style.borderBottomLeftRadius = "2em";
                    return;
                }
            }

            checkMobileBorder();
        </script>
    </div>
</body>
</html>
