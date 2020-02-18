<?php 
// require_once('../inc/db/db.php');
require_once('session.php');
include('../script/date_time.php');
require_once('../regional/inc/db/db.php');
$msg='';
if(isset($_POST['submit'])){
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$region = mysqli_real_escape_string($conn, $_POST['region']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$district_code = mysqli_real_escape_string($conn, $_POST['district_code']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$login_type = mysqli_real_escape_string($conn, $_POST['login_type']);
$sid = mysqli_real_escape_string($conn, $_POST['sid']);
// submit = mysqli_real_escape_string($conn, $_POST['submit']);
$adminSQL = "INSERT INTO user_account VALUES('$sid','$first_name','$middle_name','$last_name','$user_name','$contact','$pass','$region','$district','$district_code','$location','$login_type', '$DateTime')";

    $admn_result = mysqli_query($conn, $adminSQL);

    if ($admn_result) {
        $msg .= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $user_name . '</strong> Has been created successfully. You will be redirected to login in 5 second.
                      </div>';
                      header("location:../index.php");
                      session_destroy();
    } else {
        $msg.= '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $user_name . '</strong> Admin name already exist.
                      </div>
        ';

    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFAM | Index</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <header class="header">
            <nav class="navbar" style="background-color:#cc6633;">
                <!-- Search Box-->
                <div class="search-box">
                    <button class="dismiss"><i class="icon-close"></i></button>
                    <form id="searchForm" action="#" role="search">
                        <input type="search" placeholder="What are you looking for..." class="form-control">
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand --><a href="#" class="navbar-brand d-none d-sm-inline-block">
                                <div class="brand-text d-none d-lg-inline-block"><span>ADMIN </span><strong>
                                        Dashboard</strong></div>
                                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>ADMIN</strong></div>
                            </a>
                            <!-- Toggle Button--><a id="toggle-btn" href="#"
                                class="menu-btn active"><span></span><span></span><span></span></a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                            <!-- Logout    -->
                            <!-- <li class="nav-item"><a href="../../script/logoutScript.php" class="nav-link logout"><span
                                        class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->



            <section class="tables col-lg-6 col-md-6 offset-md-3 offset-lg-3 offet-sm-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-close">
                                    <div class="dropdown">
                                        <button type="button" id="closeCard1" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                class="fa fa-ellipsis-v"></i></button>
                                        <div aria-labelledby="closeCard1"
                                            class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="h4">Register Admin</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="show_user"><?php echo $msg; ?></div>

                                        <form class="container" id="needs-validation" method="POST"
                                            action="<?php $_PHP_SELF; ?>">
                                            <table class="table col-md-12 col-sm-12 col-lg-12">
                                                <tr>
                                                    <td>
                                                        <label for="first_name">First name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="eg. Benard" required>
                                                        <input type="hidden" class="form-control" id="sid" hidden
                                                            name="sid" placeholder="eg. Benard"
                                                            value="<?php echo $session_staffid; ?>">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="middle_name">Middle Name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="middle_name"
                                                            name="middle_name" placeholder="eg. Kofi">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="last_name">Last name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="eg. Mensah" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="user_name">User name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="user_name"
                                                            name="user_name" placeholder="eg. Ben"
                                                            value="<?php echo $session_staffid; ?>" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="contact">Contact</label>
                                                    </td>
                                                    <td>
                                                        <input type="tel" class="form-control" id="contact"
                                                            name="contact" placeholder="eg. 024#######">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="pass">Password</label>
                                                    </td>
                                                    <td>
                                                        <input type="password" class="form-control" id="pass"
                                                            name="pass" placeholder="eg. Password" required>
                                                    </td>
                                                </tr>
                                                <tr hidden>
                                                    <td>
                                                        <label for="region">Region</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="region"
                                                            name="region" placeholder="Ashanti Region"
                                                            value="<?php echo $session_region;?>">
                                                    </td>




                                                </tr>
                                                <tr hidden>
                                                    <td>
                                                        <label for="district">District/Municipal:</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="district"
                                                            name="district" placeholder="eg. Accra Metropoli"
                                                            value="<?php echo $session_district; ?>">
                                                    </td>
                                                </tr>
                                                <tr hidden>
                                                    <td>
                                                        <label for="district">District/Municipal Code:</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="district_code"
                                                            name="district_code" placeholder="eg. AND"
                                                            value="<?php echo $session_district_code; ?>">
                                                    </td>
                                                </tr>

                                                <tr hidden>
                                                    <td>
                                                        <label for="location">Location</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="location"
                                                            name="location" placeholder="eg. Kumasi"
                                                            value="<?php echo $session_location; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="login_type">Login Type</label>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select d-block my-3" id="login_type"
                                                            name="login_type" required>

                                                            <option value="administrator">Administrator</option>

                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div align="center">
                                                <button class="btn btn-primary" id="submit" name="submit"
                                                    type="submit">Submit</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- Page Footer-->

        </div>
    </div>
    </div>
    <!-- JavaScript files-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="../js/front.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
    $('#submit').click(function() {




        if ($('#first_name').val() === '') {
            alert('Sorry! First Name Can\'t be empty');
        } else if ($('#last_name').val() === '') {
            alert('Sorry! Last Name can\'t be empty');
        } else if ($('#user_name').val() === '') {
            alert('Sorry! User name can\'t be empty');
        } else if ($('#pass').val() === '') {
            alert('Sorry! Password can\'t be empty');
        } else {
            alert(
                'SAVED SUCCESSFULLY\nYOU WILL BE REDIRECTED TO LOGIN WITH YOUR APPROPRIATE CREDENTIALS.'
            );
        }


    });
})
</script>