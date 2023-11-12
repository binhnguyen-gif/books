<form action="<?php echo route(); ?>cart" method="POST">
    <fieldset>
        <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
        <input type="submit" name="addCart"
               value="Thêm giỏ hàng"
               class="btn btn-default add-to-cart"/>

    </fieldset>
</form>