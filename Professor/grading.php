<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php 
   
   $currentSem = getProfessorsClasses($p['professorID'], 1);


   ?>
   
<!-- Page Heading -->
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
         <li class="active">
            <i class="ion-document"></i> <?php printf("%s %s",$currentSem[0]['semesterName'],$currentSem[0]['semesterYear'])  ?>
         </li>
      </ol>
   </div>
</div>
<!-- /.row -->
<?php include("blocks/academic_sections.php"); ?>  
<!-- /.row -->    

      <div class="row">
         <div class="col-lg-12">
            <form method="GET">
               <div class="box box-border-color">
               <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-book"></i> Current Semester Courses: <?php echo $currentSem[0]['semesterName'] ." ". $currentSem[0]['semesterYear']; ?>
                    <?php updateMessageWhite('stGradeUpdate', 'stGradeUpdateFail'); ?>
                  </h3>
               </div>
                  <div class="box-body">
                     <table id="recentClasses" class="table table-bordered table-striped table-responsive">
                     <thead>
                        <tr>
                           <th>Code</th>
                           <th>Name</th>
                           <th>Section</th>
                           <th>Meeting Info</th>
                           <td>Number of Students</td>
                        </tr>
                    </thead>
                        <?php  

                                                 
                            

                             for ($i=0; $i < count($currentSem); $i++) {
                              $numberOfStudents = numberOfStudentsPerCourse($currentSem[$i]['courseID'], $currentSem[$i]['sectionID']);
                                
                                  $res = isSavedisSubmitted($currentSem[$i]['courseID'], $currentSem[$i]['sectionID']);
                                  if( ($res[$i]['isSaved']==1 && $res[$i]['isSubmitted']==0) ) {
                                   $l = '<tr>';
                                   $l .= '<td><a href="grading_students.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $currentSem[$i]['courseCode'] . '</a><small class="pull-right text-red">saved</small></td>';  
                                   $l .= '<td>' . $currentSem[$i]['semesterName'] ." ". $currentSem[$i]['semesterYear'] . '</td>';
                                   $l .= '<td>' . $currentSem[$i]['sectionID'] . '</td>';
                                   $l .= '<td>' . $currentSem[$i]['sectionDate'] . " " . $currentSem[$i]['sectionTime'] ." ". $currentSem[$i]['sectionLocation'] .'</td>';
                                   $l .= '<td><a href="grading_students.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $numberOfStudents['numSt'] . '</a></td>';
                                   $l .= '</tr>';
                                   echo $l;
                                  }else if ($res[$i]['isSaved']==1 && $res[$i]['isSubmitted']==1) {
                                   $l = '<tr>';
                                   $l .= '<td><a href="grading_submit.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $currentSem[$i]['courseCode'] . '</a><small class="pull-right text-olive">Submitted</small></td>';  
                                   $l .= '<td>' . $currentSem[$i]['semesterName'] ." ". $currentSem[$i]['semesterYear'] . '</td>';
                                   $l .= '<td>' . $currentSem[$i]['sectionID'] . '</td>';
                                   $l .= '<td>' . $currentSem[$i]['sectionDate'] . " " . $currentSem[$i]['sectionTime'] ." ". $currentSem[$i]['sectionLocation'] .'</td>';
                                   $l .= '<td><a href="grading_submit.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $numberOfStudents['numSt'] . '</a></td>';
                                   $l .= '</tr>';
                                   echo $l;
                                  }else{
                                     $l = '<tr>';
                                     $l .= '<td><a href="grading_students.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $currentSem[$i]['courseCode'] . '</a></td>';  
                                     $l .= '<td>' . $currentSem[$i]['semesterName'] ." ". $currentSem[$i]['semesterYear'] . '</td>';
                                     $l .= '<td>' . $currentSem[$i]['sectionID'] . '</td>';
                                     $l .= '<td>' . $currentSem[$i]['sectionDate'] . " " . $currentSem[$i]['sectionTime'] ." ". $currentSem[$i]['sectionLocation'] .'</td>';
                                     $l .= '<td><a href="grading_students.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $numberOfStudents['numSt'] . '</a></td>';
                                     $l .= '</tr>';
                                   echo $l;
                                  }
                             
                                  
                              }
                              
                             
                           ?>
                     </table>
                  </div>
               </div>
            </form>
         </div>
      </div>

      

<?php include("footer.php"); ?>