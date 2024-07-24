
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Employees</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="
        " />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>


       <div class="row no-m-t no-m-b">
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Projector Details</span>
            </div>
            <div class="collapsible-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="leaves.php">All Projector</a></li>
                    <li class="list-group-item"><a href="pending-leavehistory.php">Pending Application</a></li>
                    <li class="list-group-item"><a href="approvedleave-history.php">Returned projectors</a></li>
                    <li class="list-group-item"><a href="notapproved-leaves.php">Not Returned projectors</a></li>
                </ul>
            </div>
        </div>
    </div>

    <a href="leaves.php">
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">All Projector</span>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
</a>

<a href="pending-leavehistory.php">
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Pending Application</span>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
</a>
    
<a href="approvedleave-history.php">
<div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Returned projectors</span>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
</a>

    <a href="notapproved-leaves.php">
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Not Returned projectors</span>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
    </a>
    <!-- Add more cards for other links if needed -->
</div>


        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
        
    </body>
</html>
<?php ?>