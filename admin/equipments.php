<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<div class="modal fade" id="addadminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipments Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="equip_code.php" method="POST">
      <div class="modal-body">
            <div class="form-group">
            <label>Equipment Name</label>
                <input type="text" name="equipname" class="form-control" placeholder="Enter Equipment Name">
            </div>
            <div class="form-group">
                <label>Manufacturer Name</label>
                <input type="text" name="manname" class="form-control" placeholder="Enter Manufacturer Name">
            </div>
            
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="equip_registerbtn" class="btn btn-primary">Save</button>
      </div>
      </form>


    </div>
  </div>
</div>



<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Equipments</b></h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addadminProfile">Add Equipments</button>
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <?php
                if(isset($_SESSION['successe']) && $_SESSION['successe'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['successe'].'</div>';
                    unset($_SESSION['successe']);
                }

                if(isset($_SESSION['statuse']) && $_SESSION['statuse'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['statuse'].'</div>';
                    unset($_SESSION['statuse']);
                }
                ?>

              <div class="table-responsive">

              <?php
                

                $query='SELECT * FROM equipment_db';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Equipment No.</th>
                      <th>Equipment Name</th>
                      <th>Manufacturer Name</th>
                      <th>Added By</th>
                      <th>Edit</th>
                      <th>Delete</th>
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
                      <td><?php echo $row['uniqno']; ?></td>
                      <td><?php echo $row['equipname']; ?></td>
                      <td><?php echo $row['manufacname']; ?></td>
                      <td><?php echo $row['adder']; ?></td>
                      <td>
                        <form action="equip_regis_edit.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="eq_edit_btn" class="btn btn-outline-success">Edit</button>
                        </form>
                      </td>
                      <td>
                        <form action="equip_code.php" method="POST"> 
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="eq_delete_btn" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
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