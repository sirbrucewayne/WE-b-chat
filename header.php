<?php
   include 'dbh.php';
   session_start();
   $username=$_SESSION['name'];
   $checkSql="SELECT flags FROM users WHERE user_name= '$username'";
   $result=mysqli_query($conn,$checkSql);
   $row=mysqli_fetch_assoc($result);
   $flagValue=$row['flags'];
   if($flagValue==1) :
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="shortcut icon" href="images/download.jpg">
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
      body{
      	background-image:url(images/Code_Background.jpg);
      	background-repeat: no-repeat;
      	background-size:100% 100vh;
      }
      #welcome{
      	color:orange;
      	font-size:30px;
      }
	</style>
</head>
<body>
	<div class="container">
		<div class="head">
	         <p class="welcome" id="u_name">Welcome , <i><?php echo $_SESSION['name'];?></i></p>
	         <p class="logout" ><a id="exit" >logout</a></p>
	         <p class="clearchat" ><a id="clear" >clearchat</a></p>
		</div>

		<div class="chat_content" id="log">
		    <?php
            $query = "SELECT user_name,user_chat,user_time FROM chatlog WHERE user_chat !=''";
            $res=mysqli_query($conn,$query);
            //$i=0;
            $rowcount=mysqli_num_rows($res);

            while($rows = mysqli_fetch_assoc($res)) : //colon is must   
 
             $datetime=$rows['user_time'];
		    ?>
		    <div class="chat_con">
		   <span id="a" style="color:rgb(255, 255, 128)"><?php echo ' ' . $rows['user_name'] .' : ';?></span>
		   <span id="b" style="color:red"><?php echo  $rows['user_chat'];?></span>
		   <span id="c" style="color:rgb(0, 255, 255)"><?php  echo date("H:i:s",strtotime($datetime));?></span>
		   <br>
		   </div>
		   <?php
		      //$i=$i+1;
              endwhile;
		    ?>
		</div>

		<div class="entermsg">
			<form action="chatdbh.php" method="POST">
				<input id="txt" type="textarea" rows="5" cols="80" name="chat" placeholder="Type a message">
			    <input id="btn" type="submit" name="submitmsg" value="send">
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
          var prevScollHeight=$("#log").height();
          console.log(prevScollHeight);
          var newScrollHeight=$("#log").prop("scrollHeight");
          console.log(newScrollHeight);
          if(newScrollHeight>prevScollHeight)
          {
          	$("#log").animate({scrollTop:newScrollHeight});
          }


          $("#exit").click(function(){
                var exitmsg=confirm("You will be logged out");
                if(exitmsg==true){
                	$.ajax({
                          	type:'POST',
                          	url:'setflag.php',
                            success:function()
                            {
                            	var msg=confirm("logging out");
                            	
                            }
                          })
                	//console.log("calledelse");
                	window.location="home";
                }
        
          });
          $("#clear").click(function(){
                  var clearmsg=confirm("You chat will be cleared from log");
                  if(clearmsg==true)
                  {
                          $.ajax({
                          	type:'POST',
                          	url:'deletechat.php',
                            success:function()
                            {
                            	var msg=confirm("deleted your chat");
                            	
                            }
                          })
                          window.location="header";
                  }
          });

	});
</script>
</html>

<?php elseif($flagValue==0) : ?>
  <script type="text/javascript">
  	alert("please login into your account");
  	window.location="home";
  </script>
<?php 
     endif;
?>