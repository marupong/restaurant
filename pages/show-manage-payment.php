<?php 
    session_start();
    include "../common/config.php";
    include "../database/function.php";

    /* page name */
    $MODULE = "manage-payment";

    if($_SESSION["loginStatus"] != 1){
        header("Location: " . $HOST_NAME . "/pages/login.php");
    }

    $tno = (isset($_GET['tno']))? $_GET['tno']:NULL;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $TITLE_WEB;?> - การชำระเงิน</title>
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
                        การชำระเงิน
                        <!--<small>เปิดโต๊ะ ณ. เวลา 2017-05-02 12:00:00 น.</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
                        <li class="active">การชำระเงิน</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">



                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">รายการใบแจ้งยอดชำระค่าอาหาร</h3>
                            <!-- <small class="pull-right"><b>วัน-เวลา :</b> 2017-05-02 12:00</small> -->
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" id="tableInput" class="form-control pull-right" value="<?php echo $tno;?>" placeholder="หมายเลขโต๊ะ">

                                    <div class="input-group-btn">
                                        <button type="submit" id="tableSearch" class="btn btn-default"><i class="fa fa-search"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                        <?php
                            if(isset($_GET['tno'])) {

                        ?>
                            <a href="<?php echo $HOST_NAME;?>/pages/show-manage-payment.php" type="button" class="btn btn-success">
                                <i class="glyphicon glyphicon-list"></i> แสดงทั้งหมด
                            </a>
                            <p></p>
                        <?php
                            }
                        ?>
                            
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th style="width: 10%">ลำดับ</th>
                                    <th style="width: 20%">วัน-เวลา</th>
                                    <th style="width: 20%">หมายเลขโต๊ะ</th>
                                    <th style="width: 20%">พนักงาน</th>
                                    <th style="width: 15%">สถานะ</th>
                                    <th style="width: 15%">เครื่องมือ</th>
                                </tr>
                        <?php
                            $order = getOrders($tno);

                            for ($i=0; $i < count($order); $i++) { 
                                $orderID        =   $order[$i]['OrderID'];
                                $orderDateTime  =   $order[$i]['OrderDateTime'];
                                $tableNo        =   $order[$i]['TableNo'];
                                $empName        =   $order[$i]['FirstName']." ".$order[$i]['LastName'];
                                $orderStatus    =   $order[$i]['OrderStatus'];
                        ?>
                                <tr>
                                    <td><?php echo $i + 1;?></td>
                                    <td><?php echo $orderDateTime;?></td>
                                    <td><?php echo $tableNo;?></td>
                                    <td><?php echo $empName;?></td>
                                    <td>
                                        <span class="label <?php echo ($orderStatus == '1')? 'label-warning':'label-success'?>">
                                            <?php echo ($orderStatus == '1')? 'รอชำระ':'ชำระแล้ว'?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?php echo $HOST_NAME;?>/pages/show-invoice.php?id=<?php echo $orderID;?>" type="button" class="btn btn-info btn-xs">
                                            <i class="glyphicon glyphicon-search"></i> ดูรายละเอียด
                                        </a> 
                                    </td>
                                </tr>
                         <?php
                            }
                         ?>   
                            </table>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix " style="text-align: center;">
                        

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

        <script>
            $(document).ready(function(){
                $("#tableSearch").click(function(){
                    var tno = $("#tableInput").val();

                    if (tno != "" && $.isNumeric(tno)) {
                        window.location.href = "<?php echo $HOST_NAME;?>/pages/show-manage-payment.php?tno=" + tno;
                    }
                    else {
                        alert('กรุณากรอกข้อมูล/กรอกเป็นตัวเลข');
                    }
                    
                });
            });
        </script>
    </body>
</html>
