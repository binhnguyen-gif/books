<?php

include(__DIR__.'/../common/header.php'); ?>
<?php
include(__DIR__.'/../common/aside.php'); ?>
    <section id="main-content">
    <section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Thêm danh nhân viên</header>
                </section>
                <div class="panel-body">
                    <div class="position-center">
                        <?php
                        $route = isset($user) ? customRoute('admin/staff/update') : customRoute(
                            'admin/staff/create'
                        ) ?>
                        <form role="form" action="<?php echo $route ?>" method="POST">
                            <input type="hidden" name="_token" value="qjXZyD171s2S86tqwOpW7ygKbYI6Nh7QEVRcNwPG">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhân viên:</label>
                                <input type="hidden" name="user_id" value="<?php
                                echo isset($user['id']) ? $user['id'] : '' ?>">
                                <input type="text" class="form-control" name="username" required="required" value="<?php
                                echo isset($user['username']) ? $user['username'] : '' ?>"
                                       id="exampleInputEmail1" placeholder="Tên nhân viênc">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email:</label>
                                <input type="email" class="form-control" required="required" name="email" value="<?php
                                echo isset($user['email']) ? $user['email'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" max=12>Số điện thoại:</label>
                                <input type="text" class="form-control" required="required" name="phone" value="<?php
                                echo isset($user['phone']) ? $user['phone'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ:</label>
                                <input type="text" class="form-control" required="required" name="address" value="<?php
                                echo isset($user['address']) ? $user['address'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <select name="role" id="" class="form-control" style="width: 30%;">
                                    <?php 
                                            $role = isset($user['role']) ? $user['role'] : null;
                                            foreach ([0 => 'Nhân viên', 1 => "Toàn quyền"] as $index => $user_role) { ?>
                                                <option value="<?php echo $index ?>" <?php echo ($index == $role) ? 'selected' : ''; ?> ><?php
                                                    echo $user_role ?></option>
                                                <?php
                                            } ?>
                                </select>
                            </div>
                            
                            <?php
                            if (!isset($user)) { ?>
                                <button type="submit" name="addStaff" class="btn btn-info">Thêm nhân viên
                                </button>
                                <?php
                            } else { ?>
                                <button type="submit" name="updateStaff" class="btn btn-info">Sửa tt nhân viên
                                </button>
                                <?php
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include(__DIR__.'/../common/footer.php'); ?>