<?php 

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="addadminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Login Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
            <div class="form-group">
            <label> First Name </label>
                <input type="text" name="mfname" class="form-control" placeholder="Enter First Name">
            </div>
            <div class="form-group">
            <label> Last Name </label>
                <input type="text" name="mlname" class="form-control" placeholder="Enter Last Name">
            </div>
            
            <div class="form-group">
                <label>Department</label>
                <input type="text" name="mdept" class="form-control" placeholder="Enter department">
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="text" name="myear" class="form-control" placeholder="Enter Year">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="memail" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="mphone" class="form-control" placeholder="Enter Phone">
            </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="membtn" class="btn btn-primary">Save</button>
      </div>
      </form>


    </div>
  </div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Members Panel</b></h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addadminProfile">Add Members</button>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
            <?php
                if(isset($_SESSION['successmem']) && $_SESSION['successmem'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['successmem'].'</div>';
                    unset($_SESSION['successmem']);
                }

                if(isset($_SESSION['statusmem']) && $_SESSION['statusmem'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['statusmem'].'</div>';
                    unset($_SESSION['statusmem']);
                }
                ?>

              <div class="table-responsive">

              <?php
                

                $query='SELECT * FROM memberdb';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Username</th>
                      <th>Department</th>
                      
                      <th>Phone</th>
                      <th>Email</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if (mysqli_num_rows($query_run)>0)
                    {
                        while($row=mysqli_fetch_assoc($query_run))
                        {
                            ?>

                            
                    <tr>
                      
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['dept']; ?></td>
                      
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      
                      
    
                    <?php

                        }
                    }
                    else
                    {
                        echo "No record found";
                    }
                    ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>














</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>