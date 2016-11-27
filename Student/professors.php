<?php $activePage = 'professors'; ?>
<?php include("header.php"); ?>
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Professors
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
                  <div class="box-body">
                     <table id="proTable" class="table table-bordered table-striped table-responsive">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Extension</th>
                        </tr>
                    </thead>
                        <?php 
                           $professors = getProfessorsDetailsByDepartment($oneStudent['departmentID']);
                           
                             for ($i=0; $i < count($professors); $i++) { 
                               $l = '<tr>';
                               $l .= sprintf("<td><a href='professor_info.php?i=%d'>%s %s %s</a></td>",$professors[$i]['professorID'],$professors[$i]['professorGivenName'],$professors[$i]['professorMiddleName'],$professors[$i]['professorFamilyName']);
                               $l .= '<td>' . $professors[$i]['professorEmail'] . '</td>';  
                               $l .= '<td>' . $professors[$i]['professorOffice'] . '</td>';
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
      <!-- /.row -->
      <div class="row">
         <div class="col-lg-12">
            <!-- USERS LIST -->
            <div class="box box-border-color">
               <div class="box-header with-border">
                  <h3 class="box-title">Recent Professors</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <ul class="users-list clearfix">
                     
                  <?php 

                    $newProData = getProfessorsXNumber(12);
                    //print_r($newProData);

                    for ($i=0; $i < count($newProData); $i++) {
                        $ll =  '<li>';
                        $ll .= '<img src="'.$newProData[$i]['professorProfileImage'].'" class="mycircle " alt="'.$newProData[$i]['professorGivenName'].'">';
                        if ($oneStudent['departmentID']==$newProData[$i]['departmentID']) {
                          $ll .= '<a class="users-list-name" href="professor_info.php?i='.$newProData[$i]['professorID'].'">'.$newProData[$i]['professorGivenName'].'</a>';
                        }else{
                          $ll .= '<a class="users-list-name">'.$newProData[$i]['professorGivenName'].'</a>';
                        }
                        $ll .= '<span class="users-list-date">'.$newProData[$i]['professorJoinDay'].'</span>';

                        $ll .= '<span class="users-list-date">'.$newProData[$i]['departmentName'].'</span>';
                            
                        $ll .= '</li>';

                        echo $ll;
                }

                ?>
                     
                  </ul>
                  <!-- /.users-list -->
               </div>
               <!-- /.box-body -->
               
               <!-- /.box-footer -->
            </div>
            <!--/.box -->
         </div>
         <!-- /.col -->
      </div>

      


<?php include("footer.php"); ?>