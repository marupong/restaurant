<?php 
    session_start();
    include "../common/config.php";
    include "../database/function.php";

    /* page name */
    $MODULE = "manage-order";

    if($_SESSION["loginStatus"] != 1){
        header("Location: " . $HOST_NAME . "/pages/login.php");
    }

    $tableID    =   $_GET['t'];
    $table      =   getTable($tableID);
    $tableNo    =   $table['TableNo'];

    $status    =   $_GET['s'];



    if ($status == 'e') {
        echo "<script>alert('ยังไม่มีรายการ')</script>";
        header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID );
    }
    else if($status == 'u' || $status == 'i'){
        echo "<script>alert('ทำรายการสำเร็จ')</script>";
        header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID);
    }
    else if($status == 'nu' || $status == 'ni'){
        echo "<script>alert('ทำรายการไม่สำเร็จ !!!')</script>";
        header("Location: " . $HOST_NAME . "/pages/show-manage-order.php?t=" . $tableID);
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $TITLE_WEB;?> - จัดการรายการอาหาร</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="hold-transition skin-blue sidebar-mini">

    <!-- Site wrapper -->
        <div class="wrapper">

            <?php
                include "header-nav.php";
            ?>

            <!-- =============================================== -->

            <?php
                include "sidebar-main.php";
            ?>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        โต๊ะหมายเลข <?php echo $tableNo;?>
                        <!--<small>เปิดโต๊ะ ณ. เวลา 2017-05-02 12:00:00 น.</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
                        <li><a href="show-tables.php">การสั่งอาหาร</a></li>
                        <li class="active">โต๊ะหมายเลข <?php echo $tableNo;?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">



                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">รายการอาหารของลูกค้า</h3>
                            <!-- <small class="pull-right"><b>วัน-เวลา :</b> 2017-05-02 12:00</small> -->
                            <!-- <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- /.box-header -->


                        <div class="box-body">

                            <a href="add-order-menu.php?t=<?php echo $tableID;?>" type="button" class="btn btn-success">
                                <i class="fa fa-plus"></i> เพิ่มเมนู
                            </a>
                            <p></p>

                            <table class="table table-hover table-striped">
                                <tr>
                                    <th style="width: 10%">ลำดับ</th>
                                    <th style="width: 25%">ชื่อเมนู</th>
                                    <th style="width: 10%">ราคา</th>
                                    <th style="width: 10%">จำนวน</th>
                                    <th style="width: 30%">รายละเอียดเพิ่มเติม</th>
                                    <th style="width: 15%">เครื่องมือ</th>
                                </tr>
                            <?php

                                $menuNo = 1;

                                $orderID        =   getOrderID($tableID, 1);

                                if (isset($orderID)){
                                    $OrderDetails   =   getOrderDetails($orderID);
                                }
                                else{
                                    $OrderDetails   =   array();
                                }


                                 if (count($OrderDetails) > 0) {
                                    foreach ($OrderDetails as $OrderDetail) {
                                        $orderDetailID  =   $OrderDetail['OrderDetailID'];
                                        $menuID     =   $OrderDetail['MenuID'];

                                        $getMenu    =   getMenu($menuID);
                                        $menuName   =   $getMenu['MenuName'];

                                        $menuQty    =   $OrderDetail['Qty'];
                                        $menuNote   =   $OrderDetail['MenuNote']; 
                                        $menuPrice  =   $OrderDetail['PricePerMenu'];  
                            ?>
                                <tr>
                                    <td><?php echo $menuNo;?></td>
                                    <td><?php echo $menuName;?></td>
                                    <td><?php echo $menuPrice;?></td>
                                    <td><?php echo $menuQty;?></td>
                                    <td><?php echo $menuNote;?></td>
                                    <td>
                                        <a href="<?php echo $HOST_NAME;?>/pages/edit-order-menu.php?t=<?php echo $tableNo;?>&id=<?php echo $orderDetailID;?>&f=1" type="button" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i> แก้ไข
                                        </a> 
                                        <a href="<?php echo $HOST_NAME;?>/pages/delete-order-menu.php?t=<?php echo $tableNo;?>&i=<?php echo $orderDetailID;?>&f=1" type="button" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> ยกเลิก
                                        </a>
                                    </td>
                                </tr>
                            <?php   
                                        $menuNo++; 
                                        
                                    }
                                }

                                if (count($_SESSION["Menus"]) > 0) {
                                    foreach ($_SESSION["Menus"] as $key => $menu) {
                                        $menuID     =   $menu['menuID'];
                                        $menuName   =   $menu['MenuName'];
                                        $menuQty    =   $menu['MenuQty'];
                                        $menuNote   =   $menu['MenuNote'];
                                        $menuPrice  =   $menu['MenuPrice'];
                                
                            ?>
                                <tr>
                                    <td><?php echo $menuNo;?></td>
                                    <td><?php echo $menuName;?></td>
                                    <td><?php echo $menuPrice;?></td>
                                    <td><?php echo $menuQty;?></td>
                                    <td><?php echo $menuNote;?></td>
                                    <td>
                                        <a href="<?php echo $HOST_NAME;?>/pages/edit-order-menu.php?t=<?php echo $tableNo;?>&id=<?php echo $key;?>&f=2" type="button" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i> แก้ไข
                                        </a> 
                                        <a href="<?php echo $HOST_NAME;?>/pages/delete-order-menu.php?t=<?php echo $tableNo;?>&i=<?php echo $key;?>&f=2" type="button" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> ยกเลิก
                                        </a>
                                    </td>
                                </tr>
                            <?php   
                                        $menuNo++;     
                                    }
                                }

                                if (count($_SESSION["Menus"]) == 0 && count($OrderDetails) == 0) {
                            ?>
                                <tr>
                                    <td style="text-align: center;" colspan="6">ยังไม่มีรายการ</td>
                                </tr>
                            <?php
                                }
                            ?>


                            </table>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix " style="text-align: center;">
                            <a href="<?php echo $HOST_NAME;?>/pages/cancel-order-menu.php?t=<?php echo $tableID;?>&i=<?php echo $orderID;?>" type="button" class="btn btn-default btn-lg"><i class="fa fa-times"></i> ยกเลิก</a>
                            <a href="<?php echo $HOST_NAME;?>/pages/confirm-order-fn.php?t=<?php echo $tableID;?>" id="confirm" type="button" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> ยืนยันเมนู</a>

                        </div>

                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

        <!-- =============================================== -->

        <?php
            include "footer-main.php";
        ?>

        <!-- =============================================== -->
      
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>


    </body>
</html>
