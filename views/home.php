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
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                            <img src="" alt="" class="img-fluid" style=" max-width: 100%;height: auto;">
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                            <a href=""></a>
                                            <br>
                                            <span class="new_price"></span>
                                            <span class="old_price"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--/sales products-->

                        <div><!--shipping-->
                            <img style="margin: 10px auto;" src="<?php echo route(); ?>/assets/images/shop/nha-sach-tiki.jpg" alt=""/>
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center rise-text"> Sản Phẩm Mới</h2>
                        <div style="width: 19%;float: right;margin-top: -33px;margin-right: 15px;">
                            <select onchange="">
                                <option value="">----sắp xếp theo giá----</option>
                                <option value="">>--từ thấp tới cao--<</option>
                                <option value="">>--từ cao về thấp--<</option>
                            </select>
                        </div>
                        <?php
                        foreach ($books as $book) { ?>
                            <div class="col-sm-4 ">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <a href="">
                                            <div class="productinfo text-center">
                                                <img src="<?php
                                                echo route(); ?>/assets/images/product/<?php
                                                echo $book['image']; ?>" alt=""/>
                                                <p style="height: 20px;">
                                                    <span class="new_price"><?php
                                                        echo number_format($book['price']); ?>đ</span>
                                                    <span class="old_price"><?php
                                                        echo number_format($book['price']); ?>đ</span>
                                                </p>
                                                <p class="product-name"><?php
                                                    echo $book['name']; ?></p>
                                                <form action="?quanly=giohang" method="POST">
                                                    <fieldset>
                                                        <input type="hidden" name="tensanpham" value=""/>
                                                        <input type="hidden" name="sanpham_id" value=""/>
                                                        <input type="hidden" name="giasanpham" value=""/>
                                                        <input type="hidden" name="hinhanh" value=""/>
                                                        <input type="hidden" name="soluong" value="1"/>
                                                        <input type="submit" name="themgiohang" value="Thêm giỏ hàng"
                                                               class="btn btn-default add-to-cart"/>

                                                    </fieldset>
                                                </form>
                                            </div>
                                        </a>

                                    </div>
                                    <img src="<?php echo route(); ?>/assets/images/home/new.png" class="new" alt=""/>
                                </div>
                            </div>
                            <?php
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