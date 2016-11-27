
            <div class="box box-danger">
      <div class="box-header">
         <h3 class="box-title">Personal</h3>
      </div>
      <!-- /.box-header -->              
      <div class="box-body table-responsive no-padding">
         <table class="table">
            <tbody>
               <tr>
                  <td class="bg-gray">Student ID</td>
                  <td colspan="1"><?php echo $oneStudent['studentID']; ?></td>
                  <td class="bg-gray">Highschool Grade</td>
                  <td colspan="1"><?php echo $oneStudent['highschoolGrade']."%"; ?></td>
               </tr>

               <tr>
                  <td class="bg-gray">Given Name</td>
                  <td><?php echo $oneStudent['studentGivenName']; ?></td>
                  <td class="bg-gray">Middle Name</td>
                  <td><?php echo $oneStudent['studentMiddleName']; ?></td>
                  <td class="bg-gray">Family Name</td>
                  <td><?php echo $oneStudent['studentFamilyName']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Date of Birth</td>
                  <td colspan="1"><?php echo $oneStudent['dateOfBirth']; ?></td>
                  <td class="bg-gray">Place of Birth</td>
                  <td colspan="1"><?php echo $oneStudent['placeOfBirth']; ?></td>
                  <td class="bg-gray">Gender</td>
                  <td colspan="1"><?php echo $oneStudent['studentSex']; ?></td>
               </tr>
               <tr>
                  
                  <td class="bg-gray">Nationality</td>
                  <td colspan="1"><?php echo $oneStudent['nationality']; ?></td>
                  <td class="bg-gray">Country</td>
                  <td colspan="1"><?php echo $oneStudent['country']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Primary Email</td>
                  <td colspan="1"><?php echo $oneStudent['studentEmail']; ?></td>
                  <td class="bg-gray">Secondary Email</td>
                  <td colspan="1"><?php echo $oneStudent['studentSecondaryEmail']; ?></td>
                  
               </tr>
            </tbody>
         </table>
      </div>
      <!-- /.rowdadadadada -->
      </div><!-- /.box -->
      
      <!-- /.row -->
      <div class="box box-danger">
      <div class="box-header">
         <h3 class="box-title">Current Address</h3>
      </div>
      <!-- /.box-header -->              
      <div class="box-body table-responsive no-padding">
         <table class="table">
            <tbody>
               <tr>
                  <td class="bg-gray">Address</td>
                  <td colspan="5"><?php echo $oneStudent['caAddress']; ?>S</td>
               </tr>
               <tr>
                  <td class="bg-gray">City</td>
                  <td colspan="1"><?php echo $oneStudent['caCity']; ?></td>
                  <td class="bg-gray">State</td>
                  <td colspan="1"><?php echo $oneStudent['caState']; ?></td>
                  <td class="bg-gray">Country</td>
                  <td colspan="1"><?php echo $oneStudent['caCountry']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">House No</td>
                  <td><?php echo $oneStudent['caHouseNo']; ?></td>
                  <td class="bg-gray">Street No</td>
                  <td><?php echo $oneStudent['caStreetNo']; ?></td>

               </tr>
               
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div><!-- /.box -->

      <!-- /.row -->
      <div class="box box-danger">
      <div class="box-header">
         <h3 class="box-title">Permanent Address</h3>
      </div>
      <!-- /.box-header -->              
      <div class="box-body table-responsive no-padding">
         <table class="table">
            <tbody>
               <tr>
                  <td class="bg-gray">Address</td>
                  <td colspan="5"><?php echo $oneStudent['paAddress']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">City</td>
                  <td colspan="1"><?php echo $oneStudent['paCity']; ?></td>
                  <td class="bg-gray">State</td>
                  <td colspan="1"><?php echo $oneStudent['paState']; ?></td>
                  <td class="bg-gray">Country</td>
                  <td colspan="1"><?php echo $oneStudent['paCountry']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">House No</td>
                  <td><?php echo $oneStudent['paHouseNo']; ?></td>
                  <td class="bg-gray">Street No</td>
                  <td><?php echo $oneStudent['paStreetNo']; ?></td>

               </tr>
               
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div><!-- /.box -->

      <!-- /.row -->
      <div class="box box-danger">
      <div class="box-header">
         <h3 class="box-title">Guardian</h3>
      </div>
      <!-- /.box-header -->              
      <div class="box-body table-responsive no-padding">
         <table class="table">
            <tbody>
               <tr>
                  <td class="bg-gray">Relation</td>
                  <td colspan="5"><?php echo $oneStudent['gRelation']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Title</td>
                  <td colspan="1"><?php echo $oneStudent['gTitle']; ?></td>
                  <td class="bg-gray">Occupation</td>
                  <td colspan="1"><?php echo $oneStudent['gOccupation']; ?></td>
                  <td class="bg-gray">Address</td>
                  <td colspan="1"><?php echo $oneStudent['gAddress']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Given Name</td>
                  <td><?php echo $oneStudent['gGivenName']; ?></td>
                  <td class="bg-gray">Middle Name</td>
                  <td><?php echo $oneStudent['gMiddleName']; ?></td>
                  <td class="bg-gray">Family Name</td>
                  <td><?php echo $oneStudent['gFamilyName']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Date of Birth</td>
                  <td colspan="1"><?php echo $oneStudent['gDateOfBirth']; ?></td>
                  <td class="bg-gray">Place of Birth</td>
                  <td colspan="1"><?php echo $oneStudent['gPlaceOfBirth']; ?></td>
                  <td class="bg-gray">Gender</td>
                  <td colspan="1"><?php echo $oneStudent['gGender']; ?></td>
               </tr>
               <tr>
                  <td class="bg-gray">Email</td>
                  <td colspan="1"><?php echo $oneStudent['gEmail']; ?></td>
                  <td class="bg-gray">Phone</td>
                  <td colspan="1"><?php echo $oneStudent['gPhone']; ?></td>
                  <td class="bg-gray">Language</td>
                  <td colspan="1"><?php echo $oneStudent['gLanguage']; ?></td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- /.row -->
      </div><!-- /.box -->
