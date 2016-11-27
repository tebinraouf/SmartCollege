<?php $activePage = 'students'; ?>
<?php include("header.php"); ?>
<?php 
   $studentSemester = getStudentSemesters($_SESSION['studentID']);
   //$studentAcademic = getStudentAcademic($_SESSION['studentID'],$studentSemester[0]['semesterName'],$studentSemester[0]['semesterYear']);
   
   //print_r($studentSemester);
   //print_r(count($studentAcademic));
   
   ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Students
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="fa fa-bar-chart-o"></i> Students
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/all_view_change_new.php"); ?>
      <?php include("blocks/student_id_change_block.php"); ?>

 
         <!-- /.row -->
      <!-- /.form begin -->   
      <form method="GET" action="students_change_course-get.php">
         <div class="row">
            <div class="col-lg-3 form-group">
               <div class="well">
                  <select class="form-control" name="sn">
                     <option>Select Semester</option>
                     <?php 
                        $semName = getStudentSemesterName($_SESSION['studentID']);
                        //$v = 0;
                        $counter = count($semName);
                        for ($i=0; $i < $counter ; $i++) { 
                          echo '<option>'.$semName[$i]['semesterName'].'</option>';
                          //$v = $i;
                        }
                        ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-3 form-group">
               <div class="well">
                  <select class="form-control" name="sy">
                     <option>Select Year</option>
                     <?php 
                        $semYear = getStudentSemesterYear($_SESSION['studentID']);

                        $counter = count($semYear);
                        for ($i=0; $i < $counter ; $i++) { 
                          echo '<option>'.$semYear[$i]['semesterYear'].'</option>';
                        }
                        ?>
                  </select>

               </div>
            </div>
            <div class="col-lg-3 form-group">
               <div class="well">
                  <input type="text" class="form-control" name="cc">            
               </div>
            </div>
            <div class="col-lg-3">
               <div class="well">
                  <input class="btn btn-danger" style="width: 100%" type="submit" value="Get Class" />
               </div>
            </div>
         
         </div>
      </form>
      <!-- /.form end --> 
<h4>
<?php updateStudent('stGradeUpdate', 'stGradeUpdateFail'); ?>
<?php updateStudent('enrollDeleted', 'enrollDeletedFail'); ?>
</h4>
      



<?php include("footer.php"); ?>
