<?php
    include('session.php');
    
    $info = "";

    $sql = "SELECT userID, username, password, firstname, lastname, email FROM user WHERE userID = '$_SESSION[login_user]'";
    $sql2 = "SELECT Testimonials.testimonialID, Testimonials.Testimonial, user.userID FROM Testimonials INNER JOIN user ON Testimonials.userID = user.userID WHERE user.userID = '$_SESSION[login_user]'";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

    mysqli_close($conn);

    /*include ('session.php');

    $info = "";

    $user = $_POST['user'];
    $testimonials = $_POST['testimonials'];

    //connect to database
    $conn = @mysql_connect ( "localhost" , "user" , "testimonials")
        or die (mysql_error());

    //select the databse
    $rs = @mysql_select_db ("user" , $conn) or die (mysql_error());

    //create the query
    $sql = "INSERT INTO" (userName, testim) VALUES ('$user' , '$testimonials');

    //execute the query
    $rs = mysql_query($sql, $conn) or die (mysql_error());*/

    
    
?>

<html>

    <head>
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
        
        <title>Welcome</title>
    </head>

    <body class="blue">
        <div class="container">
    <h1 class="center-align white-text">Welcome <?php echo $row["firstname"]; ?></h1>
        <center class="white-text"><?php echo "Username: " . $row["username"] . "</br>"?>
        <?php echo "Firstname: " . $row["firstname"] . "</br>"?>
        <?php echo "Lastname: " . $row["lastname"] . "</br>"?>
        <?php echo "Email: " . $row["email"] . "</br>"?>
        <h6><a class="teal-text text-lighten-4" href="update.php">Update Details</a></h6>
            <h6><a class="teal-text text-lighten-4" href = "login.php">Sign Out</a></h6></center>
        </div>
        
        <div class="container">
      <h1 class="center-align white-text">Testimonial</h1>    
        <center class="white-text"><?php echo "Testimonial ID: " . $row2["testimonialID"] . "</br>"?>
        <?php echo "Testimonial: " . $row2["Testimonial"] . "</br>"?>
        <?php echo "UserID: " . $row2["userID"] . "</br>"?></center>
            
            <?php
               /* include('config.php');*/

                $info = "";

                if($_SERVER["REQUEST_METHOD"] == "POST") {
                // username and password sent from form
                    
                    /*$conn = @mysql_connect ("localhost" , "users" , "Testimonials")
            or die ("Sorry - unable to connect to MYSQL database " );*/
                    
                    // Create new mysql connection object
                    $DBConnect = @new mysqli("localhost", "root", "", "Testimonials");
                    
                  

                    $myfullname = mysqli_real_escape_string($conn,$_POST["txtFullname"]);
                    $mytestimonial = mysqli_real_escape_string($conn,$_POST["txtTestimonial"]);
                   

                if ($mypassword == $mypasswordConfirm)
                {
                    $sql = "INSERT INTO Testimonials (fullname, testimonial,)
                    VALUES ('$myfullname', '$mytestimonial')";

                if (mysqli_query($conn, $sql)) {
                $info = "Testimonial Created Successfully!";
                    } else {
                $info ="Unable to Add Testimonial!";
                    }
                }
        
                else {
                $info ="Invalid Testimonial!";
                    }
                }
        ?>
            
                    <form action = "" method = "post">
                        <label>Fullname :</label><input type = "text" name = "txtFullname" class = "box"/><br />
                        <label>Testimonial :</label><input type = "text" name = "txtTestimonial" class = "box" /><br/>
                        <input type = "submit" value = " Submit "/><br />
                    </form>
            
        
        
        
    </body>

</html>