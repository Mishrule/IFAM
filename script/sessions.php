<?php 
    //======================================== INCLUDES =========================================

// $connectionError = "Could not Connect";
// $dbhost = "localhost";
// $dbuser = "root";
// $dpPassword = "";
// $db = "ifam";

// $conn = mysqli_connect($dbhost, $dbuser, $dpPassword, $db);
// if ($conn) {
//     // echo "Connected Success";
// } else {
//     echo $connectionError;
// }
include('db/db.php');
session_start();

$user_name = $_SESSION['user_name'];
$login_district = $_SESSION['login_district'];
$login_region = $_SESSION['login_region'];
$login_location = $_SESSION['login_location'];

// $sql = "SELECT * FROM user_account WHERE user_name='$user_name' AND district='$login_district' AND region='$login_region' AND location_='$login_location'";

$result = mysqli_query($conn, "SELECT * FROM user_account WHERE user_name='$user_name' AND district='$login_district' AND region='$login_region' AND location_='$login_location'");
// echo $result;
$row = mysqli_fetch_array($result);

$session_user_name = $row['user_name'];
$session_login_district = $row['district'];
$session_login_region = $row['region'];
$session_login_location = $row['location_'];

if (!isset($_SESSION['user_name']) && !isset($_SESSION['login_district']) && !isset($_SESSION['login_region']) && !isset($_SESSION['login_location'])) {
    header("location:../../index.php");
}

?>