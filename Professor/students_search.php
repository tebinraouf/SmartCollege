<?php $activePage = 'students'; ?>
<?php include("header.php"); ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Students
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion-university"></i> Students
               </li>
            </ol>
         </div>
      </div>

      <?php include("blocks/student_sections.php"); ?>
      <?php include("blocks/first_search_block.php"); ?>  





<?php include("footer.php"); ?>