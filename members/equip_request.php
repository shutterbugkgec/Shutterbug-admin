<?php
include('security.php');

if(isset($_POST['req_btn']))
{
    $id=$_POST['id'];
    $uname=$_SESSION['usernameu'];

    $q1="SELECT equipname,uniqno FROM equipment_db WHERE id='$id'";
    $r1=mysqli_query($connection,$q1);
    
    if($r1)
    {
        
        while($row = mysqli_fetch_assoc($r1)){
            $equip=$row['equipname'];
            $no=$row['uniqno'];
            }
        $status="Pending";
        $q2="INSERT INTO request (uniqno,equipname,username,status) VALUES ('$no','$equip','$uname','$status')";
        $r2=mysqli_query($connection,$q2);
        
        $q4="SELECT * FROM request";
        $r4=mysqli_query($connection,$q4);

        while($row1 = mysqli_fetch_assoc($r4)){
            $id1=$row1['id'];
            }

        $q3="INSERT INTO eqhistory (id,equipno,equipname,userby,status) VALUES ('$id1','$no','$equip','$uname','$status')";
        $r3=mysqli_query($connection,$q3);
        if($r2)
        {
            $_SESSION['req_sent']="Equipment is successfully requested";
            header('Location: request.php');
        }
        else
        {
            $_SESSION['statuss']="Request Unsuccessful";
            header('Location: equipmentslist.php');
        }
    }
}





?>