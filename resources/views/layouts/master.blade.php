<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>@yield('title')</title>
        <meta name="description" content="My Project">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css' />
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700&amp;subset=vietnamese" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700&amp;subset=vietnamese" rel="stylesheet">     
        {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('bower/font-awesome/css/font-awesome.css') }}
        {{ Html::style('bower/owl.carousel/dist/assets/owl.carousel.min.css') }}                            
        {{ Html::style('css/base.scss.css') }}
        {{ Html::style('css/style.scss.css') }}
        {{ Html::style('css/module.scss.css') }}
        {{ Html::style('css/responsive.scss.css') }}
        {{ Html::script('bower/jquery/dist/jquery.min.js') }}
        {{ Html::script('js/search.js') }}
    </head>
    <body>  
        @include('layouts.elements.top')
        @include('layouts.elements.menu')
        <div class="main-content">
            @yield('content')
        </div>
        @include('layouts.elements.footer') 
    </body>
</html>
{{ Html::script('js/main.js') }}
{{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
{{ Html::script('bower/owl.carousel/dist/owl.carousel.min.js') }}
