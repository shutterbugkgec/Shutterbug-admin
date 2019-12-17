<?php 
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

      
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Database Not Found</p>
            <p class="text-gray-500 mb-0">It looks like Database Connection failed.</p>
            <a href="index.php">&larr; Back to Dashboard</a>
          </div>

        </div>


      </div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>