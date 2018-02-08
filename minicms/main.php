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
<!--
    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
-->
    <style>
        div{
            margin-top: 10px;
        }
    
    
    </style>

</head>
    <body>
        
        
      
        <?php
    
        if(isset($_POST['logout']))
        {
            session_unset();
            session_destroy();
            header("Location:main.php");
 
        }
        ?>
        <div class="container text-center">
        <?php if(isset($_SESSION['name'])) : ?>
        
            
            <div class="header_main">
        <a href="newpost.php" id="newpost" class="btn btn-primary btn-sm float-left">New Post</a>
            <!--<a href="login.php" class="btn btn-danger">Login User</a>-->
            Welcome &nbsp;<strong><?php echo $_SESSION['username'] ?></strong>
            <form action="" method="post">
           <input type="submit" id="logout" class="btn btn-warning float-right btn-sm" name="logout" value="Logout">
            </form>
            </div>
            
            <?php else :?>
            
            <h4>Welcome To our Blog !!! Hope You Enjoy </h4>
            <a href="login.php" class= "btn btn-primary">Login</a>
            <a href="registration.php" class="btn btn-success">Sign Up</a>
            
            
            <?php endif; ?>
            
            <br>
            
  
        <hr>
        <br>
        <br>
      
        <?php
    
         $post_query = "SELECT * FROM posts";
         $result = mysqli_query($conn,$post_query);
         while($row = mysqli_fetch_assoc($result))
         {
             $post_id = $row['id'];
             $post_title = $row['post_title'];
             $post_author = $row['post_author'];
             $post_date = $row['post_date'];
             $post_image = $row['post_image'];
             $post_content = substr($row['post_content'],0,50)."....";
             
          ?>
             <h2><?php echo $post_title ?></h2>
             <br>
              <h4><?php echo $post_author ?></h4>
              <br>
              <p><?php echo $post_date ?></p>
              <img src="<?php echo $post_image ?>">
              <br>
               
        <br>
              <p><?php echo $post_content ?></p>
        <br>
        <a href="post.php?p_id=<?php echo $post_id ?>">Read More</a>
        
            
    <?php if(isset($_SESSION['name'])&&$_SESSION['name']==$post_author) : ?>
            <a href = "update.php?up_id=<?php echo $post_id ?>" class="btn btn-primary btn-sm text-right">Update</a>
            <form action="deletepost.php?po_id=<?php echo $post_id ?>" method="post" class="form-inline">   
                <input type="submit" class="btn btn-success btn-sm" name="delete" value="Delete">
                                                
            </form>   
    <?php else : ?>        
            
            
    <?php endif; ?>        
               
<!--
            <form action="" method="post">
            <input type="submit" value="Delete Post" name="deletepost">
            </form>
-->
        <hr>
            

        <?php } ?>
            
       
        </div>
<!--
        <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
-->
    </body>
</html>