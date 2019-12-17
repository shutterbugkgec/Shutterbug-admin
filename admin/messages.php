<?php 

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>





<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Messages</b></h1>
    
  </div>

  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
           

              <div class="table-responsive">

              <?php
                

                $query='SELECT * FROM webadminmsg';
                $query_run=mysqli_query($connection,$query);



               ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Time</th>
                      <th>Username</th>
                      <th>Subject</th>
                      <th>Message</th>
                     
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
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['subject']; ?></td>
                      <td><a href="#" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">View</a></td>

                      <!-- Message Modal -->
                      <div class="modal fade" id="message<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="title"><?php echo "Message of ".$row['username']; ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <?php echo $row['message'];?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              
                            </div>
                          </div>
                        </div>
                      </div>


                      
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