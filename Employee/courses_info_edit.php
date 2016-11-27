<?php $activePage = 'courses'; ?>
<?php include("header.php"); ?>
<?php $course = getCourseDetailsBycIDsID($_GET['c'],$_GET['s']); ?>

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
                  <i class="ion-edit"></i> <a href="courses_edit.php">Edit Course Details</a>
               </li>
               <li>
                  <i class="ion-document-text"></i> <?php echo $course['courseCode']; ?>
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/courses_sections.php"); ?> 
      <!-- /.row -->
      <?php include("blocks/courses_sub_sections.php"); ?>       
      <div class="row">
         
            <div class="box box-border-color">
               
               <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $course['courseCode']; ?> <?php echo $course['courseName']; ?>

                    <?php 
                    echo '<span class="text-olive" >'.$_SESSION['messageCourseUpdate'].'</span>'; 
                    $_SESSION['messageCourseUpdate']=null; 
                    echo '<span class="text-red" >'.$_SESSION['messageCourseUpdateFail'].'</span>'; 
                    $_SESSION['messageCourseUpdateFail']=null;
                    ?>

                    <?php 
                    echo '<span class="text-red" >'.$_SESSION['sectionDeleteFail'].'</span>'; 
                    $_SESSION['sectionDeleteFail']=null;
                    ?>

                  </h3>
               </div>
            
               <form role="form" method="POST">
                <div class="col-lg-6">
                  <div class="box-body">
                     <!-- Form Name -->
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCode">Code</label>  
                        
                           <input name="cCode" type="text" class="form-control input-md" value="<?php echo $course['courseCode']; ?>">
                        
                     </div>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cName">Name</label>  
                        
                           <input name="cName" type="text" class="form-control input-md" value="<?php echo $course['courseName']; ?>">
                        
                     </div>
                     <!-- Textarea -->
                     <div class="form-group">
                        <label class="control-label" for="cDescription">Description</label>
                                             
                           <textarea class="form-control" style="resize: vertical;" name="cDescription"><?php echo $course['courseDescription']; ?></textarea>
                        
                     </div>
                     <!-- Select Basic -->
                      <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCredit">Credit</label>  
                        
                           <input name="cCredit" type="number" class="form-control input-md" value="<?php echo $course['courseCreditHour']; ?>" >
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="cDepartment">Department</label>
                          <select class="form-control select2" name="cDepartment" style="width: 100%;">
                           <?php
                              $departments = getDepartments();
                                 for ($x = 0; $x < count($departments); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $departments[$x]['departmentID'];
                                     $value .= "' ";

                                     if ($course['departmentID']==$departments[$x]['departmentID']) {
                                       $value .= "selected ";
                                     }
                                     $value .= ">";
                                     $value .= $departments[$x]['departmentName'] . "</option>";
                                     echo $value;
                                 }

                                 ?> 
                           </select>                        
                     </div>
                     <div class="form-group">
                        <p><label class="control-label" for="cDepartment">General</label></p>
                           <input type="radio" name="isGeneral" class="flat-red" value="1" <?php if($course['isGeneral']==1) echo 'checked';  ?>> Yes
                           <input type="radio" name="isGeneral" class="flat-red" value="0" <?php if($course['isGeneral']==0) echo 'checked';  ?>> No
                     </div>
                     <!-- Select Basic -->
                     <div class="form-group">
                        <label class="control-label" for="cSemester">Semester</label>
                        <select class="form-control select2"  name="cSemester" style="width: 100%;">
                           <?php
                              $semesters = getSemesters();
                                 for ($x = 0; $x < count($semesters); $x++) {
                                     $sem = "<option value=' ";
                                     $sem .= $semesters[$x]['semesterID'];
                                     $sem .= "' ";
                                     if ($course['semesterID']==$semesters[$x]['semesterID']) {
                                       $sem .= "selected ";
                                     }
                                     $sem .= " >" . $semesters[$x]['semesterName'] . " " . $semesters[$x]['semesterYear'] . "</option>";
                                     echo $sem;
                                 }
                                 ?> 
                           </select>
                     </div>
                     <!-- Select Basic -->
              

                      <div class="form-group">
                        <label class="control-label" for="cPre">Course Prerequisite</label>
                       
                           <select class="form-control select2" multiple="multiple" name="cpCoursePre[]" data-placeholder="Select one or more" style="width: 100%;">
                           <?php
                              $courses = getCoursesWithSemestersWithDepartments();
                              $preArray = getCoursePrerequisite($_GET['c']);

                              
                                 for ($x = 0; $x < count($courses); $x++) {
                                    
                                       $value = "<option value=' ";
                                       $value .= $courses[$x]['courseID'];
                                       $value .= "'";
                                       for ($i=0; $i < count($preArray); $i++) { 
                                         if ($courses[$x]['courseID']==$preArray[$i]['preID']) {
                                           $value .= " selected ";
                                         }
                                       }
                                       $value .= " >";
                                       $value .= $courses[$x]['courseCode'] . " " . $courses[$x]['semesterName'] . " ". $courses[$x]['semesterYear'] . "</option>";
                                      echo $value;
                                 }
                                 ?> 
                           </select>
                        
                     </div>








                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="box-body">
                     <!-- Form Name -->
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cSectionID">Section</label>  
                        
                           <input name="cSectionID" type="text" class="form-control input-md" value="<?php echo $course['sectionID']; ?>" disabled>
                        
                     </div>
                     <!-- Text input-->
                    <div class="row">
                    <div class="col-lg-6 bootstrap-timepicker">
                      <div class="form-group">
                        <label>From</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="timeFrom" value="<?php echo substr($course['sectionTime'], 0, 7); ?>">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
                    
                    <!-- time -->
                    <div class="col-lg-6 bootstrap-timepicker">
                      <div class="form-group">
                        <label>To</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="timeTo" value="<?php echo substr($course['sectionTime'], 11); ?>">
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
                              <option value="Sun,Tue,Thu" <?php 
                              if(strcmp($course['sectionDate'], "Sun,Tue,Thu")==0){
                                echo "selected";
                                } ?> >Sun,Tue,Thu
                              </option>
                              <option value="Mon,Wed" <?php 
                              if(strcmp($course['sectionDate'], "Mon,Wed")==0){
                                echo "selected";
                                } ?> >Mon,Wed</option>
                              <option value="Sun,Mon,Wed,Thu" <?php 
                              if(strcmp($course['sectionDate'], "Sun,Mon,Wed,Thu")==0){
                                echo "selected";
                                } ?> >Sun,Mon,Wed,Thu</option>
                              <option value="Sat,Sun,Mon,Wed,Thu" <?php 
                              if(strcmp($course['sectionDate'], "Sat,Sun,Mon,Wed,Thu")==0){
                                echo "selected";
                                } ?> >Sat,Sun,Mon,Wed,Thu</option>
                              <option value="Sat" <?php 
                              if(strcmp($course['sectionDate'], "Sat")==0){
                                echo "selected";
                                } ?> >Sat</option>
                           </select> 
                        
                     </div>


                      <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="sLocate">Location</label>  
                        
                           <input name="sLocate" type="text" class="form-control input-md" value="<?php echo $course['sectionLocation']; ?>" >
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="cDepartment">Seat</label>
                        <input name="cSeat" type="text" class="form-control input-md" value="<?php echo $course['sectionSeat']; ?>" >
                        
                     </div>
                     <div class="form-group">
                        <label class=" control-label" for="sectionProfessor">Professor</label>
                        
                           <select class="form-control select2" name="sectionProfessor" style="width: 100%;">
                           <?php
                              $professors = getProfessors();
                                 for ($x = 0; $x < count($professors); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $professors[$x]['professorID'];
                                     $value .= "' ";

                                     if (strcmp($course['professorGivenName'], $professors[$x]['professorGivenName'])==0 && strcmp($course['professorMiddleName'], $professors[$x]['professorMiddleName'])==0 && strcmp($course['professorFamilyName'], $professors[$x]['professorFamilyName'])==0) {
                                       $value .= "selected ";
                                     }
                                     $value .= ">";
                                     $value .= $professors[$x]['professorGivenName'] . " " . $professors[$x]['professorMiddleName'] . " " . $professors[$x]['professorFamilyName'] . "</option>";
                                     echo $value;
                                 }

                                 ?> 
                           </select>
                        
                     </div>

                     

                  </div>
                  <div class="box-footer">
                     <input class="btn btn-danger btn-flat" style="width: 20%" type="submit" name="saveChange" value="Save" />
                     <input class="btn btn-danger btn-flat" style="width: 20%" type="submit" name="deleteChange" value="Delete" />
                  </div>
                </div>
               </form>
            

          <?php 
              
              if (isset($_POST['saveChange'])) {

                $time = $_POST['timeFrom'] . " - " . $_POST['timeTo'];

                
                $cpArray = $_POST['cpCoursePre'];
                updateCourse($_GET['c'], $_GET['s'], $_POST['cCode'], $_POST['cName'], $_POST['cDescription'], $_POST['cCredit'], 
                  $_POST['cDepartment'], $_POST['cSemester'], $_POST['sectionDate'], 
                  $time, $_POST['sLocate'], $_POST['cSeat'], $_POST['sectionProfessor'],$cpArray, $_POST['isGeneral']);


              }


              if (isset($_POST['deleteChange'])) {
                deleteSection($_GET['c'], $_GET['s']);
              }

          ?>

          


         </div>
      </div>
      <!-- /.row -->

<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
   //Ajax 
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
   
      //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

    $('.select2').select2();
   
</script>
<?php
   include("footer.php");
?>