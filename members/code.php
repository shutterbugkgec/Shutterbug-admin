<?php 

include('security.php'); 




//  Login------------------------------------------------------------------------------------------------------------------

if(isset($_POST['login_btn1']))
{
    $username_loginu = $_POST['username'];
    $password_loginu = $_POST['password'];

    $query="SELECT * FROM userdb WHERE username='$username_loginu' AND password='$password_loginu'";
    $query_run=mysqli_query($connection,$query);
   
    

    if(mysqli_fetch_array($query_run))
    {
       $log="INSERT INTO loginfo (username,admin) VALUES ('$username_loginu',0)";
       $run=mysqli_query($connection,$log);
     
       $_SESSION['usernameu']=$username_loginu;
        
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status']='Access Denied';
        header('Location: login.php');

    }
}

// Profile----------------------------------------------------------------------------------------------------------------

if(isset($_POST['profilebtn']))
{
    $pname=$_POST['name'];
    $puname=$_POST['uname'];
    $pemail=$_POST['email'];
    $pdept=$_POST['dept'];
    $pyear=$_POST['year'];
    $pphone=$_POST['phone'];
    
    $check= "SELECT username FROM memberdb";
    $run=array(mysqli_query($connection,$check));
    if(in_array($puname, $run))
    {
        $_SESSION['statusp'] = "Request Rejected. Contact Web Adminstrator";
        header('Location: profile.php');
        
        
    }
    else
    {
        $query="INSERT INTO memberdb (name,username,year,dept,phone,email) VALUES ('$pname','$puname','$pyear','$pdept','$pphone','$pemail')";
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['successp']="Request Accepted";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['statusp'] = "Request Rejected. Contact Web Adminstrator";
            header('Location: profile.php');
        }
    }

}
?>