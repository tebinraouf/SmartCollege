<?php $activePage = 'courses'; ?>
<?php include("header.php"); ?>
<?php $department = getDepartments();?>
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
            <i class="ion ion-document-text"></i> <a href="courses.php">Academics</a>
         </li>
         <li>
            <i class="ion ion-ios-book"></i> Courses
         </li>
      </ol>
   </div>
</div>
<!-- /.row -->
<?php include("blocks/courses_sections.php"); ?> 
<!-- /.row -->
<?php include("blocks/courses_sub_sections.php"); ?>       
<?php 
   $row = semesterDuplicateCheck($_POST['semesterSeason'], $_POST['semesterYear']);
                    //print_r($row['semesterID']);
   
    if ($row['semesterID']!=null) {
      $_SESSION['messageSemesterCreateDuplicate'] = "Semester exists!";
      
    }
   
   ?>
<div class="row">
   <div class="col-lg-12">
      <form method="GET" action="courses_departments_courses.php">
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Semesters <?php echo "<p>" . $_SESSION['messageSemesterCreate'] . $_SESSION['messageSemesterCreateDuplicate'] . "</p>"; $_SESSION['messageSemesterCreate']=null; $_SESSION['messageSemesterCreateDuplicate']=null; ?></h3>
               <button style="float: right" type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#createNewSemester" >New Semester</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
               <table class="table table-bordered table-striped" id="allSemesters">
                  <thead>
                  <tr>
                     <th>Year</th>
                     <th>Season</th>
                     <th># Courses</th>
                     <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                     $semesters = getSemesters();
                       for ($i=0; $i < count($semesters); $i++) { 
                         $l = '<tr id="'.$semesters[$i][$semesterID].'">';
                         $l .= '<td>' . $semesters[$i]['semesterYear'] . '</td>';  
                         $l .= '<td>';
                         $l .= $semesters[$i]['semesterName'];
                         $l .= '</td>';
                         $l .= '<td>' . $semesters[$i]['numberSemesterCourses'] . '</td>';
                         $l .= '<td><a href="courses_departments_courses.php?id='.$semesters[$i]['semesterID'].'" ><i class="glyphicon glyphicon-remove"></i></a></td>';
                         $l .= '</tr>';
                     
                     
                       echo $l;
                       }
                      ?>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </form>
   </div>
   <?php 
      if (isset($_GET['id'])) {
        deleteSemester($_GET['id']);
      }
      
      ?>
   <!-- /.Modal Section -->
   <form method="post">
      <div class="modal fade" id="createNewSemester" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">New Semester</h4>
               </div>
               <div class="modal-body">
                  <div class="box box-border-color">
                     <div class="box-header">
                        <h3 class="box-title">Create a New Semster</h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body no-padding">
                        <table class="table table-striped">
                           <thead>
                           <tr>
                              <th>Year</th>
                              <th>Season</th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                              <td><input class="form-control" type="text" name="semesterYear" placeholder="eg: 2015,2016,2016" /></td>
                              <td><input class="form-control" type="text" name="semesterSeason" placeholder="eg: Fall, Spring, Summer, Winter" /></td>
                           </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="submit" class="btn btn-default" name="createSemester" value="Create" />
               </div>
            </div>
         </div>
      </div>
   </form>
   <?php 
      if (isset($_POST['createSemester']) && $row['semesterID']==null) {
        insertSemester($_POST['semesterYear'],$_POST['semesterSeason']);
        $beforeLastID = getBeforeLastSemesterID();
        updateCurrentSemester($beforeLastID['semesterID']);
      }
      
      
      ?>



  </div>
  <div class="row">
   <!-- /.Second Column -->
   <div class="col-lg-12">
      <form method="GET">
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Courses </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
               <table class="table table-bordered table-striped" id="allCourses">
                  <thead>
                  <tr>
                     <th>Code</th>
                     <th>Name</th>
                     <th>Semester</th>
                     <th>Department</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                     $sections = getSections();
                     
                     
                       for ($i=0; $i < count($sections); $i++) { 
                         $l = '<tr>';
                         $l .= '<td><a href="courses_info_course.php?id='.$sections[$i]['courseID'].'&s='.$sections[$i]['sectionID'].'">' . $sections[$i]['courseCode'] . '</a></td>';
                         $l .= '<td>' . $sections[$i]['courseName'] . '</td>';  
                         $l .= '<td>' . $sections[$i]['semesterName'] ." ". $sections[$i]['semesterYear'] . '</td>';
                         $l .= '<td>' . $sections[$i]['departmentName'] . '</td>';
                         $l .= '</tr>';
                     
                     
                       echo $l;
                       }
                     ?>
                     </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </form>
   </div>
</div>
<!-- /.row -->


<script type="text/javascript">
  
  $(function () {
     $('#allCourses').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": true,
       "autoWidth": false,
       "pageLength": 10,
       "lengthMenu": [[ 10, 25, 50, 75, -1 ], [10, 25, 50, 75, "All"]],
     });
   });
  
  $(function () {
     $('#allSemesters').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": true,
       "autoWidth": false,
       "pageLength": 10,
       "lengthMenu": [[ 10, 25, 50, 75, -1 ], [10, 25, 50, 75, "All"]],
     });
   });

</script>

<?php include("footer.php"); ?>