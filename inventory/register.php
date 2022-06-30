
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    if (isset($_SESSION['logged_id'])) {
        header("Location: dashboard.php");
        die();
    }

    require 'vendor/autoload.php';

    include 'config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
        $code = mysqli_real_escape_string($conn, md5(rand()));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO user (user_account, user_email, user_pass, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div style='display: none;'>";
                    $mail = new PHPMailer(true);

                    try {
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                        $mail->isSMTP();                                          
                        $mail->Host       = 'smtp.gmail.com';                   
                        $mail->SMTPAuth   = true;                                  
                        $mail->Username   = 'pererdan7@gmail.com';                   
                        $mail->Password   = 'vgoohzrqwqilhvgq';                            
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                        $mail->Port       = 465;                                    

                        $mail->setFrom('pererdan7@gmail.com');
                        $mail->addAddress($email);

                        $mail->isHTML(true);                                  
                        $mail->Subject = 'no reply';
                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/inventory/?verification='.$code.'">http://localhost/inventory/?verification='.$code.'</a></b>';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<title>Register</title>
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
        <h2 style="text-align:center;">Register Now</h2>
        <?php echo $msg; ?>
		<form>	
            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
            <button name="submit" class="btn" type="submit">Register</button>
        </form>
        <div class="social-icons">
            <p>Have an account! <a href="index.php">Login</a>.</p>
                        </div>
</form>
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