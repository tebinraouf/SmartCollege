<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>

<?php 
   if (isset($_GET['c']) && isset($_GET['s'])) {
     $listStudents = getStudentsByCourseID($_GET['c'], $_GET['s']);
   
      if ( ($listStudents[0]['isSubmitted']==1 && $listStudents[0]['isSaved']==1) ) {
           redirect_to("grading.php");
        }  
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
         <li class="active">
            <i class="ion ion-document-text"></i> <a href="academics.php">Academics</a>
         </li>
         <li>
            <i class="ion-document"></i> <a href="grading.php"><?php printf("%s %s",$listStudents[0]['semesterName'],$listStudents[0]['semesterYear'])  ?></a>
         </li>
         <li>
            <i class="ion ion-document-text"></i> <?php printf("%s %s %s",$listStudents[0]['courseCode'],$listStudents[0]['courseName'], $listStudents[0]['sectionID'] )  ?>
         </li>
      </ol>
   </div>
</div>
<?php include("blocks/academic_sections.php"); ?>  
<div class="box box-border-color">
   <div class=" panel-heading">
      <h3 class="panel-title">
         <strong>Semester: </strong><?php printf("%s %s", $listStudents[0]['semesterName'], $listStudents[0]['semesterYear']); ?>
         <span class="pull-right"><strong>Course: </strong><?php printf("%s %s <strong>Section: </strong>%s", $listStudents[0]['courseCode'], $listStudents[0]['courseName'],$listStudents[0]['sectionID']); ?></span>
      </h3>
   </div>
      <form method="POST" enctype="multipart/form-data" class="ui form" style="font-size: 14px">
         
            
               
               <?php for($i=0;$i<count($listStudents);$i++){ ?>
               
               <!-- Per Student Section --> 
               <div class="box-body">
                  <div class="three fields">
                     
                     <div class="field">
                        <label>Student Name</label>
                        <input type="text" name="studentName" value="<?php printf("%s %s %s", $listStudents[$i]['studentGivenName'], $listStudents[$i]['studentMiddleName'], $listStudents[$i]['studentFamilyName']); ?>" disabled>
                     </div>

                     <div class="field">
                        <label>Student ID</label>
                        <input type="text" name="studentName" value="<?php printf("%d", $listStudents[$i]['studentID']); ?>" disabled>
                     </div>
                     
                     <div class="field">
                        <label>Grade</label>
                           <?php
                        $l = '<select class="ui search dropdown" name="s'.$listStudents[$i]["studentID"].'">';
                        $a = array("A", "A-", "B+", "B", "B-", "C+", "C", "C-", "D+", "D", "F", "In Progress", "W", "WF" );
                        for ($j = 0; $j < count($a); $j++) {
                                    $l .= '<option ';
                                    if ($listStudents[$i]['gradeLetter'] == $a[$j]) {
                                                $l .= ' selected ';
                                    }
                                    $l .= ' value="' . $a[$j] . '">' . $a[$j] . '</option>';
                                    //$l .= printf(" value='%s&t%s'> %s </option>",$a[$j],$listStudents[$i]['studentID'],$a[$j]);
                        }
                        $l .= '</select>';
                        echo $l;
                        ?>
                     </div>
                  
                  </div>
                  <div class="field">
                    
                        <label>Evaluation</label>
                        <textarea class="form-control" style="resize: vertical;" name="tx<?php echo $listStudents[$i]['studentReviewID'];?>"><?php echo $listStudents[$i]['reviewText']; ?></textarea>
                     
                  </div>
               </div>
               <div class="ui divider"></div>
               <!-- Per Student Section End -->
               
               <?php } ?>
               
               <div class="box-header">
                  <input type="submit" class="btn btn-danger" value="Save Changes" name="saveChanges">
                  <input type="submit" class="btn btn-danger" value="Submit Grades" name="submitGrades">
               </div>        
   </form>
</div>
<?php 
        

          if (isset($_POST['saveChanges'])) {
            
            $studentIDsWithGrade = [];
            $stIDsForGrade = [];

            $studentIDsWithEvaluation = [];
            $stIDsForEvalute = [];

            for ($i=0; $i < count($listStudents); $i++) { 
               $stIDsForGrade[$i] = "s".$listStudents[$i]['studentID'];
               $studentIDsWithGrade[$listStudents[$i]['studentID']] = $_POST[$stIDsForGrade[$i]];

               $stIDsForEvalute[$i] = "tx".$listStudents[$i]['studentReviewID'];
               $studentIDsWithEvaluation[$listStudents[$i]['studentReviewID']] = $_POST[$stIDsForEvalute[$i]];

            }

            //Necessary Variables for StudentGrade
            $courseID  = $_GET['c'];
            $sectionID = $_GET['s'];
            //$studentIDsWithGrade
            //gradePoint($letter)
            //3
            //Completed
            

            updateStudentGradeByProfessor($studentIDsWithGrade, $courseID, $sectionID, 1,0);
            updateStudentEvaluationByProfessor($studentIDsWithEvaluation, 1, 0);

            echo "<pre>";
            //print_r($studentIDsWithEvaluation);
            echo "</pre>";
         }

         if (isset($_POST['submitGrades'])) {
            
            $studentIDsWithGrade = [];
            $stIDsForGrade = [];

            $studentIDsWithEvaluation = [];
            $stIDsForEvalute = [];

            for ($i=0; $i < count($listStudents); $i++) { 
               $stIDsForGrade[$i] = "s".$listStudents[$i]['studentID'];
               $studentIDsWithGrade[$listStudents[$i]['studentID']] = $_POST[$stIDsForGrade[$i]];

               $stIDsForEvalute[$i] = "tx".$listStudents[$i]['studentReviewID'];
               $studentIDsWithEvaluation[$listStudents[$i]['studentReviewID']] = $_POST[$stIDsForEvalute[$i]];

            }

            //Necessary Variables for StudentGrade
            $courseID  = $_GET['c'];
            $sectionID = $_GET['s'];
            //$studentIDsWithGrade
            //gradePoint($letter)
            //3
            //Completed
            

            updateStudentGradeByProfessor($studentIDsWithGrade, $courseID, $sectionID,1,1);
            updateStudentEvaluationByProfessor($studentIDsWithEvaluation, 1, 1);

            echo "<pre>";
            //print_r($studentIDsWithEvaluation);
            echo "</pre>";
         }

        


 ?>
 <script src="../assets/semantics/semantic.js"></script>
<script type="text/javascript">
   $('select.dropdown').dropdown();
</script>
<?php include("footer.php"); ?>