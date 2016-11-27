      <?php for($i=0;$i<count($studentSemester);$i++){

       $studentAcademic = getStudentAcademic($_SESSION['studentID'],$studentSemester[$i]['semesterName'],$studentSemester[$i]['semesterYear']);
       $counter = count($studentAcademic);
       
      //<!-- /.box -->
       $la = '<div class="box box-danger">';
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
       $ll .=              '<td>'.$studentAcademic[$j]['courseCreditHour'].'</td>';
       $ll .=              '<td>'.$studentAcademic[$j]['gradeQuality'].'</td>';
       $ll .=              '<td>'; 

       $point = 0;
       $letterCounter = 0;
       $myLetterArray = array();
       $ll .=               '<select name="letter">';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "A" ){
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="A">A</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "A-" ){
                                $point = 3.7;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="A-">A-</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "B+" ){
                                $point = 3.3;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="B+">B+</option>';       
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "B" ){
                                $point = 3.0;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="B">B</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "B-" ){
                                $point = 2.7;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="B-">B-</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "C+" ){
                                $point = 2.3;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="C+">C+</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "C" ){
                                $point = 2.0;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="C">C</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "C-" ){
                                $point = 1.7;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="C-">C-</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "D+" ){
                                $point = 1.3;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="D+">D+</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "D" ){
                                $point = 1.0;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="D">D</option>';
       
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "F" ){
                                $point = 0;
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="F">F</option>';
       $ll .=                   '<option '; 
                               if ($studentAcademic[$j]['gradeLetter'] == "In Progress" ){
       $ll .=                   ' selected ';
                               }  
       $ll .=                   ' value="InProgress">In Progress</option>';


       $ll .=                '</select>';


       $ll .=              '</td>';


       $ll .=           '</tr>';
       $sQuality+=$studentAcademic[$j]['gradeQuality'];
       $sCredit+=$studentAcademic[$j]['courseCreditHour'];
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
       





if ($a[$j]=="A") {
                      $_SESSION['gPoint'] = $point[0];

                    }else if($a[$j]=="A-"){
                      $_SESSION['gPoint'] = $point[1];

                    }else if($a[$j]=="B+"){
                      $_SESSION['gPoint'] = $point[2];

                    }else if($a[$j]=="B"){
                      $_SESSION['gPoint'] = $point[3];

                    }else if($a[$j]=="B-"){
                      $_SESSION['gPoint'] = $point[4];

                    }else if($a[$j]=="C+"){
                      $_SESSION['gPoint'] = $point[5];

                    }else if($a[$j]=="C"){
                      $_SESSION['gPoint'] = $point[6];

                    }else if($a[$j]=="C-"){
                      $_SESSION['gPoint'] = $point[7];

                    }else if($a[$j]=="D+"){
                      $_SESSION['gPoint'] = $point[8];

                    }else if($a[$j]=="D"){
                      $_SESSION['gPoint'] = $point[9];

                    }else if($a[$j]=="F"){
                      $_SESSION['gPoint'] = $point[10];
                    }



       } ?>











       <!-- 
      <?php 
         if (isset($_GET['gclass'])) {
         include("blocks/getAClass.php");

         }
       ?>

    
      <?php 
      if(isset($_GET['saveChanges'])) {

        updateStudentGrade($_SESSION['studentID'],$_SESSION['searchCourseID'],$_SESSION['searchSectionID'], $_GET['grade'], $_SESSION['gPoint']);  
      }
      ?>

    <?php 

      $_SESSION['searchCourseID'] = $class[0]['courseID'];
      $_SESSION['searchSectionID'] = $class[0]['sectionID'];

      //$_SESSION['searchCourseID'] = null;
      //$_SESSION['searchSectionID'] = null;
      //$_SESSION['gPoint'] = null;
      print_r($_SESSION['gPoint']);
      //print_r($LetterPoint);
      
    ?>
 -->
    