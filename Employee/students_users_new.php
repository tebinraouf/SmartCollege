<?php $activePage = 'students_users'; ?>
<?php include("header.php"); ?>


      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Users
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-person-stalker"></i> <a href="students_users.php">Users</a> 
               </li>
               <li class="active">
                  <i class="ion ion-person-add"></i> Change User Details
               </li>
            </ol>
         </div>
      </div>
      
      <!-- /.row -->
      <?php include("blocks/all_change_new.php"); ?> 
      <!-- /.row -->
         <form method="POST" action="">   
      <div class="row">
        <div class="col-lg-6">
         <div class="box box-border-color">
            <div class="box-header ">
               <h3 class="box-title">Create New User Type of Student</h3>
            </div>
            <!-- /.box-header -->              
            <div class="box-body table-responsive no-padding">
               <table class="table">
                  <tbody>
                     <tr>
                       <td class="bg-gray" style="width: 20%;">Username</td>
                       <td><input class="form-control" type="text" name="uName" /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Email</td>
                       <td><input class="form-control" type="text" name="uEmail" /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Password</td>
                       <td><input class="form-control" type="text" name="uPass" /></td>
                     </tr>
                     <tr>
                       <td class="bg-gray">Profile Type</td>
                       <td><input class="form-control" type="text" name="uType" value="Student" disabled /></td>
                     </tr>
                  </tbody>
                  <tfoot>
                    
                  </tfoot>
               </table>
                    <input class="btn btn-danger" style="width: 100%" type="submit" name="createU" value="Create" />
            </div>

            <!-- /.row -->
         </div>
         </div>

            <h4><?php echo $_SESSION['message']; $_SESSION['message']=null; ?></h4>


         </div>
         <!-- /.row -->
         
    
         </form>

      <!-- /.row -->
      <!-- /.row -->

      <?php 

            if (isset($_POST['createU'])) {
               
               $username = $_POST['uName'];
               $userEmail = $_POST['uEmail'];
               $userPass = $_POST['uPass'];

               createUser($username,$userPass, $userEmail, 1, "students_users_new.php");


            }


       ?>
      
          

<?php
include("footer.php");
?>