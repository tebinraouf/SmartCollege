<?php
    header("Content-type: text/css; charset: UTF-8");
?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../../../DB/db.php"); ?>
<?php include("../../../DB/functions.php"); ?>
<?php $visible = getVisibility(); ?>

div#photo_background{
  position:fixed;
  width:100%;
  height:100%;
  top:0;
  left:0;
  overflow:hidden;
  background:url(<?php if(empty($visible)){ echo "../../uploads/campus.jpg";}else{echo "../../".$visible['background'];} ?>);
  background:url(<?php echo "../../".$visible['background']; ?>);
  background-size:cover;
  background-position:center;
}

<?php ob_end_flush(); ?>
<?php mysqli_close($connection); ?>