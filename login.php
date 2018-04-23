<?php
   include('config.php');
   session_start();

    $info = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST["txtUsername"]);
      $mypassword = mysqli_real_escape_string($conn,$_POST["txtPassword"]); 
      
      $sql = "SELECT userID FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row["active"];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION["login_user"] = $row["userID"];
         
         header("location: dashboard.php");
      }else {
         $info = "Your Login Name or Password is invalid";
      }
   }
   mysqli_close($conn);
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
            <!--</style>-->
      
            </head>
   
   <body bgcolor = "#2196f3">
	
      <div align = "center">
         <div style = "background-color:#FFFFFF; width:300px; border: solid 1px #2196f3; " align = "left">
            <div class="center-align" style = "background-color:#2196f3; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "txtUsername" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "txtPassword" class = "box" /><br/><br />
                  <input type = "submit"  value = " Submit "/><br />
               </form>
               <h4><a href="register.php">Register User</a></h4>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $info; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>