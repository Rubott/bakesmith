<?php
    include('config.php');

    $info = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

            $myusername = mysqli_real_escape_string($conn,$_POST["txtUsername"]);
            $mypassword = mysqli_real_escape_string($conn,$_POST["txtPassword"]);
            $mypasswordConfirm = mysqli_real_escape_string($conn,$_POST["txtPasswordConfirm"]);
            $myfirstname = mysqli_real_escape_string($conn,$_POST["txtFirstname"]);
            $mylastname = mysqli_real_escape_string($conn,$_POST["txtLastname"]);
            $myemail = mysqli_real_escape_string($conn,$_POST["txtEmail"]);

        if ($mypassword == $mypasswordConfirm)
        {
            $sql = "INSERT INTO user (username, password, firstname, lastname, email)
            VALUES ('$myusername', '$mypassword', '$myfirstname', '$mylastname', '$myemail')";

        if (mysqli_query($conn, $sql)) {
            $info = "User Created Successfully!";
                } else {
            $info ="Unable to Add User!";
                }
        }
        
        else {
            $info ="Passwords do not match!";
            }
        }
?>

<html>
    <head>
        <!--<title>Login Page</title>

        <style type = "text/css">
            body {
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
                }
            label {
                font-weight:bold;
                width:100px;
                font-size:14px;
                }
            .box {
                border:#666666 solid 1px;
                }
        </style>-->
        
        <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--add fonts here-->
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--my style sheet-->
      <link type="text/css" rel="stylesheet" href="css/mystyle.css"/>
      <link href="https://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

            <body bgcolor = "#2196f3">
                <div align = "center">
                <div style = "background-color:#FFFFFF; width:350px; border: solid 1px #2196f3; " align = "left">
                <div style = "background-color:#2196f3; color:#FFFFFF; padding:3px;"><b>Register User</b></div>
                <div style = "margin:30px">

                    <form action = "" method = "post">
                        <label>UserName :</label><input type = "text" name = "txtUsername" class = "box"/><br />
                        <label>Password :</label><input type = "password" name = "txtPassword" class = "box" /><br/>
                        <label>Confirm Password :</label><input type = "password" name = "txtPasswordConfirm" class = "box" /><br/>
                        <label>First Name :</label><input type = "text" name = "txtFirstname" class = "box"/><br />
                        <label>Last Name :</label><input type = "text" name = "txtLastname" class = "box"/><br />
                        <label>Email :</label><input type = "text" name = "txtEmail" class = "box"/><br />
                        <input type = "submit" value = " Submit "/><br />
                    </form>
                    <h5><a href="login.php">Login User</a></h5>
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $info; ?></div>
                </div>
                </div>
                </div>
            </body>
</html>