<?php $activePage='professors' ; ?>
<?php include( "header.php"); ?>
<?php $professor= getProfessorsByID($_GET[ 'i']); ?>


    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
               Professor
            </h1>
        <ol class="breadcrumb">
          <li> <i class="ion ion-ios-speedometer"></i> <a href="index.php">Dashboard</a> </li>
          <li class="active"> <i class="ion ion-ios-book-outline"></i> <a href="professors.php">Faculty</a></li>
          <li class="active"> <i class="ion ion-person"></i> <?php printf("%s %s %s",$professor['professorGivenName'],$professor['professorMiddleName'],$professor['professorFamilyName']); ?> </li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-5">
        <div class="box box-widget widget-user-2">
          <div class="widget-user-header block-color">
            <div class="widget-user-image"> <img class="img-circle" src="<?php echo $professor['professorProfileImage']; ?>" alt="<?php echo $professor['professorGivenName']; ?>"> </div>
            <h3 class="widget-user-username"><?php printf("%s %s %s",$professor['professorGivenName'],$professor['professorMiddleName'],$professor['professorFamilyName']); ?></h3>
            <h5 class="widget-user-desc"><?php printf("%s",$professor['departmentName']) ?></h5> </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a><i class="<?php if(strcmp($professor['professorGender'], 'Male')==0) {echo 'ion-man';}else{echo 'ion-woman';}?>"></i> <?php printf("%s",$professor['professorGender']) ?></a></li>
              <li><a><i class="ion-email"></i> <?php printf("%s",$professor['professorEmail']) ?></a></li>
              <li><a><i class="ion-iphone"></i> <?php printf("%s",$professor['professorPhone']) ?></a></li>
              <li><a><i class="ion-calendar"></i> <?php printf("%s",$professor['professorJoinDay']) ?></a></li>
              <li><a><i class="ion-home"></i> <?php printf("Office %s ",$professor['professorOffice']) ?></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
      <div class="box box-border-color">
         <div class="box-header with-border">
            <h3 class="box-title">Background</h3>
         </div>
         <div class="box-body">
            <?php printf("%s",$professor['professorBackground']) ?>
         </div>
         <div class="box-footer box-header">
            <h3 class="box-title">Past Classes</h3>
            <p>
            <?php

              $proClasses = getProfessorsClassesTaught($_GET['i']);
              foreach ($proClasses as $value) {
                printf("<span class='badge bg-olive mybadge'> %s @ %s</span>",$value['pctClassName'],$value['pctLocation']);
              }


             ?>
             </p>
         </div>
          <div class="box-footer box-header">
            <h3 class="box-title">Certifications</h3>
            <p>
            <?php

              $proCertificates = getProfessorsCertificates($_GET['i']);
              foreach ($proCertificates as $value) {
                printf("<span class='badge bg-yellow mybadge'> %s @ %s</span>",$value['proCerName'],$value['proLocation']);
              }


             ?>
             </p>
         </div>
      </div>
      </div>


    </div>

      <div class="row">
         <div class="col-lg-12">
            <form method="GET">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Current Classes </h3>
                  </div>
                  <!-- /.box-header -->
                  <div id="sectionRetrieveFromAjax"></div>
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <th style="width: 15%;">Code</th>
                           <th>Semester</th>
                           <th>Section</th>
                           <th>Meeting Info</th>
                        </tr>
                        <?php
                           $currentSem = getProfessorsClasses($_GET['i'],1);


                             for ($i=0; $i < count($currentSem); $i++) {
                               $l = '<tr>';
                               $l .= '<td><a href="courses_info_course.php?id='.$currentSem[$i]['courseID'].'&s='.$currentSem[$i]['sectionID'].'">' . $currentSem[$i]['courseCode'] . '</a></td>';
                               $l .= '<td>' . $currentSem[$i]['semesterName'] ." ". $currentSem[$i]['semesterYear'] . '</td>';
                               $l .= '<td>' . $currentSem[$i]['sectionID'] . '</td>';
                               $l .= '<td>' . $currentSem[$i]['sectionDate'] . " " . $currentSem[$i]['sectionTime'] ." ". $currentSem[$i]['sectionLocation'] .'</td>';
                               $l .= '</tr>';


                             echo $l;
                             }
                           ?>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
        </div>

  <div class="row">
         <div class="col-lg-12">
            <form method="GET">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Previous Given Classes </h3>
                  </div>
                  <!-- /.box-header -->
                  <div id="sectionRetrieveFromAjax"></div>
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <th style="width: 15%;">Code</th>
                           <th>Semester</th>
                           <th>Section</th>
                           <th>Meeting Info</th>
                        </tr>
                        <?php
                           $pastSems = getProfessorsClasses($_GET['i'],0);


                             for ($i=0; $i < count($pastSems); $i++) {
                               $l = '<tr>';
                               $l .= '<td><a href="courses_info_course.php?id='.$pastSems[$i]['courseID'].'&s='.$pastSems[$i]['sectionID'].'">' . $pastSems[$i]['courseCode'] . '</a></td>';
                               $l .= '<td>' . $pastSems[$i]['semesterName'] ." ". $pastSems[$i]['semesterYear'] . '</td>';
                               $l .= '<td>' . $pastSems[$i]['sectionID'] . '</td>';
                               $l .= '<td>' . $pastSems[$i]['sectionDate'] . " " . $pastSems[$i]['sectionTime'] ." ". $pastSems[$i]['sectionLocation'] .'</td>';
                               $l .= '</tr>';


                             echo $l;
                             }
                           ?>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
        </div>


<?php include( "footer.php"); ?>
