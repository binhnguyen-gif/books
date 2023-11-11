<?php
require_once 'Header.php';
require_once 'Sliderbar.php'; ?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active"></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

            <form action="" method="POST">
                <table class="table table-condensed">

                    <thead>
                    <tr class="cart_menu">
                        <td class="invert">Thứ tự </td>
                        <td class="image">Hình ảnh </td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá Tiền</td>
                        <td class="quantity">Số Lượng</td>
                        <td class="total">Tổng Tiền</td>
                        <td class="delete">Quản lý</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="invert" style="text-align: center;"> <?php ?></td>
                            <td class="cart_product">

                                <img src="images/product/<?php ?>" style ="width: 36px;margin-left: -24px;"alt="">

                            </td>
                            <td class="cart_description">
                                <h4><?php ?></h4>

                            </td>
                            <td class="cart_price">
                                <p><?php echo number_format(1)."đ"; ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input" type="number" min="1" name="soluong[]" value="<?php ?>"  >

                                </div>
                                <input type="hidden"  name="product_id[]" value="<?php ?>"  >
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo number_format(1)."đ"; ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="?quanly=giohang&xoa=<?php ?>"><i style="color: red" class="fa fa-trash-o " ></i> </a>
                            </td>
                        </tr>


                    <tr style="text-align:center">
                        <td> </td>
                        <td colspan="7">
                            <div class="total_area" style="color: #696763;padding: 8px 25px 30px 0;border:none;margin: auto; width: 330px">
                                <ul>
                                    <li>Tổng <span><?php echo number_format(1)."đ"?></span></li>

                                    <li>Phí ship <span><?php echo number_format(1)."đ"; ?></span></li>
                                    <li>Tổng Tiền<span  ><?php echo number_format(1)."đ"?></span></li>
                                </ul>

                                <!-- <a class="btn btn-default check_out" href="">Thanh Toán</a> -->
                            </div>

                            <input style="color: #fff;" type="submit" value=" Cập nhật giỏ hàng " class="btn btn-primary add-to-cart" name="capnhatsoluong"  >
                            <!-- thanh toán khi có đăng nhập  -->
                        </td>
                    </tr>
                    </tbody>


                </table>
            </form>
        </div>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">

        <div class="row">

                <div class="col-sm-6">
                    <div class="chose_area">
                        <h4 class="mb-sm-4 mb-3" style="text-align: center;font-size: 24px;color: aqua;text-transform: uppercase;">Thêm địa chỉ giao hàng</h4>
                        <form action="" method="POST" class="creditly-card-form agileinfo_form">
                            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row">
                                        <div class="controls form-group" style="margin-left: 19px;">
                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">
                                        </div>

                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="text" class="form-control" placeholder="Số phone" name="phone" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="text" class="form-control" placeholder="Email" name="email" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <select class="option-w3ls" name="giaohang">
                                                <option>Chọn hình thức giao hàng</option>
                                                <option value="1">Thanh toán ATM</option>
                                                <option value="0">Thanh toán khi nhận hàng</option>
                                            </select>
                                        </div>
                                    </div>

                                        <input type="hidden" name="thanhtoan_product_id[]" value="<?php  ?>">
                                        <input type="hidden" name="thanhtoan_soluong[]" value="<?php  ?>">
                                        <input type="hidden" name="total" value="<?php ?>" >


                                    <input type="submit" name="thanhtoan" class="btn btn-default check_out" style="width: 20%" value="Thanh toán">
                                    <a class="btn btn-default update" href="/index.php">Quay lại trang chủ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



<!--                <div class="col-sm-6">-->
<!--                    <div class="chose_area">-->
<!--                        <h4 class="mb-sm-4 mb-3" style="text-align: center;font-size: 24px;color: aqua;text-transform: uppercase;">Thêm địa chỉ giao hàng</h4>-->
<!--                        <form action="" method="POST" class="creditly-card-form agileinfo_form">-->
<!--                            <div class="creditly-wrapper wthree, w3_agileits_wrapper">-->
<!--                                <div class="information-wrapper">-->
<!--                                    <div class="first-row">-->
<!--                                        <div class="controls form-group" style="margin-left: 19px;">-->
<!--                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="controls form-group"style="margin-left: 19px;">-->
<!--                                            <input type="text" class="form-control" placeholder="Số phone" name="phone" required="">-->
<!--                                        </div>-->
<!--                                        <div class="controls form-group"style="margin-left: 19px;">-->
<!--                                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">-->
<!--                                        </div>-->
<!--                                        <div class="controls form-group"style="margin-left: 19px;">-->
<!--                                            <input type="text" class="form-control" placeholder="Email" name="email" required="">-->
<!--                                        </div>-->
<!--                                        <div class="controls form-group"style="margin-left: 19px;">-->
<!--                                            <input type="password" class="form-control" placeholder="Password" name="password" required="">-->
<!--                                        </div>-->
<!--                                        <div class="controls form-group"style="margin-left: 19px;">-->
<!--                                            <textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>-->
<!--                                        </div>-->
<!--                                        <div class="controls form-group"style="margin-left: 19px;">-->
<!--                                            <select class="option-w3ls" name="giaohang">-->
<!--                                                <option>Chọn hình thức giao hàng</option>-->
<!--                                                <option value="1">Thanh toán ATM</option>-->
<!--                                                <option value="0">Thanh toán khi nhận hàng</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                            <input type="hidden" name="thanhtoan_product_id[]" value="--><?php //?><!--">-->
<!--                                            <input type="hidden" name="thanhtoan_soluong[]" value="--><?php // ?><!--">-->
<!--                                            <input type="hidden" name="total" value="--><?php //?><!--" >-->
<!---->
<!---->
<!--                                    <input type="submit" name="thanhtoan" class="btn btn-default check_out" style="width: 20%" value="Thanh toán">-->
<!--                                    <a class="btn btn-default update" href="/index.php">Quay lại trang chủ</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->



        </div>
    </div>
</section>

<?php require_once 'Footer.php'; ?>
<!--/#do_action-->


<!--


// kiểm tra phải có tên ng dùng và trong giỏ hàng phải có sản phẩm mới hiện nút thanh toán

//
/*								<input type="hidden" name="thanhtoan_product_id[]" value="<?php  ?>">*/
/*								<input type="hidden" name="thanhtoan_soluong[]" value="<?php  ?>">*/
/*                                <input type="hidden" name="total" value="<?php ?>" >*/
//
//								<input style="margin-top: -9px; margin-left:10px" type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="thanhtoanlogin">

