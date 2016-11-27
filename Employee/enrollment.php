<?php $activePage = 'courses'; ?>
<?php include("header.php"); ?>
<?php $department = getDepartments();?>
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Academics
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-document-text"></i> <a href="courses.php">Academics</a>
               </li>
               <li>
                  <i class="ion ion-log-in"></i> Enrollment
               </li>
            </ol>
         </div>
      </div>
<!-- /.row -->
<?php include("blocks/courses_sections.php"); ?>
<!-- /.row -->
<div class="row">
   <div class="col-lg-6">
      <div class="box box-border-color">
         <div class="box-header with-border">
            <h3 class="box-title">Enroll New Student 
               <?php 
                  echo '<span class="text-olive" >'.$_SESSION['studentEnrolled'].'</span>'; 
                  $_SESSION['studentEnrolled']=null; 
                  echo '<span class="text-red" >'.$_SESSION['studentEnrolledFailed'].'</span>'; 
                  $_SESSION['studentEnrolledFailed']=null;
                  ?>
            </h3>
            <label class="callout highlight">Warning! This enrollment only checks for duplications and has no extra enrollment requirements.</label>
         </div>
         <form role="form" method="POST" action="enrollment.php">
            <div class="box-body">
               <!-- Form Name -->
               <!-- Text input-->
               <div class="form-group">
                  <label class="control-label" for="sID">Student ID</label>  
                  <input id="cCode" name="sID" type="text" placeholder="student ID" class="form-control input-md">
               </div>
               <!-- Text input-->
               <div class="form-group">
                  <label class="control-label" for="courseID">Course Code</label>
                  <select class="form-control select2" name="courseID" data-placeholder="course" style="width: 100%;">
                  <?php
                     $courses = getCoursesWithSections();
                        for ($x = 0; $x < count($courses); $x++) {
                         $value = sprintf("<option value='%d-%d-%d'>%s Section %d %s %s </option>", $courses[$x]['courseID'],$courses[$x]['sectionID'], $courses[$x]['professorID'],$courses[$x]['courseCode'], $courses[$x]['sectionID'], $courses[$x]['semesterName'], $courses[$x]['semesterYear']);
                         echo $value;
                        }
                     ?> 
                  </select>
               </div>
               <!-- Select Basic -->
            </div>
            <div class="box-footer">
               <input class="btn btn-danger btn-flat" style="width: 30%" type="submit" name="enrollSt" value="Enroll" />
            </div>
         </form>
      </div>
   </div>
   <?php 
      if (isset($_POST['enrollSt'])) {
        $values = explode("-", $_POST['courseID']);
        $coID = $values[0];
        $secID = $values[1];
        $profID = $values[2];
        //print_r($_POST['courseID']);
        insertEnroll($_POST['sID'], $coID, $secID);
        insertEnrollGrade($_POST['sID'], $coID, $secID);
        insertStudentReview('You will get your performance review at the end of the semester', $profID, $_POST['sID'], $coID, $secID);
      }
      
      ?>
   <div class="col-lg-6">
      <div class="box box-border-color">
         <div class="box-header with-border">
            <h3 class="box-title">Registration Period 
               <?php 
                  echo '<span class="text-olive" >'.$_SESSION['enrollTime'].'</span>'; 
                  $_SESSION['enrollTime']=null; 
                  echo '<span class="text-red" >'.$_SESSION['enrollTimeFail'].'</span>'; 
                  $_SESSION['enrollTimeFail']=null;
                  ?>
            </h3>
            <?php 
               $time = getEnrollmentTime();
               $registerTimeStart = $time['etTimeStart'];
               $registerTimeEnd = $time['etTimeEnd'];
               
               
               ?>
            <label class="callout highlight">Current Registration Period is: <?php echo $registerTimeStart; ?> - <?php echo $registerTimeEnd; ?></label>
         </div>
         <form role="form" method="POST" action="enrollment.php">
            <div class="box-body">
               <!-- Form Name -->
               <!-- Text input-->
               <div class="row">
                  <div class="col-lg-6 bootstrap-timepicker">
                     <div class="form-group">
                        <label>From</label>
                        <div class="input-group">
                           <input type="text" class="form-control timepicker" name="timeFrom">
                           <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                           </div>
                        </div>
                        <!-- /.input group -->
                     </div>
                     <!-- /.form group -->
                  </div>
                  <!-- time -->
                  <div class="col-lg-6 bootstrap-timepicker">
                     <div class="form-group">
                        <label>To</label>
                        <div class="input-group">
                           <input type="text" class="form-control timepicker" name="timeTo">
                           <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>Date range</label>
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="reservation" name="dateToFrom">
                  </div>
               </div>
            </div>
            <div class="box-footer">
               <input class="btn btn-danger btn-flat" style="width: 30%" type="submit" name="openRegistration" value="Open Registration" />
            </div>
         </form>
      </div>
   </div>
   <?php 
      if (isset($_POST['openRegistration'])) {
        $values = explode(" - ", $_POST['dateToFrom']);
        $dateFrom = $values[0];
        $dateTo = $values[1];
        $timeFrom = $_POST['timeFrom'];
        $timeTo = $_POST['timeTo'];
      
        $dateTimeFrom = $dateFrom .' '.$timeFrom; 
        $dateTimeTo = $dateTo.' '.$timeTo;
        echo $dateTimeFrom;
        echo $dateTimeTo;
        insertEnrollmentTime($dateTimeFrom, $dateTimeTo);
      }
      
      ?>
</div>      

<?php
   include("footer.php");
   ?>