<?php
session_start();
$_SESSION['alogin']=$_POST['username'];
error_reporting(0);
include('includes/config.php');

if(isset($_POST['signin'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);

    // Check if the user is an admin
    $sqlAdmin = "SELECT id FROM admin WHERE username=:uname AND password=:password";
    $queryAdmin = $dbh->prepare($sqlAdmin);
    $queryAdmin->bindParam(':uname', $uname, PDO::PARAM_STR);
    $queryAdmin->bindParam(':password', $password, PDO::PARAM_STR);
    $queryAdmin->execute();
    $adminResult = $queryAdmin->fetch(PDO::FETCH_ASSOC);

    if ($adminResult) {
        $_SESSION['adminlogin'] = $_POST['username'];
        header("Location: admin/dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Check if the user is a regular employee
        $sqlEmployee = "SELECT EmailId, Password, Status, id FROM tblemployees WHERE EmailId=:uname AND Password=:password";
        $queryEmployee = $dbh->prepare($sqlEmployee);
        $queryEmployee->bindParam(':uname', $uname, PDO::PARAM_STR);
        $queryEmployee->bindParam(':password', $password, PDO::PARAM_STR);
        $queryEmployee->execute();
        $employeeResult = $queryEmployee->fetchAll(PDO::FETCH_OBJ);

        if($queryEmployee->rowCount() > 0) {
            foreach ($employeeResult as $result) {
                $status = $result->Status;
                $_SESSION['eid'] = $result->id;
            }
            if($status == 0) {
                // If status is 0 (admin), redirect to admin dashboard
                $_SESSION['adminlogin'] = $_POST['username'];
                header("Location: admin/dashboard.php");
                exit();
            } elseif($status == 1) {
                // If status is 1 (active user), redirect to user dashboard
                $_SESSION['emplogin'] = $_POST['username'];
                header("Location: dashboard.php");
                exit();
            }
            elseif($status == 2) {
                // If status is 1 (active user), redirect to user dashboard
                $_SESSION['adminlogin'] = $_POST['username'];
                header("Location: admin/supportdashboard.php");
                exit();
            }
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        
        <!-- Title -->
        <title>IPMS | Home Page</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
             <link href="assets/css/materialdesign.css" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">IPMS | IAA projector Management System</span>
                        </div>
                      
                           
                        </form>
                     
                        
                    </div>
                </nav>
            </header>
           


            <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title"><h4>Welcome to IAA Projector Management System</h4></div>

                <div class="col s12 m6 l8 offset-l2 offset-m3">
                    <div class="card white darken-1">
                        <div class="card-content">
                            
                            <?php if (isset($msg)) { ?>
                            <div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?></div>
                            <?php } ?>
                            <div class="row">
                                <form class="col s12" name="signin" method="post">
                                    <div class="input-field col s12">
                                        <input id="username" type="text" name="username" class="validate" autocomplete="off" required>
                                        <label for="username">Email Id</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col s12 right-align m-t-sm">
                                        <input type="submit" name="signin" value="Sign in" class="waves-effect waves-light btn teal">
                                    </div>
                                    <div class="col s8 left-align m-t-sm">
                                        <a href="forgot-password.php" class="waves-effect waves-light btn teal">Reset Password</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

            
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        
    </body>
</html>
