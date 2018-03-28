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
      background-image:url(images/signuppage.jpg);
      background-repeat: no-repeat;
      background-size:100% 100vh;
    }
    #btn-container{
      margin-top:-30%;
      margin-left: 0%;
    }
    #prevbtn{
  text-decoration: none;
  border: none;
  color:rgb(0, 38, 77);
  border-radius:4px;
  background-color:rgb(0, 255, 0);
  font-weight:bolder;
  font-size:1.7vw;
    }
    .outercontainer #inner1{
  font-size:1.5vw;
  padding: 1.5%;
  background-color: rgb(0, 38, 77);
   border-color: lightgreen;
   border-radius:4px;
   color:rgb(0, 255, 0);
 }
 .outercontainer #inner2{
  font-size:1.5vw;
  padding: 1.5%;
  background-color: rgb(0, 38, 77);
   border-color: lightgreen;
   border-radius:4px;
   color:rgb(0, 255, 0);
 }
 .outercontainer #inner3{
  font-size:1.5vw;
  padding: 1.5%;
  background-color: rgb(0, 38, 77);
   border-color: lightgreen;
   border-radius:4px;
   color:rgb(0, 255, 0);
 }
  </style>
</head>
<body>
    <div class="outercontainer">

      	 <form action="signupdbh.php" method="POST">
      	 	<input id="inner1" type="text" name="user_name" placeholder="name"><br>
          <input id="inner2" type="text" name="user_email" placeholder="email"><br>
      	 	<input id="inner3" type="password" name="user_pwd" placeholder="password"><br><br>
      	 	<input id="regbtn" type="submit" name="submitbtn" value="register">
      	 </form>
    	
    </div>
    
    <div id="btn-container">
       <button id="prevbtn" type="submit" name="prevbtn">go to login page</button>
    </div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
          $("#btn-container").click(function(){
            window.location="home";
          });
  });
</script>
</html>