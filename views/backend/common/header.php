<!DOCTYPE html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php
    echo route(); ?>/assets/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="<?php
    echo route(); ?>/assets/css/style.css" rel='stylesheet' type='text/css'/>
    <link href="<?php
    echo route(); ?>/assets/css/style-responsive.css" rel="stylesheet"/>
    <link href="<?php
    echo route(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php
    echo route(); ?>/assets/css/font.css" type="text/css"/>
    <link href="<?php
    echo route(); ?>/assets/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php
    echo route(); ?>/assets/css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="<?php
    echo route(); ?>/assets/css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="<?php
    echo route(); ?>/assets/js/jquery2.0.3.min.js"></script>
    <script src="<?php
    echo route(); ?>/assets/js/raphael-min.js"></script>
    <script src="<?php
    echo route(); ?>/assets/js/morris.js"></script>
    <link href="<?php echo route(); ?>assets/css/toastr.min.css" rel="stylesheet">
    <script>
        function customConfirm(route, message)
        {
            if(confirm(message))
            {
                window.location.href= route;
            }
        }
    </script>
</head>
<body>

<!--header start-->
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="<?php
        echo route(); ?>" class="logo">
            PSP BOOK
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="<?php
                    echo route(); ?>assets/images/shop/logo.png">
                    <span class="username"><?php
                        ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="<?php
                        echo route(); ?>admin/logout"><i class="fa fa-key"></i> Đăng xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->
