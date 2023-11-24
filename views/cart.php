<?php
require_once 'Header.php';
require_once 'Sliderbar.php'; ?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?php echo route();?>">Home</a></li>
                <li class="active"></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <form action="<?php echo customRoute('update-cart'); ?>" method="POST" id="updateCartForm">
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
                        <?php if(!empty($books)) {
                            $total_price = 0;
                        foreach ($books as $index => $book) {
                            $total_price += $book['price'];
                            ?>
                            <tr>
                                <td class="invert" style="text-align: center;"> <?php echo $index; ?></td>
                                <td class="cart_product">
                                    <img src="<?php echo route(); ?>assets/images/product/<?php echo $book['image'] ?>" style ="width: 36px;margin-left: -24px;"alt="">
                                </td>
                                <td class="cart_description">
                                    <h4><?php echo $book['name']; ?></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo number_format($book['price'])."đ"; ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                    
                                        <input class="cart_quantity_input" type="number" min="1" name="cart[<?php echo $index; ?>][<?php echo $book['id']; ?>]" value="<?php echo $book['quantity']; ?>"  >
                                        
                                    </div>
                                     <input type="hidden"  name="" value="<?php echo $book['id']; ?>"  >
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php echo number_format($book['total']); ?>đ</p>
                                </td>
                                <td class="cart_delete">
                                        <a onclick="customConfirm('<?php echo customRoute('delete-book?book_id=') . $book['id'];?>', 'Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')" class="cart_quantity_delete"><i style="color: red" class="fa fa-trash-o " ></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <tr style="text-align:center">
                        <td> </td>
                        <td colspan="7">
                            <div class="total_area" style="color: #696763;padding: 8px 25px 30px 0;border:none;margin: auto; width: 330px">
                                <ul>
                                    <li>Tổng <span><?php echo number_format($total_price)."đ"?></span></li>
                                    <li>Phí ship <span><?php echo number_format(10000)."đ"; ?></span></li>
                                    <?php
                                    $shippingCost = isset($shippingCost) ? $shippingCost : 0;
                                    $amount = $total_price + $shippingCost ?>
                                    <li>Tổng Tiền<span  ><?php echo number_format($amount)."đ"?></span></li>
                                </ul>
                                <!-- <a class="btn btn-default check_out" href="">Thanh Toán</a> -->
                            </div>
                            <button style="color: #fff;" onclick="updateCart();" class="btn btn-primary add-to-cart" name="updateCart">Cập nhật giỏ hàng </button>
                        </td>
                    </tr>
                    <?php }else {?>
                        <tr style="text-align: center;color: red;"><td colspan="7" style="text-align: center;color: red;">
                                Không có sản phẩm nào trong giỏ hàng
                            </td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>
<!--/#cart_items-->
<?php $user = customer();
?>
<section id="do_action">
    <div class="container">
        <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <h4 class="mb-sm-4 mb-3" style="text-align: center;font-size: 24px;color: aqua;text-transform: uppercase;">Thêm địa chỉ giao hàng</h4>
                        <form action="<?php echo route(); ?>order" method="POST" class="creditly-card-form agileinfo_form" id="checkout">
                            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row">
                                        <div class="controls form-group" style="margin-left: 19px;">
                                            <input class="billing-address-name form-control" type="text" name="username" value="<?php echo $user['username'] ?>" placeholder="Tên người nhận" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="text" class="form-control" placeholder="Email" disabled name="email" value="<?php echo $user['email'] ?>" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="<?php echo $user['phone'] ?? '' ?>" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" name="address" value="<?php echo $user['address'] ?? '' ?>" required="">
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note"></textarea>
                                        </div>
                                        <div class="controls form-group"style="margin-left: 19px;">
                                            <select class="option-w3ls" name="payment_type">
<!--                                                <option>Chọn hình thức giao hàng</option>-->
                                                <option value="0">Thanh toán khi nhận hàng</option>
                                                <option value="1">Thanh toán ATM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button onclick="checkout();" name="order" class="btn btn-default check_out" style="width: 20%">Thanh toán</button>
                                    <a class="btn btn-default update" href="<?php echo route(); ?>">Quay lại trang chủ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</section>
<?php require_once 'Footer.php'; ?>



