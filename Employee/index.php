<?php $activePage = 'index'; ?>
<?php include("header.php"); ?>
<?php $visible = getVisibility(); ?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your-app-id',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>



      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Dashboard
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <div class="jumbotron">
         <h1>Latest News</h1>
         <?php $myarray = getNews(); ?>
         <h4><i><?php echo $myarray[0]['newsValidity']; ?></i></h4>
         <p><?php echo $myarray[0]['newsContent']; ?></p>
         <p><?php

            if($myarray[0]['employeeID']==$employee['employeeID']){
              echo '<a class="btn btn-danger btn-flat" href="news_edit.php?nid='.$myarray[0]['newsID'].'" >Edit</a>';
            }else{

              echo '<a class="btn-danger btn-flat unableToEdit">Unable to edit</a>';
            }



         ?></p>
      </div>
      <!-- /.row -->
      <div class="row">
         <div class="col-lg-6 col-md-12">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="fa fa-facebook-square fa-5x"></i>
                     </div>
                  </div>
               </div>

               <div class="fb-page" data-href="https://www.facebook.com/<?php echo $visible['facebook']; ?>" data-tabs="timeline" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/<?php echo $visible['facebook']; ?>"><a href="https://www.facebook.com/<?php echo $visible['facebook']; ?>"><?php echo $visible['facebookName']; ?></a></blockquote></div></div>

            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="panel" style="background-color: #55acee">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="ion ion-social-twitter-outline" style="font-size: 5em"></i>
                     </div>

                  </div>
               </div>
               <a class="twitter-timeline" href="https://twitter.com/<?php echo $visible['twitter']; ?>" data-widget-id="713136015125381122" data-screen-name="<?php echo $visible['twitter']; ?>">Tweets by @<?php echo $visible['twitter']; ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            </div>
         </div>
      </div>
      <!-- /.row -->


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
