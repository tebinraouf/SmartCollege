<!--row-->
    <div class="row">
         <div class="col-lg-6">
            <div class="well">
               <form role="form" method="get" action="students_change.php">
                  <div class="input-group">
                     <input type="text" class="form-control" name="sid" placeholder="Student ID">
                     <span class="input-group-btn">
                     <input class="btn btn-danger btn-flat" type="submit" value="Search" />
                     </span>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php 

        if (isset($_GET['sid'])) {

          $studentID = $_GET['sid'];
          $_SESSION['studentID'] = $studentID;
          $oneStudent = getOneStudent($studentID);
          //print_r($oneStudent);
          include("s_header_change.php");
          include("s_personal_change.php");

        }
         
      ?>  
  <!--row-->
