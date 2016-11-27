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
                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="fa fa-bar-chart-o"></i> Students
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/all_view_change_new.php"); ?>
      <?php include("blocks/student_id_change_block.php"); ?>
      <form method="POST" action="students_change_academic.php?sid=<?php echo $_SESSION['studentID']; ?>">   
         <?php $major = getMajors(); ?>
         <?php $minor = getMinors(); ?>

         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Academic</h3>
               <?php updateStudent('stAcademic', 'stAcademicFail'); ?>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                        <td class="bg-gray">Admission Date</td>
                        <td><input class="form-control" type="text" name="admissionDate" value="<?php echo $oneStudent['studentStartingYear']; ?>" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Major</td>
                        <td colspan="1">
                           <select class="form-control" name="major">
                           <?php
                              for ($x = 0; $x < count($major); $x++) {
                                 $value = "<option ";
                                 if ($major[$x]["majorName"]==$oneStudent["majorName"]) {
                                    $value .= ' selected ';
                                    $value .= ' value="'.$major[$x]["majorName"].'"';
                                 }
                                 
                                 $value .= '  >' . $major[$x]['majorName'] . '</option>';
                                 echo $value;
                              }
                           ?> 
                           </select>   
                        </td>
                        
                        <td class="bg-gray">Minor</td>
                        <td colspan="1">
                           <select class="form-control" name="minor">
                           <?php
                              for ($x = 0; $x < count($minor); $x++) {
                                 $value = "<option ";
                                 if ($minor[$x]["minorName"]==$oneStudent["minorName"]) {
                                    $value .= ' selected ';
                                    $value .= ' value="'.$minor[$x]["minorName"].'"';
                                 }
                                 
                                 $value .= '  >' . $minor[$x]['minorName'] . '</option>';
                                 echo $value;
                              }
                           ?> 
                           </select>   
                        </td>                     
                        </tr>
                     <tr>
                        <td class="bg-gray">Status</td>
                        <td colspan="1"><input class="form-control" type="text" name="status" value="<?php echo $oneStudent['academicStatus']; ?>" /></td>
                        <td class="bg-gray">CGPA</td>
                        <td colspan="1"><?php echo $_SESSION['gpa']; ?></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Active/InActive</td>
                        <td colspan="1">
                           <div class="form-group">
                              <div class="radio">
                                 <label>
                                    <input type="radio" name="presence" id="optionsRadios1" value="Active" <?php if($oneStudent["studentPresence"]=="Active"){ echo "checked";} ?> >
                                    Active 
                                 </label>
                                 <label>
                                    <input type="radio" name="presence" id="optionsRadios2" value="InActive" <?php if($oneStudent["studentPresence"]=="InActive"){ echo "checked";} ?> >
                                    InActive
                                 </label>
                              </div>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.row -->
         </div>
         <!-- /.row -->
         
         <div class="row">
               <div class="col-lg-2">
                  <div class="well">
                    <input class="btn btn-danger" style="width: 100%" type="submit" name="saveC" value="Save" />
                  </div>
               </div>
         </div>
         </form>
         <?php 

            if (isset($_POST['saveC'])) {

               $admissionDate = $_POST['admissionDate'];
               $status = $_POST['status'];
               $presence = $_POST['presence'];
               
               

               //print_r(getMajorID($majorValue));


               $majorValue = getMajorID($_POST['major'])['majorID'];
               $minorValue = getMinorID($_POST['minor'])['minorID'];

               updateStudentMajorMinor($_SESSION['studentID'],$majorValue,$minorValue);

               updateStudentAcademic($_SESSION['studentID'],$admissionDate,$status, $presence);
            }


          ?>

<?php include("footer.php"); ?>
