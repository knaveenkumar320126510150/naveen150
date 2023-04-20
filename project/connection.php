<?php
$conn=mysqli_connect("localhost","root","","facebook");
if($conn){
    header("location: like.php");
}
?>


