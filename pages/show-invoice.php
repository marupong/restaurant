<?php 
    session_start();
    include "../common/config.php";
    include "../database/function.php";

    /* page name */
    $MODULE = "manage-payment";

    if($_SESSION["loginStatus"] != 1){
        header("Location: " . $HOST_NAME . "/pages/login.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $TITLE_WEB;?> - ใบแจ้งยอดค่าอาหาร</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ใบแจ้งยอดค่าอาหาร
                        <small>#007612</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
                        <li><a href="<?php echo $HOST_NAME;?>/pages/show-manage-payment.php">การชำระเงิน</a></li>
                        <li class="active">ใบแจ้งยอดค่าอาหาร</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="glyphicon glyphicon-star"></i> ร้านอาหารอร่อยเสมอ
                                <small class="pull-right">Date: 2/10/2014</small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->


                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Product</th>
                                    <th>Serial #</th>
                                    <th>Description</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Call of Duty</td>
                                    <td>455-981-221</td>
                                    <td>El snort testosterone trophy driving gloves handsome</td>
                                    <td>$64.50</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Need for Speed IV</td>
                                    <td>247-925-726</td>
                                    <td>Wes Anderson umami biodiesel</td>
                                    <td>$50.00</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Monsters DVD</td>
                                    <td>735-845-642</td>
                                    <td>Terry Richardson helvetica tousled street art master</td>
                                    <td>$10.70</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Grown Ups Blue Ray</td>
                                    <td>422-568-642</td>
                                    <td>Tousled lomo letterpress</td>
                                    <td>$25.99</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                          
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                          

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>$250.30</td>
                                    </tr>
                                    <tr>
                                        <th>Tax (9.3%)</th>
                                        <td>$10.34</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$5.80</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="<?php echo $HOST_NAME;?>/pages/show-invoice-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                            <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                          </button>
                            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> Generate PDF
                          </button> -->
                        </div>
                    </div>
                </section>
                <!-- /.content -->
                <div class="clearfix"></div>
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
        <!-- FastClick -->
        <script src="../plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>

    </body>
</html>
