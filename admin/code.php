<?php 

include('security.php'); 


// Admin Register ---------------------------------------------------------------------------------------------------------

if(isset($_POST['registerbtn']))
{
    $username=$_POST['username'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirmpassword'];

    if($password==$cpassword)
    {
        $query="INSERT INTO admin (username,name,password) VALUES ('$username','$name','$password')";
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Admin Profile added";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profile is not added";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Password and Confirm Password donot match";
        header('Location: register.php');
    }


}    


if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    
    $query="SELECT * FROM admin WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
}



if(isset($_POST['updatebtn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $name=$_POST['edit_name'];
    $password=$_POST['edit_password'];

    $query="UPDATE admin SET username='$username', name='$name', password='$password' WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
    if($query_run)
        {
            $_SESSION['success'] = "Admin Profile Updated";
            header('Location: register.php');
        }
    else
    {
        $_SESSION['status'] = "Admin Profile is not Updated";
        header('Location: register.php');
    }
}




if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    $query="DELETE FROM admin WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
        {
            $_SESSION['success'] = "Admin Profile Deleted";
            header('Location: register.php');
        }
    else
    {
        $_SESSION['status'] = "Admin Profile is not Deleted";
        header('Location: register.php');
    }
}

// User Register --------------------------------------------------------------------------------------------------------

if(isset($_POST['userbtn']))
{
    $username=$_POST['username'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirmpassword'];

    if($password==$cpassword)
    {
        $query="INSERT INTO userdb (username,name,password) VALUES ('$username','$name','$password')";
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['successus'] = "User Profile added";
            header('Location: user.php');
        }
        else
        {
            $_SESSION['statusus'] = "User Profile is not added";
            header('Location: user.php');
        }
    }
    else
    {
        $_SESSION['statusus'] = "Password and Confirm Password donot match";
        header('Location: user.php');
    }


}

if(isset($_POST['uedit_btn']))
{
    $id=$_POST['uedit_id'];
    
    $query="SELECT * FROM userdb WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
}



if(isset($_POST['uupdatebtn']))
{
    $id=$_POST['uedit_id'];
    $username=$_POST['uedit_username'];
    $name=$_POST['uedit_name'];
    $password=$_POST['uedit_password'];

    $query="UPDATE userdb SET username='$username', name='$name', password='$password' WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);
    if($query_run)
        {
            $_SESSION['successus'] = "User Profile Updated";
            header('Location: user.php');
        }
    else
    {
        $_SESSION['statusus'] = "User Profile is not Updated";
        header('Location: user.php');
    }
}




if(isset($_POST['udelete_btn']))
{
    $id=$_POST['udelete_id'];
    $query="DELETE FROM userdb WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
        {
            $_SESSION['successus'] = "User Profile Deleted";
            header('Location: user.php');
        }
    else
    {
        $_SESSION['statusus'] = "User Profile is not Deleted";
        header('Location: user.php');
    }
}


//  Login------------------------------------------------------------------------------------------------------------------

if(isset($_POST['login_btn']))
{
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query="SELECT * FROM admin WHERE username='$username_login' AND password='$password_login'";
    $query_run=mysqli_query($connection,$query);
   
    

    if(mysqli_fetch_array($query_run))
    {
        $log="INSERT INTO loginfo (username,admin) VALUES ('$username_login',1)";
        $run=mysqli_query($connection,$log);
        $_SESSION['username']=$username_login;
        
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status']='Access Denied';
        header('Location: login.php');

    }
}

// Logout----------------------------------------------------------------------------------------------------------------

//Interns ---------------------------------------------------------------------------------------------------------------

if(isset($_POST['internbtn']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $dept=$_POST['dept'];
    $year=$_POST['year'];
    $phone=$_POST['phone'];

    if($name==$name)
    {
        $query="INSERT INTO interndb (name,year,dept,phone,email) VALUES ('$name','$year','$dept','$phone','$email')";
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['successin'] = "Intern Profile added";
            header('Location: interns.php');
        }
        else
        {
            $_SESSION['statusin'] = "Intern Profile is not added";
            header('Location: interns.php');
        }
    }
    

}

if(isset($_POST['int_delete_btn']))
{
    $id=$_POST['int_delete_id'];
    $query="DELETE FROM interndb WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
        {
            $_SESSION['successin'] = "Intern Profile Deleted";
            header('Location: interns.php');
        }
    else
    {
        $_SESSION['statusus'] = "Intern Profile is not Deleted";
        header('Location: interns.php');
    }
}


//Members---------------------------------------------------------------------------------------------------------------

if(isset($_POST['membtn']))
{
    $fname=$_POST['mfname'];
    $lname=$_POST['mlname'];
    $muname=strtolower($fname.$lname);
    $memail=$_POST['memail'];
    $mdept=$_POST['mdept'];
    $myear=$_POST['myear'];
    $mphone=$_POST['mphone'];
    $mname=$fname.' '.$lname;

    if($name==$name)
    {
        $query="INSERT INTO memberdb (firstname,lastname,name,username,year,dept,phone,email) VALUES ('$fname','$lname','$mname','$muname','$myear','$mdept','$mphone','$memail')";
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {   
            
            $_SESSION['successmem'] = "Member Profile added";
            header('Location: members.php');
        }
        else
        {
            $_SESSION['statusmem'] = "Member Profile is not added";
            header('Location: members.php');
        }
    }
    

}
?>