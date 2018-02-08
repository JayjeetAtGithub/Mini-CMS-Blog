<?php include 'db.php' ?>
<?php ob_start() ?>

<?php

if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //now add them to the database
    
    $sql = "INSERT INTO users(user_name,user_email,user_uid,user_pwd) VALUES ('$name','$email','$username','$password')";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        die("Query Failed".mysqli_error($conn));
    }
    header("Location:main.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.13/semantic.min.css">
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.13/semantic.min.js"></script>
</head>
    <body>
        
    <div class="text-center jumbotron">
        <h3 class="text-success">------------------- Register Now --------------------</h3>
        <form action="" method="post">
            <div class="form-group container text-center">
                <label>Full Name :<input class="form-control" type="text" name="name"></label>
            </div>
            <div class="form-group">
                <label>Email-ID:<input class="form-control" type="email" name="email"></label>
            </div>
            <div class="form-group">
                <label>Username:<input class="form-control" type="text" name="username"></label>
            </div>
            <div class="form-group">
                <label>Password:<input class="form-control" type="password" name="password"></label>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="signup" Value = "Sign Up Now !">
            </div>
     </form>
        </div>
</body>
</html>