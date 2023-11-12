<?php
include(__DIR__.'/../common/header.php'); ?>
<?php
include(__DIR__.'/../common/aside.php'); ?>
    <section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Liệt Kê Danh Mục
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <a href="<?php echo route(); ?>admin/category/create" class="btn btn-primary ">Thêm Danh Mục</a>
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
                            <th>Tên Danh Mục</th>
                            <th colspan="2" style="margin:auto">Quản Lý</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php if (!empty($categories)){
                            foreach ($categories as $category) {?>
                                <tr>
                                    <td></td>
                                    <td><span style="font-size: 17px;"><?php
                                            echo $category['name']; ?></span></td>
                                    <td style="width:4%">
                                        <?php $routeDelete = customRoute('admin/category/delete?category_id=') . $category['id'] ?>
                                        <?php $routeEdit = customRoute('admin/category/show?category_id=') . $category['id'] ?>
                                        <a href="javascript:customConfirm('<?php echo $routeEdit; ?>', 'Bạn muốn thay đổi danh mục này chứ??')" class="active styling-edit" ui-toggle-class="">
                                            <i style="font-size: 26px;"
                                               class="fa fa-pencil-square-o text-success text-active"></i>
                                        </a></td>
                                    <td>
                                        <a href="javascript:customConfirm('<?php echo $routeDelete; ?>', 'Bạn có chắc muốn xóa danh mục này không?')"
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
    </section>

<?php
include(__DIR__.'/../common/footer.php'); ?>