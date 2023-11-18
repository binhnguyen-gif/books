<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="<?php
                    echo route(); ?>admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quát</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php
                            echo route(); ?>admin/list-order">Quản lý đơn hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-compress"></i>
                        <span>Liên hệ</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php
                            echo route(); ?>admin/list-contact">Quản lý liên hệ</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Khách hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php
                            echo route(); ?>admin/list-customer">Quản lý khách hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sách</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php
                            echo route(); ?>admin/list-category">Liệt kê danh mục sách</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bank"></i>
                        <span>Nhà xuất bản</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php
                            echo route(); ?>admin/list-publish">Liệt kê nhà xuất bản</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-archive"></i>
                        <span>Quản lý sách</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php
                            echo route(); ?>admin/list-book">Quản lý sách</a></li>
                    </ul>
                </li>
                <!--                <li class="sub-menu">-->
                <!--                    <a href="javascript:;">-->
                <!--                        <i class="fa fa-newspaper-o"></i>-->
                <!--                        <span>Tin tức</span>-->
                <!--                    </a>-->
                <!--                    <ul class="sub">-->
                <!--                        <li><a href="quanly_tintuc.php">Quản lý tin tức</a></li>-->
                <!--                        <li><a href="quanly_danhmuc_tin.php">Quản lý danh mục tin tức</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->