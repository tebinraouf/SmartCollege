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
                  <i class="ion ion-compose"></i> Add New Sections
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/courses_sections.php"); ?>
      <?php include("blocks/courses_sub_sections.php"); ?>  
      <!-- /.row -->
      <div class="row">
         <div class="col-lg-4">
            <div class="box box-border-color">
               <div class="box-header with-border">
                  <h3 class="box-title">New Section 
                     <?php 
                        echo '<span class="text-olive" >'.$_SESSION['messageSectionSuccessCreated'].'</span>'; 
                        $_SESSION['messageSectionSuccessCreated']=null; 
                        echo '<span class="text-red" >'.$_SESSION['messageSectionFail'].'</span>'; 
                        $_SESSION['messageSectionFail']=null;
                        ?>
                  </h3>
               </div>
               <form role="form" method="POST" action="sections_new.php">
                  <div class="box-body">
                     <!-- Form Name -->
                     <!-- Text input-->
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="courseCode">Course Code</label>
                        <select class="form-control select2" name="courseCode" style="width: 100%;">
                        <?php
                           $courseCode = getCoursesWithSemestersWithDepartments();
                              for ($x = 0; $x < count($courseCode); $x++) {
                                  $value = "<option value=' ";
                                  $value .= $courseCode[$x]['courseID']. "' >" . $courseCode[$x]['courseCode'] . " " . $courseCode[$x]['semesterName'] ." ". $courseCode[$x]['semesterYear'] ."</option>";
                                  echo $value;
                              }
                              ?> 
                        </select>
                     </div>
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-6">
                              <label class="control-label" for="sectionNum">Section</label>  
                              <input name="sectionNum" type="number" placeholder="#" class="form-control">
                           </div>
                           <div class="col-lg-6">    
                              <label class="control-label" for="sectionSeat">Seat</label>  
                              <input id="cName" name="sectionSeat" type="number" placeholder="number of allowed seats" class="form-control input-md">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                     </div>
                     <!-- time -->
                     <div class="row">
                        <div class="col-lg-6 bootstrap-timepicker">
                           <div class="form-group">
                              <label>From</label>
                              <div class="input-group">
                                 <input type="text" class="form-control timepicker" name="timeFrom">
                                 <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                 </div>
                              </div>
                              <!-- /.input group -->
                           </div>
                           <!-- /.form group -->
                        </div>
                        <!-- time -->
                        <div class="col-lg-6 bootstrap-timepicker">
                           <div class="form-group">
                              <label>To</label>
                              <div class="input-group">
                                 <input type="text" class="form-control timepicker" name="timeTo">
                                 <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class=" control-label" for="sectionDate">Date</label>
                        <select class="form-control select2" name="sectionDate" style="width: 100%;">
                           <option value="Sun,Tue,Thu">Sun,Tue,Thu</option>
                           <option value="Mon, Wed">Mon,Wed</option>
                           <option value="Sun,Mon,Wed,Thu">Sun,Mon,Wed,Thu</option>
                           <option value="Sat,Sun,Mon,Wed,Thu">Sat,Sun,Mon,Wed,Thu</option>
                           <option value="Sat">Sat</option>
                        </select>
                     </div>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="sectionLocation">Location</label>  
                        <input id="cName" name="sectionLocation" type="text" placeholder="location" class="form-control input-md">
                     </div>
                     <div class="form-group">
                        <label class=" control-label" for="sectionProfessor">Professor</label>
                        <select class="form-control select2" name="sectionProfessor" style="width: 100%;">
                        <?php
                           $professors = getProfessors();
                              for ($x = 0; $x < count($professors); $x++) {
                                  $value = "<option value=' ";
                                  $value .= $professors[$x]['professorID']. "' >" . $professors[$x]['professorGivenName'] . " " . $professors[$x]['professorMiddleName'] . " " . $professors[$x]['professorFamilyName'] . "</option>";
                                  echo $value;
                              }
                              ?> 
                        </select>
                     </div>
                     <!-- Select Basic -->
                  </div>
                  <div class="box-footer">
                     <input class="btn btn-danger btn-flat" style="width: 30%" type="submit" name="createSection" value="Save" />
                  </div>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['createSection'])) {
            
              $sTime = $_POST['timeFrom'] . " - " . $_POST['timeTo'];
            
              insertSection($_POST['sectionNum'], $_POST['courseCode'], $_POST['sectionDate'], $sTime, $_POST['sectionLocation'], $_POST['sectionSeat'],$_POST['sectionProfessor']);
            }
            
            ?>
         <div class="col-lg-8">
            <form method="GET">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Sections </h3>
                     
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-bordered table-striped" id="allSections">
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
   </div>
</div>

<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">

   
   //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
   
</script>
<script type="text/javascript">
   $('.select2').select2();
</script>


  <script type="text/javascript">
  
  $(function () {
     $('#allSections').DataTable({
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