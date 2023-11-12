<hr>
<footer id="footer " style="background-color: #EEEEEE;">
        <!--Footer-->


        <div class="footer-widget " >
            <div class="container ">
                <div class="row ">
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Hỗ Trợ-Dịch Vụ</h2>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a href="# ">Mua hàng trả góp</a></li>
                                <li><a href="# ">Chính sách bảo hành</a></li>
                                <li><a href="# ">Tra cứu đơn hàng</a></li>
                                <li><a href="# ">Chính sách bảo mật</a></li>
                                <li><a href="# ">Điều khoản mua bán hàng hóa</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Thông Tin Liên Hệ</h2>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a href="# ">Bán hàng Online</a></li>
                                <li><a href="# ">Chăm sóc Khách Hàng</a></li>
                                <li><a href="# ">Hỗ Trợ Kỹ thuật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Hệ thống 75 siêu thị trên toàn quốc
                            </h2>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a href="# ">Danh sách 75 siêu thị trên toàn quốc</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <div class="single-widget ">
                            <h2>Thanh toán miễn phí</h2>
                            <table>
                                <tr>
                                    <td><img src="<?php echo route();?>assets/images/shop/thanhtoan/bidv.png" style=" width: 90px; height: 40px;margin: 5px; " alt=""></td>
                                    <td><img src="<?php echo route();?>assets/images/shop/thanhtoan/icon-vnpay.png" style=" width: 90px; height: 40px; margin: 5px;" alt=""></td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo route();?>assets/images/shop/thanhtoan/visa.png" alt="" style=" width: 90px; height: 40px; margin: 5px; "></td>
                                    <td><img src="<?php echo route();?>assets/images/shop/thanhtoan/zalopay.png" alt="" style=" width: 90px; height: 40px; margin: 5px; "></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1 ">
                        <div class="single-widget ">
                            <h2>Đăng ký nhận tin</h2>
                            <form action="# " class="searchform ">
                                <input type="text " placeholder="Email của bạn ........." />
                                <button type="submit " class="btn btn-default "><i class="fa fa-arrow-circle-o-right "></i></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p style="width:306px; margin: auto">Copyright © 2023 NHÓM 8</p>

                </div>
            </div>
        </div>

    </footer>

    <!--/Footer-->
    <script src="<?php echo route();?>assets/js/jquery.js "></script>
    <script src="<?php echo route();?>assets/js/bootstrap.min.js "></script>
    <script src="<?php echo route();?>assets/js/jquery.scrollUp.min.js "></script>
    <script src="<?php echo route();?>assets/js/price-range.js "></script>
    <script src="<?php echo route();?>assets/js/jquery.prettyPhoto.js "></script>
    <script src="<?php echo route();?>assets/js/main.js "></script>
    <script src="<?php echo route();?>assets/js/toastr.min.js "></script>

	<!-- scroll seller -->
	<script src="<?php echo route();?>assets/js/scroll.js"></script>
	<!-- //scroll seller -->
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
<?php customToaster('success') ?>
    </script>
    </body>
</html>
