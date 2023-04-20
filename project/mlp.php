<?php
session_start();


$conn = mysqli_connect('localhost','root','','facebook');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="select count(*) from likes where username='$_SESSION[username]';";
$result = mysqli_query($conn, $sql);
$nameArray = array();


if (mysqli_num_rows($result) > 0) {
    // Output data of the most liked post
    while($row = mysqli_fetch_assoc($result)) {
        
     array_push($nameArray,$row);
     
       
    }
}
else{

    echo "no posts";
}   

$res = max($nameArray);



print_r($res);

  mysqli_close($conn);


?>


