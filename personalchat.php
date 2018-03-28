<?php
   require 'dbh.php';
   session_start();
   if(isset($_POST['chatbtn']))
   {
       $f_name=mysqli_real_escape_string($conn,$_POST['fname']);
       $username=$_SESSION['name'];
  	   $checkfname="SELECT * FROM users WHERE user_name ='$f_name'";
  	   $res1=mysqli_query($conn,$checkfname);
       $friendrow=mysqli_fetch_assoc($res1);

       $rowcount=mysqli_num_rows($res1);
       if($rowcount<1)
       {
              header("Location :start?username doesnt exist");
              exit();
       }
       $_SESSION['fname']=$f_name;
       $fid=$friendrow['user_id'];
       $_SESSION['friendid']=$friendrow['user_id'];

       header("Location: personalchatdbh");
       echo $_SESSION['fname'];
       echo $_SESSION['friendid'];
        echo "success";
            
   }

?>