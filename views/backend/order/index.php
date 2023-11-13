<?php

include(__DIR__.'/../common/header.php'); ?>
<?php
include(__DIR__.'/../common/aside.php'); ?>
    <section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý Đơn Hàng
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên người đặt</th>
                        <th>Hình thức thanh toán</th>
                        <th>Mã hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tình trạng</th>
                        <th style="width:100px;">Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($orders)) {
                        foreach ($orders as $index => $order) { ?>
                            <tr>
                                <td><?php echo $index;?>
                                </td>
                                <td>
                                    <span style="font-size: 17px;">
                                    <?php
                                    echo $order['username'];
                                    ?>
                                    </span>
                                </td>
                                <td>
                                    <span style="font-size: 17px;">
                                        <?php
                                        echo paymentType($order['payment_type']); ?>
                                    </span>
                                </td>
                                <td>
                                    <span style="font-size: 17px;"><?php
                                        echo $order['order_code']; ?></span>
                                </td>
                                <td>
                                    <span style="font-size: 17px;"><?php
                                        echo $order['booking_date']; ?></span>
                                </td>
                                <td>
                                    <span style="font-size: 17px;">
                                    <?php
                                    echo getOrderStatusAttribute($order['status']);
                                    ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo customRoute('admin/order/show?order_id=') . $order['id']; ?>"
                                       class="active styling-edit" ui-toggle-class="">
                                        <i style="font-size: 20px;" class="fa fa-building-o text"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5">Không tìm thấy dữ liệu cần tìm !</td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </section>
<?php
include(__DIR__.'/../common/footer.php'); ?>