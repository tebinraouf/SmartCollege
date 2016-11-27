<?php $activePage = 'academics'; ?>
<?php include("header.php"); ?>
<?php 
   
   if (isset($_GET['c']) && isset($_GET['s'])) {
     $listStudents = getStudentsByCourseID($_GET['c'], $_GET['s']);

   }
   

   

   ?>
   <!-- <pre><?php print_r($listStudents); ?></pre> -->
<!-- Page Heading -->
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
         <li class="active">
            <i class="ion-document"></i> <?php printf("%s %s",$listStudents[0]['courseCode'],$listStudents[0]['courseName'])  ?>
         </li>
      </ol>
   </div>
</div>
<!-- /.row -->
<?php include("blocks/academic_sections.php"); ?>  
<!-- /.row -->    

      <div class="row">
         <div class="col-lg-12">
            <form method="GET">
               <div class="box box-border-color">
               <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-book"></i> <?php echo $listStudents[0]['courseName']; ?> <span class="pull-right"><?php echo $listStudents[0]['courseCode']; ?></span></h3>
               </div>
                  <div class="box-body">
                     <table id="studentListTable" class="table table-bordered table-striped table-responsive">
                     <thead>
                        <tr>
                           <th>Student ID</th>
                           <th>Name</th>
                           <th>Grade</th>
                           
                        </tr>
                    </thead>
                        <?php                            
                             for ($i=0; $i < count($listStudents); $i++) {
                              
                               $l = '<tr>';
                               $l .= '<td><a href="students_search.php?sid='.$listStudents[$i]['studentID'].'">' . $listStudents[$i]['studentID'] . '</a></td>';  
                               $l .= '<td><a href="students_search.php?sid='.$listStudents[$i]['studentID'].'">' . $listStudents[$i]['studentGivenName'] ." ". $listStudents[$i]['studentMiddleName'] ." ". $listStudents[$i]['studentFamilyName'] . '</a></td>';
                               $l .= '<td>'.$listStudents[$i]['gradeLetter'].'</td>';
                               $l .= '</tr>';                           
                             echo $l;
                             }
                           ?>
                     </table>
                  </div>
               </div>
            </form>
         </div>
      </div>

      

<?php include("footer.php"); ?>