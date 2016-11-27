<!--row-->
    <div class="row">
         <div class="col-lg-6">
            <div class="well">
               <form role="form" method="get" action="students_users_change.php">
                  <div class="input-group">
                     <input type="text" class="form-control" name="userID" placeholder="User ID">
                     <span class="input-group-btn">
                     <input class="btn btn-danger btn-flat" type="submit" value="Search!" />
                     </span>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php 
        if (isset($_GET['userID'])) {
          $userSearchID = $_GET['userID'];
          $theUser = getUserByID($userSearchID,'Student');
      ?>

    <form method="POST" action="">   
      <div class="row">
        <div class="col-lg-6">
         <div class="box box-border-color">
            <div class="box-header ">
               <h3 class="box-title">User Information</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                       <td class="bg-gray" style="width: 20%;">User ID</td>
                       <td><input class="form-control" type="text" name="uuID" value="<?php echo $theUser['userID']; ?>" disabled /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Username</td>
                       <td><input class="form-control" type="text" name="username" value="<?php echo $theUser['userName']; ?>"  /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Email</td>
                       <td><input class="form-control" type="text" name="useremail" value="<?php echo $theUser['userEmail']; ?>"  /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Password</td>
                       <td><input class="form-control" type="text" name="userpass" value="<?php echo $theUser['userPassword']; ?>"  /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Profile Type</td>
                       <td><input class="form-control" type="text" name="userprofile" value="<?php echo $theUser['profileType']; ?>" disabled /></td>
                     </tr>
                  </tbody>
                  <tfoot>
                    
                  </tfoot>
               </table>
                    <input class="btn btn-danger" style="width: 100%" type="submit" name="updateUser" value="Update" />
            </div>

            <!-- /.row -->
         </div>
         </div>

            <h4><?php echo $_SESSION['message']; $_SESSION['message']=null; ?></h4>


         </div>
         <!-- /.row -->
         
    
         </form>



      <?php 
        }   
      ?>

      <?php 

          if (isset($_POST['updateUser'])) {

            $uSearchID = $_POST['uuID'];
            $username = $_POST['username'];
            $email = $_POST['useremail'];
            $password = $_POST['userpass'];

            updateUserStudent($theUser['userID'],$username,$email, $password);




          }





       ?>



  <!--row-->
