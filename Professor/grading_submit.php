<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php 
   if (isset($_GET['c']) && isset($_GET['s'])) {
     $listStudents = getStudentsByCourseID($_GET['c'], $_GET['s']);

     if ( ($listStudents[0]['isSaved']==1 && $listStudents[0]['isSubmitted']==0) || ($listStudents[0]['isSaved']==0 && $listStudents[0]['isSubmitted']==0)  ) {
           redirect_to("grading.php");
        }  
   
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
         <li class="active">
            <i class="ion ion-document-text"></i> <a href="academics.php">Academics</a>
         </li>
         <li>
            <i class="ion-document"></i> <a href="grading.php"><?php printf("%s %s",$listStudents[0]['semesterName'],$listStudents[0]['semesterYear'])  ?></a>
         </li>
         <li>
            <i class="ion ion-document-text"></i> <?php printf("%s %s %s",$listStudents[0]['courseCode'],$listStudents[0]['courseName'], $listStudents[0]['sectionID'] )  ?>
         </li>
      </ol>
   </div>
</div>
<?php include("blocks/academic_sections.php"); ?>  
<div class="box box-border-color">
   <div class=" panel-heading">
      <h3 class="panel-title">
         <strong>Semester: </strong><?php printf("%s %s", $listStudents[0]['semesterName'], $listStudents[0]['semesterYear']); ?>
         <span class="pull-right"><strong>Course: </strong><?php printf("%s %s <strong>Section: </strong>%s", $listStudents[0]['courseCode'], $listStudents[0]['courseName'],$listStudents[0]['sectionID']); ?></span>
      </h3>
   </div>
      <form method="POST" enctype="multipart/form-data" class="ui form" style="font-size: 14px">
         
            
               
               <?php for($i=0;$i<count($listStudents);$i++){ ?>
               
               <!-- Per Student Section --> 
               <div class="box-body">
                  <div class="three fields">
                     
                     <div class="field">
                        <label>Student Name</label>
                        <input type="text" name="studentName" value="<?php printf("%s %s %s", $listStudents[$i]['studentGivenName'], $listStudents[$i]['studentMiddleName'], $listStudents[$i]['studentFamilyName']); ?>" disabled>
                     </div>

                     <div class="field">
                        <label>Student ID</label>
                        <input type="text" name="studentName" value="<?php printf("%d", $listStudents[$i]['studentID']); ?>" disabled>
                     </div>
                     
                     <div class="field">
                        <label>Grade</label>
                        <input type="text"  value="<?php printf("%s", $listStudents[$i]['gradeLetter']); ?>" disabled>
                           
                     </div>
                  
                  </div>
                  <div class="field">
                    
                        <label>Evaluation</label>
                        <textarea disabled class="form-control" style="resize: vertical;" name="tx<?php echo $listStudents[$i]['studentReviewID'];?>"><?php echo $listStudents[$i]['reviewText']; ?></textarea>
                     
                  </div>
               </div>
               <div class="ui divider"></div>
               <!-- Per Student Section End -->
               
               <?php } ?>
                     
   </form>
</div>

 <script src="../assets/semantics/semantic.js"></script>
<script type="text/javascript">
   $('select.dropdown').dropdown();
</script>
<?php include("footer.php"); ?>