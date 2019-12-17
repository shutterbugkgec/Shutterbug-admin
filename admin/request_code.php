<?php
include('security.php');

if(isset($_POST['e_acc_btn']))
{
    $id=$_POST['e_id'];
    $r1="SELECT * FROM request WHERE id='$id'";
    $q1=mysqli_query($connection,$r1);

    if($r1)
    {
        
        
            $sql = "DELETE FROM request WHERE id='$id'";
            $sql1=mysqli_query($connection,$sql);

            $sql2="UPDATE eqhistory SET status='Accepted' WHERE id='$id'";
            $sql2=mysqli_query($connection,$sql2);

            $_SESSION['accept']="Request Accepted";
            header('Location: request.php');
    }
    else
    {
        $_SESSION['error']="Error! Contact Web Adminstrator";
        header('Location: request.php');
    }
}

if(isset($_POST['e_dec_btn']))
{
    $id=$_POST['e_id'];
    $r1="SELECT * FROM request WHERE id='$id'";
    $q1=mysqli_query($connection,$r1);

    if($r1)
    {
        
        
            $sql = "DELETE FROM request WHERE id='$id'";
            $sql1=mysqli_query($connection,$sql);

            $sql2="UPDATE eqhistory SET status='Declined' WHERE id='$id'";
            $sql2=mysqli_query($connection,$sql2);

            $_SESSION['accept']="Request Declined";
            header('Location: request.php');
    }
    else
    {
        $_SESSION['error']="Error! Contact Web Adminstrator";
        header('Location: request.php');
    }
}



?>