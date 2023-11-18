<?php
include(__DIR__.'/../common/header.php'); ?>
<?php
include(__DIR__.'/../common/aside.php'); ?>
    <section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách liên hệ
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
<!--                        <a href="--><?php //echo route(); ?><!--admin/category/create" class="btn btn-primary ">Thêm Danh Mục</a>-->
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                                Id
                            </th>
                            <th>Tiêu đề</th>
                            <th colspan="" style="margin:auto">Tên người liên hệ</th>
                            <th colspan="" style="margin:auto">Địa chỉ email</th>
                            <th colspan="" style="margin:auto">Nội dung</th>
                            <th colspan="" style="margin:auto">Ngày gửi</th>
                            <th colspan="2" style="margin:auto">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($contact)){
                            foreach ($contact as $index => $value) {?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><span style="font-size: 17px;"><?php
                                            echo $value['title']; ?></span></td>
                                    <td><span style="font-size: 17px;"><?php
                                            echo $value['name']; ?></span></td>
                                    <td><span style="font-size: 17px;"><?php
                                            echo $value['email']; ?></span></td>
                                    <td><span style="font-size: 17px;"><?php
                                            echo $value['content']; ?></span></td>
                                    <td><span style="font-size: 17px;"><?php
                                            echo $value['created_at']; ?></span></td>
                                        <?php $routeDelete = customRoute('admin/contact/delete?contact_id=') . $value['id'] ?>
                                    <td>
                                        <a href="javascript:customConfirm('<?php echo $routeDelete; ?>', 'Bạn có chắc muốn xóa liên hệ này không?')"
                                           class="active styling-edit" ui-toggle-class="">
                                            <i style="font-size: 26px;" class="fa fa-trash-o  text-danger text"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">Không tìm thấy dữ liệu cần tìm !</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">

                    </div>
                </footer>
            </div>
        </div>
    </section>
<?php
include(__DIR__.'/../common/footer.php'); ?>