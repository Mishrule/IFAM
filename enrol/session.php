<?php 
    //======================================== INCLUDES =========================================

include('../regional/inc/db/db.php');
session_start();
$staff_id = $_SESSION['staff_id'];
$staff_password = $_SESSION['staff_password'];


// $sql = "SELECT * FROM user_account WHERE user_name='$user_name' AND district='$login_district' AND region='$login_region' AND location_='$login_location'";

$result = mysqli_query($conn, "SELECT * FROM enrol WHERE staffID='$staff_id' AND staff_password='$staff_password'");
// echo $result;
$row = mysqli_fetch_array($result);

$session_staffid = $row['staffID'];
$session_fullName = $row['staff_fullName'];
$session_district = $row['district'];
$session_region = $row['region'];
$session_district_code = $row['district_code'];
$session_location = $row['location'];

if (!isset($_SESSION['staff_id']) && !isset($_SESSION['staff_password']) ) {
    header("location:enrol_index.php");
}

?>