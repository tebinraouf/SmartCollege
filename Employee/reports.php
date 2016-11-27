<?php $activePage = 'reports'; ?>
<?php include("header.php"); ?>


      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Reports
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-stats-bars"></i> Reports
               </li>
            </ol>
         </div>
      </div>

      <!-- /.row -->

         <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-yellow">
               <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Students Per Major </h3>
               </div>
               <div class="panel-body">
                  <div id='majorChart'></div>
                  <div class="text-right">
                     <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-yellow">
               <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Students Per Minor </h3>
               </div>
               <div class="panel-body">
                  <div id='minorChart'></div>
                  <div class="text-right">
                     <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
         </div>

    <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-red">
               <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Grade Distribution of All Semesters</h3>
               </div>
               <div class="panel-body">
                  <div id="gradeChart"></div>
                  <div class="text-right">
                     <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="row">
         <div class="col-lg-4">
            <div class="panel panel-yellow">
               <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Population Distribution by Gender </h3>
               </div>
               <div class="panel-body">
                  <div id='genderChart'></div>
                  <div class="text-right">
                     <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
            </div>
         </div>

        </div>

      <!-- /.row -->

<?php
//Graphs
//Gneder
   $sql = "SELECT studentSex, count(studentID) as 'gender' FROM Student GROUP BY studentSex;";
   $result = mysqli_query($connection, $sql);
   $result2 = mysqli_query($connection, $sql);
//Grades
   $grades = "SELECT gradeLetter, count(Enroll_studentID) as 'numLetter' FROM StudentGrade GROUP BY gradeLetter;";
   $resultGrades1 = mysqli_query($connection, $grades);
   $resultGrades2 = mysqli_query($connection, $grades);
//Major
    $major = "SELECT majorName, count(studentID) as 'num' FROM
                Degree dg JOIN Major ma
                ON (dg.majorID=ma.majorID) GROUP BY dg.majorID;";
    $majorStudents = mysqli_query($connection, $major);
    $majorName = mysqli_query($connection, $major);
//Minor
    $minor = "SELECT minorName, count(studentID) as 'num' FROM
                Degree dg JOIN Minor ma
                ON (dg.minorID=ma.minorID) GROUP BY dg.minorID;";
    $minorStudents = mysqli_query($connection, $minor);
    $minorName = mysqli_query($connection, $minor);
?>
<?php include("../assets/charts/charts.php"); ?>

<?php include("footer.php"); ?>
