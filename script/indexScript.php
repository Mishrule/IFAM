<?php 
include('db/db.php');
include('date_time.php');

//==================================| FILL TEXTFIELD DISTRICT |=============================================
$fill_array_district = array();
if (isset($_POST['login_district'])) {
    $login_district = mysqli_real_escape_string($conn, $_POST['login_district']);

    $fill_district_sql = "SELECT DISTINCT region, location_ FROM user_account WHERE district='$login_district'";

    $fill_district_result = mysqli_query($conn, $fill_district_sql);
    while ($fill_district_row = mysqli_fetch_array($fill_district_result)) {
        $fill_array_district['login_region'] = $fill_district_row['region'];
        $fill_array_district['login_location'] = $fill_district_row['location_'];

    }
    echo json_encode($fill_array_district);
}

?>