<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>

    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý khách hàng
                </div>
                <div class="row">
                    <form autocomplete="off" method="POST">
                        <div class="col-md-2">
                            <p>Từ ngày: <input type="date" class="form-control" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>"> </p><br>
                        </div>
                        <div class="col-md-2">
                            <p>Đến ngày: <input type="date" class="form-control" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"> </p>
                        </div><br>
                        <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button><a href="quanlykhachhang.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
                    </form>

                </div>
                <div class="table-responsive">

                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Thứ Tự</th>
                            <th>Tên khách hàng </th>
                            <th>Số điện thoại </th>
                            <th>Email </th>
                            <th>Địa chỉ</th>
                            <th>Ngày mua</th>
                            <th >Lịch sử giao dịch</th>

                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($_POST['search'])) {
                            $date1 = date("Y-m-d", strtotime($_POST['date1']));
                            $date2 = date("Y-m-d", strtotime($_POST['date2']));
                            $sql_kq = mysqli_query($con, "SELECT * FROM tbl_khachhang,tbl_giaodich WHERE tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id AND timee BETWEEN '$date1 ' AND '$date2' GROUP BY tbl_giaodich.magiaodich ORDER BY tbl_khachhang.khachhang_id DESC");
                            if (mysqli_num_rows($sql_kq)>0) {
                                $i = 0;
                                while ($row_khachhang = mysqli_fetch_array($sql_kq)) {
                                    $i++; ?>
                                    <tr>
                                        <td><span style="font-size: 17px;"><?php echo $i; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $row_khachhang['names']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $row_khachhang['phone']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $row_khachhang['email']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $row_khachhang['addresss']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $row_khachhang['timee']; ?></span></td>

                                        <td style="width: 12%;text-align: center">
                                            <a href="javascript:xemgiaodich('<?php echo $row_khachhang['magiaodich'] ?>')">
                                                <i style="font-size: 26px;" class="fa fa-list-alt text-success text-active"></i>
                                            </a></td>
                                        <td>
                                            <a href="javascript:xoa_id('<?php echo $row_khachhang['khachhang_id']; ?>')"
                                               class="active styling-edit" ui-toggle-class="">
                                                <i style="font-size: 26px;" class="fa fa-trash-o  text-danger text"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Không có khách hàng!</td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <!-- không tìm kiếm theo ngày -->
                            <?php
                            $sql_kq = mysqli_query($con, "SELECT * FROM tbl_khachhang,tbl_giaodich WHERE tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id GROUP BY tbl_giaodich.magiaodich ORDER BY tbl_khachhang.khachhang_id DESC");

                            $i = 0;
                            while ($row_khachhang = mysqli_fetch_array($sql_kq)) {
                                $i++;
                                ?>
                                <tr>
                                    <td><span style="font-size: 17px;"><?php echo $i; ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $row_khachhang['names']; ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $row_khachhang['phone']; ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $row_khachhang['email']; ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $row_khachhang['addresss']; ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $row_khachhang['timee']; ?></span></td>

                                    <td style="width: 12%;text-align: center">
                                        <a href="javascript:xemgiaodich('<?php echo $row_khachhang['magiaodich'] ?>')">
                                            <i style="font-size: 26px;" class="fa fa-list-alt text-success text-active"></i>
                                        </a></td>
                                    <td>
                                        <a href="javascript:xoa_id('<?php echo $row_khachhang['khachhang_id']; ?>')"
                                           class="active styling-edit" ui-toggle-class="">
                                            <i style="font-size: 26px;" class="fa fa-trash-o  text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

    </section>
<?php include(__DIR__ . '/../common/footer.php');?>