<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php 
   if (isset($_GET['c']) && isset($_GET['s'])) {
     $listStudents = getStudentsByCourseID($_GET['c'], $_GET['s']);
   
   }
   
   
   
   
   ?>

<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Academics
      </h1>
      <ol class="breadcrumb">
         <li>
            <i class="ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
         </li>
         <li>
            <i class="ion ion-document-text"></i> <a href="academics.php">Academics</a>
         </li>
         <li>
            <i class="ion-ios-book"></i> <a href="attendance.php">Attendance</a>
         </li>
         <li class="active">
            <i class="ion-document"></i> <?php echo $listStudents[0]['courseCode']; ?>
         </li>
      </ol>
   </div>
</div>
<!-- /.row -->
<?php include("blocks/academic_sections.php"); ?>  
<!-- /.row -->    
<div class="row">
  <div class="col-lg-12">
    <form method="POST" class="ui form" style="font-size: 14px;">
      <div class="box box-border-color">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-book"></i> <?php echo $listStudents[0]['courseName']; ?> <?php echo $listStudents[0]['courseCode']; ?> </h3>
        </div>
        <div class="box-body">
          <div class="fields">
            <div class="five wide field">
              <div class="input-group date">
                  <input type="text" class="form-control" id="updateAttendance" name="selectingDate"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>
            <div class="three wide field">
              <input type="submit" class="btn btn-danger" value="Get" name="update">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if (isset($_POST['update'])) {
  
    $coID = $_GET['c'];
    $secID = $_GET['s'];
    $date = $_POST['selectingDate'];

    $pageRedirect = "attendance_change-c.php?c=$coID&s=$secID&date=$date";

  redirect_to($pageRedirect);  

} ?>






<?php include("footer.php"); ?>