    <?php require_once 'common/header.php';
    require_once 'common/aside.php';
    ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <form autocomplete="off" method="POST">
                    <div class="col-md-2">
                        <p>Từ ngày: <input type="date" class="form-control" name="date1" value="<?php
                            echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>"></p><br>
                    </div>
                    <div class="col-md-2">
                        <p>Đến ngày: <input type="date" class="form-control" name="date2" value="<?php
                            echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"></p>
                    </div>
                    <br>
                    <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span>
                    </button>
                    <a href="admin.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-refresh"><span></a>
                </form>

            </div>

            <div class="market-updates">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <a href="quanlisp.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-eye"> </i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Sản phẩm</h4>
                                <h3>
                                    <?php
                                    ?>
                                </h3>
                                <p>Đang được bán</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-1">
                        <a href="quanlykhachhang.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Khách hàng</h4>
                                <h3>
                                    <?php

                                    ?>
                                </h3>
                                <p>Đã đăng ký</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <a href="quanly_tintuc.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-newspaper-o fa-3x" style="color: white;"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Số Tin Tức</h4>
                                <h3>
                                    <?php

                                    ?>
                                </h3>
                                <p>Đã đăng lên</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-4">
                        <a href="QuanLyDonHang.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Số đơn hàng</h4>
                                <h3>
                                    <?php

                                    ?>
                                </h3>
                                <p>Đã bán</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- //market-->

            <!-- //market-->
            <div class="market-updates">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <a href="quanlisp.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-eye"> </i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Sản phẩm</h4>
                                <h3>
                                    <?php


                                    ?>
                                </h3>
                                <p>Đang được bán</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-1">
                        <a href="quanlykhachhang.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Khách hàng</h4>
                                <h3>
                                    <?php

                                    ?>
                                </h3>
                                <p>Đã đăng ký</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <a href="quanly_tintuc.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-newspaper-o fa-3x" style="color: white;"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Số Tin Tức</h4>
                                <h3>
                                    <?php

                                    ?>
                                </h3>
                                <p>Đã đăng lên</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-4">
                        <a href="QuanLyDonHang.php">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Số đơn hàng</h4>
                                <h3>
                                    <?php

                                    ?>
                                </h3>
                                <p>Đã bán</p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- //market-->
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2021 MAXBOOK | Thiết kế bởi: NHÓM 5</p>
                </div>
            </div>
            <!-- / footer -->
        </section>

    </section>
    <!--main content end-->
    <?php require_once 'common/footer.php';
    ?>



