<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>

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
                        <th>Ngày tháng</th>
                        <th>Tình trạng</th>
                        <th style="width:100px;">Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>
                                    <?php ?>
                                </td>
                                <td>
                                    <span style="font-size: 17px;">
                                    <?php
                                    ?>
                                    </span>
                                </td>
                                <td>
                                    <span style="font-size: 17px;">

                                    </span>
                                </td>
                                <td >
                                    <span style="font-size: 17px;"><?php echo $row_dh['mahang']; ?></span>
                                </td>
                                <td >
                                    <span style="font-size: 17px;"><?php echo $row_dh['ngaythang']; ?></span>
                                </td>
                                <td >
                                    <span style="font-size: 17px;">
                                    <?php
                                    if($row_dh['tinhtrang']==1)
                                    {
                                        echo 'Đã xử lý';
                                    }
                                    if($row_dh['tinhtrang']==0)
                                    {
                                        echo 'Đang xử lý';
                                    }
                                    ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="javascript:xemdonhang('<?php echo $row_dh['mahang'];?>')"
                                       class="active styling-edit" ui-toggle-class="">
                                        <i style="font-size: 20px;" class="fa fa-building-o   text"></i>
                                    </a>
                                </td>
                            </tr>


                        <tr>
                            <td colspan="5">Không tìm thấy dữ liệu cần tìm !</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
<?php include(__DIR__ . '/../common/footer.php');?>