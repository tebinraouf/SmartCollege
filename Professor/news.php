<?php $activePage = 'news'; ?>
<?php include("header.php"); ?>
<?php $myarray = getNews(); ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            News
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="ion-planet"></i> News
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="jumbotron">
         <h1>Latest News</h1>
         <h4><i><?php echo $myarray[0]['newsValidity']; ?></i></h4>
         <p><?php echo $myarray[0]['newsContent']; ?></p>
      </div>

 
                    
                
                <!-- /.row -->
                <div class="row">
            <div class="col-xs-12">
              <div class="box box-border-color">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="ion-planet"></i> All News</h3>
               </div>
                <div class="box-body">
                  <table id="newsTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                              <th>All Messages</th>
                              <!-- <th>Title</th>
                              <th>Content</th> -->

                           </tr>
                    </thead>
                    <tbody>
                      
                      <?php 
                                for ($x = 1; $x <= count($myarray)-1; $x++) {
                               $element = "<tr><td>";
                               
                               $element .= "<div class='col-xs-12'><span class='bg-olive newsTitle'><strong>Title:</strong> " . $myarray[$x]['newsTitle'] . "</span>";
                               $element .= "<span class='bg-olive validityPlace'><strong>Validity:</strong>" . $myarray[$x]['newsValidity'] . "</span> ";
                               
                               $element .= "</br><div class='col-xs-12'><span class='newsContent'" . $myarray[$x]['newsContent']  ."</span></div>";
                               $element .= "</br></td></tr>";
                               echo $element;
                           }                
                            ?>
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
                <!-- /.row -->

<?php include("footer.php"); ?>