<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $HOST_NAME;?>/profile-pic/<?php echo $_SESSION["profilePic"];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION["firstName"]." ".$_SESSION["lasttName"];?></p>
                <small><?php echo $_SESSION["userRoleName"];?></small>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">เมนูหลัก</li>

            <li <?php echo ($MODULE=="manage-order")? "class=\"active\"":"";?>>
                <a href="<?php echo $HOST_NAME;?>/pages/show-tables.php">
                    <i class="fa fa-check-square-o"></i>
                    <span>การสั่งอาหาร</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>รายการอาหารของลูกค้า</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>การชำระเงิน</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>รายรับ-รายจ่าย</span>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-bar-chart"></i>
                    <span>รายงาน</span>
                </a>
            </li>

            <li>
                <a href="<?php echo $HOST_NAME;?>/pages/logout.php">
                    <i class="fa fa-sign-out"></i>
                    <span>ออกจากระบบ</span>
                </a>
            </li>
            <!--<li class="treeview active">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>-->
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<?php

    /*
        list of menu on sidebar.
        - แผงควบคุม
        - การสั่งอาหาร
        - รายการอาหารของลูกค้า
        - การชำระเงิน
        - รายรับ-รายจ่าย
        - รายงาน

    */

?>


