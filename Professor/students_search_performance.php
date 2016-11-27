<?php $activePage = 'students'; ?>
<?php include("header.php"); ?>
<?php 
      $studentSemester = getStudentSemesters($_SESSION['studentID']);


?>

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
      <!-- /.row -->

      <?php include("blocks/student_sections.php"); ?>
      <?php include("blocks/student_id_search_block.php"); ?>



      
      <?php for($i=0;$i<count($studentSemester);$i++){
       $studentAcademic = getStudentAcademic($_SESSION['studentID'],$studentSemester[$i]['semesterName'],$studentSemester[$i]['semesterYear']);
       $counter = count($studentAcademic);
       
      //<!-- /.box -->
       $l = '<div class="box box-border-color">';
       $l .= '<div class="box-header">';
       $l .=     '<h3 class="box-title">'.$studentSemester[$i]['semesterName']. " " . $studentSemester[$i]['semesterYear'] .'</h3>';
       $l .=  '</div>';
         //<!-- /.box-header -->       
       $l .=  '<div class="box-body table-responsive no-padding">';
       $l .=    '<table class="table">';
       $l .=     '<tbody>';
       echo $l;
       for ($j=0; $j < $counter; $j++) { 
       $ll =        '<tr>';
       $ll .=           '<td><strong>Code: </strong>'.$studentAcademic[$j]['courseCode'].'</td>';
       $ll .=           '<td><strong>Name: </strong>'.$studentAcademic[$j]['courseName'].'</td>';
       $ll .=           '<td><strong>Grade: </strong>'.$studentAcademic[$j]['gradeLetter'].'</td>';
       $ll .=        '</tr>';
       $ll .=        '<tr>';
       $ll .=           '<td colspan="3">';
       $review = getOneStudentReview($studentAcademic[$j]['studentID'],$studentAcademic[$j]['professorID'],$studentAcademic[$j]['courseID'],$studentAcademic[$j]['sectionID']);
       $ll .=              '<blockquote>'.$review['reviewText'].'<strong><i>~ '.$review['professorGivenName'].'</i></strong></blockquote>';
       $ll .=           '</td>';
       $ll .=        '</tr>';
       echo $ll;
       }

       $la =     '</tbody>';
       $la .=     '</table>';
       $la .=  '</div>';
         //<!-- /.row -->
       $la .= '</div>';
      //<!-- /.box -->
       echo $la;
       
      } ?>


<?php include("footer.php"); ?>

