<?php $activePage = 'professors'; ?>
<?php include("header.php"); ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Faculty
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-ios-book-outline"></i> Faculty
               </li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <form method="GET">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">All Faculties </h3>
                     
                  </div>
                  <!-- /.box-header -->
                 
                  <div class="box-body no-padding">
                     <table class="table table-bordered table-striped" id="allProfessorsTable">
                        <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <th>Department</th>
                        </tr>
                        </thead>
                       <tbody>
                        <?php 
                           $professors = getProfessorsDetails();
                           
                             for ($i=0; $i < count($professors); $i++) { 
                               $l = '<tr>';
                               $l .= sprintf("<td><a href='professor_info.php?i=%d'>%s %s %s</a></td>",$professors[$i]['professorID'],$professors[$i]['professorGivenName'],$professors[$i]['professorMiddleName'],$professors[$i]['professorFamilyName']);
                               $l .= '<td>' . $professors[$i]['professorEmail'] . '</td>';  
                               $l .= '<td>' . $professors[$i]['professorPhone'] . '</td>';
                               $l .= '<td>' . $professors[$i]['departmentName'] . '</td>';
                               $l .= '</tr>';
                           
                           
                             echo $l;
                             }
                           
                           ?>
                           </tbody>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
      </div>
      <!-- /.row -->
      <div class="row">
         <div class="col-lg-12">
            <!-- USERS LIST -->
            <div class="box box-border-color">
               <div class="box-header with-border">
                  <h3 class="box-title">Recent Faculties</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                     
                  <?php 

                    $newProData = getProfessorsXNumber(8);


                    for ($i=0; $i < count($newProData); $i++) {
                        $ll =  '<li>';
                        $ll .= '<img src="'.$newProData[$i]['professorProfileImage'].'" class="mycircle " alt="'.$newProData[$i]['professorGivenName'].'">';
                        $ll .= '<a class="users-list-name" href="professor_info.php?i='.$newProData[$i]['professorID'].'">'.$newProData[$i]['professorGivenName'].'</a>';
                        $ll .= '<span class="users-list-date">'.$newProData[$i]['professorJoinDay'].'</span>';
                            
                        $ll .= '</li>';

                        echo $ll;
                }

                ?>
                     
                  </ul>
                  <!-- /.users-list -->
               </div>
               <!-- /.box-body -->
               <div class="box-footer text-center" data-toggle="modal" data-target="#minorsMajors">
                  <a  class="uppercase">View All Users</a>
               </div>
               <!-- /.box-footer -->
            </div>
            <!--/.box -->
         </div>
         <!-- /.col -->
      </div>

      <div class="row">
          
        <div class="modal fade" id="minorsMajors" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header box box-danger">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">All Professors</h4>
               </div>
               <div class="modal-body">
                  





                 <ul class="users-list clearfix">
                     
                  <?php 

                    $newProData = getProfessorsDetails();


                    for ($i=0; $i < count($newProData); $i++) {
                        $ll =  '<li>';
                        $ll .= '<img src="'.$newProData[$i]['professorProfileImage'].'" class="mycircle " alt="'.$newProData[$i]['professorGivenName'].'">';
                        $ll .= '<a class="users-list-name" href="professor_info.php?i='.$newProData[$i]['professorID'].'">'.$newProData[$i]['professorGivenName'].'</a>';
                        $ll .= '<span class="users-list-date">'.$newProData[$i]['professorJoinDay'].'</span>';
                            
                        $ll .= '</li>';

                        echo $ll;
                }

                ?>
                     
                  </ul>







               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

      </div>


<script type="text/javascript">
   
   

   $(function () {
     $('#allProfessorsTable').DataTable({
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
<?php include("footer.php"); ?>