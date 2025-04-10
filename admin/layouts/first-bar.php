<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/admin/dashboard.php" class="site_title"><i class="fa fa-paw"></i> <span>PNLdev</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/admin/assets/build/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>خوش آمدید,</span>
                <h2>
                    <?php echo $_SESSION['user']['first_name'] . " " . $_SESSION['user']['first_name'] ; ?>
                </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>عمومی</h3>
                <ul class="nav side-menu" style="">
                    <li>
                        <a href="/admin/dashboard.php">
                            <i class="fa fa-home"></i>
                            خانه
                        </a>
                    </li>
                    <li class=""><a><i class="fa fa-user"></i> کاربران <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none;">
                            <li><a href="/admin/user/list.php">فهرست</a></li>
                            <li><a href="/admin/user/create.php">ساخت</a></li>
                        </ul>
                    </li>
                    <li class=""><a><i class="fa fa-edit"></i> پست ها <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none;">
                            <li><a href="/admin/post/list.php">فهرست</a></li>
                            <li><a href="/admin/post/create.php">ساخت</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>