<?php

session_start();
if (isset($_SESSION['logged_id'])) {
    header("Location: welcome.php");
    die();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE user SET code='{$code}' WHERE user_email='{$email}'");

        if ($query) {        
            echo "<div style='display: none;'>";
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.gmail.com';                    
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'pererdan7@gmail.com';                     
                $mail->Password   = 'ignacioGC2020';                              
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
                $mail->Port       = 465;                                    

                $mail->setFrom('pererdan7@gmail.com');
                $mail->addAddress($email);

                $mail->isHTML(true);                                 
                $mail->Subject = 'no reply';
                $mail->Body    = 'Here is the Forgot Password link <b><a href="http://localhost/inventory/change-password.php?reset='.$code.'">http://localhost/inventory/change-password.php?reset='.$code.'</a></b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";        
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
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
<div class="form-container">
        <form action="" method="POST" class="form-wrap">
            <div class="form-holder">
            <img src="assets/user.png">
            <h2>Forgot Password</h2>
            <?php echo $msg; ?>
            
            <div class="form-box">
                <input type="text" name="email" placeholder="Enter Your Email" required>
            </div>
                <div class="form-submit">
                <button name="submit" class="btn" type="submit">Send Reset Link</button>
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