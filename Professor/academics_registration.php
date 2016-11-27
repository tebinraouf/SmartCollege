<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<!-- <meta http-equiv="refresh" content="4" > -->
<?php //$_SESSION['studentID'] ?>
<?php date_default_timezone_set("Asia/Baghdad"); ?>
<?php 

   $time = getEnrollmentTime();
   $registerTimeStart = $time['etTimeStart'];
   $registerTimeEnd = $time['etTimeEnd'];
   $currentTime = date('Y-m-d h:i:s a', time());
   $c = time();


?>
<div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Students
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion-university"></i> Students
               </li>
            </ol>
         </div>
      </div>
<?php include("blocks/academic_sections.php"); ?>  

<?php  
if (strtotime($currentTime) > strtotime($registerTimeStart) && strtotime($currentTime) < strtotime($registerTimeEnd)) {
?>
<div class="row">
   <div class="col-lg-6">
      <div class="box box-success">
         <div class="box-header">
            <h3 class="box-title text-olive">Register Now

               

            </h3>
            <?php 
                 echo '<div class="pull-right box-title"><span class="text-olive">'.$_SESSION['studentEnrollByStudent'].'</span></div>'; 
                 $_SESSION['studentEnrollByStudent']=null; 
                 echo '<div class="pull-right box-title"><span class="text-red pull-right" >'.$_SESSION['studentEnrollByStudentFail'].'</span></div>'; 
                 $_SESSION['studentEnrollByStudentFail']=null;
            ?>
            </h3>
         </div>
         <div class="box-body no-padding">
            <form role="form" method="GET" action="academics_registration_c.php" >
               <div class="col-lg-9">
                  <div class="form-group">
                     <input type="text" class="form-control" name="cc" placeholder="course code" />
                  </div>
               </div>
               <div class="col-lg-2">
                  <input type="submit" class="btn btn-success bg-olive" value="Search" name="gc" />
               </div>
               <div></div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php } else { ?>
<div class="row">
   <div class="col-lg-12">
      <div class="box box-success">
         <div class="box-header">
            <h3 class="box-title text-olive">Course | Current Time is <?php echo $currentTime ?></h3>
         </div>
         <div class="box-body no-padding">
            <form role="form" method="POST" action="academics_registration.php" >
               <div class="col-lg-12">
                  <div class="form-group">
                  <p class="huge">
                     <?php echo 'You can only register between '.$registerTimeStart.' - ' .$registerTimeEnd; ?>
                  </p>
                  </div>
               </div>
               <div class="col-lg-2">
                  <!-- <input type="submit" class="btn btn-success bg-olive" value="Search" name="getPerformance" /> -->
               </div>
               <div></div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php } ?>







<script type="text/javascript">
   $('.select2').select2();
</script>
<?php include("footer.php"); ?>