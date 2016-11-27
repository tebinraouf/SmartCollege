<?php $activePage = 'students'; ?>
<?php include("header.php"); ?>
<?php
   $department = getDepartments();
   if (isset($_POST['submit'])) {
       $year = intval($_POST['year']);
       $departName = $_POST['departmentName'];
       $student = getStudentYear($year, $departName);
       //global $student;
       //print_r($student); 
   }
   ?>
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
            <i class="ion ion-university"></i> Students
         </li>
      </ol>
   </div>
</div>
<!-- /.row -->
<?php include("blocks/all_view_change_new.php"); ?> 
<!-- /.row -->
<div class="row">
   <form role="form" method="POST" action="students.php">
      <div class="col-lg-4">
         <div class="form-group">
            <select class="form-control" name="departmentName">
            <?php
               for ($x = 0; $x < count($department); $x++) {
                   $value = "<option>" . $department[$x]['departmentName'] . "</option>";
                   echo $value;
               }
               ?> 
            </select>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="form-group">
            <input class="form-control" placeholder="Starting Year" name="year" >
         </div>
      </div>
      <div class="col-lg-2">
         <input type="submit" class="btn btn-danger" value="Search" name="submit" />
      </div>
   </form>
</div>
<!-- /.row -->
<!-- /.row -->
<div class="row">
   <div class="col-lg-12">
      <div class="box box-border-color">
         <div class="panel-heading">
            <h3 class="panel-title">
            <i class="fa fa-book"></i> 
            <?php
               if (isset($_POST['submit'])) {
                   $outcome = "Major: " . $student[0]['departmentName'];
                   $outcome .= " | " . "Starting Year: " . $year;
                   echo $outcome;
               }
               ?> 
         </div>
         <div class="panel-body" >
            <div class="table-responsive">
               <table class="table table-bordered table-hover table-striped" id="changeType">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Major</th>
                     </tr>
                  </thead>
                  <tbody >
                     <?php
                        if (isset($_POST['submit'])) {
                            for ($i = 0; $i < count($student); $i++) {
                                $result = "<tr>";
                                $result .= "<td>" . $student[$i]['studentID'] . "</td>";
                                $result .= "<td>" . $student[$i]['studentGivenName'] . "</td>";
                                $result .= "<td>" . $student[$i]['studentEmail'] . "</td>";
                                $result .= "<td>" . $student[$i]['majorName'] . "</td>";
                                $result .= "</tr>";
                                echo $result;
                            }
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   include("footer.php");
   ?>