<?php
    for($i = 0; $i < sizeof($books) - 1; $i++) {
        ?>
        <div class="singlePurchase">
            <?php echo 'Tên sách: ' . $books[$i]['title'] . '<br />' . 'Ngày mua: ' . $books[$i]['date'] . '<br />'
                    . 'Giá: ' . number_format($books[$i]['price']) . ' đ';
            ?>
            <div class="singlePurchaseDelete">
                <form action="index.php?action=deleteItemFromBasket&itemId=<?php echo $books[$i]['id']; ?>" method="post">
                    <input type="submit" value="Delete" />
                </form>
            </div>
        </div>
        <?php
    }
?>
