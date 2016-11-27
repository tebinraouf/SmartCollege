<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php 
   if (isset($_GET['c']) && isset($_GET['s'])) {
     $listStudents = getStudentsByCourseID($_GET['c'], $_GET['s']);
     

      $attendanceBy = getAttendance($_GET['c'], $_GET['s'], $_GET['date']);

   }
   
   ?>



<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Academics
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
         </li>
         <li>
            <i class="ion ion-document-text"></i> <a href="academics.php">Academics</a>
         </li>
         <li>
            <i class="ion-ios-book"></i> <a href="attendance.php">Attendance</a>
         </li>
         <li>
            <i class="ion-ios-book"></i> <a href="attendance_change.php?c=<?php echo $listStudents[0]['courseID']; ?>&s=<?php echo $listStudents[0]['sectionID']; ?>"><?php echo $listStudents[0]['courseCode']; ?></a>
         </li>
         <li class="active">
            <i class="ion-document"></i> <?php printf("%s %s",$listStudents[0]['courseCode'],$listStudents[0]['courseName'])  ?>
         </li>
      </ol>
   </div>
</div>
<!-- /.row -->
<?php include("blocks/academic_sections.php"); ?>  
<!-- /.row -->    

<div class="row">
  <div class="col-lg-12">
    <form method="POST" class="ui form" style="font-size: 14px;">
      <div class="box box-border-color">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-book"></i> <?php echo $listStudents[0]['courseName']; ?> <?php echo $listStudents[0]['courseCode']; ?> </h3>
        </div>
        <div class="box-body">
          <div class="fields">
            <div class="five wide field">
              <div class="input-group date">
                  <input type="text" class="form-control" id="updateAttendance" name="selectingDate"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>
            <div class="three wide field">
              <input type="submit" class="btn btn-danger" value="Get" name="getNewDate">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php if (isset($_POST['getNewDate'])) {
  
    $coID = $_GET['c'];
    $secID = $_GET['s'];
    $date = $_POST['selectingDate'];

    $pageRedirect = "attendance_change-c.php?c=$coID&s=$secID&date=$date";

  redirect_to($pageRedirect);  

} ?>



<div class="row">

         <div class="col-lg-12">
            <form method="POST" class="ui form" style="font-size: 14px;">
               <div class="box box-border-color">
               <div class="panel-heading">
                  
                    
                    <div class="two fields">
                        <div class="field">
                          <h3 class="panel-title"><i class="fa fa-book"></i> <?php echo $listStudents[0]['courseName']; ?> <?php echo $listStudents[0]['courseCode']; ?> </h3>
                        </div>
                        <div class="field">
                          <div class="input-group date">
                            <input type="text" class="form-control" name="selectedDate" disabled value="<?php echo $_GET['date'] ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                          </div>
                        </div>
                    </div>
                  
                  
               </div>
                  <div class="box-body">
                     <table class="table table-bordered table-striped table-responsive">
                     <thead>
                        <tr>
                           <th>Student ID</th>
                           <th>Name</th>
                           <th><input type="checkbox" class="flat-red" id="select_all"> Presence</th>
                           
                        </tr>
                    </thead>
                        <?php                            
                             for ($i=0; $i < count($listStudents); $i++) {
                                $unique = $listStudents[$i]['studentID']."/".$listStudents[$i]['courseID']."/".$listStudents[$i]['sectionID'];
                               $l = '<tr>';
                               $l .= '<td><a href="students_search.php?sid='.$listStudents[$i]['studentID'].'">' . $listStudents[$i]['studentID'] . '</a></td>';  
                               $l .= '<td><a href="students_search.php?sid='.$listStudents[$i]['studentID'].'">' . $listStudents[$i]['studentGivenName'] ." ". $listStudents[$i]['studentMiddleName'] ." ". $listStudents[$i]['studentFamilyName'] . '</a></td>';
                               $l .= '<td><label>';
                               
                               


                               $l .= '<input type="hidden" class="flat-red checkbox"';
                                 // if ((int)$attendanceBy[$i]['isPresent']==0 ) {
                                 //    $l .= ' unchecked ';
                                 // }
                               $l .= ' value="0/'.$unique.'" name="'.$unique.'">';


                               $l .= '<input type="checkbox" class="flat-red checkbox"';
                                 if ((int)$attendanceBy[$i]['isPresent']==1 ) {
                                    $l .= ' checked ';
                                 }
                               $l .= ' value="1/'.$unique.'" name="'.$unique.'">';
                               
                               $l .= '</label></td>';
                               $l .= '</tr>';                           
                             echo $l;
                             }
                           ?>
                     </table>
                  </div>
               </div>

               <input type="submit" class="btn btn-danger" value="Submit" name="attendanceUpdateWithDate">

            </form>
         </div>
</div>


<?php 

  if (isset($_POST['attendanceUpdateWithDate'])) {

      $oneStudentDetails = [];
      $studentDetails = [];
      $explode = [];

      $currentDate = $_GET['date'];

      for ($i=0; $i < count($listStudents); $i++) {
         $allDetails = $_POST[$listStudents[$i]['studentID']."/".$listStudents[$i]['courseID']."/".$listStudents[$i]['sectionID']];
         $studentDetails[$i] = $allDetails;
      }
      
      for ($j=0; $j < count($studentDetails); $j++) { 
        $oneStudentDetails[$j] = explode("/",$studentDetails[$j]);
      }

    updateAttendance($oneStudentDetails, $currentDate);

    echo "<pre>";
      var_dump($oneStudentDetails);
    echo "</pre>";
      
  }


 ?>




<?php include("footer.php"); ?>