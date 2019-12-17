<?php 

include('security.php'); 


if(isset($_POST['msendbtn']))
{
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $uname=$_POST['uname'];
    $query="INSERT INTO webadminmsg (username,subject,message) VALUES ('$uname','$subject','$message')";
    $query_run=mysqli_query($connection,$query);
    if($query_run)
    {
        $_SESSION['sent']="Message Send to Web Admin";
        header('Location: contactwebadmin.php');
    }
    else
    {
        $_SESSION['failed']="Message Not Send to Web Admin";
        header('Location: contactwebadmin.php');
    }
}
else
    {
        $_SESSION['failed']="Message Not Send to Web Admin";
        header('Location: contactwebadmin.php');
    }
?>








?>