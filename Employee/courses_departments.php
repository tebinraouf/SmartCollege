<?php $activePage = 'courses'; ?>
<?php include("header.php"); ?>
<?php $department = getDepartments();?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Academics
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-document-text"></i> <a href="courses.php">Academics</a>
               </li>
               <li>
                  <i class="ion ion-clipboard"></i> Departments
               </li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <?php include("blocks/courses_sections.php"); ?> 
      <!-- /.row -->
      <div class="row">
         <div class="col-lg-12">
            <div class="box box-border-color" data-toggle="modal" data-target="#minorsMajors">
               <div class="box-header">
                  <h3 class="box-title">All Departments</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body no-padding">
                  <table class="table table-striped" >
                     <tr>
                        <th style="width: 10px">ID</th>
                        <th>Department</th>
                        <th>Major #</th>
                        <th>Minor #</th>
                     </tr>
                     <?php 
                        $departMajor = getDepartmentsMajor();
                        $departMinor = getDepartmentsMinor();
                        
                          for ($i=0; $i < count($departMajor); $i++) { 
                            $l = '<tr>';
                            $l .= '<td>' . $departMajor[$i]['departmentID'] . '</td>';  
                            $l .= '<td>' . $departMajor[$i]['departmentName'] . '</td>';
                            $l .= '<td> <span class="badge bg-red">' . $departMajor[$i]['count(ma.departmentID)'] . '</span></td>';
                            $l .= '<td> <span class="badge bg-red">' . $departMinor[$i]['count(mi.departmentID)'] . '</span></td>';
                            $l .= '</tr>';
                        
                        
                          echo $l;
                          }
                         ?>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
      </div>
      <div class="modal fade" id="minorsMajors" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Majors and Minors by Department</h4>
               </div>
               <div class="modal-body">
                  <?php for ($k=0; $k < count($department); $k++) { 
                     ?>
                  <div class="box box-border-color">
                     <div class="box-header">
                        <h3 class="box-title"><?php echo $department[$k]['departmentName']; ?></h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body no-padding">
                        <table class="table table-striped">
                           <tr>
                              <th>Major</th>
                              <th>Minor</th>
                           </tr>
                           <?php 
                              $dmajors = getDepartmentsNameMajors($department[$k]['departmentName']);
                              $dminors = getDepartmentsNameMinors($department[$k]['departmentName']);
                              
                               //print_r($depart);
                              $maxMajorMinorCounter;
                              
                              if (count($dmajors) > count($dminors)) {
                                $maxMajorMinorCounter = count($dmajors);
                              }else{
                                $maxMajorMinorCounter = count($dminors);
                              } 
                              
                                for ($j=0; $j < $maxMajorMinorCounter; $j++) { 
                                  $ll = '<tr>';
                                  $ll .= '<td>' . $dmajors[$j]['majorName'] . '</td>';
                                  $ll .= '<td>' . $dminors[$j]['minorName'] . '</td>';  
                                  $ll .= '</tr>';
                            
                              
                                echo $ll;
                                }
                               ?>
                        </table>
                     </div>
                  </div>
                  <?php } ?>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <form method="POST">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Update Departments</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <td style="width: 90%;">
                              <select class="form-control" name="departmentName">
                              <?php
                                 for ($x = 0; $x < count($department); $x++) {
                                     $value = "<option>" . $department[$x]['departmentName'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                              </select>
                           </td>
                           <td <?php if(isset($_POST['getChangeDepart'])) echo 'colspan=2';  ?> >
                              <input style="width: 100%" class="btn btn-danger" type="submit" name="getChangeDepart" value="Get" />
                              <p>
                                 <?php echo $_SESSION['messageUpdate']; $_SESSION['messageUpdate']=null; ?>
                                 <?php echo $_SESSION['messageDelete']; $_SESSION['messageDelete']=null; ?>
                              </p>
                           </td>
                        </tr>
                        <?php 
                           if (isset($_POST['getChangeDepart'])) { ?>
                        <tr>
                           <td><input class="form-control" type="text" name="getDepartmentName" value="<?php echo $_POST['departmentName']; ?>" /></td>
                           <td><input class="btn btn-danger" type="submit" name="updateDepartmentName" value="Change" /></td>
                           <td><input class="btn btn-danger" type="submit" name="deleteDepartment" value="Delete" /></td>
                        </tr>
                        <?php 
                           $deID = getDepartmentID($_POST['departmentName']);
                           $_SESSION['dID'] = $deID['departmentID'];
                           
                           } ?> 
                        <?php 
                           if (isset($_POST['updateDepartmentName'])) {
                             updateDepartmentIDByName($_SESSION['dID'], $_POST['getDepartmentName']);
                           }
                           if (isset($_POST['deleteDepartment'])) {
                             deleteDepartment($_SESSION['dID']);
                           }
                           
                           
                           ?>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
         <div class="col-lg-6">
            <form method="POST">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Create Departments</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <td style="width: 90%;"><input class="form-control" type="text" name="addDepartName" placeholder="Department name" /></td>
                           <td>
                              <input class="btn btn-danger" type="submit" name="addDepartment" value="Create" />
                              <p><?php echo $_SESSION['messageInsert']; $_SESSION['messageInsert']=null; ?></p>
                           </td>
                        </tr>
                     </table>
                     <?php 
                        if (isset($_POST['addDepartment'])) {
                          insertDepartment($_POST['addDepartName']);
                        }
                        
                        ?>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <form method="POST">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Update Majors</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <td style="width: 90%;">
                              <select class="form-control" name="majorNameWithDepartment">
                              <?php
                                 $allDepartmentMajor = getAllDepartmentsMajor();
                                 for ($x = 0; $x < count($allDepartmentMajor); $x++) {
                                     $value = "<option value= '";
                                     $value .= $allDepartmentMajor[$x]['majorName'] . "'";
                                     if(isset($_POST['getChangeMajor']) && $_POST['majorNameWithDepartment'] == $allDepartmentMajor[$x]['majorName'] ){
                                      $value .= " selected ";
                                     }
                                     $value .= " >";
                                     $value .= $allDepartmentMajor[$x]['departmentName'] . " ";
                                     $value .= $allDepartmentMajor[$x]['majorName'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                              </select>
                           </td>
                           <td <?php if(isset($_POST['getChangeMajor'])) echo 'colspan=2';  ?> >
                              <input style="width: 100%" class="btn btn-danger" type="submit" name="getChangeMajor" value="Get" />
                              <p>
                                 <?php echo $_SESSION['messageMajorUpdate']; $_SESSION['messageMajorUpdate']=null; ?>
                                 <?php echo $_SESSION['messageMajorDelete']; $_SESSION['messageMajorDelete']=null; ?>
                              </p>
                           </td>
                        </tr>
                        <?php if (isset($_POST['getChangeMajor'])) { ?>
                        <?php 


                          $majorIDFromName = getMajorID($_POST['majorNameWithDepartment']);
                          $majorDepartmentID = getMajorDepartmentID($_POST['majorNameWithDepartment']);


                        ?>

                        <tr>
                           <td><input class="form-control" type="text" name="getMajorName" value="<?php echo $_POST['majorNameWithDepartment']; ?>" /></td>
                           <td><input class="btn btn-danger" type="submit" name="updateMajorName" value="Change" /></td>
                           <td><input class="btn btn-danger" type="submit" name="deleteMajor" value="Delete" /></td>
                        </tr>
                        <?php 
                           $_SESSION['idMajorSession'] = $majorIDFromName['majorID'];
                           $_SESSION['idDepartmentSessionMajor'] = $majorDepartmentID['departmentID'];
                           
                           } ?> 
                        <?php 
                           if (isset($_POST['updateMajorName'])) {
                             updateMajor($_POST['getMajorName'], $_SESSION['idDepartmentSessionMajor'], $_SESSION['idMajorSession']);
                           }
                           if (isset($_POST['deleteMajor'])) {
                             deleteMajor($_SESSION['idMajorSession']);
                           }
                           
                           
                           ?>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
         <div class="col-lg-6">
            <form method="POST">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Majors/Minors</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <td>
                              <select class="form-control" name="selectMajorMinorDepart">
                              <?php
                                 for ($x = 0; $x < count($department); $x++) {
                                     $value = "<option value=' ";
                                     $value .= $department[$x]['departmentID']. "' >" . $department[$x]['departmentName'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                              </select>
                           </td>
                           <td>
                              <select class="form-control" name="selectMajorMinor">
                                 <option value="major">Major</option>
                                 <option value="minor">Minor</option>
                                 <option value="both">Both</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><input class="form-control" type="text" name="addMajorMinorName" placeholder="Major or Minor name" /></td>
                           <td>
                              <input style="width: 100%" class="btn btn-danger" type="submit" name="addMajorMinor" value="Create" />
                              <p><?php echo $_SESSION['messageInsertMinorMajor']; $_SESSION['messageInsertMinorMajor']=null; ?></p>
                           </td>
                        </tr>
                     </table>
                     <?php 
                        if (isset($_POST['addMajorMinor'])) {
                        
                          if ($_POST['selectMajorMinor']=='major') {
                            insertMajor($_POST['addMajorMinorName'],$_POST['selectMajorMinorDepart']);
                          }
                        
                          if ($_POST['selectMajorMinor']=='minor') {
                            insertMinor($_POST['addMajorMinorName'],$_POST['selectMajorMinorDepart']);
                          }
                        
                          if ($_POST['selectMajorMinor']=='both') {
                            insertMajorMinor($_POST['addMajorMinorName'],$_POST['addMajorMinorName'],$_POST['selectMajorMinorDepart']);
                        
                          }
                        
                          
                        }
                        
                        ?>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
            <form method="POST">
               <div class="box box-border-color">
                  <div class="box-header">
                     <h3 class="box-title">Update Minors</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                     <table class="table table-striped">
                        <tr>
                           <td style="width: 90%;">
                              <select class="form-control" name="minorNameWithDepartment">
                              <?php
                                 $allDepartmentMinor = getAllDepartmentsMinor();
                                 for ($x = 0; $x < count($allDepartmentMinor); $x++) {
                                     $value = "<option value= '";
                                     $value .= $allDepartmentMinor[$x]['minorName'] . "'";
                                     if(isset($_POST['getChangeMinor']) && $_POST['minorNameWithDepartment'] == $allDepartmentMinor[$x]['minorName'] ){
                                      $value .= " selected ";
                                     }
                                     $value .= " >";
                                     $value .= $allDepartmentMinor[$x]['departmentName'] . " ";
                                     $value .= $allDepartmentMinor[$x]['minorName'] . "</option>";
                                     echo $value;
                                 }
                                 ?> 
                              </select>
                           </td>
                           <td <?php if(isset($_POST['getChangeMinor'])) echo 'colspan=2';  ?> >
                              <input style="width: 100%" class="btn btn-danger" type="submit" name="getChangeMinor" value="Get" />
                              <p>
                                 <?php echo $_SESSION['messageMinorUpdate']; $_SESSION['messageMinorUpdate']=null; ?>
                                 <?php echo $_SESSION['messageMinorDelete']; $_SESSION['messageMinorDelete']=null; ?>
                              </p>
                           </td>
                        </tr>
                        <?php if (isset($_POST['getChangeMinor'])) { ?>
                        <?php 


                          $minorIDFromName = getMinorID($_POST['minorNameWithDepartment']);
                          $minorDepartmentID = getMinorDepartmentID($_POST['minorNameWithDepartment']);


                        ?>

                        <tr>
                           <td><input class="form-control" type="text" name="getMinorName" value="<?php echo $_POST['minorNameWithDepartment']; ?>" /></td>
                           <td><input class="btn btn-danger" type="submit" name="updateMinorName" value="Change" /></td>
                           <td><input class="btn btn-danger" type="submit" name="deleteMinor" value="Delete" /></td>
                        </tr>
                        <?php 
                           $_SESSION['idMinorSession'] = $minorIDFromName['minorID'];
                           $_SESSION['idDepartmentSessionMinor'] = $minorDepartmentID['departmentID'];
                           
                           } ?> 
                        <?php 
                           if (isset($_POST['updateMinorName'])) {
                             updateMinor($_POST['getMinorName'], $_SESSION['idDepartmentSessionMinor'], $_SESSION['idMinorSession']);
                           }
                           if (isset($_POST['deleteMinor'])) {
                             deleteMinor($_SESSION['idMinorSession']);
                           }
                           
                           
                           ?>
                     </table>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </form>
         </div>
      </div>
      <!-- /.row -->

<?php
   include("footer.php");
   ?>