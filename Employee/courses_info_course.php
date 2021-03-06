<?php $activePage = 'courses'; ?>
<?php include("header.php"); ?>
<?php $course = getCourseDetailsBycIDsID($_GET['id'],$_GET['s']); ?>
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
                  <i class="ion-information-circled"></i> <a href="courses_info.php">Courses Details</a>
               </li>
               <li>
                  <i class="ion-document"></i> <?php echo $course['courseCode']; ?>
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
                  <h3 class="box-title"><?php echo $course['courseCode']; ?> <?php echo $course['courseName']; ?></h3>
               </div>
            
               <form role="form" method="POST" action="courses_new.php">
                <div class="col-lg-6">
                  <div class="box-body">
                     <!-- Form Name -->
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCode">Code</label>  
                        
                           <input name="cCode" type="text" class="form-control input-md" value="<?php echo $course['courseCode']; ?>" disabled>
                        
                     </div>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cName">Name</label>  
                        
                           <input name="cName" type="text" class="form-control input-md" value="<?php echo $course['courseName']; ?>" disabled>
                        
                     </div>
                     <!-- Textarea -->
                     <div class="form-group">
                        <label class="control-label" for="cDescription">Description</label>
                                             
                           <textarea class="form-control" style="resize: vertical;" name="cDescription" disabled><?php echo $course['courseDescription']; ?></textarea>
                        
                     </div>
                     <!-- Select Basic -->
                      <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCredit">Credit</label>  
                        
                           <input name="cCredit" type="number" class="form-control input-md" value="<?php echo $course['courseCreditHour']; ?>" disabled>
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="cDepartment">Department</label>
                        <input name="cDepartment" type="text" class="form-control input-md" value="<?php echo $course['departmentName']; ?>" disabled>
                     </div>
                      <div class="form-group">
                        <p><label class="control-label" for="cDepartment">General</label></p>
                           <input type="radio" name="isGeneral" class="flat-red" value="<?php echo $course['isGeneral']; ?>" <?php if($course['isGeneral']==1) echo 'checked';  ?> disabled> Yes
                           <input type="radio" name="isGeneral" class="flat-red" value="<?php echo $course['isGeneral']; ?>" <?php if($course['isGeneral']==0) echo 'checked';  ?> disabled> No
                     </div>
                     <!-- Select Basic -->
                     <div class="form-group">
                        <label class="control-label" for="cSemester">Semester</label>
                        <input name="cSemester" type="text" class="form-control input-md" value="<?php echo $course['semesterName'] . ' ' . $course['semesterYear']; ?>" disabled>
                     </div>
                     <!-- Select Basic -->
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="box-body">
                     <!-- Form Name -->
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cCode">Section</label>  
                        
                           <input name="cCode" type="text" class="form-control input-md" value="<?php echo $course['sectionID']; ?>" disabled>
                        
                     </div>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="cName">Date & Time</label>  
                        
                           <input name="cName" type="text" class="form-control input-md" value="<?php echo $course['sectionDate'] . ' ' . $course['sectionTime']; ?>" disabled>
                        
                     </div>
                      <!-- Text input-->
                     <div class="form-group">
                        <label class="control-label" for="sLocate">Location</label>  
                        
                           <input name="sLocate" type="text" class="form-control input-md" value="<?php echo $course['sectionLocation']; ?>" disabled>
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="cDepartment">Seat</label>
                        <input name="cDepartment" type="text" class="form-control input-md" value="<?php echo $course['sectionSeat']; ?>" disabled>
                        
                     </div>
                      <div class="form-group">
                        <label class="control-label" for="sProfessor">Professor</label>
                        <a href="professor_info.php?i=<?php echo $course['professorID']; ?>"><input style="cursor: pointer;" name="sProfessor" type="text" class="form-control input-md" value="<?php echo $course['professorGivenName'].' '.$course['professorMiddleName'].' '.$course['professorFamilyName']; ?>" disabled></a>
                        
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="sProfessor">Prerequisite</label>
                        <input name="sProfessor" type="text" class="form-control input-md" value="<?php coursePre(); ?>" disabled>
                        
                     </div>
                  </div>
                   <div class="box-footer">
                     <a class="btn btn-danger btn-flat" href="courses_info_edit.php?c=<?php echo $course['courseID']; ?>&s=<?php echo $course['sectionID'];  ?>">Edit</a>
                  </div>
                </div>
               </form>
            

                    <?php 
                        function coursePre(){
                          $preArray = getCoursePrerequisite($_GET['id']);
                          $string = '';
                          for ($i=0; $i < count($preArray) ; $i++) { 
                            $string .= ', ' . selectCourseByID($preArray[$i]['preID'])['courseCode'];
                          }
                          $string = substr($string, 1);
                          echo $string;
                        }
                     ?>

         </div>
      </div>
      <!-- /.row -->
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
   
   
</script>
<?php
   include("footer.php");
?>