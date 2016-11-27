<!--row-->
    <div class="row">
         <div class="col-lg-6">
            <div class="well">
               <form role="form" method="get" action="students_search.php">
                  <div class="input-group">
                     <input type="text" class="form-control" name="studentID" placeholder="Student ID">
                     <span class="input-group-btn">
                     <input class="btn btn-danger btn-flat" type="submit" name="search" value="Search!" />
                     </span>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php 

        if (isset($_GET['search'])) {

          $studentID = $_GET['studentID'];
          $_SESSION['studentID'] = $studentID;
          $oneStudent = getOneStudent($studentID);
          //print_r($oneStudent);
          include("s_header.php");
          include("s_personal.php");

        }
         
      ?>  
  <!--row-->
