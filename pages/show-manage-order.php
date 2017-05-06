<?php 

    include "../common/config.php";

    /* page name */
    $MODULE = "manage-order";
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
                        โต๊ะหมายเลข 1
                        <!--<small>เปิดโต๊ะ ณ. เวลา 2017-05-02 12:00:00 น.</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
                        <li><a href="show-tables.php">การสั่งอาหาร</a></li>
                        <li class="active">โต๊ะหมายเลข 1</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">



                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">รายการอาหารของลูกค้า</h3>
                            <small class="pull-right"><b>วัน-เวลา :</b> 2017-05-02 12:00</small>
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

                            <a href="add-order-menu.php" type="button" class="btn btn-success">
                                <i class="fa fa-plus"></i> เพิ่มเมนู
                            </a>
                            <p></p>

                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อเมนู</th>
                                    <th>จำนวน</th>
                                    <th>รายละเอียดเพิ่มเติม</th>
                                    <th>เครื่องมือ</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>ต้มยำรวมมิตร</td>
                                    <td>1</td>
                                    <td>น้ำข้น, ไม่ใส่หมู</td>
                                    <td>
                                        <a href="index.php" type="button" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i> แก้ไข
                                        </a> 
                                        <a href="index.php" type="button" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> ยกเลิก
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ไข่เจียวหมูสับ</td>
                                    <td>1</td>
                                    <td>-</td>
                                    <td>
                                        <a href="index.php" type="button" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i> แก้ไข
                                        </a> 
                                        <a href="index.php" type="button" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> ยกเลิก
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ข้าวเปล่า</td>
                                    <td>2</td>
                                    <td>-</td>
                                    <td>
                                        <a href="index.php" type="button" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"></i> แก้ไข
                                        </a> 
                                        <a href="index.php" type="button" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> ยกเลิก
                                        </a>
                                    </td>
                                </tr>

                            </table>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix " style="text-align: center;">
                            <button type="button" class="btn btn-default btn-lg"><i class="fa fa-times"></i> ยกเลิก</button>
                            <button type="button" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> ยืนยัน</button>
                            <!-- <ul class="pagination no-margin pull-right">
                                <li class="paginate_button previous disabled">
                                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
                                </li>
                                <li class="paginate_button active">
                                    <a href="#" data-dt-idx="1" tabindex="0">1</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" data-dt-idx="2" tabindex="0">2</a>
                                </li>   
                                <li class="paginate_button ">
                                    <a href="#" data-dt-idx="3" tabindex="0">3</a>
                                </li><li class="paginate_button ">
                                    <a href="#" data-dt-idx="4" tabindex="0">4</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" data-dt-idx="5" tabindex="0">5</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" data-dt-idx="6" tabindex="0">6</a>
                                </li>
                                <li class="paginate_button next" id="example2_next">
                                    <a href="#" data-dt-idx="7" tabindex="0">Next</a>
                                </li>
                            </ul> -->
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
