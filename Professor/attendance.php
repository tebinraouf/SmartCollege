<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php 
   
   $currentSem = getProfessorsClasses($p['professorID'], 1);
   $pastSems = getProfessorsClasses($p['professorID'], 0);


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
         <li>
            <i class="ion ion-document-text"></i> Academics
         </li>
         <li class="active">
            <i class="ion-ios-book"></i> Attendance
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
                  <h3 class="panel-title"><i class="fa fa-book"></i> Current Semester Courses: <?php echo $currentSem[0]['semesterName'] ." ". $currentSem[0]['semesterYear']; ?></h3>
               </div>
                  <div class="box-body">
                     <table id="recentClasses" class="table table-bordered table-striped table-responsive">
                     <thead>
                        <tr>
                           <th>Code</th>
                           <th>Name</th>
                           <th>Section</th>
                           <th>Meeting Info</th>
                           <th>Number of Students</th>
                           <th>Update</th>
                        </tr>
                    </thead>
                        <?php                            
                             for ($i=0; $i < count($currentSem); $i++) {
                              $numberOfStudents = numberOfStudentsPerCourse($currentSem[$i]['courseID'], $currentSem[$i]['sectionID']); 
                               $l = '<tr>';
                               $l .= '<td><a href="students_attendance.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $currentSem[$i]['courseCode'] . '</a></td>';  
                               $l .= '<td>' . $currentSem[$i]['semesterName'] ." ". $currentSem[$i]['semesterYear'] . '</td>';
                               $l .= '<td>' . $currentSem[$i]['sectionID'] . '</td>';
                               $l .= '<td>' . $currentSem[$i]['sectionDate'] . " " . $currentSem[$i]['sectionTime'] ." ". $currentSem[$i]['sectionLocation'] .'</td>';
                               $l .= '<td><a href="students_attendance.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $numberOfStudents['numSt'] . '</a></td>';
                               $l .= '<td><a href="attendance_change.php?c='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'"><span class="ion-gear-a"></span> Update</a></td>';
                               $l .= '</tr>';                           
                             echo $l;
                             }
                        ?>
                     </table>
                  </div>
               </div>
            </form>
         </div>
      </div>

      

<?php include("footer.php"); ?>