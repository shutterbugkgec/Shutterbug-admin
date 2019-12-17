<?php 

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipment Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="equip_request.php" method="POST">
      <div class="modal-body">
      
      <input type="hidden" class="form-control" name="id" id="formGroupExampleInput" value="<?php echo $row['id']; ?>">
      <input type="hidden" class="form-control" name="unmane" id="formGroupExampleInput" value="<?php echo $_SESSION['usernameu']; ?>">
      <input type="hidden" class="form-control" name="equipno" id="formGroupExampleInput" value="<?php echo $row['uniqno']; ?>">
      <input type="hidden" class="form-control" name="equipname" id="formGroupExampleInput" value="<?php echo $row['equipname']; ?>">
      <input type="hidden" class="form-control" name="manufac" id="formGroupExampleInput" value="<?php echo $row['manufacname']; ?>">
      <div class="form-group">
            <label for="formGroupExampleInput">From</label>
            <input type="date" class="form-control" name="from" id="formGroupExampleInput">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">To</label>
            <input type="date" class="form-control" name="to" id="formGroupExampleInput2">
        </div>
        
      </div>
      


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="reqbtn">Request</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Request History</b></h1>
    
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
            <?php
                if(isset($_SESSION['accept']) && $_SESSION['accept'] != '')
                {
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['accept'].'</div>';
                    unset($_SESSION['accept']);
                }

                if(isset($_SESSION['error']) && $_SESSION['error'] != '')
                {
                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                    unset($_SESSION['error']);
                }
                ?>

              <div class="table-responsive">

              <?php
                
                $query="SELECT * FROM request";
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Date/Time</th>  
                    <th>Equipment No.</th>
                    <th>Equipment Name</th>
                    <th>Username</th>
                    <th>Accept</th>
                    <th>Decline</th>
                      
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
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['uniqno']; ?></td>
                      
                        <td><?php echo $row['equipname']; ?></td>
                      
                        <td><?php echo $row['username']; ?></td>
                        
                        <td>
                            <form action="request_code.php" method="POST">
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="e_acc_btn" class="btn btn-outline-success">Accept</button>
                            </form>
                        </td>

                        <td>
                            <form action="request_code.php" method="POST">
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="e_dec_btn" class="btn btn-outline-danger">Decline</button>
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