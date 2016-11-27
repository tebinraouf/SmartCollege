<?php $activePage = 'students_users'; ?>
<?php include("header.php"); ?>
<?php
$user = getUsersStudents('Student', 'Student');
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
                  <i class="ion ion-person-stalker"></i> Users
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
         <div class="col-lg-12">
            <div class="box box-border-color">
               <div class="panel-heading">
                   <h3 class="panel-title"><i class="ion-person-stalker"></i>
                   All Users 
                   </h3>  
               </div>
               <div class="panel-body" >
                     <table class="table table-bordered table-striped" id="studentUsersTable">
                        <thead>
                           <tr>
                              <th>User ID</th>
                              <th>User Name</th>
                              <th>User Email</th>
                           </tr>
                        </thead>
                        <tbody >
                           <?php
                            
                                for ($i = 0; $i < count($user); $i++) {
                                    $result = "<tr>";
                                    $result .= "<td>" . $user[$i]['userID'] . "</td>";
                                    $result .= "<td>" . $user[$i]['userName'] . "</td>";
                                    $result .= "<td>" . $user[$i]['userEmail'] . "</td>";
                                    $result .= "</tr>";
                                    echo $result;
                                }
                            ?>
                        </tbody>
                     </table>
               </div>
            </div>
         </div>
      </div>

<script type="text/javascript">
  
  $(function () {
     $('#studentUsersTable').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": true,
       "autoWidth": false,
       "pageLength": 5,
       "lengthMenu": [[ 5, 10, 25, 50, 75, -1 ], [5, 10, 25, 50, 75, "All"]],
     });
   });
  
</script>
<?php
include("footer.php");
?>