<?php $activePage = 'users'; ?>
<?php include("header.php"); ?>
<?php
$userProfessor = getUsersStudents('Professor', 'Staff');
?>

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
                  <i class="ion-ios-people"></i> Users
               </li>
            </ol>
         </div>
      </div>
      
      <!-- /.row -->
      <?php include("blocks/all_change_new.php"); ?> 
      <!-- /.row -->
     

      <!-- /.row -->
      <!-- /.row -->
      <div class="row">
      <form method="POST">
         <div class="col-lg-12">
            <div class="box box-border-color">
               <div class="panel-heading">
                   <h3 class="panel-title"><i class="ion-ios-people"></i>
                   All Users 
                   </h3>  
               </div>
               <div class="panel-body" >
                     <table class="table table-bordered table-striped" id="allUsersTable">
                        <thead>
                           <tr>
                              <th>User ID</th>
                              <th>User Name</th>
                              <th>User Email</th>
                              <td>User Type</td>
                              <td>Delete</td>
                           </tr>
                        </thead>
                        <tbody >
                           <?php
                            
                                for ($i = 0; $i < count($userProfessor); $i++) {
                                    $result = "<tr>";
                                    $result .= "<td><a href='users_change.php?userID=".$userProfessor[$i]['userID']."'>" . $userProfessor[$i]['userID'] . "</a></td>";
                                    $result .= "<td>" . $userProfessor[$i]['userName'] . "</td>";
                                    $result .= "<td>" . $userProfessor[$i]['userEmail'] . "</td>";
                                    $result .= "<td>" . $userProfessor[$i]['profileType'] . "</td>";
                                    $result .= "<td><a href='users.php?usID=".$userProfessor[$i]['userID']."'><i class='ion-trash-a'></i></a></td>";



                                    $result .= "</tr>";
                                    echo $result;
                                }
                            ?>
                        </tbody>
                     </table>
               </div>
            </div>
         </div>
         </form>
      </div>


      <?php 

     

        if (isset($_GET['usID'])) {
          deleteUser($_GET['usID'], "users.php");
        }else{
          //redirect_to("index.php");
        }

       ?>

<?php
include("footer.php");
?>