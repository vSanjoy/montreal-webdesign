<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{!! $metaKeywords !!}" />
	    <meta name="description" content="{!! $metaDescription !!}" />
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}"/>
        <title>{!! $title !!}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/bootstrap.min.css') }}" />
        <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/owl.carousel.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/owl.theme.default.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/animate.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/ryxren.css') }}" />
        <link rel="preconnect" type="text/css" href="https://fonts.gstatic.com" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" />
        <!-- Custom styles for this template -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/style.css') }}" />
        @php
        if (App::getLocale() == 'ar') {
        @endphp
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/style-ar.css') }}" />
        @php
        }
        @endphp
        <!-- Toastr css -->
        <link href="{{ asset('css/admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
        <!-- Development css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/site/development.css') }}" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        {{-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=608af7a9daac690012507a9b&product=sop' async='async'></script> --}}
    </head>
    <body class="lang_{{ app()->getLocale() }}">
        {{-- notfound-404 --}}
        <div class="wrapper " id="wrapper">
            @yield('content')
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/site/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/site/bootstrap.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/site/jquery.meanmenu.js') }}"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        <script type="text/javascript" src="{{ asset('js/site/ryxren.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/site/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/site/scrollspy.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/site/owl.carousel.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/site/lazyload.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/site/custom.js') }}"></script> 
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
        <script src="{{ asset('js/site/ie10-viewport-bug-workaround.js') }}"></script>
        <!-- Toastr js & rendering -->
        <script src="{{ asset('js/admin/plugins/toastr/toastr.min.js') }}"></script>
        @toastr_render
        @php
        if (array_key_exists(App::getLocale(), config('global.WEBSITE_LANGUAGE'))) {
            $jsLang = App::getLocale();
        @endphp
        <script src="{{asset('js/site/development_'.$jsLang.'.js')}}"></script>
        @php
        }
        @endphp

        @stack('scripts')

    </body>
</html>