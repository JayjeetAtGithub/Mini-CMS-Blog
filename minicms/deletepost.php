<?php include 'db.php' ?>

<?php ob_start() ?>

<?php
    
            if(isset($_GET['po_id']))
            {
                $p_id = $_GET['po_id'];
                $sqldelete = "DELETE FROM posts WHERE id = $p_id";
                $resultdelete = mysqli_query($conn,$sqldelete);
                header("Location:main.php");
                
                
            }
    
    
      ?>

        