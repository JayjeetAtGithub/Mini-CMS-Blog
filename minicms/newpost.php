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
            <h2>Come on .. Submit a GREAT post...</h2>
            <br>
        <?php
    
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $author = $_SESSION['name'];
        $date = $_POST['date'];
        $image = $_POST['image'];
        $content = $_POST['content'];
 $insert = "INSERT INTO posts(post_title,post_author,post_date,post_image,post_content) VALUES ('$title','$author','$date','$image','$content')";
$result = mysqli_query($conn,$insert);
        header("Location:main.php");
        
    }
        
         ?>    
        <form action="" method="post">
        
            <input class="form-control" type="text" name="title" placeholder="Give a Title"><br>
            <!--<input type="text" name="author" placeholder="Authors name"><br>-->
            <input class="form-control" type="date" name="date"><br>
            <input class="form-control" type="text" name="image" placeholder="Image URL"><br>
            <input class="form-control" type="text" name="content" placeholder="Write Post"><br>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        
        
        
        </form>
        
        
        </div>
        
        </body>
</html>