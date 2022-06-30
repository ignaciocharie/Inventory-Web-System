<?php include 'navbar.php'; ?>
<?php require_once('include/session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Sales</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/plugins/morris.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<style>
        /* CSS Code Start*/
        body{
        background-color: rgb(197, 204, 211);
        }
        /* CSS Code Ending*/
    </style>

<body>

            <div class="container-fluid" style="padding-top: 50px; padding-left: 150px; padding-right: 150px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-money"></i> Sales
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div id="order"></div>         
               
            </div>
            <!-- /.container-fluid -->
<?php include_once('modal/to_cart.php'); ?>
<?php include_once('modal/confirmation.php'); ?>
<?php include_once('modal/add_new_item.php'); ?>
<?php include_once('modal/message.php'); ?>

    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/regis.js"></script>

</body>

</html>
