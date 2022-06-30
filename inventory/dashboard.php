<?php include 'navbar.php'; ?>
<?php require_once('include/session.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-content, initial-scale=1.0">
        <title>Dashboard</title>
    </head>

<!--CSS Codes -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
body{
  margin: 0;
  padding-left: 100px;
  height: 100vh;
  display: flex;
  justify-content: left;
  align-items: flex-end;
  padding-bottom: 80px;
  background: #1D212B;
}

.slider{
  width: 800px;
  height: 500px;
  border-radius: 10px;
  overflow: hidden;
}

.slides{
  width: 500%;
  height: 500px;
  display: flex;
}

.slides input{
  display: none;
}

.slide{
  width: 20%;
  transition: 2s;
}

.slide img{
  width: 800px;
  height: 500px;
}

/*css for manual slide navigation*/

.navigation-manual{
  position: absolute;
  width: 800px;
  margin-top: -40px;
  display: flex;
  justify-content: center;
}

.manual-btn{
  border: 2px solid white;
  padding: 5px;
  border-radius: 10px;
  cursor: pointer;
  transition: 1s;
}

.manual-btn:not(:last-child){
  margin-right: 40px;
}

.manual-btn:hover{
  background: #40D3DC;
}

#radio1:checked ~ .first{
  margin-left: 0;
}

#radio2:checked ~ .first{
  margin-left: -20%;
}

#radio3:checked ~ .first{
  margin-left: -40%;
}

/*css for automatic navigation*/

.navigation-auto{
  position: absolute;
  display: flex;
  width: 800px;
  justify-content: center;
  margin-top: 460px;
}

.navigation-auto div{
  border: 2px solid #1D212B;
  padding: 5px;
  border-radius: 10px;
  transition: 1s;
}

.navigation-auto div:not(:last-child){
  margin-right: 40px;
}

#radio1:checked ~ .navigation-auto .auto-btn1{
    background: #1D212B;
}

#radio2:checked ~ .navigation-auto .auto-btn2{
    background: #1D212B;
}

#radio3:checked ~ .navigation-auto .auto-btn3{
    background: #1D212B;
}
/* Container for the Dashboard Column 02 */
.glass{
    width: 400px;
    height: 500px;
    background-color: rgba(255,255, 255, 0.1);
    padding: 50px;
    margin-left: 20px;
    border-radius: 5px;
    backdrop-filter: blur(30px);
    border: 2px solid transparent;
    background-clip: padding-box;
    box-shadow: 10px 10px 10px rgba(45, 55, 68, 0.3);
    line-height: 1.5;
}
h1{
    font-size: 50;
    margin-bottom: 20px;
    font-family: "Poppins", sans-serif;
    color: white;
    text-align: center;
}

.col-md-3{
  text-align:center;
  font-family: "Poppins", sans-serif;
  font-size: 20px;
}
.page-header{
  font-size: 55px;
}
.pos{
    text-decoration: none;
    color: white;
    font-family: "Poppins", sans-serif;
    font-size: 30px;
}
a{
  text-decoration: none;
  color: white;
}
a:hover{
  color: red;
}
</style>
<!--End CSS Codes-->
    <body>
    <!--image slider start-->
  <div class ="Col1">
  <h1 class="page-header" style="color:beige">
              Welcome <?php echo  $row['user_account'] ?>
          </h1>
    <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="assets/pic1.jpeg" alt="">
        </div>
        <div class="slide">
          <img src="assets/pic2.JPG" alt="">
        </div>
        <div class="slide">
          <img src="assets/about.png" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
</div>
    <!--image slider end-->
<div class="Col2">
<div class="glass">
    <h1>Dashboard</h1>

    <a href="item-list.php">
	    <div class="col-md-3">
       <div class="panel-mb-4 panel-box clearfix">
         <div class="panel-icon pull-left">
        </div>
        <div class="panel-value pull-right">
        <p class="text-muted" style="color:white">Total Items</p>
          <h2 class="margin-top">
            
          <?php require 'database/config.php';

          $query = "SELECT item_id FROM item ORDER BY item_id";
          $query_run = mysqli_query($connection, $query);

          $row = mysqli_num_rows($query_run);

          echo '<h1> '.$row.'<h1>';
          ?>  
          </h2>
        </div>
       </div>
    </div>
	</a>
	
	<a href="expired.php">
    <div class="col-md-3">
       <div class="panel-mb-4 panel-box clearfix">
         <div class="panel-icon pull-left bg-blue2">
        </div>
        <div class="panel-value pull-right">
        <p class="text-muted" style="color:white">Expired Items</p>
          <h2 class="margin-top"> 
          <?php require 'database/config.php';

          $query = "SELECT exp_id FROM expired ORDER BY exp_id";
          $query_run = mysqli_query($connection, $query);

            $row = mysqli_num_rows($query_run);

              echo '<h1> '.$row.'<h1>';
            ?>
          </h2>
        </div>
       </div>
    </div>
	</a>

  <a href="stock-report.php">
    <div class="col-md-3">
       <div class="panel-mb-4 panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
        </div>
        <div class="panel-value pull-right">
        <p class="text-muted" style="color:white">Total Stocks</p>
          <h2 class="margin-top">
            <?php

            require 'database/config.php';

            $query = "SELECT stock_id FROM stock ORDER BY stock_id";
            $query_run = mysqli_query($connection, $query);

            $row = mysqli_num_rows($query_run);

            echo '<h1> '.$row.'<h1>';
            ?> 
          </h2>
        </div>
       </div>
    </div>
	</a>

</div>
</div>


    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 3){
        counter = 1;
      }
    }, 5000);
    </script>

  </body>
</html>

