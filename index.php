<?php 
//======================================== INCLUDES =========================================
include('script/db/db.php');
include('script/date_time.php');

session_start();
$error = '';
if (isset($_POST['submit_login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $login_district = mysqli_real_escape_string($conn, $_POST['login_district']);
  $login_region = mysqli_real_escape_string($conn, $_POST['login_region']);
  $login_location = mysqli_real_escape_string($conn, $_POST['login_location']);
  $login_type = mysqli_real_escape_string($conn, $_POST['login_type']);
    // $submit_login = mysqli_real_escape_string($conn, $_POST['submit_login']);

  $sql = "SELECT * FROM user_account WHERE user_name='$username' AND pass='$pass' AND region='$login_region' AND district='$login_district' AND location_='$login_location' AND login_type_ ='$login_type'";
  // echo $sql;
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $_SESSION['user_name'] = $username;
    $_SESSION['login_district'] = $login_district;
    $_SESSION['login_region'] = $login_region;
    $_SESSION['login_location'] = $login_location;
    if ($login_type == "administrator") {
      header("Location:regional/region/admin.php");
    } else if ($login_type == "user") {
      header("Location:regional/region/users_asset_register.php");
    }
  } else {
    $error = '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Invalid Username, Password or District/Municipal</strong>
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
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.jpg">
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
                                    <img src="img/coat.jpg" width="500px;" alt="This is an Image">
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <?php echo $error; ?>
                                <form method="POST" action="<?php $_PHP_SELF ?>" class="form-validate">
                                    <div class="form-group">
                                        <input id="username" type="text" name="username" required
                                            data-msg="Please enter your username" class="input-material">
                                        <label for="username" class="label-material">User Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="pass" type="password" name="pass" required
                                            data-msg="Please enter your password" class="input-material">
                                        <label for="pass" class="label-material">Password</label>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-responsive">
                                            <tr>
                                                <td>
                                                    <label class="mr-sm-2"
                                                        for="login_district">District/Municipal:</label>
                                                </td>
                                                <td>
                                                    <select class="custom-select mb-6  mr-sm-6 mb-sm-0"
                                                        id="login_district" name="login_district">
                                                        <?php 
                            $show_district = '';
                            $district_sql = "SELECT DISTINCT district, district_name FROM user_account";
                            $district_result = mysqli_query($conn, $district_sql);
                            $show_district .= '
                                <option value="">Select District...</option>
                              ';
                            if (mysqli_num_rows($district_result) > 0) {
                              while ($district_row = mysqli_fetch_array($district_result)) {
                                $show_district .= '
                                    <option value="' . $district_row['district'] . '">' . $district_row['district_name'] . '</option>
                                  ';
                              }
                            } else {
                              $show_district .= '
                                  <option>No District/Municipal Yet Consult your administrator</option>
                                ';
                            }
                            ?>
                                                        <?php echo $show_district; ?>
                                                    </select>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <label class="mr-sm-2" for="login_region">Region</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="login_region" id="login_region"
                                                        class="form-control">
                                                    <!-- <select class="custom-select mb-2  mr-sm-2 mb-sm-0" id="login_region">
                            <?php /*
                            $show_region = '';
                            $region_sql = "SELECT DISTINCT(region) FROM user_account";
                            $region_result = mysqli_query($conn, $region_sql);
                            $show_region .= '
                                <option selected>Select region...</option>
                              ';
                            if (mysqli_num_rows($region_result) > 0) {
                              while ($region_row = mysqli_fetch_array($region_result)) {
                                $show_region .= '
                                    <option value="' . $region_row['region'] . '">' . $region_row['region'] . '</option>
                                  ';
                              }
                            } else {
                              $show_region .= '
                                  <option>No Region Yet Consult your administrator</option>
                                ';
                            }*/
                            ?>
                            <?php echo $show_region; ?>
                          </select> -->
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <label class="mr-sm-2" for="login_location">Location</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="login_location" class="form-control"
                                                        id="login_location">
                                                    <!-- <select class="custom-select mb-2  mr-sm-2 mb-sm-0" id="login_location">
                            <?php /*
                            $show_location = '';
                            $location_sql = "SELECT DISTINCT(location_) FROM district";
                            $location_result = mysqli_query($conn, $location_sql);
                            $show_location .= '
                                <option selected>Select location...</option>
                              ';
                            if (mysqli_num_rows($location_result) > 0) {
                              while ($location_row = mysqli_fetch_array($location_result)) {
                                $show_location .= '
                                    <option value="' . $location_row['location_'] . '">' . $location_row['location_'] . '</option>
                                  ';
                              }
                            } else {
                              $show_location .= '
                                  <option>No location Yet Consult your administrator</option>
                                ';
                            }*/
                            ?>
                            <?php echo $show_location; ?>
                          </select> -->
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <label class="mr-sm-2" for="login_type">Login Type</label>
                                                </td>
                                                <td>
                                                    <select class="custom-select mb-2  mr-sm-2 mb-sm-0" id="login_type"
                                                        name="login_type">
                                                        <option selected>Choose...</option>
                                                        <option value="user">User</option>
                                                        <option value="administrator">Administrator</option>

                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div align="center">
                                                        <button type="submit" class="btn btn-primary btn-sm float-right"
                                                            id="submit_login" name="submit_login"
                                                            value="submit_login">Login</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- <a id="login" href="index.html" class="btn btn-primary">Login</a>
                   This should be submit button but I replaced it with <a> for demo purposes-->
                                        <!-- </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a
                  href="register.html" class="signup">Signup</a> -->
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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper.js/umd/popper.min.js"> </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
        <!-- Main File-->
        <script src="js/front.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
    $('#login_district').change(function() {
        var login_district = $('#login_district').val();
        // alert(login_district);

        $.ajax({
            url: 'script/indexScript.php',
            method: 'POST',
            data: {
                login_district: login_district
            },
            dataType: 'json',
            success: function(data) {
                $('#login_region').val(data.login_region);
                $('#login_location').val(data.login_location);
            }
        });

    });

    // //================================| LOGIN |====================================
    //     $('#submit_login').click(function(){
    //       var username = $('#username').val();
    //       var pass = $('#pass').val();
    //       var login_district = $('#login_district').val();
    //       var login_region = $('#login_region').val();
    //       var login_location = $('#login_location').val();    
    //       var login_type = $('#login_type').val();
    //       var submit_login = $('#submit_login').val();

    //       $.ajax({
    //         url:'script/indexScript.php',
    //         method:'POST',
    //         data:{username:username, pass:pass, login_district:login_district, login_region:login_region,  login_location:login_location, login_type:login_type, submit_login:submit_login},
    //         success:function(data){
    //           $('#login_display').html(data);
    //         }
    //       })
    //     });
});
</script>