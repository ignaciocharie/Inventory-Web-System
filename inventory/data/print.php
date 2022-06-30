<?php 
require_once('../class/Stock.php');
$stocks = $stock->all_stockGroup();

require_once('../class/Stock.php');
$stockList = $stock->all_stockList();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Inventory System</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
        print();
    </script>
</head>
<body>


<center>
    <h2>Coffee District Inventory</h2>
    <h3>as of</h3>
    <h3><?php echo date('m-d-Y'); ?></h3>
</center>

<br />
<div class="table-responsive">
        <table id="myTable-stock" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center>Item Name</center></th>
                    <th><center>Price</center></th>
                    <th><center>Qty</center></th>
                    <th><center>Expiry Date</center></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stockList as $sl): ?>
                <tr align="center">
                    <td><?= ucwords($sl['item_name']); ?></td>
                    <td><?= "Php ".number_format($sl['item_price'], 2); ?></td>
                    <td><?= $sl['stock_qty']; ?></td>
                    <td align="left" width="110px;"><?= $sl['stock_expiry']; ?>
                         
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>


<?php 
$stock->Disconnect();
 ?>



    <script type="text/javascript">
        print();
    </script>
</body>
</html>
