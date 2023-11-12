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
                        <header class="panel-heading">Cập Nhật Sản Phẩm</header>
                    </section>
                    <div class="panel-body">
                        <div class="position-center">
                            <?php
                            $route =isset($book) ? (route() . 'admin/book/update') : (route() . 'admin/book/create');
                            ?>
                            <form role="form" action="<?php echo $route; ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="qjXZyD171s2S86tqwOpW7ygKbYI6Nh7QEVRcNwPG">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['name']) ? $book['name'] : ''; ?>" class="form-control" name="name"
                                           id="exampleInputEmail1" placeholder="tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm:</label>
                                    <input type="file" class="form-control image-preview" name="image"
                                           id="exampleInputEmail1" onchange="previewFile(this);">
                                    <?php $image = isset($book) ? (route() . 'assets/images/product/' .$book['image']) : ''; ?>
                                    <img src="<?php echo $image ?>" height="100" width="100" alt="">
                                    <!-- <img src="https://lukoilonline.com/uploadFiles/default.png" width="20%" id="previewImg" > -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['old_price']) ? $book['old_price'] : ''; ?>" class="form-control"
                                           name="old_price" id="exampleInputEmail1" placeholder="giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá khuyến mãi:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['price']) ? $book['price'] : ''; ?>" class="form-control"
                                           name="price" id="exampleInputEmail1" placeholder="giá khuyến mãi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['qty']) ? $book['qty'] : ''; ?>" class="form-control" name="qty"
                                           id="exampleInputEmail1" placeholder="số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm:</label>
                                    <textarea type="text" value="<?php
                                    echo isset($book['description']) ? $book['description'] : ''; ?>"
                                              class="form-control ckeditor" name="description" id="exampleInputEmail1"
                                              placeholder="mô tả sản phẩm"><?php
                                        echo isset($book['description']) ? $book['description'] : ''; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi tiết sản phẩm:</label>
                                    <textarea type="text" value="<?php
                                    echo isset($book['detail']) ? $book['detail'] : ''; ?>"
                                              class="form-control ckeditor" name="detail" id="exampleInputEmail1"
                                              placeholder="chi tiết sản phẩm"><?php
                                        echo isset($book['detail']) ? $book['detail'] : ''; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu:</label><br/>
                                    <select name="brand_sp" class="form-control">
                                        <?php foreach (listPublish() as $publish) {?>
                                            <option value="<?php echo $publish['id'] ?>" <?php echo ($publish['id'] == $book['publish_id']) ? 'selected' : ''; ?> ><?php echo $publish['name'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục:</label><br/>
                                    <select name="category_sp" class="form-control">
                                        <?php foreach (listCategories() as $category) {?>
                                        <option value="<?php echo $category['id'] ?>" <?php echo ($category['id'] == $book['category_id']) ? 'selected' : ''; ?> ><?php echo $category['name'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hiển Thị</label><br/>
                                    <select name="sp_status" class="form-control trol input-lg m-bot15">
                                        <option value="1">Đăng</option>
                                        <option value="0">Ngừng</option>
                                    </select>
                                </div>
                                <?php
                                if (isset($book)) { ?>
                                    <button type="submit" name="updateBook" class="btn btn-info">Cập nhật Sản phẩm
                                    </button>
                                <?php
                                } else { ?>
                                    <button type="submit" name="addBook" class="btn btn-info">Cập nhật Sản phẩm</button>
                                <?php
                                } ?>
                                <button type="submit" name="btn-thoat" class="btn btn-info">Quay lại</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include(__DIR__.'/../common/footer.php'); ?>