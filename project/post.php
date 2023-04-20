<?php
session_start();
$i=1;
$e=$_SESSION['username'];
while(true){
    if(file_exists("uploads/$e$i.jpg")){
        $i++;
    }
    else{
        $targ="uploads/$e$i.jpg";
        if(move_uploaded_file($_FILES['myfile']['tmp_name'],$targ)){
            $conn=mysqli_connect("localhost","root","","facebook");
            $q="insert into posts values('$e$i.jpg','$e')";
            $conn->query($q);
            if($conn)
            echo "<center><h1 style='background-color:blue;color:white;' >uploaded successfully</h1></center>";

        }

        break;
    }
}
?>