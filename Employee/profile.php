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
       $ID = $_SESSION['userID'];
       $given = $_POST['giveName'];
       $middle = $_POST['middleName'];
       $family = $_POST['familyName'];
       $email = $_POST['eEmail'];
       $phone = $_POST['phone'];
       $start = $_POST['startingDate'];
       $job = $_POST['jobTitle'];
       $quote = $_POST['quote'];
       $birth = $_POST['birth'];
       $profile = $image_file;
       if (empty($_FILES["profileImage"]["name"])) {
           updateWithoutImageEmployee($ID, $given, $middle, $family, $email, $phone, $start, $job, $quote, $birth);
       }
           updateEmployee($ID, $given, $middle, $family, $email, $phone, $profile, $start, $job, $quote, $birth);
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
               <img class="img-circle" src="<?php echo $employee['employeeProfilePic']; ?>" alt="<?php echo $employee['employeeGivenName']; ?>"> 
            </div>
            <h3 class="widget-user-username"><?php printf("%s %s %s",$employee['employeeGivenName'],$employee['employeeMiddleName'],$employee['employeeFamilyName']); ?></h3>
            <h5 class="widget-user-desc"><?php printf("%s",$employee['employeeJobTitle']) ?></h5>
         </div>
         <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
               <li><a><i class="<?php if(strcmp($employee['employeeSex'], 'Male')==0) {echo 'ion-man';}else{echo 'ion-woman';}?>"></i> <?php printf("%s",$employee['employeeSex']) ?></a></li>
               <li><a><i class="ion-email"></i> <?php printf("%s",$employee['employeeEmail']) ?></a></li>
               <li><a><i class="ion-iphone"></i> <?php printf("%s",$employee['employeePhone']) ?></a></li>
               <li><a><i class="ion-calendar"></i> <?php printf("%s",$employee['employeeBirthdate']) ?></a></li>
               <li><a><i class="ion-information"></i> <?php printf("Employee ID %d",$employee['employeeID']) ?></a></li>
               <li><a><i class="ion-person"></i> <?php printf("User ID %d",$employee['userID']) ?></a></li>
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
                     <input type="text" placeholder="First Name" name="giveName" value="<?php echo $employee['employeeGivenName']; ?>">
                  </div>
                  <div class="field">
                     <label>Middle name</label>
                     <input type="text" placeholder="Middle Name" name="middleName" value="<?php echo $employee['employeeMiddleName']; ?>">
                  </div>
                  <div class="field">
                     <label>Family name</label>
                     <input type="text" placeholder="Last Name" name="familyName" value="<?php echo $employee['employeeFamilyName']; ?>">
                  </div>
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="fields">
                  <div class="field">
                     <label>Email</label>
                     <input type="text" placeholder="Email" name="eEmail" value="<?php echo $employee['employeeEmail']; ?>">
                  </div>
                  <div class="field">
                     <label>Phone</label>
                     <input type="text" placeholder="Phone" name="phone" value="<?php echo $employee['employeePhone']; ?>">
                  </div>
                  <div class="field">
                     <label>Title</label>
                     <input type="text" placeholder="Title" name="jobTitle" value="<?php echo $employee['employeeJobTitle']; ?>">
                  </div>
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="fields">
                  <div class="field">
                     <label>Starting Date:</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="starting" name="startingDate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $employee['employeeStartingDate']; ?>">
                     </div>
                  </div>
                  <div class="field">
                     <label>Birthday:</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="birthday" name="birth" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $employee['employeeBirthdate']; ?>">
                     </div>
                  </div>
               </div>
            </div>
            <div class="box-footer box-header">
               <div class="field">
                  <label>Quote</label>
                  <input type="text" placeholder="Quote" name="quote" value="<?php echo $employee['employeeQuote']; ?>">
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
                     <input type="text" placeholder="username" disabled value="<?php echo $employee['userName']; ?>">
                  </div>
                  <div class="field">
                     <label>Password</label>
                     <input type="password" placeholder="password" value="<?php echo $employee['userPassword']; ?>">
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