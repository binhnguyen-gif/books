<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>
    <section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý nhân viên
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a href="<?php echo route(); ?>admin/staff/create" class="btn btn-primary ">Thêm nhân viên</a>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Thứ Tự</th>
                            <th>Tên nhân viên </th>
                            <th>Số điện thoại </th>
                            <th>Email </th>
                            <th>Địa chỉ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (!empty($users)) {
                                foreach ($users as $index => $user) {
                                    // if ($user['role'] == 0) {
                                    ?>
                                    <tr>
                                        <td><span style="font-size: 17px;"><?php echo $index; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $user['username']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $user['phone']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $user['email']; ?></span></td>
                                        <td ><span style="font-size: 17px;"><?php echo $user['address']; ?></span></td>
                                        <?php ##$date = isset($user['birthday']) ?  date('Y-m-d', strtotime($user['birthday'])) : ''; ?>
                                        <!-- <td ><span style="font-size: 17px;"><?php ##echo $date; ?></span></td> -->
                                        <td>
                                            <?php $routeDelete = customRoute('admin/staff/delete?user_id=') . $user['id'] ?>
                                            <!-- check role la 1 tuc superadmin moi dc xoa -->
                                            <?php if($_SESSION['user']['role'] == 1 && $user['role'] != 1) {
                                                ?>
                                            <a href="javascript:customConfirm('<?php echo $routeDelete; ?>', 'Bạn có chắc muốn xóa nhân viên này không?')"
                                               class="active styling-edit" ui-toggle-class="">
                                                <i style="font-size: 26px;" class="fa fa-trash-o  text-danger text"></i>
                                            </a>
                                            <?php $routeEdit = customRoute('admin/staff/show?user_id=') . $user['id'] ?>
                                            <a href="<?php echo route() . 'admin/staff/show?user_id=' . $user['id']; ?>" class="active styling-edit" ui-toggle-class="">
                                                <i style="font-size: 20px;" class="fa fa-pencil-square-o text-success text-active"></i>
                                            </a>
                                           <?php } else{?>
                                            <p style="color: red;">Không có quyền</p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                } 
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Không có nv!</td>
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