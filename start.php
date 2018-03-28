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
   <title>WE'b' CHAT</title>
   <link rel="stylesheet" type="text/css" href="style.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="shortcut icon" href="images/download.jpg">
   <style type="text/css">
      body{
         background-image:url(images/bck.jpg);
         background-repeat: no-repeat;
         background-size:100% 100vw 100vh; 
      } 
      #img{
        margin-top:5%;
        margin-left:40%;
        display: block;
        width:200px;
        height:200px;
        border-radius:50%;
        background-image: url("images/profile.jpg");

      }
      .logout{
        color:white;
        width:7%;
        height:2%;
        background-color:black;
        text-align: center;
        text-decoration: none;
        float: right;
        font-size: 1.0vw;
        cursor: pointer;
      }
      .filetype{
        width:30%;
        height:55%;
      }
      .filetype #btn{
        color:white;
        margin-top:5%;
        width:30%;
        height:20%;
        font-size:1.1vw;
        background-color:black;
        text-align: center;
        cursor: pointer;
      }
      .heading{
        margin-left:30%;
        width:40%;
        height:40%;
        z-index:-2;
        color:rgb(191, 191, 191);
      }
      .heading #head1{
        margin-left:30%;
        font-size: 5vmin;
      }
      .heading #head2{
        margin-left:10%;
        font-size: 5vmin;
      }
      .selection{
        margin-left:25%;
        margin-top:5%;

        width:40%;
        height:20%;
        padding-left: 10%;
      }
      .selection #pc {
        font-size: 3vh;
        border:none;
        margin-right:10%;
        background-color:rgb(0, 0, 102);
        color:cyan;
        cursor: pointer;
      }
      .selection #gc {
        font-size: 3vh;
        border:none;
    background-color:rgb(0, 0, 102);
        color:cyan;
        cursor: pointer;
      }
      .table{
        color: cyan;
        /*background-color: black;*/
        margin-top:-25%;
        margin-left:90%;
        overflow-y:scroll;
        max-height:300px;
        width:10%;
        font-size: 1.5vw;
      }
      .table::-webkit-scrollbar{
           display: none;
      }
      .table #items{
        display:block;
        
        padding: 4px;
      }
      .dot{
        width:5px;
        height:5px;
        border-radius:50%;
        
        display: inline-block;
      }
      .pcf{
        margin-top:-20%;
        margin-left:5%;
      }
      .pcf #pcf1{
            position:absolute;
            width:15%;
            height:5%;
            border-radius:4px;
            border-color:cyan;
            background-color:indigo;
            color:yellow;
            font-size:2.3vh;
      }
       .pcf #pcf2{
            position:absolute;
            /*top:45%;*/
            margin-top:2%;
            width:15%;
            height:5%;
            border-radius:4px;
            border-color:yellow;
            background-color:cyan;
            color:indigo;
            font-weight:bold;
            font-size: 2.3vh;
            cursor: pointer;
      }

   </style>
</head>
<body>
     <div class="filetype">
      <form action="profilepic.php" method="POST"  enctype="multipart/form-data">
        <input type="file" name="uploadFile" placeholder="upload profile photo"><br>
        <button id="btn" type="submit" name="sbtpic" >upload</button>
      </form>
    </div>
    <div class="logout">
       <p><a id="exit" >logout</a></p>
    </div>
    <div id="profileimg">
    <?php
        $sql="SELECT * FROM users WHERE user_name='$username'";
        $res=mysqli_query($conn,$sql);
        $rows=mysqli_fetch_assoc($res);
     ?>   
      <img id="img" src="data:image/jpg;base64,<?php echo base64_encode($rows['image']);?> " alt="upload a image"/> <!--actual format: image/ext-->
   
   </div>
   <div class="heading">
      <p id="head1">Hi , <?php echo $username?></p>
      <p id="head2">WELCOME TO WE'b' CHAT</p>
   </div>
   <div class="selection">
     <button id="pc">PERSONAL CHAT</button>
     <button id="gc">GROUP CHAT</button>
   </div>
   <div class="table">
     <?php
      $sqltable="SELECT * FROM users ORDER BY flags DESC";
      $restable=mysqli_query($conn,$sqltable);
      
      while($tablerows = mysqli_fetch_assoc($restable)) :
         $flagstatus=$tablerows['flags'];
      ?>
      <div id="items">
          <span class="dot" style="background-color: <?php  if($flagstatus==0)   echo "red";  else  echo "blue";?>"></span><span><?php echo '   '.$tablerows['user_name'];?></span>
      </div>
      <?php 
         endwhile;
       ?>
   </div>
   <div class="pcf">
       <form action="personalchat.php" method="POST">
          <input id="pcf1" type="text" name="fname" placeholder="enter username of your friend"><br><br>
          <button id="pcf2" type="submit" name="chatbtn">start chat</button>
       </form>
   </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
         
         $(".pcf").hide();
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
         $("#gc").click(function(){
             window.location="header";
         })
          $("#pc").click(function(){
             $(".pcf").toggle();
         })
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