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
    <div class="container" style="padding-top: 50px;">
        <button class="btn btn-default" id="add-new-item">Add New Item
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
         </button>
            <div id="all-item"></div>
   </div>


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