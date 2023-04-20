<?php
session_start();
    $conn=mysqli_connect("localhost","root","","facebook");
    if($conn){
        $q="insert into likes values('$_SESSION[username]','$_POST[username]','$_POST[filename]');";
        $conn->query($q);
        if($conn){
            $e="select count(*) as l from likes where post_id='$_POST[filename]';";
            $re=$conn->query($e);
            if($re->num_rows>0){
                while($rows=$re->fetch_assoc()){
                    echo $rows['l'];
                }
            }
        }
    }
?>