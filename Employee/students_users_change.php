<?php $activePage = 'students_users'; ?>
<?php include("header.php"); ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Users
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-person-stalker"></i> <a href="students_users.php">Users</a> 
               </li>
               <li class="active">
                  <i class="ion ion-person"></i> Change User Details
               </li>
            </ol>
         </div>
      </div>
      
      <!-- /.row -->
      <?php include("blocks/all_change_new.php"); ?> 
      <?php include("blocks/user_search_id.php"); ?> 
      <!-- /.row -->
     

      <!-- /.row -->
      <!-- /.row -->
      
          

<?php
include("footer.php");
?>