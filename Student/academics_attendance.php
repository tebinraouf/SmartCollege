<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php    $studentSemester = getStudentSemesters($_SESSION['studentID']); ?>

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
            <i class="ion ion-document-text"></i> <a href="academics.php">Academics</a>
         </li>
         <li>
            <i class="ion-chatbubble-working"></i> Attendance
         </li>
      </ol>
   </div>
</div>

<?php include("blocks/academic_sections.php"); ?>  
<div class="row">
   <div class="col-lg-6">
      <div class="box box-border-color">
         <div class="box-header">
            <h3 class="box-title text-olive">Review Attendance</h3>
         </div>
         <div class="box-body no-padding">
            <form role="form" method="POST">
               <div class="col-lg-9">
                  <div class="form-group">
                     <select class="form-control select2" name="semesterDetails">
                     <?php
                        for ($x = 0; $x < count($studentSemester); $x++) {
                            $value = "<option value=' ";
                            $value .= $studentSemester[$x]['semesterID']."' >" . $studentSemester[$x]['semesterName'] . " " . $studentSemester[$x]['semesterYear'] ."</option>";
                            echo $value;
                        }
                        ?> 
                     </select>
                  </div>
               </div>
               <div class="col-lg-2">
                  <input type="submit" class="btn btn-success bg-olive" value="Search" name="getPerformance" />
               </div>
               <div></div>
            </form>
         </div>
      </div>
   </div>
</div> 

<?php if (isset($_POST['getPerformance'])) {
   $semesterID = $_POST['semesterDetails'];
   //$studentAcademic = getStudentAcademic($s['studentID'],$sName,$sYear);
   $attendanceDetails = getAttendancePerSemester($s['studentID'],$semesterID);
   ?>


<div class="box box-border-color">
   <div class="box-header">
      <h3 class="box-title"><?php echo $attendanceDetails[0]['semesterName']; ?> <?php echo $attendanceDetails[0]['semesterYear']; ?></h3>
   </div>
   <div class="box-body table-responsive no-padding">
      <table class="table">
         <tbody>
            <?php       
                  $count = count($attendanceDetails);
                  for ($j=0; $j < $count; $j++) { 
                     $ll =        '<tr>';
                     $ll .=           '<td><strong>Code: </strong>'.$attendanceDetails[$j]['courseCode'].'</td>';
                     $ll .=           '<td><strong>Name: </strong>'.$attendanceDetails[$j]['courseName'].'</td>';
                     $ll .=           '<td><strong>Date: </strong>'.$attendanceDetails[$j]['aDate'].'</td>';
                     $ll .=        '</tr>';
                     
                  echo $ll;
                  }
               
               ?>
         </tbody>
      </table>
   </div>
</div>
<?php } ?>
<script type="text/javascript">
   $('.select2').select2();
</script>
<?php include("footer.php"); ?>