<?php include(__DIR__ . '/../common/header.php');?>
<?php include(__DIR__ . '/../common/aside.php');?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách sách
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a href="<?php echo route(); ?>admin/book/create" class="btn btn-primary ">Thêm sách mới</a>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" id="example">
                        <thead>
                        <tr>
                            <th>Tên sách </th>
                            <th>Hình ảnh </th>
                            <th>Giá sách </th>
                            <th>Giá Khuyến Mãi </th>
                            <th>Số lượng </th>
                            <th>Danh Mục sách </th>
                            <th>Nhà xuất bản</th>
<!--                            <th>Hiển Thị</th>-->
<!--                            <th>Bán chạy</th>-->
                            <th>Đăng ngày</th>
                            <th>Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php if (!empty($books)) {
                                foreach ($books as $book){ ?>
                                <tr>
                                    <td  style="1%"><span style="font-size: 17px;"><?php echo $book['name']; ?></span></td>
                                    <td ><span style="font-size: 17px;"><img style="height: 50px;" src="<?php echo route(); ?>assets/images/product/<?php echo $book['image']; ?>"/></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo number_format($book['old_price']); ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo number_format($book['price']); ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $book['qty']; ?></span></td>
                                    <td ><span style="font-size: 17px;"><?php echo $book['name_category']; ?></span>
                                    </td>
                                    <td ><span style="font-size: 17px;"><?php echo $book['name_publish']; ?></span>
                                    </td>
                                    <td>
                                        <span style="font-size: 17px;"><?php echo $book['posted_date']; ?></span>
                                    </td>
<!--                                    <td>-->
<!--                                        <span style="font-size: 17px;">--><?php //echo $book['posted_date']; ?><!--</span>-->
<!--                                    </td>-->
                                    <td style="width:2%">
                                        <a href="<?php echo route() . 'admin/book/show?book_id=' . $book['id']; ?>" class="active styling-edit" ui-toggle-class="">
                                            <i style="font-size: 20px;" class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a>
                                        <a href="<?php echo route() . 'admin/book/delete?book_id=' . $book['id']; ?>"
                                           class="active styling-edit" ui-toggle-class="">
                                            <i style="font-size: 20px;" class="fa fa-trash-o  text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                              <?php }}else{ ?>
                            <tr>
                                <td colspan="5">Không tìm thấy dữ liệu cần tìm !</td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <!-- <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>
    </section>
    <!-- footer -->
    <div class="footer">
        <div class="wthree-copyright">
            <p>© 2023 MAXBOOK | Thiết kế sáng tạo </p>
        </div>
    </div>
    <!-- / footer -->
    <!--main content end-->
</section>
<?php include(__DIR__ . '/../common/footer.php');?>