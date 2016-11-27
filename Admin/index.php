<?php $activePage = 'index'; ?>
<?php include("header.php"); ?>
<?php
   $target_dir = "../Login/uploads/";
   $image_file = $target_dir . basename($_FILES["backgroundImage"]["name"]);
   $imageFileType = pathinfo($image_file, PATHINFO_EXTENSION);
   if (isset($_POST['save'])) {
       $check = getimagesize($_FILES["backgroundImage"]["tmp_name"]);
       if ($check !== false) {
           $tmp_name = $_FILES["backgroundImage"]["tmp_name"];
           move_uploaded_file($tmp_name, $image_file);
       } else {
           $_SESSION['message'] = "File is not an image.";
       }
       $backgroundColor   = $_POST['blockBackColor'];
       $textColor = $_POST['blockTextColor'];
       $btnBackground = $_POST['buttonBackground'];
       $btnText = $_POST['buttonText'];
       $borderBoxColor = $_POST['boxBorderColor'];
       $facebook = $_POST['fbUser'];
       $facebookName = $_POST['fbName'];
       $tweet = $_POST['tweet'];
       $backg = $image_file;
       
       if (empty($_FILES["backgroundImage"]["name"])) {
         updateWebsiteConfigWithoutImage($backgroundColor, $textColor, $borderBoxColor ,$btnBackground,$btnText, $facebook, $facebookName, $tweet);
           
       }

           
         updateWebsiteConfig($backg, $backgroundColor, $textColor, $borderBoxColor,$btnBackground,$btnText, $facebook, $facebookName, $tweet);
       }
   ?>


   <?php 

      if (isset($_POST['reset'])) {
        updateWebsiteConfigWithoutImage('dd4b39', 'F2F2F2', '3d9970' ,'dd4b39','F2F2F2', 'auis.edu.iq','AUIS','AUIS_NEWS');
      }

    ?>

<?php $visible = getVisibility(); ?>
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Admin Dashboard 
      </h1>
      <ol class="breadcrumb">
         <li class="active">
            <i class="fa fa-dashboard"></i> Dashboard
         </li>
      </ol>
   </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <form method="POST" enctype="multipart/form-data" class="ui form" style="font-size: 13px;">

                  <h2 class="ui dividing header text-olive">Image</h2>

                  <div class="field">
                     <div class="field">
                        <label>Login Background Image</label>
                        <input type="file" class="form-control" name="backgroundImage">
                     </div>
                  </div>
                  
                  <h2 class="ui dividing header text-olive">Website Colors</h2>

                  <div class="two fields">
                     <div class="field">
                        <label>Block Background Color</label>
                        <input type="text" class="pick-a-color form-control" name="blockBackColor" value="<?php echo $visible['blockBackgroundColor']; ?>">
                     </div>
                     <div class="field">
                        <label>Block Text Color</label>
                        <input type="text" class="pick-a-color form-control" name="blockTextColor" value="<?php echo $visible['blockTextColor']; ?>">
                     </div>
                  </div>
                  
                  <div class="two fields">
                     <div class="field">
                        <label>Button Background</label>
                        <input type="text" class="pick-a-color form-control" name="buttonBackground" value="<?php echo $visible['buttonBackground']; ?>">
                     </div>
                     <div class="field">
                        <label>Button Text Color</label>
                        <input type="text" class="pick-a-color form-control" name="buttonText" value="<?php echo $visible['buttonText']; ?>">
                     </div>
                  </div>
               
                  <div class="two fields">
                     <div class="field">
                        <label>Box Border Color</label>
                        <input type="text" class="pick-a-color form-control" name="boxBorderColor" value="<?php echo $visible['boxBorderColor']; ?>">
                     </div>

                  </div>

                  <h2 class="ui dividing header text-olive">Social Media</h2>
                  <div class="three fields">
                     <div class="field">
                        <label>Facebook Page Username</label>

                        <input type="text" class="form-control" name="fbUser" value="<?php echo $visible['facebook']; ?>">
                        <small>https://www.facebook.com/<i class="text-olive">auis.edu.iq</i></small>
                     </div>
                     <div class="field">
                        <label>Facebook Page Name</label>
                        <input type="text" class="form-control" name="fbName" value="<?php echo $visible['facebookName']; ?>">
                     </div>
                  

                     <div class="field">
                        <label>Twitter Handle</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                              <i class="ion-at"></i>
                           </div>
                        <input type="text" class="form-control" name="tweet" value="<?php echo $visible['twitter']; ?>">
                        </div>
                     <small>https://twitter.com/<i class="text-olive">AUIS_NEWS</i></small>
                  </div>

                  </div>

                  


                     <input type="submit" class="btn btn-danger" value="Save Changes" name="save">
                     <input type="submit" class="btn btn-danger" value="Reset" name="reset">
                  

      </form>


   </div>
</div>


<script>
    $(document).ready(function () {
    $(".pick-a-color").pickAColor({
        fadeMenuToggle : true,
        inlineDropdown : true,
    });
   });
</script> 
<?php include("footer.php"); ?>