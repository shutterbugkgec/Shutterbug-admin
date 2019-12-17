<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php


$query="SELECT * FROM admin ORDER BY id";
$query_run=mysqli_query($connection,$query);
$rowcount=mysqli_num_rows($query_run);
$_SESSION['success'] = $rowcount;

$query1="SELECT * FROM memberdb ORDER BY id";
$query_run1=mysqli_query($connection,$query1);
$rowcount1=mysqli_num_rows($query_run1);
$_SESSION['success1'] = $rowcount1;

$query2="SELECT * FROM equipment_db ORDER BY id";
$query_run2=mysqli_query($connection,$query2);
$rowcount2=mysqli_num_rows($query_run2);
$_SESSION['success2'] = $rowcount2;

$query3="SELECT * FROM interndb ORDER BY id";
$query_run3=mysqli_query($connection,$query3);
$rowcount3=mysqli_num_rows($query_run3);
$_SESSION['success3'] = $rowcount3;

$query4="SELECT * FROM joinus ORDER BY id";
$query_run4=mysqli_query($connection,$query4);
$rowcount4=mysqli_num_rows($query_run4);
$_SESSION['success4'] = $rowcount4;

$query5="SELECT * FROM request ORDER BY id";
$query_run5=mysqli_query($connection,$query5);
$rowcount5=mysqli_num_rows($query_run5);
$_SESSION['success5'] = $rowcount5;

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['success']."" ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-secret fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Response (Join Us)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['success4']."" ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-id-badge fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Messages</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['msg']."" ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Members</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['success1']."" ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-male fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

 <!-- Content Row -->
 <div class="row">

<!-- Total Equipments -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Equipments</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['success2']."" ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-camera fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Equipments Avialable -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Equipments Available</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">NA</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-eye fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Equipments Request -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Requests</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['success5']."" ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-server fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Interns</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "".$_SESSION['success3']."" ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-male fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>