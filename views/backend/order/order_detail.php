<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>
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
                    <th>Ngày tháng</th>
                </tr>
                </thead>
                <tbody>


                    <tr>
                        <td>

                        </td>
                        <td>
                                    <span style="font-size: 17px;">
                                    <?php
                                    ?>
                                    </span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php
                                 ?></span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php
                                echo number_format(1).'vnđ'; ?></span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php
                                echo number_format(
                                        1).'vnđ'; ?></span>
                        </td>
                        <td>
                            <span style="font-size: 17px;"><?php
                                echo 1; ?></span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <form action="" method="POST">
                <button type="submit" name="btn-thoat" class="btn btn-info">Quay lại</button>
            </form>
        </footer>
    </div>
</section>
<?php include(__DIR__ . '/../common/footer.php');?>
