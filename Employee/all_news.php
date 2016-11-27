<?php  $activePage = 'news'; ?>
<?php  include("header.php"); ?>
<?php

  if (isset($_POST['send'])) {
    $t = escape_string($_POST['title']);
    $c = escape_string($_POST['content']);
    $date = escape_string($_POST['date']);
    $eID = $employee['employeeID'];
    setNews($t, $c, $date,$eID);
  }

  $myarray = getNews();
  ?>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      News
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="ion ion-ios-speedometer">
        </i>
        <a href="index.php">Dashboard
        </a>
      </li>
      <li class="active">
        <i class="ion ion-planet">
        </i> News
      </li>
    </ol>
  </div>
</div>
<div class="jumbotron">
  <h1>Latest News
  </h1>
  <h4>
    <i>
      <?php  echo $myarray[0]['newsValidity']; ?>
    </i>
  </h4>
  <p>
    <?php  echo $myarray[0]['newsContent']; ?>
  </p>
  <p>
    <?php

  if($myarray[0]['employeeID']==$employee['employeeID']){
    echo '<a class="btn btn-danger btn-flat" href="news_edit.php?nid='.$myarray[0]['newsID'].'" >Edit</a>';
  } else {
    echo '<a class="btn-danger btn-flat unableToEdit">Unable to edit</a>';
  }

  ?>
  </p>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="box box-border-color">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="ion-planet">
          </i> All News
          <?php  updateMessageWhite('newsMessage', 'newsMessageFail'); ?>
          <?php  updateMessageWhite('newsDelete', 'newsDeleteFail'); ?>
        </h3>
      </div>
      <div class="box-body">
        <table id="newsTable" class="table table-bordered table-striped textTableAlign">
          <thead>
            <tr>
              <th style="width: 100%">Message Validity Date
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
  for ($x = 1; $x <= count($myarray)-1; $x++) {
    $element = "<tr class='panel panel-danger'><td>";
    $element .= "<div class='col-xs-12'><span class='bg-olive newsTitle'><strong>Title:</strong> " . $myarray[$x]['newsTitle'] . "</span>";
    $element .= "<span class='bg-olive newsAuthor'><strong>Post by:</strong> " . getOneEmployeeByID($myarray[$x]['employeeID'])['employeeGivenName'] ." ". getOneEmployeeByID($myarray[$x]['employeeID'])['employeeMiddleName'] ."</span>";
    $element .= "<span class='bg-olive validityPlace'><strong>Validity:</strong>" . $myarray[$x]['newsValidity'] . "</span> ";

    if($myarray[$x]['employeeID']==$employee['employeeID']){
      $element .= '<a href="news_edit.php?nid='.$myarray[$x]['newsID'].'" > <span class="bg-olive btn-flat btn-Edit-Valid">Edit</span></a></div></br>';
    } else {
      $element .= '<span class="bg-olive btn-flat btn-Edit-Valid">Unable</span></div></br>';
    }

    $element .= "</br><div class='col-xs-12'><span class='newsContent'" . $myarray[$x]['newsContent']  ."</span></div>";
    $element .= "</br></td></tr>";
    echo $element;
  }

  ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="box box-border-color">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="ion-arrow-up-c">
          </i> Send a post to all students
        </h3>
      </div>
      <div class="panel-body">
        <form  method="POST" action="all_news.php">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Title
              </label>
              <input type="text" class="form-control" name="title">
              <br>
              <label>Message
              </label>
              <textarea id="mytextarea" name="content" rows="10" cols="80">
              </textarea>
              <br>
              <div class="form-group">
                <label>Message Validity Date
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o">
                    </i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservationtime" name="date">
                </div>
              </div>
              <input type="submit" class="btn btn-danger btn-flat" name="send" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
    $('#newsTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "pageLength": 3,
      "lengthMenu": [[ 3, 10, 25, 50, 75, -1 ], [3, 10, 25, 50, 75, "All"]],
    }
                             );
  }
   );
</script>
<?php  include("footer.php"); ?>
