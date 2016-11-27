<?php $activePage = 'students'; ?>
<?php include("header.php"); ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Students
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-university"></i> <a href="students.php">Students</a>
               </li>
               <li>
                  <i class="ion ion-edit"></i> Change Student Details
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/all_view_change_new.php"); ?>
      <?php include("blocks/first_change_block.php"); ?>
      <!-- /.row -->


<?php include("footer.php"); ?>