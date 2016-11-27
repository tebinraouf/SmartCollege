<?php include( "header.php"); ?>

<?php
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
       $ID      = $s['studentID'];
       $given   = $_POST['giveName'];
       $middle  = $_POST['middleName'];
       $family  = $_POST['familyName'];
       $email   = $_POST['eEmail'];
       $phone   = $_POST['phone'];
       $start   = $_POST['startingDate'];
       $quote   = $_POST['quote'];
       $birth   = $_POST['birth'];
       $profile = $image_file;

       if (empty($_FILES["profileImage"]["name"])) {
         //updateWithoutImageStudent($userID, $givenName, $middleName,$familyName, $email, $phone, $startingDate, $quote, $birth)
           updateUserByUser($oneStudent['userID'],$_POST['pass']);
           updateWithoutImageStudent($ID, $given, $middle, $family, $email, $phone, $start, $quote, $birth);

       }
         //updateStudentByStudent($userID, $givenName, $middleName,$familyName, $email, $phone, $startingDate, $quote, $profi,$birth)
           updateUserByUser($oneStudent['userID'],$_POST['pass']);
           updateStudentByStudent($ID, $given, $middle, $family, $email, $phone, $start, $quote, $profile, $birth);

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
   <div class="col-lg-5">
      <div class="box box-widget widget-user-2">
         <div class="widget-user-header block-color">
            <div class="widget-user-image">
               <img class="img-circle" src="<?php echo $oneStudent['studentProfilePic']; ?>" alt="<?php echo $oneStudent['studentGivenName']; ?>">
            </div>
            <h3 class="widget-user-username"><?php printf("%s %s %s",$oneStudent['studentGivenName'],$oneStudent['studentMiddleName'],$oneStudent['studentFamilyName']); ?></h3>
            <h5 class="widget-user-desc"><?php printf("Student since %s",$oneStudent['studentStartingYear']) ?></h5>
         </div>
         <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
               <li><a><i class="<?php if(strcmp($oneStudent['professorGender'], 'Male')==0) {echo 'ion-man';}else{echo 'ion-woman';}?>"></i> <?php printf("%s",$oneStudent['studentSex']) ?></a></li>
               <li><a><i class="ion-email"></i> <?php printf("%s",$oneStudent['studentEmail']) ?></a></li>
               <li><a><i class="ion-iphone"></i> <?php printf("%s",$oneStudent['studentPhone']) ?></a></li>
               <li><a><i class="ion-calendar"></i> <?php printf("%s",$oneStudent['dateOfBirth']) ?></a></li>
               <li><a><i class="ion-information"></i> <?php printf("Student ID %d",$oneStudent['studentID']) ?></a></li>
               <li><a><i class="ion-person"></i> <?php printf("User ID %d",$oneStudent['userID']) ?></a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="col-lg-7">
   <form method="POST" enctype="multipart/form-data">
      <div class="ui  width form" style="font-size: 14px">
         <div class="box box-border-color">
            <div class="box-header with-border">
               <h3 class="box-title">Details</h3>
            </div>
            <div class="box-body">
               <div class="fields">
                  <div class="field">
                     <label>First name</label>
                     <input type="text" placeholder="First Name" name="giveName" value="<?php echo $oneStudent['studentGivenName']; ?>">
                  </div>
                  <div class="field">
                     <label>Middle name</label>
                     <input type="text" placeholder="Middle Name" name="middleName" value="<?php echo $oneStudent['studentMiddleName']; ?>">
                  </div>
                  <div class="field">
                     <label>Family name</label>
                     <input type="text" placeholder="Last Name" name="familyName" value="<?php echo $oneStudent['studentFamilyName']; ?>">
                  </div>
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="fields">
                  <div class="field">
                     <label>Email</label>
                     <input type="text" placeholder="Email" name="eEmail" value="<?php echo $oneStudent['studentEmail']; ?>">
                  </div>
                  <div class="field">
                     <label>Phone</label>
                     <input type="text" placeholder="Phone" name="phone" value="<?php echo $oneStudent['studentPhone']; ?>">
                  </div>

               </div>
            </div>
            <div class="box-footer box-header">
               <div class="fields">
                  <div class="field">
                     <label>Starting Date</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="starting" name="startingDate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $oneStudent['studentStartingYear']; ?>">
                     </div>
                  </div>
                  <div class="field">
                     <label>Birthday</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="birthday" name="birth" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $oneStudent['dateOfBirth']; ?>" >
                     </div>
                  </div>
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="field">
                  <label>Quote</label>
                  <input type="text" placeholder="Quote" name="quote" value="<?php echo $oneStudent['studentQuote']; ?>">
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="field">
                  <label>Photo</label>
                  <input type="file" class="form-control" name="profileImage">
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="fields">
                  <div class="field">
                     <label>Username</label>
                     <input type="text" placeholder="username" disabled value="<?php echo $oneStudent['userName']; ?>">
                  </div>
                  <div class="field">
                     <label>Password</label>
                     <input type="password" placeholder="password" name="pass" value="<?php echo $oneStudent['userPassword']; ?>">
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
<script type="text/javascript">
   $('select.dropdown').dropdown();
</script>
<?php include( "footer.php"); ?>
