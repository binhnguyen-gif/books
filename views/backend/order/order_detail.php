<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>
<section id="main-content">
<section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi Tiết Đơn Hàng
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
<!--                    <th>Ngày đặt</th>-->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orderDetails as $index => $orderDetail) { ?>
                    <tr>
                        <td>
                            <?php echo $index; ?>
                        </td>
                        <td><span style="font-size: 17px;"><?php echo $orderDetail['name'] ?></span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php echo $orderDetail['quantity'] ?></span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php
                                echo number_format($orderDetail['price']).'vnđ'; ?></span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php
                                echo number_format($orderDetail['total_price']).'vnđ'; ?></span>
                        </td>
<!--                        <td>-->
<!--                            <span style="font-size: 17px;">--><?php
//                                echo 1; ?><!--</span>-->
<!--                        </td>-->
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <a href="<?php echo customRoute('admin/list-order') ?>" class="btn btn-info">Quay lại</a>
        </footer>
    </div>
</section>
</section>
<?php include(__DIR__ . '/../common/footer.php');?>
