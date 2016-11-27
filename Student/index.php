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
         <li class="active">
            <i class="fa fa-dashboard"></i> Dashboard
         </li>
      </ol>
   </div>
</div>
<div class="jumbotron">
   <h1>Latest News</h1>
   <?php $myarray = getNews(); ?>
   <h4><i><?php echo $myarray[0]['newsValidity']; ?></i></h4>
   <p><?php echo $myarray[0]['newsContent']; ?></p>
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
         <div class="fb-page" data-href="https://www.facebook.com/<?php echo $visible['facebook']; ?>" data-tabs="timeline" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
            <div class="fb-xfbml-parse-ignore">
               <blockquote cite="https://www.facebook.com/<?php echo $visible['facebook']; ?>"><a href="https://www.facebook.com/<?php echo $visible['facebook']; ?>"><?php echo $visible['facebookName']; ?></a></blockquote>
            </div>
         </div>
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
<?php $studentAcademic = getStudentPerviousSemester($s['studentID']);  ?>
<!-- /.row -->
<?php for($i=0;$i<count($studentAcademic);$i++){
   $counter = count($studentAcademic);

   //<!-- /.box -->
   $la = '<div class="box box-border-color">';
   $la .= '<div class="box-header">';
   $la .=     '<h3 class="box-title">'.$studentAcademic[$i]['semesterName']. " " . $studentAcademic[$i]['semesterYear'] .'</h3>';
   $la .=  '</div>';
     //<!-- /.box-header -->
   $la .=  '<div class="box-body table-responsive no-padding">';
   $la .=    '<table class="table">';
   $la .=        '<tbody>';
   $la .=          '<tr>';
   $la .=              '<th style="width: 10%">Course Code</th>';
   $la .=            '<th style="width: 50%">Course Name</th>';
   $la .=              '<th style="width: 10%">Credit</th>';
   $la .=         '<th style="width: 10%">Quality</th>';
   $la .=              '<th style="width: 10%">Grade</th>';
   $la .=           '</tr>';

   echo $la;
   $sQuality = 0;
   $sCredit = 0;
   for ($j=0; $j <$counter; $j++) {
      # code...

   $ll =            '<tr>';
   $ll .=              '<td>'.$studentAcademic[$j]['courseCode'].'</td>';
   $ll .=              '<td>'.$studentAcademic[$j]['courseName'].'</td>';
   $ll .=              '<td>'.number_format($studentAcademic[$j]['courseCreditHour'],2).'</td>';
   $ll .=              '<td>'.number_format($studentAcademic[$j]['gradeQuality'],2).'</td>';
   $ll .=              '<td>'.$studentAcademic[$j]['gradeLetter'].'</td>';
   $ll .=           '</tr>';
   if(strcmp($studentAcademic[$j]['gradeLetter'], "In Progress")!=0){
           $sQuality+=$studentAcademic[$j]['gradeQuality'];
           $sCredit+=$studentAcademic[$j]['courseCreditHour'];
   }

   echo $ll;
   }
   $cQuality+=$sQuality; //Cumulative Quality Points
   $cCredit+=$sCredit; //Cumulative Credit Hours
   $sgpa = number_format($sQuality/$sCredit,2);
   $cgpa = round($cQuality/$cCredit,2);
   $cgpaArray[$i] = $cgpa;

   if($sgpa==0.00){
     $cgpa=$cgpaArray[count($cgpaArray)-2];
     $_SESSION['gpa']=$cgpa;
   }


   $l =             '<tr align="center"><td colspan="5"><strong style="padding-right:1.5em;">Semester</strong>';
   $l .=                         '<strong>Quality Points: </strong><span style="padding-right:1.5em;">'.number_format($sQuality,2). '</span>';
   $l .=                          '<strong>Credit Hours: </strong><span style="padding-right:1.5em;">'.number_format($sCredit,2). '</span>';
   $l .=                          '<strong>SGPA: </strong><span style="padding-right:1.5em;">'.$sgpa.'</span>';
   $l .=                      '</td>';
   $l .=            '</tr>';
   $l .=             '<tr align="center"><td colspan="5"><strong style="padding-right:1.5em;">Cumulative</strong>';
   $l .=                         '<strong>Quality Points: </strong><span style="padding-right:1.5em;">'.number_format($_SESSION['gpaCQuality'],2). '</span>';
   $l .=                          '<strong>Credit Hours: </strong><span style="padding-right:1.5em;">'.number_format($_SESSION['gpaCCredit'],2). '</span>';
   $l .=                          '<strong>CGPA: </strong><span style="padding-right:1.5em;">'.number_format($_SESSION['gpa'],2).'</span>';
   $l .=                      '</td>';
   $l .=            '</tr>';

   $l .=        '</tbody>';
   $l .=     '</table>';
   $l .=  '</div>';
     //<!-- /.row -->
   $l .= '</div>';
   //<!-- /.box -->
   echo $l;

   } ?>
<?php include("footer.php"); ?>
