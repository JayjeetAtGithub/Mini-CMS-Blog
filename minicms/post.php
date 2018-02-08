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
    
          if(isset($_GET['p_id']))
          {
              $rp_id = $_GET['p_id'];
              $postr_query = "SELECT * FROM posts WHERE id = '$rp_id'";
              $result = mysqli_query($conn,$postr_query);
              $row = mysqli_fetch_assoc($result);
              
              
//              echo $row['id'];
//              echo $row['post_title'];
//              echo $row['post_author'] . "  " . $row['post_date'];
//              echo $row['post_content'];
              
            ?>
              <h1><?php echo $row['post_title'] ?></h1>
                <br>
                <h2><?php  echo $row['post_author'] ?></h2>
        <br>
        <p><?php echo $row['post_date']  ?></p>
        <br>
        <img src="<?php echo $row['post_image']  ?>">
        <br>
        <p><?php echo $row['post_content'] ?></p>
              
              
              
              
              
        <?php }

      ?>
        <?php
        
        if(isset($_POST['commentsubmit']))
        {
            $rp_id = $_GET['p_id'];
//            $comment_author = $_POST['cmt_author'];
            $comment_author = $_SESSION['name'];
            $comment_body = $_POST['cmt_body'];
            $cq = "INSERT INTO comments(cp_id,comment_author,comment_body) VALUES ($rp_id,'$comment_author','$comment_body')";
            $result_comment = mysqli_query($conn,$cq);
            
            
            
        }
        
        
        
        ?>
        <br>
        <br>
        <h5>Comments:</h5>
<!--
        <form action="" method="post">
        <input type="text" name="cmt_author" placeholder="Authors name">
        <input type="text" name="cmt_body" placeholder="Your Comment here">     
        <input type="submit" name="commentsubmit" value="Post Comment">
        </form>
-->
            
            
    <?php if(isset($_SESSION['name'])) : ?>
            
            
        <form action="" method="post">
<!--        <input type="text" name="cmt_author" placeholder="Authors name">-->
        <input type="text" name="cmt_body" placeholder="Your Comment here">     
        <input type="submit" name="commentsubmit" value="Post Comment">
        </form>
            
            
    <?php else : ?>
            
    <?php endif; ?>            
            
            
    
        <br>
        <br>
        <ul type="square">
            
            
        
        <?php 
        
        $comment_rec = "SELECT * FROM comments WHERE cp_id = $rp_id";
        $comment_rec_query = mysqli_query($conn,$comment_rec);
        while($row = mysqli_fetch_assoc($comment_rec_query))
        {   
            $cid = $row['comment_id'];
            $ca = $row['comment_author'];
            $cb = $row['comment_body'];
        ?>
            <li><?php echo $ca ?> : <?php echo $cb ?>
                
                
                <?php if(isset($_SESSION['name'])&&$_SESSION['name']==$ca) : ?>
                
                
                <form class="form-inline" action="delete.php?cd_id=<?php echo $cid ?>&pb_id=<?php echo $rp_id ?>" method="post"><input name="deletecmt" class="btn btn-danger btn-sm" type="submit" value = "Delete"></form>
                
                <?php else: ?>
                
<!--                <p>Login to comment</p>-->
                
                <?php endif; ?>
            
                
                
            
            </li>
        
        
        
       
            
        <?php }
        ?>
        </ul>
        
        </div>
    </body>
</html>