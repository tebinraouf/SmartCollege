<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<!-- <meta http-equiv="refresh" content="4" > -->
<?php //$_SESSION['studentID'] ?>
<?php date_default_timezone_set("Asia/Baghdad"); ?>
<?php 
   $time = getEnrollmentTime();
   $registerTimeStart = $time['etTimeStart'];
   $registerTimeEnd = $time['etTimeEnd'];
   $currentTime = date('Y-m-d h:i:s a', time());
   $c = time();
   
   $searchKey = $_GET['cc'];
   
   ?>
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Academics
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
         </li>
         <li class="active">
            <i class="fa fa-bar-chart-o"></i> Academics
         </li>
      </ol>
   </div>
</div>
<?php include("blocks/academic_sections.php"); ?>  
<?php  
   if (strtotime($currentTime) > strtotime($registerTimeStart) && strtotime($currentTime) < strtotime($registerTimeEnd)) {
   ?>
<?php 
   $studentDepartID = getStudentByID($s['studentID']);
   if (isset($_GET['cc'])) {
      if (!empty(getCourseForRegisterStudent($studentDepartID['departmentID'], $searchKey)) || !empty(getGeneralCourse($searchKey)) ) {
   
         $res = getCourseForRegisterStudent($studentDepartID['departmentID'], $searchKey);
         $isGenRes = getGeneralCourse($searchKey);
   
         
         
   
   ?>
<div class="row">
   <div class="col-lg-12">
      <form role="form" method="POST" action="" >
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title text-olive">Register Now</h3>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table" >
                  <thead>
                     <tr>
                        <th style="width: 10%;">Code</th>
                        <th style="width: 15%;">Name</th>
                        <th style="width: 30%;">Days & Times</th>
                        <th style="width: 10%;">Location</th>
                        <th style="width: 5%;">Section</th>
                        <th style="width: 10%;">Instructor</th>
                        <th style="width: 10%;">Seat</th>
                        <th style="width: 10%;">Enroll</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($res)){ ?>
                     <?php $coPre = getCoursePrerequisite($res[0]['courseID']); ?>
                     <?php 
                        $stuPastCourses = getEnrolls($s['studentID']);
                        
                           $preList = array();
                           $pastCoList = array();
                        
                          for ($i=0; $i < count($coPre); $i++) { 
                              $preList[$i] = $coPre[$i]['preID'];
                          }
                          for ($j=0; $j < count($stuPastCourses); $j++) { 
                              $pastCoList[$j] = $stuPastCourses[$j]['courseID'];
                          }
                          
                              if(array_diff($preList,$pastCoList)){
                                   echo "Student doesnt have prerequisites!";                            
                              }else{
                                 
                                 print_r("Student has prerequisites");  
                                 
                              }
                        
                     ?>
                     <?php for ($i=0; $i < count($res); $i++) { ?>
                     <?php $enrolledStudent = numberOfEnrolledStudentInCourse($res[$i]['courseID'], $res[$i]['sectionID']); ?>
                     <tr>
                        <td><?php echo $res[$i]['courseCode']; ?></td>
                        <td><?php echo $res[$i]['courseName']; ?></td>
                        <td><?php printf("%s %s",$res[$i]['sectionDate'], $res[$i]['sectionTime']); ?></td>
                        <td><?php echo $res[$i]['sectionLocation']; ?></td>
                        <td><?php echo $res[$i]['sectionID']; ?></td>
                        <td><?php printf("%s %s", $res[$i]['professorGivenName'], $res[$i]['professorFamilyName']); ?></td>
                        <td><?php if(empty($enrolledStudent['num'])) {echo 0;}else{echo $enrolledStudent['num']; } ?>/<?php echo $res[$i]['sectionSeat']; ?></td>
                        <td><input type="radio" name="toEnroll" value="<?php echo $res[$i]['courseID'].'-'.$res[$i]['sectionID'].'-'.$res[$i]['professorID']; ?>" class="flat-red" <?php if(($enrolledStudent['num']==$res[$i]['sectionSeat']) || array_diff($preList,$pastCoList)) {echo "disabled";} ?> /></td>
                     </tr>
                     <?php } ?>
                     <?php } else if(!empty($isGenRes)) { ?>
                     <?php for ($i=0; $i < count($isGenRes); $i++) { ?>
                     <?php $enrolledStudent = numberOfEnrolledStudentInCourse($isGenRes[$i]['courseID'], $isGenRes[$i]['sectionID']); ?>
                     <tr>
                        <td><?php echo $isGenRes[$i]['courseCode']; ?></td>
                        <td><?php echo $isGenRes[$i]['courseName']; ?></td>
                        <td><?php printf("%s %s",$isGenRes[$i]['sectionDate'], $isGenRes[$i]['sectionTime']); ?></td>
                        <td><?php echo $isGenRes[$i]['sectionLocation']; ?></td>
                        <td><?php echo $isGenRes[$i]['sectionID']; ?></td>
                        <td><?php printf("%s %s", $isGenRes[$i]['professorGivenName'], $isGenRes[$i]['professorFamilyName']); ?></td>
                        <td><?php if(empty($enrolledStudent['num'])) {echo 0;}else{echo $enrolledStudent['num']; } ?>/<?php echo $isGenRes[$i]['sectionSeat']; ?></td>
                        <td><input type="radio" name="toEnroll" value="<?php echo $isGenRes[$i]['courseID'].'-'.$isGenRes[$i]['sectionID'].'-'.$isGenRes[$i]['professorID']; ?>" class="flat-red" <?php if(($enrolledStudent['num']==$isGenRes[$i]['sectionSeat']) || array_diff($preList,$pastCoList)) {echo "disabled";} ?> /></td>
                     </tr>
                     <?php } ?>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
            <div class="box-footer">
               <input class="btn btn-danger btn-flat" style="width: 10%" type="submit" name="studentEnroll" value="Enroll" />
            </div>
         </div>
         <!-- end of box -->
      </form>
   </div>
</div>
<?php         
   }else{
   
      print_r('No Result!');
      
   }
   
   }
   
   ?>
<?php } else { ?>
<div class="row">
   <div class="col-lg-12">
      <div class="box box-border-color">
         <div class="box-header">
            <h3 class="box-title text-olive">Course | Current Time is <?php echo $currentTime ?></h3>
         </div>
         <div class="box-body no-padding">
            <form role="form" method="POST" action="academics_registration.php" >
               <div class="col-lg-12">
                  <div class="form-group">
                     <p class="huge">
                        <?php echo 'You can only register between '.$registerTimeStart.' - ' .$registerTimeEnd; ?>
                     </p>
                  </div>
               </div>
               <div class="col-lg-2">
                  <!-- <input type="submit" class="btn btn-success bg-olive" value="Search" name="getPerformance" /> -->
               </div>
               <div></div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php } ?>

<?php 

   if (isset($_POST['studentEnroll'])) {
      
      $courseSection = explode("-", $_POST['toEnroll']);
      //print_r($courseSection);

      insertEnrollByStudent($s['studentID'], $courseSection[0], $courseSection[1]);
      insertEnrollGradeByStudent($s['studentID'], $courseSection[0], $courseSection[1]);
      insertStudentReviewByStudent('You will get your performance review at the end of the semester', $courseSection[2], $s['studentID'], $courseSection[0], $courseSection[1]);


   }




?>
<script type="text/javascript">
   $('.select2').select2();
</script>
<?php include("footer.php"); ?>