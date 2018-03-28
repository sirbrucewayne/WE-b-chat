<?php
            include 'dbh.php';
            session_start();
  			if(isset($_POST['submitmsg']))
  			{
		  	  $u_name=mysqli_real_escape_string($conn,$_SESSION['name']);
		  	  $u_chat=mysqli_real_escape_string($conn,$_POST['chat']);
		  	  //$f_name=$_SESSION['fname'];
		  	  //$u_id=$_SESSION['userid'];
		  	  $f_id=$_SESSION['friendid'];
              
		  	  $sqlquery="INSERT INTO chatlog (user_name,user_pChat,frienid) VALUES ('$u_name','$u_chat','$f_id');";
		  	  mysqli_query($conn,$sqlquery);
		  	  //echo $u_name;
		  	  //echo $u_chat;
		  	  header("Location: personalchatdbh");
		  	  echo $_SESSION['fname'];
		  	  echo $_SESSION['friendid'];
		  }
?>


