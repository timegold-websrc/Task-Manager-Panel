
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo-icon.png">
    <title>Service Task Force</title>
    <!-- chartist CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/select2/dist/css/select2.min.css">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">

    <link href="../../assets/extra-libs/css-chart/css-chart.css" rel="stylesheet">
    <link href="../../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<![endif]-->
</head>

<body>
  <div class="main-wrapper" id="app"> 
    @yield('content')   
  </div>


  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>

  <script src="{{ URL::to('/') }}/" defer></script>  
</body>
</html>