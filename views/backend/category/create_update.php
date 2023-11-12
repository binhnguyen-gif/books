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
                    <header class="panel-heading">Thêm danh mục sản phẩm</header>
                </section>
                <div class="panel-body">
                    <div class="position-center">
                        <?php
                        $route = isset($category) ? customRoute('admin/category/update') : customRoute(
                            'admin/category/store'
                        ) ?>
                        <form role="form" action="<?php echo $route ?>" method="POST">
                            <input type="hidden" name="_token" value="qjXZyD171s2S86tqwOpW7ygKbYI6Nh7QEVRcNwPG">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục:</label>
                                <input type="hidden" name="category_id" value="<?php
                                echo isset($category['id']) ? $category['id'] : '' ?>">
                                <input type="text" class="form-control" name="name" value="<?php
                                echo isset($category['name']) ? $category['name'] : '' ?>"
                                       id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <?php
                            if (!isset($category)) { ?>
                                <button type="submit" name="addCategory" class="btn btn-info">Thêm danh
                                    mục
                                </button>
                                <?php
                            } else { ?>
                                <button type="submit" name="updateCategory" class="btn btn-info">Sửa danh
                                    mục
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