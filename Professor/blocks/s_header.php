<?php 
   $studentID = $_SESSION['studentID'];
   $oneStudent = getOneStudent($studentID);
   

 ?>
      <div class="row">
         <div class="col-lg-12">
            <div class="box box-border-color widget-user">
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
                           <h5 class="description-header"><a href="students_search.php?sid=<?php echo $studentID; ?>" class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-user"></span> Personal</a></h5>
                        </div>
                     </div>
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="students_search_academic.php?sid=<?php echo $studentID; ?>" class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-education"></span> Academic</a></h5>
                        </div>
                     </div>
                     <!-- /.col -->
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="students_search_performance.php?sid=<?php echo $studentID; ?>"class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-sunglasses"></span> Performance</a></h5>
                        </div>
                     </div>
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="#"class="btn btn-block btn-danger btn-flat"><span class="glyphicon glyphicon-calendar"></span> Attendance</a></h5>
                        </div>
                     </div>
                     <div class="col-lg-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header"><a href="#"class="btn btn-block btn-danger btn-flat"><span class="ion ion-social-usd"></span> Finance</a></h5>
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="description-block">
                           <h5 class="description-header"><a href="#"class="btn btn-block btn-danger btn-flat"><span class="ion ion-document-text"></span> Documents</a></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>      

