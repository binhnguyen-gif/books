<?php

include(__DIR__.'/../common/header.php'); ?>
<?php
include(__DIR__.'/../common/aside.php'); ?>
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Thêm danh mục sản phẩm</header>
                    </section>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="" method="POST">
                                <input type="hidden" name="_token" value="qjXZyD171s2S86tqwOpW7ygKbYI6Nh7QEVRcNwPG">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục:</label>
                                    <input type="text" class="form-control" name="category_product_name"
                                           id="exampleInputEmail1" placeholder="tên danh mục">
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Thêm danh
                                    mục
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include(__DIR__.'/../common/footer.php'); ?>