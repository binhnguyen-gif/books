<?php

require_once 'Header.php';
require_once 'Sliderbar.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh Mục</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="?quanly=danhmuc&id="></a></h4>
                                </div>
                            </div>

                    </div><!--/category-products-->

                </div>
            </div>

            <!--  chi tiết sản phẩm -->


            <div class="col-sm-9 padding-right">

                <div class="product-details">
                    <div class="three" >
                        <h2 style="background-color: #fff; color:aqua">Chi Tiết Sản Phẩm</h2>
                    </div>
                    <!--product-details-->

                    <div class="col-sm-5">
                        <div class="view-product zoom">
                            <img src="<?php echo route(); ?>assets/images/product/<?php echo $book['image']; ?>" class="newarrival" alt="" />
                        </div>

                    </div>

                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->

                            <h2><?php echo $book['name']; ?></h2>
                            <?php
                            if (1 >0) {
                                ?>
                                <span>
								<span class="product-price" style="color: #e21515;"><?php echo number_format($book['price']); ?>đ</span>
                                <label>Số Lượng có sẵn:</label>
                                <input type="text" value="<?php echo $book['qty']; ?>" />
                                </span>
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
                                    <p><b>Tình trạng:</b> Mới 100 %</p>
                                    <p><b>Nhà xuất bản :</b>
                                        <?php foreach (listCategories() as $category) {
                                            if($book['category_id'] == $category['id']) {?>
                                                <?php echo $category['name']; ?>
                                        <?php } }?>
                                    </p>
                                    <a href=""><img src="<?php echo route(); ?>assets/images/shop/share.png" class="share img-responsive"  alt="" /></a>
                                <?php
                            } else {
                                ?>
                                <p style="color:#e21515" >Sản phẩm đã bán hết , mong quý khách quay lại lần sau !</p>
                                <?php
                            } ?>


                        </div><!--/product-information-->

                        <hr>
                        <div class="row">
                            <div class="col-sm-4" >
                                <table>
                                    <tr>
                                        <td><img src="<?php echo route(); ?>assets/images/shop/doitra.png" style=" width: 43px;height: 36px; " alt=""></td>
                                        <td style="font-size:12px">7 ngày miễn phí trả hàng</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-4" >
                                <table>
                                    <tr>
                                        <td><img  src="<?php echo route(); ?>assets/images/shop/chinhhang.png" style=" width: 43px;height: 36px; " alt=""></td>
                                        <td style="font-size:12px">Hàng chính hãng 100%</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-4">

                                <table>
                                    <tr>
                                        <td><img  src="<?php echo route(); ?>assets/images/shop/ship.png" style=" width: 43px;height: 36px; " alt=""></td>
                                        <td style="font-size:12px">Miễn phí vận chuyển trên mọi miền</td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                            <p><?php echo $book['description']; ?></p>
                        </div>
                        <div class="tab-pane fade" id="companyprofile" >
                            <p><?php echo $book['detail']; ?></p>
                        </div>

                    </div>

                </div>
                <!--  sản phẩm liên quan  -->
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Sản phẩm liên quan</h2>

                       <?php foreach ($relatedBooks as $relatedBook) { ?>
                        <div class="col-sm-4 ">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <a href="<?php echo route() . 'detail?id=' . $relatedBook['id']; ?>">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo route(); ?>assets/images/product/<?php echo $relatedBook['image']; ?>"  alt="" />
                                            <p style="height: 20px;">
                                                <span class="new_price"><?php echo $relatedBook['price']; ?></span>
                                                <span class="old_price"><?php echo $relatedBook['old_price']; ?></span>
                                            </p>
                                            <p class="product-name" ><?php echo $relatedBook['name'];  ?></p>
                                            <form action="<?php
                                            echo route(); ?>cart" method="POST">
                                                <fieldset>
                                                    <input type="hidden" name="book_id" value="<?php
                                                    echo $relatedBook['id']; ?>">
                                                    <input type="submit" name="addCart"
                                                           value="Thêm giỏ hàng"
                                                           class="btn btn-default add-to-cart"/>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </a>

                                </div>


                            </div>
                        </div>

                    <?php } ?>
                </div><!--/recommended_items-->
            </div>

        </div>

    </div>
    </div>
</section>

<?php require_once 'Footer.php'; ?>
