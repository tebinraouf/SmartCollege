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
      <?php include("blocks/s_header_change.php"); ?>

      
      <form method="GET" action="students_change_course-get.php">
         <div class="box box-border-color">
           <div class="box-header">
             <h3 class="box-title"><?php echo $_GET['sn'] . " " . $_GET['sy']; ?></h3>
           </div>
           <div class="box-body table-responsive no-padding">
             <table class="table">
               <tbody>
                 <tr>
                   <th style="width: 10%">Course Code</th>
                   <th style="width: 50%">Course Name</th>
                   <th style="width: 10%">Credit</th>
                   <th style="width: 10%">Quality</th>
                   <th style="width: 10%">Grade</th>
                 </tr>
                 <tr>
                   <?php 
                      $class = getStudentAcademicSearch($_SESSION['studentID'],$_GET['sn'],$_GET['sy'],$_GET['cc']);
                      


                      //print_r($class);
                      $qualityValue = $class[0]['courseCreditHour'] * $class[0]['gradePoints'];
                      $l = '<td>'.$class[0]['courseCode'].'</td>';
                      $l .= '<td>'.$class[0]['courseName'].'</td>';
                      $l .= '<td>'.$class[0]['courseCreditHour'].'</td>';
                      $l .= '<td>'.number_format($qualityValue,2).'</td>';
                      //$l .= '<td><input class="form-control" type="text" name="gLetter" value="'.$class[0]['gradeLetter'].'" /></td>';
                      $l .= '<td><select name="grade" >';
                      
                      
                      $a = array("A","A-","B+","B","B-","C+","C","C-","D+","D","F","In Progress", "W", "WF");
                      $point = array(4.0,3.7,3.3,3.0,2.7,2.3,2.0,1.7,1.3,1.0,0,0,0);
                      for ($j=0; $j < count($a); $j++) {
                      $l .='<option '; 
                        if ($class[0]['gradeLetter'] == $a[$j] ){
                          $l .=' selected ';
        

                        }  
                      $l .=' value="'.$a[$j].'">'.$a[$j].'</option>';
                        
                      if ($class[0]['gradeLetter'] == $a[$j]) {
                            //$_SESSION['gPoint'] = $point[array_search($a[$j], $a)];
                            $LetterPoint = $point[array_search($a[$j], $a)];
                          }
                      }
                      
                      $l .= '</select></td>';
                      echo $l;
                      
                    ?>
                  </tr>
                  <tfoot>
                    <tr>
                      <td><input class="form-control" type="text" name="courseID" value="<?php echo $class[0]['courseID'];?>"></td>
                      <td><input class="form-control" type="text" name="sectionID" value="<?php echo $class[0]['sectionID'];?>"></td>
                    </tr>
                  </tfoot>
               </tbody>
             </table>
           </div>


                  <div class="box-footer">
                     <input class="btn btn-danger" style="width: 10%" type="submit" name="saveChanges" value="Save" />
                     <input class="btn btn-danger" style="width: 10%" type="submit" name="dropStudent" value="Drop" />
                  </div>

           </div><!--End of Box-->
      </form>
       
      <?php 

      if(isset($_GET['saveChanges']) ) {
        $val = gradePoint($_GET['grade']);
        updateStudentGrade($_SESSION['studentID'],$_GET['courseID'],$_GET['sectionID'], $_GET['grade'], $val, $val*3);
      }

      if (isset($_GET['dropStudent'])) {
        deleteStudentGrade($_SESSION['studentID'], $_GET['courseID'], $_GET['sectionID']);
        deleteStudentReview($_SESSION['studentID'], $_GET['courseID'], $_GET['sectionID']);
        deleteEnroll($_SESSION['studentID'], $_GET['courseID'], $_GET['sectionID']);
        
      }

      ?>



      





<?php include("footer.php"); ?>
