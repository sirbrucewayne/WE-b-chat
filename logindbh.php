<?php
 include 'dbh.php';
 session_start();
 if(!empty($_POST['submitbtn']))
 {
      $name=mysqli_real_escape_string($conn,$_POST['user_name']);
      $pwd=mysqli_real_escape_string($conn,$_POST['user_pwd']);
      if( empty($name) )
      {
      	header("Location: start?required fields are empty");
       	   exit();
      }
      else
      { 
      	 $sql="SELECT * FROM users WHERE user_name='$name'";
      	 $res=mysqli_query($conn,$sql);
      	 $resrows=mysqli_num_rows($res);
      	 if($resrows<1)
      	 {
      	 	header("Location: start?user credentials are  wrong");
       	    exit();
      	 }
         else{
         	if($rows=mysqli_fetch_assoc($res))
         	{
         		$hashPWDcheck=password_verify($pwd,$rows['user_pwd']);
         		if($hashPWDcheck==false)
         		{
         			header("Location: start?password credentials are  wrong");
       	            exit();
         		}
         		else{
         			$_SESSION['name']=$rows['user_name'];
         			$_SESSION['email']=$rows['user_email'];
              if(isset($_SESSION['name']))
               {
                  $username=$_SESSION['name'];
                  $upsql="UPDATE chatlog SET flags =1 WHERE user_name= '$username'";
                  $upuserssql="UPDATE users SET flags =1 WHERE user_name= '$username'";
                  mysqli_query($conn,$upsql);
                  mysqli_query($conn,$upuserssql);
                  
               }
         			header("Location: start?login=success");
       	    exit();
         		}
         	}
         }
      }
 }
 else
 {
      header("Location: start?login is empty");
       	   exit();
 }
?>