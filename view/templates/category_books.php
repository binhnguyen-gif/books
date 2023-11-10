<?php

require_once 'Header.php';
require_once 'Sliderbar.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">

                        <div class="brands_products"><!--brands_products-->
                            <h2>NHÀ XUẤT BẢN</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="?quanly=thuonghieu&brand_id="> <span class="pull-right"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        <div><!--shipping-->
                            <img style="margin: 10px auto;" src="images/shop/nha-sach-tiki.jpg" alt=""/>
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <?php
                    foreach ($booksByCategory as $category) { ?>
                        <div class="features_items"><!--features_items-->
                            <div class="three">
                                <h2><?php
                                    echo $category['name']; ?></h2>
                            </div>

                            <!--  lấy sản phẩm -->
                            <?php
                            if (!empty($category['books'])) {
                                foreach (json_decode($category['books']) as $book) { ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <a href="?quanly=chitietsp&id=">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?php echo route(); ?>assets/images/product/<?php echo $book->image ?>" alt=""/>
                                                        <!-- <h2></h2> -->
                                                        <p style="height: 20px;">
                                                            <span class="new_price"><?php
                                                                echo number_format($book->price); ?></span>
                                                            <span class="old_price"></span>
                                                        </p>
                                                        <p class="product-name"><?php
                                                            echo $book->name; ?></p>
                                                        <form action="?quanly=giohang" method="POST">
                                                            <fieldset>
                                                                <input type="hidden" name="tensanpham" value=""/>
                                                                <input type="hidden" name="sanpham_id" value=""/>
                                                                <input type="hidden" name="giasanpham" value=""/>
                                                                <input type="hidden" name="hinhanh" value=""/>
                                                                <input type="hidden" name="soluong" value="1"/>
                                                                <input type="submit" name="themgiohang"
                                                                       value="Thêm giỏ hàng"
                                                                       class="btn btn-default add-to-cart"/>
                                                                <!-- <a href="?quanly=giohang" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a> -->
                                                            </fieldset>
                                                        </form>
                                                    </div>

                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div><!--features_items-->
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php
require_once 'Footer.php'; ?>