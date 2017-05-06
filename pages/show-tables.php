<?php 
    session_start();
    include "../common/config.php";
    include "../database/function.php";

    /* page name */
    $MODULE = "manage-order";

    if($_SESSION["loginStatus"] != 1){
        header("Location: " . $HOST_NAME . "/pages/login.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $TITLE_WEB;?> - รายชื่อโต๊ะอาหาร</title>
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
                        การสั่งอาหาร
                        <!-- <small>it all starts here</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
                        <li class="active">การสั่งอาหาร</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="callout callout-info">
                        <h4><i class="icon fa fa-check-square-o"></i> เลือกโต๊ะอาหารสำหรับลูกค้า !</h4>

                        บริกรต้องเลือกโต๊ะให้กับลูกค้า โดยตรวจสอบสถานะและที่นั่งตามที่เหมาะสม จากรายชื่อโต๊ะข้างล่าง
                    </div>

                    <?php
                        $tables = getTables();

                        for ($i = 0; $i < count($tables); $i++) { 
                            $tableNo        =   $tables[$i]['TableNo'];
                            $tableSeat      =   $tables[$i]['TableSeat'];
                            $tableStatus    =   $tables[$i]['TableStatus'];

                            if($i % 4 == 0){
                    ?>

                    <div class="row">
                    <?php
                            }
                    ?>

                        <a href="show-manage-order.php" class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box <?php echo ($tableStatus == '1')? 'bg-green':'bg-yellow'?>">
                                <span class="info-box-icon"><?php echo $tableNo;?></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">โต๊ะสำหรับ</span>
                                    <span class="info-box-number"><?php echo $tableSeat;?> ท่าน</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>

                                    <span class="progress-description">
                                        สถานะ : <?php echo ($tableStatus == '1')? 'ว่าง':'ไม่ว่าง'?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                        <!-- /.col -->
                    <?php       
                            if($i % 4 == 3){
                    ?>

                    </div>

                    <?php
                            }
                        }

                    ?>

    
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
