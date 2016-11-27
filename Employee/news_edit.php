<?php $activePage = 'news'; ?>
<?php include("header.php"); ?>
      <?php
         if (isset($_GET['nid'])) {
            $news = getNewsByID($_GET['nid']);
         }


         ?>

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               News
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="ion ion-ios-speedometer"></i>  <a href="index.php">Dashboard</a>
               </li>
               <li class="active">
                  <i class="ion ion-planet"></i> <a href="all_news.php">News</a>
               </li>
               <li>
                  <i class="ion ion-edit"></i> <?php echo $news['newsTitle']; ?>
               </li>
            </ol>
         </div>
      </div>

       <!-- /.row -->




      <!-- /.row -->
      <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-danger ">
               <div class="panel-heading bg-red">
                  <h3 class="panel-title"><i class="fa fa-book"></i> Send a post to all students 
                     <?php updateMessageWhite('newsUpdate', 'newsUpdateFail'); ?>
                  </h3>
               </div>
               <div class="panel-body">
                  <form role="form"  method="POST">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Title</label>
                           <input type="text" class="form-control" name="title" value="<?php echo $news['newsTitle']; ?>"><br>
                           <label>Message</label>
                           <textarea id="mytextarea" name="content" rows="10" cols="80"><?php echo $news['newsContent']; ?></textarea>
                           <br>
                           <div class="form-group">
                              <label>Message Validity Date</label>
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                 </div>
                                 <input type="text" class="form-control pull-right" id="reservationtime" name="date" value="<?php echo $news['newsValidity']; ?>">
                              </div>
                              <!-- /.input group -->
                           </div>
                           <!-- /.form group -->
                           <input type="submit" class="btn btn-danger btn-flat" name="btnSend" value="Save" />
                           <input type="submit" class="btn btn-danger btn-flat" name="btnDelete" value="Delete" />
                        </div>
                     </div>
                  </form>
               </div>

            </div>
         </div>
      </div>


<?php 

if (isset($_POST['btnSend'])) {
               updateNews(escape_string($_GET['nid']), escape_string($_POST['title']),escape_string($_POST['content']),escape_string($_POST['date']), escape_string($employee['employeeID']));    
}
if (isset($_POST['btnDelete'])) {
   deleteNews(escape_string($_GET['nid']),escape_string($employee['employeeID']));
}

 ?>


      



<?php include("footer.php"); ?>