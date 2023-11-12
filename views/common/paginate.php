<?php
// --------LOC SẢN PHẨM-------
$param ="";
$fillter="";
$field = isset($_GET['field'])? $_GET['field']: "";
$sort = isset($_GET['sort'])? $_GET['sort']: "";
if(!empty($field) && !empty($sort))
{
    $fillter = " ORDER BY `tbl_sanpham`.`$field`$sort" ;
    $param = "field=$field&sort=$sort";


}

//------PHÂN TRANG------
// sản phẩm trên 1 trang
$item_per_page = !empty($_GET['per_page']) ?$_GET['per_page']:4;
// trang hiện tại
$current_page = !empty($_GET['page']) ?$_GET['page']:1;
// bắt đầu từ sản phẩm nào ?
$offset = ($current_page -1 ) * $item_per_page;
$sql_product =  mysqli_query($con,"SELECT * FROM tbl_sanpham $fillter LIMIT $item_per_page OFFSET $offset");

$total = mysqli_query($con, " SELECT * FROM tbl_sanpham ");
$total = $total->num_rows;
// số trang có đc
$totalpage = ceil($total/$item_per_page);

?>





<?php

if ($current_page > 2) {
    $first = 1;
    ?>
    <li><a href="?<?= $param ?>&per_page=<?= $item_per_page ?>&page=<?= $first ?>" class="page-item">Trang đầu</a></li>

<?php
}
if ($current_page > 1) {
    $prev_page = $current_page - 1;
    ?>
    <li><a href="?<?= $param ?>&per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>" class="page-item"> Trang
            trước</a></li>
    <?php
}
?>

<?php
for ($i = 1; $i <= $totalpage; $i++) {
    ?>
    <?php
    if ($i != $current_page) { ?>
        <?php
        if ($i > $current_page - 2 && $i < $current_page + 2) { ?>
            <li><a href="?<?= $param ?>&per_page=<?= $item_per_page ?>&page=<?= $i ?>" class="page-item"> <?= $i ?></a>
            </li>
        <?php
        } ?>

    <?php
    } else { ?>
        <li><a href=""><strong class="current-page page-item"><?= $i ?></strong></a></li>
    <?php
    } ?>
<?php
} ?>
<?php
if ($current_page < $totalpage - 1) {
    $next_page = $current_page + 1; ?>
    <li><a href="?<?= $param ?>&per_page=<?= $item_per_page ?>&page=<?= $next_page ?>" class="page-item"> Trang tiếp</a>
    </li>
    <?php
}
if ($current_page < $totalpage - 2) {
    $end_page = $totalpage; ?>
    <li><a href="?<?= $param ?>&per_page=<?= $item_per_page ?>&page=<?= $end_page ?>" class="page-item">Trang cuối</a>
    </li>
    <?php
}

?>