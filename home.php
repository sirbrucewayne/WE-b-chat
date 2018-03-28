<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>WE'b' CHAT</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="shortcut icon" href="images/download.jpg">
 <style type="text/css">
   body{
    background-image: url(images/index.jpg);
    background-repeat:no-repeat;
    background-size:100% 100vh ;
   }
    #register{
  text-decoration: none;
  float: right;
  margin-top:10%;
  margin-right:5%;
  color:rgb(26, 255, 255);
  background-color:white;
  border:none;
  border-radius:6px;
  font-size:2.6vw;
 }
  </style>
</head>
<body>
    <div class="outerbox">

      	 <form action="logindbh.php" method="POST">
      	 	<input id="un" type="text" name="user_name" placeholder="username"><br>
      	 	<input id="up" type="password" name="user_pwd" placeholder="password">
      	 	<input id="us" type="submit" name="submitbtn" value="start chat">
      	 </form>
      	
    	
    </div>
     <button id="register" onclick="signuppage()">REGISTER</button>
</body>
<script type="text/javascript">
    function signuppage() {
       window.location="signup";
    }
</script>
</html>