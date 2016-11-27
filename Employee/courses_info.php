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
               <li class="active">
                  <i class="ion ion-ios-book"></i> <a href="courses_departments_courses.php">Courses</a>
               </li>
               <li>
                  <i class="ion-information-circled"></i> Course Details
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/courses_sections.php"); ?> 
      <!-- /.row -->
      <?php include("blocks/courses_sub_sections.php"); ?>       
      <div class="row">
         <!-- /.Second Column -->
        <div class="col-lg-12">
         <form method="GET">
            <div class="box box-border-color">
               <div class="box-header">
                  <h3 class="box-title">Courses </h3>
                  
               </div>
               <!-- /.box-header -->
               <div class="box-body no-padding" >
                  <table class="table table-bordered table-striped" id="coursesTable">
                     <thead>
                     <tr>
                        <th style="width: 15%;">Code</th>
                        <th>Semester</th>
                        <th>Section</th>
                        <th>Meeting Info</th>
                        <th>Professor</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php 
                        $sections = getSections();
                        
                        
                          for ($i=0; $i < count($sections); $i++) { 
                            $l = '<tr>';
                            $l .= '<td><a href="courses_info_course.php?id='.$sections[$i]['courseID'].'&s='.$sections[$i]['sectionID'].'">' . $sections[$i]['courseCode'] . '</a></td>';  
                            $l .= '<td>' . $sections[$i]['semesterName'] ." ". $sections[$i]['semesterYear'] . '</td>';
                            $l .= '<td>' . $sections[$i]['sectionID'] . '</td>';
                            $l .= '<td>' . $sections[$i]['sectionDate'] . " " . $sections[$i]['sectionTime'] ." ". $sections[$i]['sectionLocation'] .'</td>';
                            $l .= '<td>' . $sections[$i]['professorGivenName'] . " " . $sections[$i]['professorMiddleName'] . '</td>';
                            //$l .= '<td><a href="courses_departments_courses.php?id='.$courses[$i]['courseID'].'" ><i class="glyphicon glyphicon-remove"></i></a></td>';
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
     $('#coursesTable').DataTable({
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


<?php
   include("footer.php");
?>