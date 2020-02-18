<?php 
//======================================== INCLUDES =========================================
include('../regional/inc/db/db.php');
// include('script/date_time.php');

session_start();
$error = '';
if (isset($_POST['submit_login'])) {
  $staff_id = mysqli_real_escape_string($conn, $_POST['staffID']);
  $pass = mysqli_real_escape_string($conn, $_POST['staffPassword']);
  

  $sql = "SELECT * FROM enrol WHERE staffID='$staff_id' AND staff_password='$pass' AND status_='user'";
  // echo $sql;
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $_SESSION['staff_id'] = $staff_id;
    $_SESSION['staff_password'] = $pass;
 
     header("Location:users_enrol.php");
    
  } else {
    $error = '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Invalid Staff ID or Password</strong>
                      </div>
        ';

    // $error = 'Message' . mysql_error();

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
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <img src="../img/coat.jpg" width="500px;" alt="This is an Image">
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <?php echo $error; ?>
                                <form method="POST" class="form-validate" action="<?php $_PHP_SELF; ?>">

                                    <div class="table-responsive">
                                        <div align="center">
                                            <marquee> WELCOME USER</marquee>
                                        </div>
                                        <table class="table table-responsive">
                                            <tr>
                                                <td>

                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="staffID" type="text" name="staffID" required
                                                            data-msg="Please enter your staffID"
                                                            class="input-material col-md-12 col-lg-12 col-sm-12">
                                                        <label for="staffID" class="label-material">Staff ID</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="staffPassword" type="text" name="staffPassword"
                                                            required data-msg="Please enter your staff Password"
                                                            class="input-material col-md-12 col-lg-12 col-sm-12">
                                                        <label for="staffPassword" class="label-material">Staff
                                                            Password</label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>


                                            </tr>


                                            <tr>


                                            </tr>


                                            <tr>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div align="center">
                                                        <button type="submit" class="btn btn-primary btn-sm float-right"
                                                            id="submit_login" name="submit_login"
                                                            value="submit_login">Check
                                                            User</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>


                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyrights text-center">
                <p>Design by <a href="#" class="external">+233245181940</a>

                </p>
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
