<?php include 'navbar.php'; ?>
<?php require_once('include/session.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-content, initial-scale=1.0">
        <title>Item-List</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
        <link href="assets/css/sb-admin.css" rel="stylesheet">
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
            <div class="container" style="padding-top: 50px;">
                <button class="btn btn-success btn-sm" id="stock-report">PRINT
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                </button>
               <div id="all-stock"></div>

             </div>

<?php include_once('modal/confirmation.php'); ?>
<?php include_once('modal/message.php'); ?>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>


    </body>
    </html>