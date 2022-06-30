<?php

$msg = "";

include 'config.php';

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE user SET user_pass='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: index.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location: forgot-password.php");
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password </title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/district.png">
    <link rel="stylesheet" href="assets/css/design.css" />

    
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>


</head>
<style>
        body {
        background-image: url('assets/pic2.JPG');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
      }

      .form-holder p {
          text-align: center;
          color: black;
       }


      .form-holder a {
	  font-size: 15px;
	  color: maroon;
      }
    </style>
<body>

    <div class="form-container">
            <form action="" method="POST" class="form-wrap">
                <div class="form-holder">
                <img src="assets/user.png">
                <h2>Change Password</h2>
                <?php echo $msg; ?>
                
                <div class="form-box">
                    <input type="text" name="password" placeholder="Enter Your Password" required>
                    <input type="text" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                </div>
                    <div class="form-submit">
                    <button name="submit" class="btn" type="submit">Change Password</button>
                </div>
                <form>
                <p class="subMenu1" >Back to
                    <a class="subMenuHighlight" href="index.php">Login</a></p>
            </form>
            </form>
    </div>
        </div>


    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>