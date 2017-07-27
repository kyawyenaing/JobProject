<!DOCTYPE html>
<html lang="en-US"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- base href="http://baganmart.com/" -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('keyword')">

    <!-- Bootstrap -->
    <link href="{{url('')}}/sites/css/custom.css" rel="stylesheet">
    <link href="{{url('')}}/sites/css/global.css" rel="stylesheet">
    <link href="{{url('')}}/sites/css/app.min.css" rel="stylesheet">
    <link rel="icon" href="{{url('')}}/sites/images/favicon.ico" type="image/x-icon">

    <!-- <link href="{{ asset('/css/style.css') }}" rel="stylesheet"> -->

    <!-- for sharing buttons  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--  -->
    <meta charset="UTF-8">
    <title>@yield('title')</title>


</head>
<body>

<style type="text/css">
/*    #bottom_row{
        display: none;
    }
    #menu_apps {
      position: fixed;
      right: 0px;
      top: 29%;
      margin-top: -2.5em;
      z-index: 3;
    }
    .header-app
    {
        margin-top:5px;
        margin-left:20px;
    }
    @media(max-width: 800px)
    {
        .header-app
        {
            margin: 0px;
        }
        #menu_apps
        {
            display: none;
        }
    }*/
</style>
@include('partials.nav')
@yield('content')
@include('partials.banner')
<!-- @include('partials.footer') -->
<!-- <script src="{{url('')}}/sites/css/custom.css"></script> -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>

@yield('js-file')

<script type='text/javascript'>
$(document).ready(function() {
	$('.popup-youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
	$(".container").flowUp("div#one", { transalteY: 350, duration: 1.2 });
});
</script>
<script>
@yield('js')
</script>
</body>
</html>
