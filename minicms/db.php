<?php


$conn = mysqli_connect("localhost","root","","myblog");
if(!$conn)
{
    die("Database Connection Failed".mysqli_connect_error());
}

?>