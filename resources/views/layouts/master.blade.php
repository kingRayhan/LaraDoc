<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Laravel Doc</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
     
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{ Html::style('https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:200,400,700,600,400italic,700italic') }}
        {{ Html::style('css/normalize.css') }}
        {{ Html::style('css/helper.css') }}
        {{ Html::style('css/font-awesome.min.css') }}
        {{ Html::style('css/bootstrap-flatly.css') }}
        {{ Html::script('js/modernizr.min.js') }}
        {{ Html::style('css/style.css') }}
        @yield('header')
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        
        
    @include('partials._nav')

    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">@include('partials._msg')</div>
            </div>
        </div>
        @yield('page-content')
    </div>



        <div class="well">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       {!! $FooterMenu->asUl(['class'=>'nav navbar-nav']) !!}
                    </div>
                </div>
            </div>
        </div>

    {{ Html::script('js/jquery-1.11.3.min.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
    @yield('footer')
    {{ Html::script('js/custom.js') }}
    </body>
</html>
