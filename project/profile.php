<html style="background-color:lightblue;">
<body>




<?php
// establish database connection
session_start();


$conn = mysqli_connect('localhost','root','','facebook');

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// fetch data from table
$sql = "SELECT * FROM data where username='$_SESSION[username]';";
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "name: " . $row["username"].  "</br> email: " . $row["email"]. " </br> password: " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

// close database connection
mysqli_close($conn);
?>
</body>
</html>