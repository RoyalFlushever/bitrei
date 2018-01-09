<!DOCTYPE html>
<!--[if IE 9]> <html lang="ru" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>@yield('pageTitle')</title>
<meta name="description" content="@yield('pageDesc')" />
<meta name="keywords" content="@yield('pageKeys')">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="">
@yield('pageCanonical')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=cyrillic" rel="stylesheet">
<link href="/template_theproject/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/template_theproject/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="/admin/vendors/normalize-css/normalize.css" rel="stylesheet">
<? /*<link href="/admin/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="/admin/vendors/ion.rangeSlider/css/ion.rangeSlider.skinHTML5.css" rel="stylesheet">
*/?>
<link href="{{ asset('/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
<? //<link href="{{ asset('/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"> ?>
<link href="{{ asset('/admin/build/css/custom.min.css') }}" rel="stylesheet">
<link href="/template_theproject/css/style.css" rel="stylesheet" >
<link href="/template_theproject/css/skins/light_blue.css" rel="stylesheet">
<link href="/template_theproject/css/custom.css" rel="stylesheet">
@yield('extra_head')
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="no-trans front-page">

@yield('content')

@yield('footer')

</body>
</html>