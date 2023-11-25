<?php
require_once 'Header.php';
require_once 'Sliderbar.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh Mục</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <?php
                            $categories = isset($categories) ? $categories : [];
                            foreach ($categories as $category) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href=""><?php
                                                echo $category['name']; ?></a></h4>
                                    </div>
                                </div>
                                <?php
                            } ?>
                        </div><!--/category-products-->
                        <div class="brands_products"><!--brands_products-->
                            <h2>NHÀ XUẤT BẢN</h2>
                            <div class="brands-name">

                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    $publish = isset($publish) ? $publish : [];
                                    foreach ($publish as $value) { ?>
                                        <li><a href="#"><?php
                                                echo $value['name']; ?></a></li>
                                        <?php
                                    } ?>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        <div class="brands_products"><!--products sales-->
                            <h2 style="margin-top:20px;">SẢN PHẨM BÁN CHẠY</h2>
                            <div class="box-scroll">
                                <div class="scroll">
                                    <?php
                                    $sellingBooks = $sellingBooks ?? [];
                                    foreach ($sellingBooks as $book) {?>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-2 col-3 left-mar" style="margin-bottom: 20px;">
                                            <img src="<?php echo route(); ?>assets/images/product/<?php echo $book['image']; ?>" alt="" class="img-fluid" style=" max-width: 100%;height: auto;">
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                            <a href="<?php echo route() . 'detail?id' . $book['id']; ?>"><?php echo $book['name']; ?></a>
                                            <br>
                                            <span class="new_price"><?php echo number_format($book['price']); ?>đ</span>
                                            <span class="old_price"><?php echo number_format($book['old_price']); ?>đ</span>
                                        </div>
                                    </div>
                                <?php }?>
                                </div>
                            </div>
                        </div><!--/sales products-->

                        <div><!--shipping-->
                            <img style="margin: 10px auto;" src="<?php
                            echo route(); ?>/assets/images/shop/nha-sach-tiki.jpg" alt=""/>
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center rise-text"> Sản Phẩm Mới</h2>
                        <div style="width: 19%;float: right;margin-top: -33px;margin-right: 15px;">
                            <label>
                                <select onchange="sortBook();" name="sort_by_price" id="sort_by_price">
                                    <option>Sắp xếp theo giá</option>
                                    <option value="DESC">Từ thấp tới cao</option>
                                    <option value="ASC">Từ cao về thấp</option>
                                </select>
                            </label>
                        </div>
                        <?php
                        if (!empty($books)) {
                            foreach ($books as $book) { ?>
                                <div class="col-sm-4 ">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <a href="<?php
                                            echo route().'detail?id='.$book['id']; ?>">
                                                <div class="productinfo text-center">
                                                    <img src="<?php
                                                    echo route(); ?>/assets/images/product/<?php
                                                    echo $book['image']; ?>" alt=""/>
                                                    <p style="height: 20px;">
                                                    <span class="new_price"><?php
                                                        echo number_format($book['price']); ?>đ</span>
                                                        <span class="old_price"><?php
                                                            echo number_format($book['old_price']); ?>đ</span>
                                                    </p>
                                                    <p class="product-name"><?php
                                                        echo $book['name']; ?></p>
                                                    <form action="<?php
                                                    echo route(); ?>cart" method="POST">
                                                        <fieldset>
                                                            <input type="hidden" name="book_id" value="<?php
                                                            echo $book['id']; ?>">
                                                            <input type="submit" name="addCart"
                                                                   value="Thêm giỏ hàng"
                                                                   class="btn btn-default add-to-cart"/>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </a>

                                        </div>
                                        <img src="<?php
                                        echo route(); ?>/assets/images/home/new.png" class="new" alt=""/>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p style='color:red;text-align: center;'>Sản phẩm không có , mời bạn nhập lại tên sản phẩm</p>";
                        } ?>

                    </div><!--features_items-->
                    <!--  phân trang -->
                    <div class="pagination-area">
                        <ul class="pagination">

                        </ul>
                    </div>
                    <!-- phân trang -->

                </div>
            </div>
        </div>
    </section>
<?php
require_once 'Footer.php'; ?>