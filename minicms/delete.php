<?php include 'db.php' ?>
<?php ob_start() ?>


<?php 
            if(isset($_GET['cd_id'])&&isset($_GET['pb_id'])){
            $pb_id = $_GET['pb_id'];    
            $cmd_id = $_GET['cd_id'];
            $delete_comment_query = "DELETE FROM comments WHERE comment_id = $cmd_id";
            $result = mysqli_query($conn,$delete_comment_query);
                header("Location:post.php?p_id=$pb_id");
                
            
            
            
            
            }
?>