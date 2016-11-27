<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../DB/db.php"); ?>
<?php include("../DB/functions.php"); ?>
<?php if ($_SESSION['userID']==null) {
        redirect_to("../Login/index.php");
    }
    ?>
<?php 

   $s = getStudentIDBYUserID($_SESSION['userID']);
   $_SESSION['studentID'] = $s['studentID'];

   $oneStudent = getOneStudent($s['studentID']);
?>



    <?php include("../assets/blocks/header_block.php"); ?>

        <title><?php echo $oneStudent['studentGivenName'] ?> | Smart College</title>

    

</head>

<body>

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
                <a class="navbar-brand" href="index.php"><?php echo "Student since ".$oneStudent['studentStartingYear'] ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-person"></i> <?php printf("%s %s",$oneStudent['studentGivenName'],$oneStudent['studentFamilyName']) ?> <b class="caret"></b></a>
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
                        
                            <img src="<?php printf("%s", $oneStudent['studentProfilePic']) ?>" class="profile-user-img img-responsive img-circle">
                            <h4 class="text-center quoteDisplay"><?php printf("%s", $oneStudent['studentQuote']); ?></h4>
                    </li>
                        
                    <li <?php if ($activePage=='index') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="index.php"><i class="ion ion-ios-speedometer"></i> Dashboard</a>
                    </li>
                    <li <?php if ($activePage=='news') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="news.php"><i class="ion ion-planet"></i> News</a>
                    </li>
                    <li <?php if ($activePage=='academics') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="academics.php"><i class="ion ion-document-text"></i> Academics</a>
                    </li>
                    <li <?php if ($activePage=='professors') {
                        echo 'class = "active"';
                    } ?> >
                        <a href="professors.php"><i class="ion ion-ios-book-outline"></i> Faculty</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">