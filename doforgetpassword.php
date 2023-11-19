<?php
session_start();
$msg = "";

//check whether session variable 'user_id' is set
//in other words, check whether the user is already logged in
if (isset($_POST['username']) && ($_POST['email'])) {
    //retrieve form data
        $usernameE = $_POST['username'];
        $_SESSION['resetPUser'] = $usernameE;
        $emailE = $_POST['email'];
        $token = rand(1000,9999);
        //connect to database
        include ("dbFunctions.php");

        //match the username and password entered with database record
        $query = "SELECT * FROM users 
                WHERE email='$emailE' AND username='$usernameE'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if (mysqli_num_rows($result) == 1) {
            $receiver = "$emailE";
            $subject = "One-time-password";
            $body = "OTP:$token";
            $sender = "forstudiesrig@gmail.com"; 

            if (mail($receiver, $subject, $body, $sender)) {
                $msg="Your OTP has been sent to $receiver";
            }
           
        } else { //record not found
            $check="";
            $msg = "Username or Email was invalid,<a href='forgetpassword.php'> please try again!</a>";
        }
        mysqli_close($link);
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Forgot Password</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Forgot Password</h3>
        <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-lg-4">
                <div class="card-header bg-dark text-white d-flex justify-content-center">
                  <?php echo $msg; ?>
                </div>
                  <?php if (!isset($check)) { ?>
                <div class="card-body bg-secondary d-flex justify-content-center">
                  <form action="Reset.php" method="post">

                        <table>  
                          <tr>
                          <label for="number">OTP:</label>
                          <input type="number" name="OTP" required id="number">
                          <input type="hidden" name="OTPcheck" value="<?php echo $token; ?>">
                          </tr>
                          <tr>
                          <input type="submit" value="Enter">
                          </tr>
                      </table>

                  </form>
                </div>
                  <?php }?>
            </div>
          </div>
      </div>
    </body>
</html>