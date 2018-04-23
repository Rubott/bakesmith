<?php

$info = "";

    include('session.php');
    function displayUser($conn, $login_user) {
        $sql = "SELECT userID, username, password, firstname, lastname, email FROM user WHERE userID = '$login_user' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        return $row;
            }
        function updateUser($conn, $login_user) {
            $myfirstname = mysqli_real_escape_string($conn,$_POST["txtFirstname"]);
            $mylastname = mysqli_real_escape_string($conn,$_POST["txtLastname"]);
            $myemail = mysqli_real_escape_string($conn,$_POST["txtEmail"]);

            $sql = "UPDATE user SET firstname = '$myfirstname', lastname = '$mylastname', email ='$myemail' WHERE userID = '$_SESSION[login_user]' ";
    
        if (mysqli_query($conn, $sql)) {
            $info = "Updated User successfully ";
        } else {
            $info = "Error updating User: ". mysqli_error($conn);
        }
            return $info;
        }
        function deleteUser($conn, $login_user) {
            $sql = "DELETE FROM user WHERE userID = '$_SESSION[login_user]' ";
        if (mysqli_query($conn, $sql)) {
            $info = "User deleted successfully";
        header("Location: login.php");
        } else {
            $info = "Error deleting User: " . mysqli_error($conn);
        }
            return $info;
        }
        if(isset($_POST["update"])){
            $info = updateUser($conn, $_SESSION["login_user"]);
            $row = displayUser($conn, $_SESSION["login_user"]);
        }
        else if (isset($_POST["delete"])){
            $info = deleteUser($conn, $_SESSION["login_user"]);
        }
        else {
            $row = displayUser($conn, $_SESSION["login_user"]);
        }
        mysqli_close($conn);
?>

<html>
    <head>
        <title>Login Page</title>

        <!--<style type = "text/css">

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
        <div style = "background-color:#FFFFFF; width:300px; border: solid 1px #2196f3; " align = "left">
        <div style = "background-color:#2196f3; color:#FFFFFF; padding:3px;"><b>Update User</b></div>
        <div style = "margin:30px">

        <form action = "" method = "post">
        <label>UserName : <?php echo $row["username"]?></label><br /><br />
        <label>First Name :</label><input type = "text" name = "txtFirstname" value = "<?php
        echo $row["firstname"]?>" class = "box"/><br /><br />
        <label>Last Name :</label><input type = "text" name = "txtLastname" value = "<?php
        echo $row["lastname"]?>" class = "box"/><br /><br />
        <label>Email :</label><input type = "text" name = "txtEmail" value = "<?php echo
        $row["email"]?>"class = "box"/><br /><br />
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete">Delete</button>
        </form>
                <h5><a href="dashboard.php">Return to Dashboard</a></h5>
                <h6><a href = "login.php">Sign Out</a></h6>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $info;
            ?></div>
        </div>
        </div>
        </div>
    </body>
</html>