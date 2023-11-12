<!DOCTYPE html>
<head>
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo route(); ?>assets/css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="<?php echo route(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo route(); ?>assets/css/style-responsive.css" rel="stylesheet"/>
    <link href="<?php echo route(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="<?php echo route(); ?>assets/css/font.css" type="text/css"/>
    <link href="<?php echo route(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo route(); ?>assets/css/toastr.min.css" rel="stylesheet">
    <script src="<?php echo route(); ?>assets/js/jquery2.0.3.min.js"></script>
</head>
<body>

<div class="log-w3">
    <div class="w3layouts-main">
        <h2>Đăng nhập</h2>
        <form action="<?php echo route();?>admin/login" method="POST">
            <input type="text" class="ggg" name=username placeholder="Tên tài khoản" required="">
            <input type="password" class="ggg" name="password" placeholder="Mật khẩu" required="">
            <span><input type="checkbox" />Nhớ tài khoản</span>
            <h6><a href="#">Quên mật khẩu?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Đăng nhập" name="login">
        </form>
    </div>
</div>


<script src="<?php echo route(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo route(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo route(); ?>assets/js/scripts.js"></script>
<script src="<?php echo route(); ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo route(); ?>assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo route(); ?>assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo route(); ?>assets/js/jquery.scrollTo.js"></script>
<script src="<?php echo route();?>assets/js/toastr.min.js "></script>
<script>
    function showToast(messageType, message) {
        console.log('vaod');
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
        };

        toastr[messageType](message);
    }
</script>
<script>
    <?php customToaster('success');
    customToaster('warning');
    customToaster('error');
    customToaster('info');
    ?>
</script>
</body>
</html>
