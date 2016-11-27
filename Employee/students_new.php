<?php $activePage = 'students'; ?>
<?php include("header.php"); ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Students
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-university"></i> <a href="students.php">Students</a>
               </li>
               <li>
                  <i class="ion ion-person-add"></i> Add New Student
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/all_view_change_new.php"); ?>
      <form method="POST" action="students_new.php">
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Personal</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                        <td class="bg-gray">User ID</td>
                        <td colspan="1">
                           <input class="form-control" type="text" name="uID" />
                        </td>
                        <td class="bg-gray">Highschool Grade</td>
                        <td colspan="1">
                           <input class="form-control" type="number" name="sHighSchool" placeholder="70%" />
                        </td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Given Name</td>
                        <td><input class="form-control" type="text" name="sGiven" /></td>
                        <td class="bg-gray">Middle Name</td>
                        <td><input class="form-control" type="text" name="sMiddle" /></td>
                        <td class="bg-gray">Family Name</td>
                        <td><input class="form-control" type="text" name="sFamily" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Date of Birth</td>
                        <td colspan="1"><input class="form-control" type="date" name="sDateBirth" /></td>
                        <td class="bg-gray">Place of Birth</td>
                        <td colspan="1"><input class="form-control" type="text" name="sPlaceBirth" /></td>
                        <td class="bg-gray">Gender</td>
                        <td colspan="1">
                           <div class="form-group">
                              <div class="radio">
                                 <label>
                                 <input type="radio" name="sGender" value="Male"  ?> 
                                 Male 
                                 </label>
                                 <label>
                                 <input type="radio" name="sGender" value="Female" ?>  
                                 Female
                                 </label>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Nationality</td>
                        <td colspan="1"><input class="form-control" type="text" name="sNationality" /></td>
                        <td class="bg-gray">Country</td>
                        <td colspan="1"><input class="form-control" type="text" name="sCountry" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Primary Email</td>
                        <td colspan="1"><input class="form-control" type="email" name="sEmail" /></td>
                        <td class="bg-gray">Secondary Email</td>
                        <td colspan="1"><input class="form-control" type="email" name="sSecondEmail" /></td>
                        <td class="bg-gray">Phone</td>
                        <td colspan="1"><input class="form-control" type="tel" name="sPhone" /></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.rowdadadadada -->
         </div>
         <!-- /.box -->
         <!-- /.row -->
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Academic</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                        <td class="bg-gray">Major</td>
                        <td colspan="1">
                           <select class="form-control" name="sMajor">
                           <?php
                              $major = getMajors();
                              for ($x = 0; $x < count($major); $x++) {
                                 $value = "<option ";
                                 $value .= ' value="'.$major[$x]["majorID"].'"';
                                 $value .= '  >' . $major[$x]['majorName'] . '</option>';
                                 echo $value;
                              }
                              ?> 
                           </select>
                        </td>
                        <td class="bg-gray">Minor</td>
                        <td colspan="1">
                           <select class="form-control" name="sMinor">
                           <?php
                              $minor = getMinors();
                              for ($x = 0; $x < count($minor); $x++) {
                                 $value = "<option ";
                                 $value .= ' value="'.$minor[$x]["minorID"].'"';
                                 $value .= '  >' . $minor[$x]['minorName'] . '</option>';
                                 echo $value;
                              }
                              ?> 
                           </select> 
                        </td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Admission Date</td>
                        <td colspan="1">
                           <input class="form-control" type="date" name="admissionDate" />
                        </td>
                        <td class="bg-gray">Academic Status</td>
                        <td colspan="1">
                           <input class="form-control" type="text" name="status" />
                        </td>
                        <td class="bg-gray">Student Presence</td>
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
         <!-- /.box -->
         <!-- /.row -->
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Current Address</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                        <td class="bg-gray">Address</td>
                        <td colspan="2"><input class="form-control" type="text" name="sCaAddress" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">City</td>
                        <td colspan="1"><input class="form-control" type="text" name="sCaCity" /></td>
                        <td class="bg-gray">State</td>
                        <td colspan="1"><input class="form-control" type="text" name="sCaState" /></td>
                        <td class="bg-gray">Country</td>
                        <td colspan="1"><input class="form-control" type="text" name="sCaCountry" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">House No</td>
                        <td><input class="form-control" type="text" name="sCaHouseNo" /></td>
                        <td class="bg-gray">Street No</td>
                        <td><input class="form-control" type="text" name="sCaStreetNo" /></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.row -->
         </div>
         <!-- /.box -->
         <!-- /.row -->
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Permanent Address</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                        <td class="bg-gray">Address</td>
                        <td colspan="2"><input class="form-control" type="text" name="sPaAddress" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">City</td>
                        <td colspan="1"><input class="form-control" type="text" name="sPaCity" /></td>
                        <td class="bg-gray">State</td>
                        <td colspan="1"><input class="form-control" type="text" name="sPaState" /></td>
                        <td class="bg-gray">Country</td>
                        <td colspan="1"><input class="form-control" type="text" name="sPaCountry" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">House No</td>
                        <td><input class="form-control" type="text" name="sPaHouseNo" /></td>
                        <td class="bg-gray">Street No</td>
                        <td><input class="form-control" type="text" name="sPaStreetNo" /></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.row -->
         </div>
         <!-- /.box -->
         <!-- /.row -->
         <div class="box box-border-color">
            <div class="box-header">
               <h3 class="box-title">Guardian</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                        <td class="bg-gray">Relation</td>
                        <td colspan="2"><input class="form-control" type="text" name="sGRelation" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Title</td>
                        <td colspan="1">
                           <select class="form-control" name="sGTitle">
                              <option>Select</option>
                              <option>Mrs</option>
                              <option>Mr</option>
                              <option>Miss</option>
                              <option>Dr</option>
                              <option>Sir</option>
                           </select>
                        </td>
                        <td class="bg-gray">Occupation</td>
                        <td colspan="1"><input class="form-control" type="text" name="sGOccupation" /></td>
                        <td class="bg-gray">Address</td>
                        <td colspan="1"><input class="form-control" type="text" name="sGAddress" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Given Name</td>
                        <td><input class="form-control" type="text" name="sGGiven" /></td>
                        <td class="bg-gray">Middle Name</td>
                        <td><input class="form-control" type="text" name="sGMiddle" /></td>
                        <td class="bg-gray">Family Name</td>
                        <td><input class="form-control" type="text" name="sGFamily" /></td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Date of Birth</td>
                        <td colspan="1"><input class="form-control" type="date" name="sGDateBirth" /></td>
                        <td class="bg-gray">Place of Birth</td>
                        <td colspan="1"><input class="form-control" type="text" name="sGPlaceBirth" /></td>
                        <td class="bg-gray">Gender</td>
                        <td colspan="1">
                           <div class="form-group">
                              <div class="radio">
                                 <label>
                                 <input type="radio" name="sGGender" value="Male"  ?> 
                                 Male 
                                 </label>
                                 <label>
                                 <input type="radio" name="sGGender" value="Female" ?>  
                                 Female
                                 </label>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td class="bg-gray">Email</td>
                        <td colspan="1"><input class="form-control" type="email" name="sGEmail" /></td>
                        <td class="bg-gray">Phone</td>
                        <td colspan="1"><input class="form-control" type="tel" name="sGPhone" /></td>
                        <td class="bg-gray">Language</td>
                        <td colspan="1"><input class="form-control" type="text" name="sGLanguage" /></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.row -->
         </div>
         <!-- /.box -->
         <div>
            <input class="btn btn-danger" type="submit" name="addStudent" value="Add Student" />
            <p><?php echo $_SESSION['message']; $_SESSION['message']=null; ?></p>
         </div>
      </form>
      <?php 
         if(isset($_POST['addStudent'])){
         
         
            createStudent($_POST['uID'], $_POST['sGiven'], $_POST['sMiddle'],
            $_POST['sFamily'],$_POST['sEmail'],$_POST['sGender'],$_POST['sPhone'],$_POST['sSecondEmail'],$_POST['admissionDate'],
            $_POST['sHighSchool'],$_POST['sDateBirth'],$_POST['sPlaceBirth'],$_POST['sNationality'],$_POST['sCountry'],$_POST['status'],$_POST['presence']);
         
            //$majorValue = getMajorID($_POST['sMajor'])['majorID'];
            //$minorValue = getMinorID($_POST['sMinor'])['minorID'];
         
            createStudentAcademic($_POST['sMajor'], $_POST['sMinor']);
            //print_r($_POST['sMinor']);
         
            createStudentCA($_POST['sCaAddress'], $_POST['sCaCity'],
            $_POST['sCaState'],$_POST['sCaCountry'],$_POST['sCaHouseNo'],$_POST['sCaStreetNo']);
         
            createStudentPA($_POST['sPaAddress'], $_POST['sPaCity'],
            $_POST['sPaState'],$_POST['sPaCountry'],$_POST['sPaHouseNo'],$_POST['sPaStreetNo']);
         
         
            createStudentGuardian($_POST['sGRelation'], $_POST['sGTitle'],
            $_POST['sGGiven'],$_POST['sGMiddle'],$_POST['sGFamily'],$_POST['sGOccupation'],$_POST['sGAddress'],$_POST['sGDateBirth'],
            $_POST['sGPlaceBirth'],$_POST['sGGender'],$_POST['sGEmail'],$_POST['sGPhone'],$_POST['sGLanguage']);
         
         
         
         
         }
         
         
         
         
         
         ?>
      <!-- /.row -->
<?php include("footer.php"); ?>
