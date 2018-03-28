<?php
        include 'dbh.php';
        session_start(); 
        //echo "calldedd";
        $username=$_SESSION['name'];
        $sql="DELETE  FROM chatlog WHERE user_name='$username'";
        $ress=mysqli_query($conn,$sql);
        
?>

