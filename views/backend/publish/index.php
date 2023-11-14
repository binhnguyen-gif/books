<?php

include(__DIR__.'/../common/header.php'); ?>
<?php
include(__DIR__.'/../common/aside.php'); ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Liệt Kê Thương Hiệu
                    </div>
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">
                            <a href="<?php echo customRoute('admin/publish/create'); ?>" class="btn btn-primary ">Thêm Thương Hiệu</a>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th style="width:20px;">
                                </th>
                                <th>Tên Thương Hiệu</th>
                                <th colspan="2" style="margin:auto">Quản Lý</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if (!empty($publish)) {
                                foreach ($publish as $value) {
                                    ?>
                                    <tr>
                                        <td></td>

                                        <td><span style="font-size: 17px;"><?php
                                                echo $value['name']; ?></span></td>
                                        <?php $routeDelete = customRoute('admin/publish/delete?publish_id=') . $value['id'] ?>
                                        <?php $routeEdit = customRoute('admin/publish/show?publish_id=') . $value['id'] ?>
                                        <td style="width:4%">
                                            <a href="javascript:customConfirm('<?php echo $routeEdit; ?>', 'Bạn muốn thay đổi nhà xuất bản này chứ?')" class="active styling-edit" ui-toggle-class="">
                                                <i style="font-size: 26px;"
                                                   class="fa fa-pencil-square-o text-success text-active"></i>
                                            </a></td>
                                        <td>
                                            <a href="javascript:customConfirm('<?php echo $routeDelete; ?>', 'Bạn có chắc muốn xóa nhà xuất bản này không này không?')"
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