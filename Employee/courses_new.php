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
                  <i class="ion ion-compose"></i> Add New Courses
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/courses_sections.php"); ?>
      <?php include("blocks/courses_sub_sections.php"); ?>  
      <!-- /.row -->

      
      <div class="row">
         <div class="col-lg-6">
            <div class="box box-border-color">
               <div class="box-header with-border">
                  <h3 class="box-title">New Course <?php echo '<span class="text-olive" >'.$_SESSION['messageCourseCreated'].'</span>'; $_SESSION['messageCourseCreated']=null; ?></h3>
               </div>
               <form role="form" method="POST" action="courses_new.php">
                  <div class="box-body">
                     <!-- Form Name -->
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCode">Code</label>  
                        
                           <input id="cCode" name="cCode" type="text" placeholder="code" class="form-control input-md">
                        
                     </div>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cName">Name</label>  
                        
                           <input id="cName" name="cName" type="text" placeholder="course name" class="form-control input-md">
                      
                     </div>
                     <!-- Textarea -->
                     <div class="form-group">
                        <label class="control-label" for="cDescription">Description</label>
                                             
                           <textarea class="form-control" id="cDescription" style="resize: vertical;" name="cDescription"></textarea>
                        
                     </div>
                     <!-- Select Basic -->
                      <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCredit">Credit</label>  
                        
                           <input id="cCredit" name="cCredit" type="number" class="form-control input-md">
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="cDepartment">Department</label>
                        
                           <select class="form-control select2" name="cDepartment" style="width: 100%;">
                           <?php
                              $department = getDepartments();
                                 for ($x = 0; $x < count($department); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $department[$x]['departmentID']. "' >" . $department[$x]['departmentName'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                           </select>
                        
                     </div>
                     <div class="form-group">
                        <p><label class="control-label" for="cDepartment">General</label></p>
                           <input type="radio" name="isGeneral" class="flat-red" value="1"> Yes
                           <input type="radio" name="isGeneral" class="flat-red" value="0"> No
                     </div>
                     <!-- Select Basic -->
                     <div class="form-group">
                        <label class="control-label" for="cSemester">Semester</label>
                        
                           <select class="form-control select2"  name="cSemester" style="width: 100%;">
                           <?php
                              $semesters = getSemesters();
                                 for ($x = 0; $x < count($semesters); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $semesters[$x]['semesterID']. "' >" . $semesters[$x]['semesterName'] . " " . $semesters[$x]['semesterYear'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                           </select>
                        
                     </div>
                     <!-- Select Basic -->
                  </div>
                  <div class="box-footer">
                     <input class="btn btn-danger btn-flat" style="width: 30%" type="submit" name="createCourse" value="Save" />
                    
                  </div>
               </form>
            </div>
         </div>

         <?php 

            if (isset($_POST['createCourse'])) {
              insertCourse($_POST['cCode'], $_POST['cName'], $_POST['cDescription'], $_POST['cCredit'], $_POST['cSemester'],$_POST['cDepartment'],$_POST['isGeneral']);
            }

        ?>

         <div class="col-lg-6">
            <div class="box box-border-color">
               <div class="box-header with-border">
                  <h3 class="box-title">Course Prerequisite <?php echo '<span class="text-olive" >'.$_SESSION['messageCoursePreCreated'].'</span>'; $_SESSION['messageCoursePreCreated']=null; echo $_SESSION['theValue']; $_SESSION['theValue']=null; ?></h3>
               </div>
               <form method="POST" action="courses_new.php">
                  <div class="box-body">
                     <!-- Form Name -->
                     <div class="form-group">
                        <label class="control-label" for="cPre">Course Code</label>
                        
                           <select class="form-control select2" name="cpCourseID" data-placeholder="course for prerequisite" style="width: 100%;">
                           <?php
                              $courses = getCoursesWithSemestersWithDepartments();
                              
                                 for ($x = 0; $x < count($courses); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $courses[$x]['courseID']. "' >" . $courses[$x]['courseCode'] . " " . $courses[$x]['semesterName'] . " ". $courses[$x]['semesterYear'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                           </select>
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="cPre">Course Prerequisite</label>
                       
                           <select class="form-control select2" multiple="multiple" name="cpCoursePre[]" data-placeholder="Select one or more" style="width: 100%;">
                           <?php
                              $courses = getCoursesWithSemestersWithDepartments();
                              
                                 for ($x = 0; $x < count($courses); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $courses[$x]['courseID']. "' >" . $courses[$x]['courseCode'] . " " . $courses[$x]['semesterName'] . " ". $courses[$x]['semesterYear'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                           </select>
                        
                     </div>
                  </div>
                  <div class="box-footer">
                     <input class="btn btn-danger btn-flat" style="width: 30%" type="submit" name="insertPre" value="Save" />
                  </div>
               </form>
            </div>
         </div>

         <?php 

            if (isset($_POST['insertPre'])) {

                  $preArray = $_POST['cpCoursePre'];
                  insertCoursePre($_POST['cpCourseID'], $preArray);
              
            }


          ?>


      </div>

<script type="text/javascript">
   //Red color scheme for iCheck
   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
   checkboxClass: 'icheckbox_minimal-red',
   radioClass: 'iradio_minimal-red'
   });
   
   
   $("#searchInput").keyup(function () {
    if ($(this).val()) {
       $("#myMagic").hide();
    }
    else {
       $("#myMagic").show();
    }
   });
   $("#myMagic").click(function () {
    $("#searchInput").val('');
    $(this).show();
   });
   
</script>
<script type="text/javascript">
   $('.select2').select2();
</script>
<?php
   include("footer.php");
   ?>