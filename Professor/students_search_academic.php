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

      <div class="box box-border-color">
      <div class="box-header">
         <h3 class="box-title">Academic</h3>
      </div>
      <!-- /.box-header -->              
      <div class="box-body table-responsive no-padding">
         <table class="table">
            <tbody>
               <tr>
                  <td class="bg-gray">Admission Date</td>
                  <td><?php echo $oneStudent['studentStartingYear']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Major</td>
                  <td colspan="1"><?php echo $oneStudent['majorName']; ?></td>
                  <td class="bg-gray">Minor</td>
                  <td colspan="1"><?php echo $oneStudent['minorName']; ?></td>
               </tr>
               
               <tr>
                  <td class="bg-gray">Status</td>
                  <td colspan="1"><?php echo $oneStudent['academicStatus']; ?></td>
                  <td class="bg-gray">CGPA</td>
                  <td colspan="1"><?php echo $_SESSION['gpa']; ?></td>
               </tr>
               <tr>
                 <td class="bg-gray">Active/InActive</td>
                 <td colspan="1">InActive</td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div>
      <!-- /.row -->
      <?php for($i=0;$i<count($studentSemester);$i++){

       $studentAcademic = getStudentAcademic($_SESSION['studentID'],$studentSemester[$i]['semesterName'],$studentSemester[$i]['semesterYear']);
       $counter = count($studentAcademic);
       
      //<!-- /.box -->
       $la = '<div class="box box-border-color">';
       $la .= '<div class="box-header">';
       $la .=     '<h3 class="box-title">'.$studentSemester[$i]['semesterName']. " " . $studentSemester[$i]['semesterYear'] .'</h3>';
       $la .=  '</div>';
         //<!-- /.box-header -->       
       $la .=  '<div class="box-body table-responsive no-padding">';
       $la .=    '<table class="table">';
       $la .=        '<tbody>';
       $la .=          '<tr>';
       $la .=              '<th style="width: 10%">Course Code</th>';
       $la .=            '<th style="width: 50%">Course Name</th>';
       $la .=              '<th style="width: 10%">Credit</th>';
       $la .=         '<th style="width: 10%">Quality</th>';
       $la .=              '<th style="width: 10%">Grade</th>';
       $la .=           '</tr>';

       echo $la;
       $sQuality = 0;
       $sCredit = 0;
       for ($j=0; $j <$counter; $j++) { 
          # code...
       
       $ll =            '<tr>';
       $ll .=              '<td>'.$studentAcademic[$j]['courseCode'].'</td>';
       $ll .=              '<td>'.$studentAcademic[$j]['courseName'].'</td>';
       $ll .=              '<td>'.number_format($studentAcademic[$j]['courseCreditHour'],2).'</td>';
       $ll .=              '<td>'.number_format($studentAcademic[$j]['gradeQuality'],2).'</td>';
       $ll .=              '<td>'.$studentAcademic[$j]['gradeLetter'].'</td>'; 
       $ll .=           '</tr>';
       if(strcmp($studentAcademic[$j]['gradeLetter'], "In Progress")!=0){
               $sQuality+=$studentAcademic[$j]['gradeQuality'];
               $sCredit+=$studentAcademic[$j]['courseCreditHour'];
       }

       echo $ll;
       }
       $cQuality+=$sQuality; //Cumulative Quality Points
       $cCredit+=$sCredit; //Cumulative Credit Hours
       $sgpa = number_format($sQuality/$sCredit,2);
       $cgpa = round($cQuality/$cCredit,2);
       $cgpaArray[$i] = $cgpa;
       
       if($sgpa==0.00){
         $cgpa=$cgpaArray[count($cgpaArray)-2];
         $_SESSION['gpa']=$cgpa;
       }
       
       
       $l =             '<tr align="center"><td colspan="5"><strong style="padding-right:1.5em;">Semester</strong>';
       $l .=                         '<strong>Quality Points: </strong><span style="padding-right:1.5em;">'.number_format($sQuality,2). '</span>';
       $l .=                          '<strong>Credit Hours: </strong><span style="padding-right:1.5em;">'.number_format($sCredit,2). '</span>';
       $l .=                          '<strong>SGPA: </strong><span style="padding-right:1.5em;">'.$sgpa.'</span>';
       $l .=                      '</td>';
       $l .=            '</tr>';
       $l .=             '<tr align="center"><td colspan="5"><strong style="padding-right:1.5em;">Cumulative</strong>';
       $l .=                         '<strong>Quality Points: </strong><span style="padding-right:1.5em;">'.number_format($cQuality,2). '</span>';
       $l .=                          '<strong>Credit Hours: </strong><span style="padding-right:1.5em;">'.number_format($cCredit,2). '</span>';
       $l .=                          '<strong>CGPA: </strong><span style="padding-right:1.5em;">'.number_format($cgpa,2).'</span>';
       $l .=                      '</td>';
       $l .=            '</tr>';
       
       $l .=        '</tbody>';
       $l .=     '</table>';
       $l .=  '</div>';
         //<!-- /.row -->
       $l .= '</div>';
      //<!-- /.box -->
       echo $l;
       
       } ?>


<?php include("footer.php"); ?>