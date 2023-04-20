<html style="background-color:lightblue;">
<head>
    <script>
        function n(l){
            console.log(l);
        }
    </script>
</head>
<body>
<div class="top" id="top"><h1 style="color:white;">facebook-lite</h1></div>
<div class="bottom" id="bottom">
<div class="left" id="left">


<button style="font-size:20px; color:blue; position:fixed" onclick="document.location='profile.php'"target="right">profile</button><br><br>
<button style="font-size:20px; color:blue; position:fixed" onclick="document.location='mlp.php' "target="right">mostlikedpost</button><br><br>
<button style="font-size:20px; color:blue; position:fixed" onclick="document.location='login.html'"target="right" >logout</button><br><br>



</div>
<div class="middle" id="middle" style="text-align:center;">
<div>
    <?php
    session_start();
    $i=1;
    $conn=mysqli_connect('localhost','root','','facebook');
    $q="select * from posts;";
    $re=$conn->query($q);
   
    if($re->num_rows>0){
        
        while($rows=$re->fetch_assoc()){
            //echo $rows['myfile'];
            

            $e="uploads/".$rows['myfile'];
            $jpg=str_replace(".jpg","",$rows['myfile']);
            $jpgw=$jpg."e";
            $sub="submit".$jpg;
            echo $rows['username'];
		 
            echo "<form id='$jpg' >";
            echo "<div class='imgdiv' >";
            echo "<img src='$e'class='img'  ><br/>";
            echo "<input type='text' value='$jpg' name='filename' hidden >";
            echo "<input type='text' value='$rows[username]' name='username' hidden >";
            $e="select count(*) as l from likes where post_id='$jpg';";
            $qw=$conn->query($e);
            if($qw->num_rows>0){
            while($s=$qw->fetch_assoc()){
                echo "<span id='$jpgw' >$s[l]</span>";
            }
        }
        $e="select * from likes where liker='$_SESSION[username]' and post_id='$jpg';";
            $qw=$conn->query($e);
            if($qw->num_rows>0){
                echo "<input type='submit' id='$sub' onclick='like(`$jpg`)' disabled style='background-color:red;color:white;' value='like' ><br/>";
        }
        else{
            echo "<button type='submit' id='$sub' onclick='like(`$jpg`)' >Like</button><br/>";
            }
        
            
           
         
           
            
        
          echo "</div>";
          echo "</form>";
            
        }
        
    }
        /* while(file_exists($e)){ */
            /* $e="uploads/".$_SESSION['username'].$i.".jpg";
            
            $i++; */
        /* } */
    
  
    ?>
    
    <div style='height:80px;width:100%;' >
        </div>
</div>
<button onclick="document.location='post.html'" style='position:fixed;bottom:3px;left:45%;' ><h1>+/addposts</h1></button>









<style>
.top{
background-color:blue;
float:top;
text-align:center;
width:2000px;
height:100px;
}
.left{
text-align:left;

}
.middle{
text-align:middle;
}
.img{
height:1000px;
width:1000px;
}
</style>
<script>
let l=0;
function myfunction(){
document.getElementById("like").innerHTML=l+1;
}
function like(n){
    let jpgw=n+"e";
    let subi="submit"+n;
    console.log(jpgw);
    let ue= document.getElementById(jpgw);
    let formELement=document.getElementById(n);
formELement.addEventListener('submit',(event)=>{
    event.preventDefault();
    let xhr=new XMLHttpRequest();
    xhr.open('POST','add.php',true);
    xhr.onload=function (e){
        ue.innerHTML=xhr.responseText;
    };
    let userData=new FormData(formELement);
    xhr.send(userData);
    let s=document.getElementById(subi);
    s.style.backgroundColor="red";
    s.style.color="white";
    s.disabled=true;
});
}

</script>



</body>
</html>



