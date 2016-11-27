<?php 
   $studentID = $_SESSION['studentID'];
   $oneStudent = getOneStudent($studentID);
   

 ?>

      <div class="row">
         <div class="col-lg-12">
            <!-- Widget: user widget style 1 -->
            <div class="box widget-user box-border-color">
               <!-- Add the bg color to the header using any of the bg-* classes -->
               <div class="widget-user-header">
                  <h3 class="widget-user-username">
                     <?php 
                     echo $oneStudent['studentGivenName'] . " "; 
                     echo $oneStudent['studentMiddleName'] . " "; 
                     echo $oneStudent['studentFamilyName'] . " ";
                     ?>
                  </h3>
                  <h5 class="widget-user-desc"><?php echo $oneStudent['departmentName']; ?></h5>
               </div>
               <div class="widget-user-image">
                  <img class="img-circle" src="http://placehold.it/150x150" alt="User Avatar">
               </div>
               <div class="box-footer">
                  <div class="row">
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="students_change.php?sid=<?php echo $studentID; ?>" class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-user"></span> Personal</a></h5>
                        </div>
                        <!-- /.description-block -->
                     </div>
                     <!-- /.col -->
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="students_change_academic.php?sid=<?php echo $studentID; ?>" class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-education"></span> Academic</a></h5>
                        </div>
                        <!-- /.description-block -->
                     </div>
                     <!-- /.col -->
                     <!-- /.col -->
                     <div class="col-lg-4 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="students_change_course.php?sid=<?php echo $studentID; ?>" class="btn btn-block btn-danger btn-flat"><span class="ion ion-ribbon-b"></span> Course</a></h5>
                        </div>
                        <!-- /.description-block -->
                     </div>
                     <!-- /.col -->
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="#"class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-usd"></span> Finance</a></h5>
                        </div>
                        <!-- /.description-block -->
                     </div>
                     <!-- /.col -->
                     <!-- /.col -->
                     <div class="col-lg-2">
                        <div class="description-block">
                           <h5 class="description-header"><a href="#"class="btn btn-block btn-danger btn-flat"><span class="ion ion-document-text"></span> Documents</a></h5>
                        </div>
                        <!-- /.description-block -->
                     </div>
                     <!-- /.col -->          
                  </div>
                  <!-- /.row -->
               </div>
            </div>
            <!-- /.widget-user -->
         </div>
         <!-- /.col -->
      </div>      
      <!-- /.row -->

