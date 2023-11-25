<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link href="<?php echo route(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo route(); ?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo route(); ?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo route(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo route(); ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo route(); ?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?php echo route(); ?>assets/css/toastr.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo route(); ?>assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo route(); ?>assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo route(); ?>assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo route(); ?>assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo route(); ?>assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script>
        function customConfirm(route, message)
        {
            if(confirm(message))
            {
                 window.location.href= route;
                 // document.getElementById(id).submit();
            }
        }

        function updateCart()
        {
            document.getElementById("updateCartForm").submit();
        }

        function checkout()
        {
            document.getElementById("checkout").submit();
        }


        function sortBook()
        {
            let sort_by_price = document.getElementById("sort_by_price").value;

            let newUrl = "<?php echo route(); ?>?sort_by_price=" + sort_by_price;

            window.location.href = newUrl;
        }
    </script>
</head>
<body>
<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i><span style="color:red"> Hotline:0819277274 MINHENTER</a></li>
                                <li><a href="book@gmail.com"><i class="fa fa-envelope"></i> book@gmail.com</a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua hàng : 8:00am - 21h30pm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#" class="nav_icon"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="nav_icon"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="nav_icon"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php echo route(); ?>"><img style="width:90px;height: 70px;border-radius: 50%;" src="<?php echo route(); ?>assets/images/shop/logo2.jpg" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">

                            </div>

                            <div class="btn-group">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" style="margin-top:16px; ">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php if(isset($_SESSION['customer'])){
                                    ?>   
                                    <li><a href="#"><i class="fa fa-user"></i><?php echo $_SESSION['customer']['username']; ?> </a></li>
                                <li><a href="<?php echo route(); ?>cart"><i class="fa fa-shopping-cart "></i> Giỏ Hàng</a></li>

                                <li><a href="<?php echo route(); ?>logout"><i class="fa fa-sign-out "></i> Đăng Xuất</a></li>
                                <?php 
                                }else{ 
                                ?>
                                <li >
                                    <a href="" data-toggle="modal" data-target="#dangnhap"><i class="fa fa-sign-in "></i>Đăng Nhập</a>
                                </li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#dangky"><i class="fa fa-user-plus "></i>Đăng Ký</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->
        <div class="header-bottom ">
            <!--header-bottom-->
            <div class="container ">
                <div class="row ">
                    <div class="col-sm-5 ">
                        <div class="navbar-header ">
                            <button type="button " class="navbar-toggle " data-toggle="collapse " data-target=".navbar-collapse ">
                                <span class="sr-only ">Toggle navigation</span>
                                <span class="icon-bar "></span>
                                <span class="icon-bar "></span>
                                <span class="icon-bar "></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left ">
                            <ul class="nav navbar-nav collapse navbar-collapse ">
                                <li class="active"><a href="<?php echo route(); ?>">Trang Chủ</a></li>
                                <li class=""><a href="<?php echo route(); ?>books">Sản Phẩm</a></li>
                                <li ><a href="<?php echo route(); ?>contact">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">

						<div class="col-sm-7 agileits_search search_box pull-right " style="margin-top: -10px;">
							<form class="form-inline" action="<?php echo route(); ?>" method="GET">
								<input class="form-control mr-sm-2" name="search" type="search" placeholder="Tìm kiếm sản phẩm " aria-label="Search">
								<button class="btn my-2 my-sm-0" type="submit">Tìm kiếm</button>
							</form>
						</div>
						<!-- //search -->
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center"  style="font-size: 26px;text-transform: uppercase;color: aqua;">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo route(); ?>login" method="POST">
						<div class="form-group">
							<label class="col-form-label">Địa chỉ email</label>
							<input type="email" class="form-control" placeholder="Địa chỉ email" name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" điền mật khẩu " name="password" required="">
						</div>
						<div class="right-w3l">
							<input  type="submit" class="form-control input_hover" name="dangnhap" value="Đăng nhập">
						</div>
						
						<p class="text-center dont-do mt-3">Chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng ký</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- register -->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="total_area">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center" style=" font-size: 26px;text-transform: uppercase;color: aqua;">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo route(); ?>register" method="POST">
						<div class="form-group">
							<label class="col-form-label">Tên khách hàng</label>
							<input type="text" class="form-control" placeholder="  " name="username" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" placeholder=" " name="phone"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input type="text" class="form-control" placeholder=" " name="address"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
                            <input type="hidden" name="note" value="a">
                            <input type="hidden" name="giaohang" value="2">
                           
						</div>
						<div class="right-w3l">
							<input  type="submit" class="form-control input_hover" name="dangky" value="Đăng ký">
						</div>					
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
	<!-- //modal -->