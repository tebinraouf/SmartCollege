<form method="POST" action="students_change.php?sid=<?php echo $oneStudent['studentID']; ?>">
            <div class="box box-border-color">
      <div class="box-header">
         <h3 class="box-title">Personal</h3>
         <?php updateStudent('stPersonal', 'stPersonalFail') ?>
      </div>
      <!-- /.box-header -->              
      <div class="box-body table-responsive no-padding">
         <table class="table">
            <tbody>
               <tr>
                  <td class="bg-gray">Student ID</td>
                  <td colspan="1">
                     <input class="form-control" type="text" name="sID" value="<?php echo $oneStudent['studentID']; ?>" disabled />
                  </td>
                  <td class="bg-gray">User ID</td>
                  <td colspan="1">
                     <input class="form-control" type="text" name="uID" value="<?php echo $oneStudent['userID']; ?>" disabled />
                  </td>
                  <td class="bg-gray">Highschool Grade</td>
                  <td colspan="1">
                     <input class="form-control" type="text" name="sHighSchool" value="<?php echo $oneStudent['highschoolGrade'] . '%'; ?>" disabled/>
                     
                  </td>
               </tr>

               <tr>
                  <td class="bg-gray">Given Name</td>
                  <td><input class="form-control" type="text" name="sGiven" value="<?php echo $oneStudent['studentGivenName']; ?>" /></td>
                  <td class="bg-gray">Middle Name</td>
                  <td><input class="form-control" type="text" name="sMiddle" value="<?php echo $oneStudent['studentMiddleName']; ?>" /></td>
                  <td class="bg-gray">Family Name</td>
                  <td><input class="form-control" type="text" name="sFamily" value="<?php echo $oneStudent['studentFamilyName']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">Date of Birth</td>
                  <td colspan="1"><input class="form-control" type="text" name="sDateBirth" value="<?php echo $oneStudent['dateOfBirth']; ?>" /></td>
                  <td class="bg-gray">Place of Birth</td>
                  <td colspan="1"><input class="form-control" type="text" name="sPlaceBirth" value="<?php echo $oneStudent['placeOfBirth']; ?>" /></td>
                  <td class="bg-gray">Gender</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGender" value="<?php echo $oneStudent['studentSex']; ?>" /></td>
               </tr>
               <tr>
                  
                  <td class="bg-gray">Nationality</td>
                  <td colspan="1"><input class="form-control" type="text" name="sNationality" value="<?php echo $oneStudent['nationality']; ?>" /></td>
                  <td class="bg-gray">Country</td>
                  <td colspan="1"><input class="form-control" type="text" name="sCountry" value="<?php echo $oneStudent['country']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">Primary Email</td>
                  <td colspan="1"><input class="form-control" type="text" name="sEmail" value="<?php echo $oneStudent['studentEmail']; ?>" /></td>
                  <td class="bg-gray">Secondary Email</td>
                  <td colspan="1"><input class="form-control" type="text" name="sSecondEmail" value="<?php echo $oneStudent['studentSecondaryEmail']; ?>" /></td>                  
                  <td class="bg-gray">Phone</td>
                  <td colspan="1"><input class="form-control" type="text" name="sPhone" value="<?php echo $oneStudent['studentPhone']; ?>" /></td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- /.rowdadadadada -->
      </div><!-- /.box -->
      
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

                  <td colspan="2"><input class="form-control" type="text" name="sCaAddress" value="<?php echo $oneStudent['caAddress']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">City</td>
                  <td colspan="1"><input class="form-control" type="text" name="sCaCity" value="<?php echo $oneStudent['caCity']; ?>" /></td>
                  <td class="bg-gray">State</td>
                  <td colspan="1"><input class="form-control" type="text" name="sCaState" value="<?php echo $oneStudent['caState']; ?>" /></td>
                  <td class="bg-gray">Country</td>
                  <td colspan="1"><input class="form-control" type="text" name="sCaCountry" value="<?php echo $oneStudent['caCountry']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">House No</td>
                  <td><input class="form-control" type="text" name="sCaHouseNo" value="<?php echo $oneStudent['caHouseNo']; ?>" /></td>
                  <td class="bg-gray">Street No</td>
                  <td><input class="form-control" type="text" name="sCaStreetNo" value="<?php echo $oneStudent['caStreetNo']; ?>" /></td>

               </tr>
               
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div><!-- /.box -->

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
                  <td colspan="2"><input class="form-control" type="text" name="sPaAddress" value="<?php echo $oneStudent['paAddress']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">City</td>
                  <td colspan="1"><input class="form-control" type="text" name="sPaCity" value="<?php echo $oneStudent['paCity']; ?>" /></td>
                  <td class="bg-gray">State</td>
                  <td colspan="1"><input class="form-control" type="text" name="sPaState" value="<?php echo $oneStudent['paState']; ?>" /></td>
                  <td class="bg-gray">Country</td>
                  <td colspan="1"><input class="form-control" type="text" name="sPaCountry" value="<?php echo $oneStudent['paCountry']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">House No</td>
                  <td><input class="form-control" type="text" name="sPaHouseNo" value="<?php echo $oneStudent['paHouseNo']; ?>" /></td>
                  <td class="bg-gray">Street No</td>
                  <td><input class="form-control" type="text" name="sPaStreetNo" value="<?php echo $oneStudent['paStreetNo']; ?>" /></td>

               </tr>
               
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div><!-- /.box -->

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
                  <td colspan="2"><input class="form-control" type="text" name="sGRelation" value="<?php echo $oneStudent['gRelation']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">Title</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGTitle" value="<?php echo $oneStudent['gTitle']; ?>" /></td>
                  <td class="bg-gray">Occupation</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGOccupation" value="<?php echo $oneStudent['gOccupation']; ?>" /></td>
                  <td class="bg-gray">Address</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGAddress" value="<?php echo $oneStudent['gAddress']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">Given Name</td>
                  <td><input class="form-control" type="text" name="sGGiven" value="<?php echo $oneStudent['gGivenName']; ?>" /></td>
                  <td class="bg-gray">Middle Name</td>
                  <td><input class="form-control" type="text" name="sGMiddle" value="<?php echo $oneStudent['gMiddleName']; ?>" /></td>
                  <td class="bg-gray">Family Name</td>
                  <td><input class="form-control" type="text" name="sGFamily" value="<?php echo $oneStudent['gFamilyName']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">Date of Birth</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGDateBirth" value="<?php echo $oneStudent['gDateOfBirth']; ?>" /></td>
                  <td class="bg-gray">Place of Birth</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGPlaceBirth" value="<?php echo $oneStudent['gPlaceOfBirth']; ?>" /></td>
                  <td class="bg-gray">Gender</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGGender" value="<?php echo $oneStudent['gGender']; ?>" /></td>
               </tr>
               <tr>
                  <td class="bg-gray">Email</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGEmail" value="<?php echo $oneStudent['gEmail']; ?>" /></td>
                  <td class="bg-gray">Phone</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGPhone" value="<?php echo $oneStudent['gPhone']; ?>" /></td>
                  <td class="bg-gray">Language</td>
                  <td colspan="1"><input class="form-control" type="text" name="sGLanguage" value="<?php echo $oneStudent['gLanguage']; ?>" /></td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div><!-- /.box -->
      <div>
      <input class="btn btn-danger" type="submit" name="saveChanges" value="Save Changes" />
      
      </div>
