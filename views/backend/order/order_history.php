<section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê lịch sử đơn hàng
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th>Mã giao dịch</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày đặt</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($sql_giaodich)>0)
                    {
                        $i = 0;
                        while($row_giaodich = mysqli_fetch_array($sql_giaodich)){
                            $i++;
                            ?>
                            <tr>
                                <td><span style="font-size: 17px;"><?php echo $i; ?></span></td>
                                <td ><span style="font-size: 17px;"><?php echo $row_giaodich['magiaodich']; ?></span></td>
                                <td ><span style="font-size: 17px;"><?php echo $row_giaodich['sanpham_name']; ?></span></td>
                                <td ><span style="font-size: 17px;"><?php echo $row_giaodich['ngaythang']; ?></span></td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <tr>
                            <td colspan="5">Không tìm thấy dữ liệu cần tìm !</td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">

                <form action="" method="POST">
                    <button type="submit" name="btn-thoat" class="btn btn-info">Quay lại</button>
                </form>
            </footer>
</section>
