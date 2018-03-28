<?php
  include 'dbh.php';
  session_start();
  if(isset($_POST['submitmsg']))
  {
  	  $u_name=mysqli_real_escape_string($conn,$_SESSION['name']);
  	  $u_chat=mysqli_real_escape_string($conn,$_POST['chat']);
  	  $sqlquery="INSERT INTO chatlog (user_name,user_chat) VALUES ('$u_name','$u_chat');";
  	  mysqli_query($conn,$sqlquery);
  	  //echo $u_name;
  	  //echo $u_chat;
  	  header("Location: header");
  }



?>
