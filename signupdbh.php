<?php
  include 'dbh.php';
  if(isset($_POST['submitbtn']))
  {
       $name=mysqli_real_escape_string($conn,$_POST['user_name']);
       $email=mysqli_real_escape_string($conn,$_POST['user_email']);
       $pwd=mysqli_real_escape_string($conn,$_POST['user_pwd']);
       if( empty($name) || empty($email) || empty($pwd))
       {
       	   header("Location: signup?required fields are empty");
       	   exit();
       }
       else
       {
       	  if(!preg_match("/^[a-zA-Z]*$/", $name))
       	  {
       	  	 header("Location: signup?required fields are invalid");
       	     exit();
       	  }
       	  else{

              $sql="SELECT * FROM users WHERE user_name='$name'";
              $res=mysqli_query($conn,$sql);
              $resrows=mysqli_num_rows($res);
              if($resrows>=1)
              {
              	header("Location: signup?username already taken");
       	        exit();
              }
              else
              {
              	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		       	  	{
		       	  		 header("Location: signup?required fields are invalid");
		       	        exit();
		       	  	}
		       	  	else
		       	  	{
                          $hashingPWD=password_hash($pwd,PASSWORD_DEFAULT);
                          $finalquery="INSERT INTO users (user_name,user_email,user_pwd,flags) VALUES ('$name','$email','$hashingPWD',0);";
                          mysqli_query($conn,$finalquery);
                          header("Location: signup?signedup succesfully");
                          if(!empty($_POST['prevbtn']))
                            {
                              header("Location: home?signedup succesfully");
                              exit();
                            }
                          
                          


                          
		       	  	}
              }
       	  	
       	  }
       }
  }
  
  else
  {
  	header("Location: signup?please register to login");
    exit();
  }
?>