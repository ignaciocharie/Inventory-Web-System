<?php
    session_start();
    if (isset($_SESSION['logged_id'])) {
        header("Location: home.php");
        die();
    }

    include 'config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE user SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM user WHERE user_email='{$email}' AND user_pass='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['logged_id'] = $email;
                header("Location: dashboard.php");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/district.png">

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

<form action="" method="POST" id="form-login">
	<div class="form-holder">
		<img src="assets/user.png">
        <h2 style="text-align:center;">Login Now</h2>
        <?php echo $msg; ?>
		<form>	
            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
			<input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
            <p><a href="forgotpassword.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
			<button name="submit" name="submit" class="btn" type="submit">Login</button>
        </form>
        <div class="social-icons">
                <p>Create Account! <a href="register.php">Register</a>.</p>
            </div>

        
</form>

                  
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