<?php
require_once 'common/header.php';
require_once 'common/aside.php';
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form action="<?php echo customRoute('admin'); ?>" autocomplete="off" method="GET">
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
                <a href="<?php echo customRoute('admin') ;?>" type="button" class="btn btn-success"><span
                            class="glyphicon glyphicon-refresh"><span></a>
            </form>
        </div>

        <div class="market-updates">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-2">
                    <a href="<?php echo customRoute('admin/list-book') ;?>">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-eye"> </i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Số sách</h4>
                            <h3>
                                <?php
                                echo $totalBookForSale;
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
                    <a href="<?php echo customRoute('admin/list-customer') ;?>">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Khách hàng</h4>
                            <h3>
                                <?php
                                echo $totalCustomer;
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
                    <a href="<?php echo customRoute('admin/list-category') ;?>">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-newspaper-o fa-3x" style="color: white;"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Số Danh Mục</h4>
                            <h3>
                                <?php
                                echo $totalCategory;
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
                    <a href="<?php echo customRoute('admin/list-order') ;?>">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Số đơn hàng</h4>
                            <h3>
                                <?php
                                echo $totalOrderSold;
                                ?>
                            </h3>
                            <p>Đã bán</p>
                        </div>
                        <div class="clearfix">
                        </div>
                    </a>
                </div>
            </div>
            <div class="hero-area"></div>
        </div>

    </section>
<!--main content end-->
<?php
require_once 'common/footer.php';
?>



