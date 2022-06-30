<?php include 'navbar.php'; ?>
<?php require_once('include/session.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-content, initial-scale=1.0">


    <title>POS</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


</head>
<style>
    /* CSS Code Beginning*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    body{
        background-color: rgb(197, 204, 211);
    }
    .container-fluid{
    font-family: "Poppins", sans-serif;
    }
    /* CSS Code End */
    </style>
<body>
            <div class="container-fluid" style="padding-top: 50px; padding-left: 150px; padding-right: 150px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <strong>Daily Sales:</strong>
                <input id="dailyDate" type="date" class="btn btn-default btn-sm" placeholder=""
                value="<?= date('Y-m-d'); ?>">
            
                <div id="printBut" class="pull-right">
                <button type="button" class="btn btn-success btn-sm">
                    PRINT
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                </button>
                </div>
               
               <div id="all-sales"></div>

            </div>
            <!-- /.container-fluid -->
<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>


</body>

</html>
