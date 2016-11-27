<?php
   include("header.php");
   ?>
<?php
   if(!empty(getProfessorsCertificates($p['professorID']))){
     $certs = getProfessorsCertificates($p['professorID']);
   }
   if(!empty(getProfessorsClassesTaught($p['professorID']))){
     $taughtClasses = getProfessorsClassesTaught($p['professorID']);
   }
   //print_r($empl);
   //print_r($_SESSION['userID']);
   $target_dir = "../uploads/";
   $image_file = $target_dir . basename($_FILES["profileImage"]["name"]);
   $imageFileType = pathinfo($image_file, PATHINFO_EXTENSION);
   if (isset($_POST['saveChanges'])) {
           $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
           if ($check !== false) {
                   $tmp_name = $_FILES["profileImage"]["tmp_name"];
                   move_uploaded_file($tmp_name, $image_file);
           } else {
                   $_SESSION['message'] = "File is not an image.";
           }
           $ID = $_SESSION['userID'];
           $given = $_POST['giveName'];
           $middle = $_POST['middleName'];
           $family = $_POST['familyName'];
           $email = $_POST['eEmail'];
           $phone = $_POST['phone'];
           $start = $_POST['startingDate'];
           $job = $_POST['jobTitle'];
           $quote = $_POST['quote'];
           $office = $_POST['office'];
           $isPhone = $_POST['isPhone'];
           $back = $_POST['background'];
           $profile = $image_file;
           if (count($certs) != 0) {
                   $certArray = array();
                   $certLocationsArray = array();
                   for ($i = 0; $i < count($certs); $i++) {
                           $certValues = "certificatesName" . $i;
                           $certLocations = "certificatesLocation" . $i;
                           
                           $certArray[$certs[$i]['proCID']] = $_POST[$certValues];
                           $certLocationsArray[$certs[$i]['proCID']] = $_POST[$certLocations];
                   }
                   //print_r($certLocationsArray);
                   
           }
          if (count($taughtClasses) != 0) {
                   $classArray = array();
                   $classLocationsArray = array();
                   for ($i = 0; $i < count($taughtClasses); $i++) {
                           $classValues = "pctClassName" . $i;
                           $classLocations = "pctLocation" . $i;
                           
                           $classArray[$taughtClasses[$i]['pctID']] = $_POST[$classValues];
                           $classLocationsArray[$taughtClasses[$i]['pctID']] = $_POST[$classLocations];
                   }
                   //print_r($certLocationsArray);
                   
           }

           if (empty($_FILES["profileImage"]["name"])) {
                   updateProfessorClassesTaught($classArray,$classLocationsArray);
                   updateProfessorCertificates($certArray,$certLocationsArray);
                   updateUserByUser($p['userID'], $_POST['pass']);
                   updateWithoutImageProfessor($p['professorID'], $given, $middle, $family, $email, $phone, $start, $job, $quote, $office, $isPhone, $back);
           }
           updateProfessorClassesTaught($classArray,$classLocationsArray);
           updateProfessorCertificates($certArray,$certLocationsArray);
           updateUserByUser($p['userID'], $_POST['pass']);
           updateProfessor($p['professorID'], $given, $middle, $family, $email, $phone, $start, $job, $quote, $office, $isPhone, $profile, $back);
   }
   ?>
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Profile
      </h1>
      <ol class="breadcrumb">
         <li> <i class="ion-ios-speedometer"></i> <a href="index.php">Dashboard</a> </li>
         <li class="active"> <i class="ion-person"></i> Profile </li>
      </ol>
   </div>
