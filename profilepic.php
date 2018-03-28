<?php
    include 'dbh.php';
    session_start();
    if(isset($_POST['sbtpic']))
    {
                            $u_name=$_SESSION['name'];
                            $imagefile=$_FILES['uploadFile'];
                            $filename=$_FILES['uploadFile']['name'];
                            $tmpname=$_FILES['uploadFile']['tmp_name'];
                            $filetype=$_FILES['uploadFile']['type'];
                            $filesize=$_FILES['uploadFile']['size'];
                            $file_ext=(explode('.',$filename));
                            $file_extension=end($file_ext); //this basically separates file name at '.' character (explodes does this) and 'end' extracts name after . character i.e., extension and converts to lower case
                            $allowable_ext=array("jpeg","jpg","png");
                            if(in_array($file_extension, $allowable_ext)===false)
                            {
                              header("Location: start?extension_is_not_allowed");

                            }
                            else
                            {
                              if($_FILES['uploadFile']['error']===UPLOAD_ERR_INI_SIZE)
                               {
                                header("Location: start?file_size_exceeded");
                               }
                               else
                               {
                                $file_content=addslashes(file_get_contents($imagefile['tmp_name']));
                                $insertimg="UPDATE  users SET image='$file_content' WHERE user_name='$u_name'";
                                mysqli_query($conn,$insertimg);
                                header("Location: start?uploaded_successfully");
                                echo "success" ;
                               }
                            }
                        
    }
    else
      echo "error";

?>