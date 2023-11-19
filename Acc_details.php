<?php
session_start();
$_SESSION['pageid'] = "Acc_details";
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

$userID = $_SESSION['user_id'];


$query = "SELECT * FROM users
          WHERE userId=$userID";

// execute the query
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// fetch the execution result to an array
$row = mysqli_fetch_array($result);
$username=$row['username'];
$name=$row['name'];
$dob=$row['dob'];
$email=$row['email'];
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Account Details</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <div class="container mt-3">
        <h3 class="header">Account Details</h3>
        <div class="row">
          <div class="col-7">
            <div class="card">
              <div class="card-body bg-secondary">
                <h4 class="card-title">Edit User</h4>
               <form method="post" action="doAcc_details.php">
                   <div class="form-group">
                            <label for="idname">Name:</label>
                            <input name="Name" type="text" id="idname" class="form-control" placeholder="Full Name" />
                        </div>

                        <div class="form-group">
                            <label for="idCalendar">Date of Birth:</label>
                            <input name="DOB" id="idCalendar" type="date" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="idEmail">Email:</label>
                            <input name="Email" type="email" id="idEmail" class="form-control" placeholder="Email" />
                        </div>

                        <div class="form-group">
                            <label for="idUser">Username:</label>
                            <input name="username" type="text" id="idUser" class="form-control" placeholder="Username" />
                        </div>

                        <div class="form-group">
                            <label for="idPassword">Password:</label>
                            <input name="Password" type="password" id="idPassword" class="form-control" placeholder="Password" />
                        </div>
                  <input type="submit" value="Save Changes"/>
              </form> 
              </div>
            </div>
          </div>

        <div class="col-5">
          <div class="card">
            <div class="card-body bg-dark text-white">
              <h4 class="card-title">User Information</h4>
              <table>
                    <br/>
                    <tr>
                        <td>Name</td>
                        <td>: <?php echo $name;?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>: <?php echo $dob;?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>(yyyy/dd/mm)</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <?php echo $email;?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>: <?php echo $username;?></td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
      <br/>
    <div class="row">  
    </div>
        <div class="col-3">
          <div class="card">
            <div class="card-body bg-secondary">
              <h4 class="card-title">Account Status</h4>
              <form method="post" action="doDelOrDeact.php">
                 <table>
                    <br/>
                    <tr>
                        <td><label for="deact">Deactivate account:</label></td>
                        <td><input type="checkbox" name="deact"></td>
                    </tr>

                    <tr>
                        <td ><label for="del">Delete account:</label></td>
                        <td><input type="checkbox" name="del"></td>
                    </tr>
                    <tr>
                        <td><br/></td>
                    </tr>
                    <tr>
                        <td ><label for="Confirmed">Check to confirm:</label></td>
                        <td><input type="checkbox" name="Confirmed" required></td>
                    </tr>
                </table>
                  <br/>
                <input type="submit" value="Deactivate/Delete"/>
            </form> 
            </div>
          </div>
        </div>
      </div>
    </body>
</html>