</div>
<div class="row">
   <div class="col-lg-4">
      <div class="box box-widget widget-user-2">
         <div class="widget-user-header block-color">
            <div class="widget-user-image"> 
               <img class="img-circle" src="<?php echo $p['professorProfileImage']; ?>" alt="<?php echo $p['professorGivenName']; ?>"> 
            </div>
            <h3 class="widget-user-username"><?php printf("%s %s %s",$p['professorGivenName'],$p['professorMiddleName'],$p['professorFamilyName']); ?></h3>
            <h5 class="widget-user-desc"><?php printf("%s",$p['professorJobTitle']) ?></h5>
         </div>
         <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
               <li><a><i class="<?php if(strcmp($p['professorGender'], 'Male')==0) {echo 'ion-man';}else{echo 'ion-woman';}?>"></i> <?php printf("%s",$p['professorGender']) ?></a></li>
               <li><a><i class="ion-email"></i> <?php printf("%s",$p['professorEmail']) ?></a></li>
               <li><a><i class="ion-iphone"></i> <?php printf("%s",$p['professorPhone']) ?></a></li>
               <li><a><i class="ion-calendar"></i> <?php printf("Professor since %s",$p['professorJoinDay']) ?></a></li>
               <li><a><i class="ion-home"></i> <?php printf("Office %s ",$p['professorOffice']) ?></a></li>
               <li><a><i class="ion-information"></i> <?php printf("Faculty ID %d ",$p['professorID']) ?></a></li>
               <li><a><i class="ion-person"></i> <?php printf("User ID %d ",$p['userID']) ?></a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-lg-8">
      <form method="POST" enctype="multipart/form-data">
         <div class="ui  width form" style="font-size: 14px">
            <div class="box box-border-color">
               <div class="box-header with-border">
                  <h3 class="box-title">Details</h3>
               </div>
               <div class="box-body">
                  <div class="three fields">
                     <div class="field">
                        <label>First name</label>
                        <input type="text" placeholder="First Name" name="giveName" value="<?php echo $p['professorGivenName']; ?>">
                     </div>
                     <div class="field">
                        <label>Middle name</label>
                        <input type="text" placeholder="Middle Name" name="middleName" value="<?php echo $p['professorMiddleName']; ?>">
                     </div>
                     <div class="field">
                        <label>Family name</label>
                        <input type="text" placeholder="Last Name" name="familyName" value="<?php echo $p['professorFamilyName']; ?>">
                     </div>
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="three fields">
                     <div class="field">
                        <label>Email</label>
                        <input type="text" placeholder="Email" name="eEmail" value="<?php echo $p['professorEmail']; ?>">
                     </div>
                     <div class="field">
                        <label>Phone</label>
                        <input type="text" placeholder="Phone" name="phone" value="<?php echo $p['professorPhone']; ?>">
                     </div>
                     <div class="field">
                        <label>Title</label>
                        <input type="text" placeholder="Title" name="jobTitle" value="<?php echo $p['professorJobTitle']; ?>">
                     </div>
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="fields">
                     <div class="field">
                        <label>Starting Date</label>
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="ion-calendar"></i>
                           </div>
                           <input type="text" id="startingProfessor" name="startingDate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $p['professorJoinDay']; ?>">
                        </div>
                     </div>
                     <div class="field">
                        <label>Office</label>
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="ion-home"></i>
                           </div>
                           <input type="text" placeholder="Quote" name="office" value="<?php echo $p['professorOffice']; ?>">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="field">
                     <label>Quote</label>
                     <input type="text" placeholder="Quote" name="quote" value="<?php echo $p['professorQuote']; ?>">
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="field">
                     <label>Phone Availablity to Students</label>
                     <input type="radio" name="isPhone" class="flat-red" value="1" <?php if($p['isPhoneAvailable']==1) echo 'checked';  ?> > Yes
                     <input type="radio" name="isPhone" class="flat-red" value="0" <?php if($p['isPhoneAvailable']==0) echo 'checked';  ?> > No
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="field">
                     <label>Background</label>
                     <textarea name="background"><?php echo $p['professorBackground']; ?></textarea>
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="two fields">
                     <div class="field">
                        <label>
                           Certificates
                           <div class="ui icon button" id="certBtn"  data-variation="basic" data-toggle="modal" data-target="#createNewCertificate">
                              <i class="add icon"></i>
                           </div>
                        </label>
                        <?php for($i=0;$i<count($certs);$i++){ ?>
                        <div class="input-group" style="padding-bottom: 5px">
                           <div class="input-group-addon">
                              <a href="profile.php?de=<?php echo $certs[$i]['proCID'] ?>"><i class="ion-trash-a"></i></a>
                           </div>
                           <input type="text" placeholder="certificates" value="<?php echo $certs[$i]['proCerName']; ?>" name="<?php echo "certificatesName".$i ?>">
                        </div>
                        <?php } ?>
                     </div>
                     <div class="field">
                        <?php if(!empty($certs)){ ?>
                        <label style="padding-bottom: 7px;">Locations </label>
                        <?php } ?>
                        <?php for($i=0;$i<count($certs);$i++){ ?>
                        <div class="input-group" style="padding-bottom: 5px">
                           <div class="input-group-addon">
                              <a href="profile.php?de=<?php echo $certs[$i]['proCID'] ?>"><i class="ion-trash-a"></i></a>
                           </div>
                           <input type="text" placeholder="certificates" value="<?php echo $certs[$i]['proLocation']; ?>" name="<?php echo "certificatesLocation".$i ?>">
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
               
               <div class="box-footer box-header">
                  <div class="two fields">
                     <div class="field">
                        <label>
                           Classes
                           <div class="ui icon button" id="classTaughtBtn"  data-variation="basic" data-toggle="modal" data-target="#addNewTaughtClass">
                              <i class="add icon"></i>
                           </div>
                        </label>
                        <?php for($i=0;$i<count($taughtClasses);$i++){ ?>
                        <div class="input-group" style="padding-bottom: 5px">
                           <div class="input-group-addon">
                              <a href="profile.php?ct=<?php echo $taughtClasses[$i]['pctID'] ?>"><i class="ion-trash-a"></i></a>
                           </div>
                           <input type="text" placeholder="certificates" value="<?php echo $taughtClasses[$i]['pctClassName']; ?>" name="<?php echo "pctClassName".$i ?>">
                        </div>
                        <?php } ?>
                     </div>
                     <div class="field">
                        <?php if(!empty($taughtClasses)){ ?>
                        <label style="padding-bottom: 7px;">Locations </label>
                        <?php } ?>
                        <?php for($i=0;$i<count($taughtClasses);$i++){ ?>
                        <div class="input-group" style="padding-bottom: 5px">
                           <div class="input-group-addon">
                              <a href="profile.php?ct=<?php echo $taughtClasses[$i]['pctID'] ?>"><i class="ion-trash-a"></i></a>
                           </div>
                           <input type="text" placeholder="certificates" value="<?php echo $taughtClasses[$i]['pctLocation']; ?>" name="<?php echo "pctLocation".$i ?>">
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>

               <div class="box-footer box-header">
                  <div class="field">
                     <label>Photo</label>
                     <input type="file" class="form-control" name="profileImage">
                  </div>
               </div>
               <div class="box-footer box-header">
                  <div class="three fields">
                     <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="username" disabled value="<?php echo $p['userName']; ?>">
                     </div>
                     <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="password" name="pass" value="<?php echo $p['userPassword']; ?>">
                     </div>
                     <div class="field">
                        <label style="visibility: hidden;">empty</label>
                        <input type="submit" class="btn btn-danger" value="Save Changes" name="saveChanges">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<form method="post">
   <div class="modal fade" id="createNewCertificate" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">New Certificate</h4>
            </div>
            <div class="modal-body">
               <div class="box box-border-color">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <th>Name</th>
                           <th>Location</th>
                        </tr>
                        <tr>
                           <td><input class="form-control" type="text" name="certName" placeholder="eg: PhD" /></td>
                           <td><input class="form-control" type="text" name="certLocate" placeholder="eg: New York University" /></td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" class="btn btn-default" name="addCertificate" value="Add" />
            </div>
         </div>
      </div>
   </div>
</form>
<form method="post">
   <div class="modal fade" id="addNewTaughtClass" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">New Class</h4>
            </div>
            <div class="modal-body">
               <div class="box box-border-color">
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <th>Class</th>
                           <th>Location</th>
                        </tr>
                        <tr>
                           <td><input class="form-control" type="text" name="className" placeholder="eg: ITE202" /></td>
                           <td><input class="form-control" type="text" name="locationName" placeholder="eg: New York University" /></td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="submit" class="btn btn-default" name="addClass" value="Add" />
            </div>
         </div>
      </div>
   </div>
</form>
<?php 
   if (isset($_POST['addCertificate']) && (!empty($_POST['certLocate']) || !empty($_POST['certName'])) ) {
     insertCertificate($_POST['certName'], $_POST['certLocate'], $p['professorID']);
   }
   
   ?>
<?php 
   if (isset($_GET['de'])) {
     deleteCertificate($_GET['de'],$p['professorID']);
   }
   
   ?>

<?php 
   if (isset($_POST['addClass']) && (!empty($_POST['className']) || !empty($_POST['locationName'])) ) {
     insertClassesTaught($_POST['className'], $_POST['locationName'], $p['professorID']);
   }
   
   ?>
<?php 
   if (isset($_GET['ct'])) {
     deleteClassesTaught($_GET['ct'],$p['professorID']);
   }
   
   ?>
<script src="../assets/semantics/semantic.js"></script>
<script type="text/javascript">
   $('#certBtn')
   .popup({
     on:'hover',
     position:'right center',
     title:'Add a new certificate',
     content:'Save all your changes before adding a new certificate.'
     
   });

   $('#classTaughtBtn')
   .popup({
     on:'hover',
     position:'right center',
     title:'Add a new class',
     content:'Save all your changes before adding a new class you taught in another university.'
     
   });
   
   
   
   $('select.dropdown').dropdown();
</script>
<?php include( "footer.php"); ?>