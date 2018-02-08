<?php include 'db.php' ?>
<?php ob_start() ?>
<?php session_start() ?>
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
        
        <?php
        
        if(isset($_GET['up_id'])&&isset($_POST['updatepost']))
        {
            $up_id = $_GET['up_id'];
            $utitle = $_POST['utitle'];
            $udate = $_POST['udate'];
            $uimage = $_POST['uimage'];
            $ubody = $_POST['ubody'];
            $uquery = "UPDATE posts SET post_title = '$utitle',post_date ='$udate',post_image='$uimage',post_content='$ubody' WHERE id = $up_id";
            $uresult = mysqli_query($conn,$uquery);
            if(!$uresult)
            {
                die("Query into database failed".mysqli_error($conn)); 
            }
            header("Location:main.php"); //redirects to the home page
            
      
        }
  
        ?>
        
        <?php
        $up_id = $_GET['up_id'];
        $populatequery = "SELECT * FROM posts WHERE id = $up_id";
            $populateresult = mysqli_query($conn,$populatequery);
            while($row = mysqli_fetch_assoc($populateresult))
            {
                $po_title = $row['post_title'];
                $po_date = $row['post_date'];
                $po_image = $row['post_image'];
                $po_body = $row['post_content'];
                
            }
        
        
        ?>
        
        <div class="container text-center">
                <h2>Come on add something new to your post !!</h2>
        <form action="" method="post">
        <div class="form-group">
        <input class="form-control" type="text" name="utitle" value="<?php echo $po_title ?>" placeholder="New Title">
            </div>
            <div class="form-group">
                <input class="form-control" type="date" value="<?php echo $po_date ?>" name="udate" placeholder="Update date"></div>
            <div class="form-group">
                <input class="form-control" type="text" value="<?php echo $po_image ?>" name="uimage" placeholder="New image URL"></div>
            <div class="form-group">
                <input class="form-control" type="text" value="<?php echo $po_body ?>" name="ubody" placeholder="Update post body"></div>
        <input class="btn btn-sm btn-warning" type="submit" name="updatepost" value="Update">
        
    
            
        </form>
    </div>
    
    
 </body>