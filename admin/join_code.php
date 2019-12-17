<?php 

include('security.php'); 




// Join us Form ----------------------------------------------------------------------------------------------
if(isset($_POST['joinus']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dept=$_POST['dept'];
    $year=$_POST['year'];
    $reason=$_POST['reason'];
    $interest=$_POST['interest'];
    $image=$_FILES['imagesul']['name'];

    $query="INSERT INTO joinus (name,email,phone,dept,year,interest,reason,image) VALUES ('$name','$email','$phone','$dept','$year','$interest','$reason','$image')";
    $query_run=mysqli_query($connection,$query);
    if($query_run)
    {
        move_uploaded_file($_FILES['imagesul']['tmp_name'],"joinupload/".$_FILES['imagesul']['name']);
        $_SESSION['success'] = "We will reach you soon";
        header('Location: ../joinus/success.php');

    }




}

//Acceptance -------------------------------------------------------------------------------------------------

if(isset($_POST['acc_btn']))
{

    $in_name=$_POST['acc_name'];
    $in_year=$_POST['acc_year'];
    $in_dept=$_POST['acc_dept'];
    $in_email=$_POST['acc_email'];
    $in_phone=$_POST['acc_phone'];

    $query="INSERT INTO interndb (name,email,phone,dept,year) VALUES ('$in_name','$in_email','$in_phone','$in_dept','$in_year')";
    $query_run=mysqli_query($connection,$query);
    
    if($query_run)
        {
            $_SESSION['successacc'] = "Successfull added to Intern List";
            header('Location: joinform.php');
        }
    else
    {
        $_SESSION['statusacc'] = "Profile is not added";
        header('Location: joinform.php');
    }

}




//Rejection -------------------------------------------------------------------------------------------------

if(isset($_POST['rej_btn']))
{
    $id=$_POST['rej_id'];
    $query="DELETE FROM joinus WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
        {
            $_SESSION['successacc'] = "Profile Rejected";
            header('Location: joinform.php');
        }
    else
    {
        $_SESSION['statusacc'] = "Profile is not Deleted";
        header('Location: joinform.php');
    }




}

?>