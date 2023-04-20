
<?php 
session_start();
  if(isset($_POST['submit'])){
  $conn=mysqli_connect("localhost","root","","facebook");
  $username=$_POST['fname'];
  $email=$_POST['email'];
  $Password=$_POST['password'];
  $query="insert into table values('$username','$email','$Password');";
  $q="insert into data values('$username','$email','$Password');";
$conn->query($q);
if($conn){
  echo "inserted";
}
  /* $query_run=mysqli_query($connection,$query);
  if($query_run){
    echo  "<script>alert('You Have Registered Successfully');
    window.location.href='login.php';
    </script>";
  }
  else{
     echo  "<script>alert('Registration Unsuccessful!! Please Try Again')</script>";
  }
   */
}
?>

