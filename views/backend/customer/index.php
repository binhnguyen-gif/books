<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>
    <section id="main-content">
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
                        <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button><a href="<?php echo route(); ?>admin/list-customer" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
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
                            <th class="text-left">Ngày sinh</th>
<!--                            <th class="text-center">Lịch sử giao dịch</th>-->
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
//                            $date1 = date("Y-m-d", strtotime($_POST['date1']));
//                            $date2 = date("Y-m-d", strtotime($_POST['date2']));
                            if (!empty($customers)) {
                                foreach ($customers as $index => $customer) {?>

                                    <tr>
                                        <td><span style="font-size: 17px;"><?php echo $index; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $customer['username']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $customer['phone']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $customer['email']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $customer['address']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo date('Y-m-d', strtotime($customer['birthday'])); ?></span></td>

<!--                                        <td style="width: 12%;text-align: center">-->
<!--                                            <a href="javascript:xemgiaodich('--><?php // ?><!--')">-->
<!--                                                <i style="font-size: 26px;" class="fa fa-list-alt text-success text-active"></i>-->
<!--                                            </a></td>-->
                                        <td>
                                            <a href="javascript:xoa_id('<?php  ?>')"
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
                            ?>
                        </tbody>
                    </table>
                </div>
    </section>
    </section>
<?php include(__DIR__ . '/../common/footer.php');?>