</form>

<?php 
   
      if(isset($_POST['saveChanges'])){

         //Guardian Section
         updateStudentGuardian($oneStudent['studentID'], $_POST['sGRelation'], $_POST['sGTitle'], $_POST['sGGiven'],$_POST['sGMiddle'], $_POST['sGFamily'], $_POST['sGOccupation'], $_POST['sGAddress'], $_POST['sGDateBirth'], $_POST['sGPlaceBirth'], $_POST['sGGender'], $_POST['sGEmail'], $_POST['sGPhone'], $_POST['sGLanguage']);


         //Current Address Section
         updateStudentCurrentAddress($oneStudent['studentID'], $_POST['sCaAddress'], $_POST['sCaCity'], $_POST['sCaState'],$_POST['sCaCountry'], $_POST['sCaHouseNo'], $_POST['sCaStreetNo']);

         //Permanant Address Section
         updateStudentPermanantAddress($oneStudent['studentID'], $_POST['sPaAddress'], $_POST['sPaCity'], $_POST['sPaState'],$_POST['sPaCountry'], $_POST['sPaHouseNo'], $_POST['sPaStreetNo']);

         //Personal Section Function
         updateStudentPersonal($oneStudent['studentID'], $_POST['sGiven'], $_POST['sMiddle'], $_POST['sFamily'],$_POST['sDateBirth'], $_POST['sPlaceBirth'], $_POST['sGender'], $_POST['sNationality'], $_POST['sCountry'], $_POST['sEmail'], $_POST['sSecondEmail'], $_POST['sPhone']);


      }






?>


