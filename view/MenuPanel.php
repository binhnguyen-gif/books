<div class="menuPanel">
    <div class="menuItems">
        <a href="index.php">Trang chủ</a> 
        <?php if($_SESSION == true): ?> | <a href="index.php?action=basket">Giỏ hàng</a> <?php endif; ?>  
        <?php if($_SESSION && $_SESSION['group'] == 1): ?> | <a href="index.php?action=cp">Quản lý</a><?php endif ?>
    </div>
    
    <div class="searchBox">
        <form action="index.php?action=search" method="post">
            <input type="text" name="query" style="width: 250px" />
            <select name="type">
                <option value="title">Tiêu đề</option>
                <option value="author">Tác giả</option>
                <option value="price">Giá</option>
            </select>
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    
    <?php if($_SESSION == false): ?>
    <div class="loginBox">
        <form method="post" action="index.php?action=login" >
            Tên đăng nhập: <input type="text" name="username" style="width: 70px; height: 15px;" />
            Mật khẩu: <input type="password" name="password" style="width: 70px; height: 15px;" />
                      <input type="submit" name="login" value="Login"/>
        </form>
    </div>
    <?php else: ?>
        <div class="logoutBox">
            <a href="index.php?action=logout"> Thoát </a>
        </div>
    <?php endif; ?>
</div>