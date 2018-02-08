<?php include 'db.php' ?>
<?php session_start() ?>
<?php ob_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>myBlog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.13/semantic.min.css">
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.13/semantic.min.js"></script>

</head>
    <body>
        <div class="container text-center">
        
        <?php 
    
    if(isset($_POST['login']))
    {
     
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check_login = "SELECT * FROM users WHERE user_uid = '$username' AND user_pwd = '$password'";
        $result = mysqli_query($conn,$check_login);
        $row = mysqli_fetch_array($result);
        if($row>0)
        {
           $_SESSION['username'] = $username;
           $_SESSION['password'] = $password;
           $_SESSION['name'] = $row[1]; //grabs the name of the user
            header("Location:main.php");
            
        
        }
        else
        {
              echo "<span class = 'bg-warning alert'>Incorrect Username/Password !! Sign Up first</span>";
        }
        
        
        
    }
    ?> 
            <br>
            <br>
            <br>
        <div class="container text-center">
            Login to your account
            <br>
            <form class="inline-form" action="" method="post">
            <input class = "form-control" type="text" placeholder="username" name="username">
                <br>
             <input class = "form-control" type="password" placeholder="password" name="password"><br>
                <input class = "btn btn-primary" type="submit" value="Login" name="login">

            </form> 
            <br>
            <a href="registration.php" class="btn btn-success btn-sm">Sign Up Now</a><!-- This shall take us to the sign up page -->
        </div>
        </div>
    </body>
</html>