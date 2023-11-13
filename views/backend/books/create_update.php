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
                            $route = isset($book) ? (route().'admin/book/update') : (route().'admin/book/create');
                            ?>
                            <form role="form" action="<?php
                            echo $route; ?>" method="POST" enctype="multipart/form-data">
                                <!--                                <input type="hidden" name="_token" value="qjXZyD171s2S86tqwOpW7ygKbYI6Nh7QEVRcNwPG">-->
                                <input type="hidden" name="book_id" value="<?php
                                echo isset($book['id']) ? $book['id'] : ''; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['name']) ? $book['name'] : ''; ?>" class="form-control" name="name"
                                           id="exampleInputEmail1" required placeholder="tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm:</label>
                                    <input type="file" class="form-control image-preview" name="image"
                                           id="exampleInputEmail1" <?php
                                    isset($book) ? '' : 'required'; ?> onchange="previewFile(this);">
                                    <?php
                                    $image = isset($book) ? (route().'assets/images/product/'.$book['image']) : ''; ?>
                                    <img src="<?php
                                    echo $image ?>" height="100" width="100" alt="">
                                    <!-- <img src="https://lukoilonline.com/uploadFiles/default.png" width="20%" id="previewImg" > -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['old_price']) ? $book['old_price'] : ''; ?>" class="form-control"
                                           name="old_price" id="exampleInputEmail1" required placeholder="giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá khuyến mãi:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['price']) ? $book['price'] : ''; ?>" class="form-control"
                                           name="price" id="exampleInputEmail1" required placeholder="giá khuyến mãi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm:</label>
                                    <input type="text" value="<?php
                                    echo isset($book['qty']) ? $book['qty'] : ''; ?>" class="form-control" name="qty"
                                           id="exampleInputEmail1" required placeholder="số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm:</label>
                                    <textarea type="text" maxlength="100" required value="<?php
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
                                              required
                                              placeholder="chi tiết sản phẩm"><?php
                                        echo isset($book['detail']) ? $book['detail'] : ''; ?></textarea>
                                </div>
                                <?php
                                $publish_id = isset($book['publish_id']) ?? null;
                                $category_id = isset($book['category_id']) ?? null;
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu:</label><br/>
                                    <select name="publish_id" class="form-control">
                                        <?php
                                        foreach (listPublish() as $publish) { ?>
                                            <option value="<?php
                                            echo $publish['id'] ?>" <?php
                                            echo ($publish['id'] == $publish_id) ? 'selected' : ''; ?> ><?php
                                                echo $publish['name'] ?></option>
                                            <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục:</label><br/>
                                    <select name="category_id" class="form-control">
                                        <?php
                                        foreach (listCategories() as $category) { ?>
                                            <option value="<?php
                                            echo $category['id'] ?>" <?php
                                            echo ($category['id'] == $category_id) ? 'selected' : ''; ?> ><?php
                                                echo $category['name'] ?></option>
                                            <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hiển Thị</label><br/>
                                    <label>
                                        <select name="status" class="form-control">
                                            <?php
                                            $status = isset($book['status']) ? $book['status'] : null;
                                            foreach (book_status() as $index => $book_status) { ?>
                                                <option value="<?php echo $index ?>" <?php echo ($index == $status) ? 'selected' : ''; ?> ><?php
                                                    echo $book_status ?></option>
                                                <?php
                                            } ?>
                                        </select>
                                    </label>
                                </div>
                                <?php
                                if (isset($book)) { ?>
                                    <button type="submit" name="updateBook" class="btn btn-info">Cập nhật sản phẩm
                                    </button>
                                    <?php
                                } else { ?>
                                    <button type="submit" name="addBook" class="btn btn-info">Thêm sản phẩm</button>
                                    <?php
                                } ?>
                                <a href="<?php
                                echo customRoute('admin/list-book') ?>" class="btn btn-info">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include(__DIR__.'/../common/footer.php'); ?>