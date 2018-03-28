<?php
    include 'dbh.php';
    session_start();
   
   	  $username=$_SESSION['name'];
   	  $upsql="UPDATE chatlog SET flags =0 WHERE user_name= '$username'";
   	  $upuserssql="UPDATE users SET flags =0 WHERE user_name= '$username'";
   	  $var=mysqli_query($conn,$upsql);
   	  mysqli_query($conn,$upuserssql);
    session_destroy();
   	  if(isset($var))
   	    echo "success";
   	  /*if(isset($var))
      	header("Location: index.php?loggedout=success");
      else
        header("Location: header.php?delete=success");*/


?>