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
                    <header class="panel-heading">Thêm thương hiệu sản phẩm</header>
                </section>
                <div class="panel-body">
                    <div class="position-center">
                        <?php
                        $route = isset($publish) ? customRoute('admin/publish/update') : customRoute(
                            'admin/publish/create'
                        ) ?>
                        <form role="form" action="<?php
                        echo $route; ?>" method="POST">
                            <input type="hidden" name="_token" value="qjXZyD171s2S86tqwOpW7ygKbYI6Nh7QEVRcNwPG">
                            <input type="hidden" name="publish_id" value="<?php
                            echo isset($publish['id']) ? $publish['id'] : '' ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhà xuất bản:</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php
                                echo isset($publish['name']) ? $publish['name'] : '' ?>"
                                       placeholder="Tên nhà xuất bản">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ:</label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1"
                                       value="<?php
                                       echo isset($publish['address']) ? $publish['address'] : '' ?>"
                                       placeholder="Địa chỉ xuất bản">
                            </div>
                            <?php
                            if (!isset($publish)) { ?>
                                <button type="submit" name="addPublish" class="btn btn-info">Thêm nhà xuất bản</button>
                                <?php
                            } else { ?>
                                <button type="submit" name="updatePublish" class="btn btn-info">Chỉnh sửa nhà xuất bản
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