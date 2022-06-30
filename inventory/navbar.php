<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Coffee District</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/district.png">
    </head>
<!--Starting Points of the CSS Codes-->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    background: black;
    min-height: 100vh;
}
header .sticky{
    padding: 5px, 100px;
    background: white;
}
header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.6s;
    padding: 40px, 100px;
    z-index: 100000;
    background: black;
}
header .logo{
    position: relative;
    font-weight: 700;
    color: white;
    text-decoration: none;
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: 0.6s;
    padding: 5px 5px 5px;
}
header ul{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
header ul li{
    position: relative;
    list-style: none;
}
header ul li a{
 position: relative;
 margin: 0 15px;
 text-decoration: none;
 color: white;
 letter-spacing: 2px;
 font-weight: 500px;
 transition: 0.6s;
}
.banner{
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url('assets/pic3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
header .sticky .logo{
    color: black;
}
header .sticky ul li a{
    color: black;
}
</style>
<!--Ending Points of the CSS Codes-->
    <body>
        <header>
            <a href="home.php" class="logo">Coffee District</a>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="item-list.php">Item List</a></li>
                <li><a href="product-stock.php">Product Stocks</a></li>
                <li><a href="expired.php">Expired Products</a></li>
                <li><a href="stock-report.php">Stock Report</a></li>
                <li><a href="sales.php">POS</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>
        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector("header");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
        </script>
    </body>
</html>