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
        <div>
            <h4>Tên khách hàng: <b><?php echo $order['username']; ?></b></h4>
            <h4>Điện thoại: <?php echo $order['phone'] ?? ''; ?></h4>
            <h4>Thời gian đặt
                hàng: <?php echo $order['booking_date']; ?></h4>
            <h4>Địa
                chỉ: <?php echo $order['address']; ?>
            </h4>
            <h4>Mã đơn hàng: <b><?php echo $order['order_code']; ?></b></h4>
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
                </tr>
                </thead>
                <tbody>
                <?php
                $orderDetails = $orderDetails ?? [];
                foreach ($orderDetails as $index => $orderDetail) { ?>
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
                    </tr>
                    <?php }?>
                <tr>
                    <td colspan="3" style="border: none;"></td>
                    <td colspan="1" class="text-left"
                        style="border: none;">Tổng cộng:
                    </td>
                    <td colspan="1" class="text-right"
                        style="border: none;"><?php echo number_format($order['total_price']); ?> ₫
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="border: none;"></td>
                    <td colspan="1" class="text-left"
                        style="border: none; font-size: 1.1em;">Mã giảm giá:
                    </td>
                    <td colspan="1" class="text-right"
                        style="border: none; font-size: 1.1em;">
                        - <?php echo $order['voucher'] ?? 0; ?> ₫
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="border: none;"></td>
                    <td colspan="1" class="text-left"
                        style="border: none;">Phí vận chuyển:
                    </td>
                    <td colspan="1" class="text-right"
                        style="border: none;">
                        <?php echo $order['shipping'] ?? number_format(10000); ?> ₫
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right"
                        style="border: none; color: red; font-size: 1.3em;">Thành
                        tiền: <?php echo number_format($order['total_price']); ?> ₫
                    </td>
                </tr>
                <form action="<?php echo customRoute('admin/order/status') ?>" method="POST">
                <tr class="print-order">
                    <td class="text-left" colspan="1">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                        <label for="status"></label>
                        <select name="status" id="status" class="form-control">
                            <?php foreach (orderStatus() as $index => $status) { ?>
                            <option value="<?php echo $index; ?>" <?php echo ($order['status'] == $index) ? 'selected' : ''; ?> ><?php echo $status; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="text-left" colspan="1">
                        <button type="submit" name="updateOrderStatus" class="btn btn-primary btn-md" style="margin-top: 16px;">Cập nhật trạng thái đơn hàng</button>
                    </td>
                    </form>
                    <td class="text-right" colspan="6">
                        <a class="btn btn-primary btn-md" role="button"
                           onclick="window.print()">
                            <span class="glyphicon glyphicon-print"></span> In đơn hàng
                        </a>
                    </td>
                </tr>

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
