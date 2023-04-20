<?php
  session_start();
  if(isset($_POST['login'])){
  $connection=mysqli_connect("localhost","root","");
  $db=mysqli_select_db($connection,"facebook");
  $query="select * from data where email= '$_POST[email]'";
  $query_run=mysqli_query($connection,$query);
  $c=0;
  while($row = mysqli_fetch_assoc($query_run)){
    if($row['email']==$_POST['email']){
        $c++;
        if($row['password']==$_POST['password']){
          $_SESSION['username']=$row['username'];
           echo "<script>alert('right password');window.location.href='index.php'</script>";
        }
        else{
            echo "<script>alert('Wrong Password')</script>";
      }
    } 
    
  }
  if($c==0){
    
        echo "<script>alert('Not Registered!! Please Register Below');window.location.href='register.php'</script>";
        
    
  }
}
?>
