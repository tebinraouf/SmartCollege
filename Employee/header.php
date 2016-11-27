<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../DB/db.php"); ?>
<?php include("../DB/functions.php"); ?>
<?php include("../DB/messages.php"); ?>

<?php 
    //$_SESSION['userID'] = null;
    if ($_SESSION['userID']==null) {
        redirect_to("../Login/index.php");
    }
    $employee = getOneEmployeeID($_SESSION['userID']);

?>

    <?php include("../assets/blocks/header_block.php"); ?>

     <title>Employee | Smart College</title>
    
    


    <style type="text/css">

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
              background-color: #3d9970;
              border-color: #3d9970;
              padding: 1px 10px;
              color: #fff;
            }

    </style>


</head>

<body >

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php printf("%s", $employee['employeeJobTitle']) ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav"> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-person"></i> <?php printf("%s %s", $employee['employeeGivenName'], $employee['employeeFamilyName']) ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="ion-person"></i> Profile</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="ion-power"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        
                            <img src="<?php printf("%s", $employee['employeeProfilePic']) ?>" class="profile-user-img img-responsive img-circle">
                            <h4 class="text-center quoteDisplay"><?php printf("%s", $employee['employeeQuote']) ?></h4>
                        
                    </li>


                    


                    <li <?php if ($activePage=='index') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="index.php"><i class="ion ion-ios-speedometer"></i> Dashboard</a>
                    </li>
                    <li <?php if ($activePage=='news') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="all_news.php"><i class="ion ion-planet"></i> News</a>
                    </li>
                    <li <?php if ($activePage=='students') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="students.php"><i class="ion ion-university"></i> Students</a>
                    </li>
                    <li <?php if ($activePage=='professors') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="professors.php"><i class="ion ion-ios-book-outline"></i> Faculty</a>
                    </li>
                    <li <?php if ($activePage=='courses') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="courses_departments.php"><i class="ion ion-document-text"></i> Academics</a>
                    </li>
                    <li <?php if ($activePage=='reports') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="reports.php"><i class="ion ion-stats-bars"></i> Reports</a>
                    </li>
                    <li <?php if ($activePage=='students_users') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="students_users.php"><i class="ion ion-person-stalker"></i> Users</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">