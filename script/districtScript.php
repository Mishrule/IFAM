<?php 
//======================================== INCLUDES =========================================
require_once('../script/db/db.php');
include('date_time.php');
include('sessions.php');
//=====================================| CREATE A DISTRICT |========================================
// echo $session_login_location;
// echo $session_login_region;
// echo $session_login_district;
$district_code = $session_login_district;
$district_region = $session_login_region;
if (isset($_POST['district_submit'])) {
    $district_name = mysqli_real_escape_string($conn, $_POST['district_name']);
    $district_code = mysqli_real_escape_string($conn, $_POST['district_code']);
    $district_region = mysqli_real_escape_string($conn, $_POST['district_region']);
    $district_location = mysqli_real_escape_string($conn, $_POST['district_location']);

    $district_sql = "INSERT INTO district VALUES('$district_name','$district_code','$district_region','$district_location','$DateTime')";

    $district_result = mysqli_query($conn, $district_sql);

    if ($district_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $district_name . '</strong> Has been created successfull with the code <strong>' . $district_code . '</strong>.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $district_name . '</strong> Has already been created.
                      </div>
        ';

    }

}
    //=====================================| SHOW CONTENT
$display_district_info_show = '';
if (isset($_POST['action'])) {
    // $district_code = $session_login_district;
    // $district_region = $session_login_region;
    $display_district_info_sql = "SELECT * FROM district WHERE district_code='$district_code' AND district_region='$district_region'";
    $display_district_info_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>District Name</th>
                              <th>District Code</th>
                              <th>Region</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $display_district_info_count = 1;
    $display_district_info_result = mysqli_query($conn, $display_district_info_sql);
    if (mysqli_num_rows($display_district_info_result) > 0) {
        while ($display_district_info_row = mysqli_fetch_array($display_district_info_result)) {
            $display_district_info_show .= '
                    <tr>
                        <th scope="row">' . $display_district_info_count . '</th>
                        <td>' . $display_district_info_row['district_name'] . '</td>
                        <td>' . $display_district_info_row['district_code'] . '</td>
                        <td>' . $display_district_info_row['district_region'] . '</td>
                    </tr>
                ';
            $display_district_info_count++;
        }

    } else {
        $display_district_info_show .= '
                <tr>
                    <td colspan="4">No District Registered Yet</td>
                </tr>
            ';
    }
    $display_district_info_show .= '
                 </tbody>
               </table>
            ';
    echo $display_district_info_show;
}



   //=====================================| UPDATE TEXTFIELDS
$display_district_details_show = array();
if (isset($_POST['district_details'])) {
    $district_details = mysqli_real_escape_string($conn, $_POST['district_details']);
    // $district_code = "AND";
    // $district_region = "Ashanti Region";
    $display_district_details_sql = "SELECT * FROM district WHERE district_code='$district_details' AND district_region='$district_region'";
    // echo $display_district_details_sql;

    $display_district_details_result = mysqli_query($conn, $display_district_details_sql);
    if (mysqli_num_rows($display_district_details_result) > 0) {
        while ($display_district_details_row = mysqli_fetch_array($display_district_details_result)) {
            $display_district_details_show['district_name_update'] = $display_district_details_row['district_name'];
            $display_district_details_show['district_code_update'] = $display_district_details_row['district_code'];
            $display_district_details_show['district_region_update'] = $display_district_details_row['district_region'];
            $display_district_details_show['district_location_update'] = $display_district_details_row['district_location'];
        }

    }

    echo json_encode($display_district_details_show);
}

//=====================================| UPATE A DISTRICT |========================================
if (isset($_POST['district_submit_update'])) {
    $district_name_update = mysqli_real_escape_string($conn, $_POST['district_name_update']);
    $district_code_update = mysqli_real_escape_string($conn, $_POST['district_code_update']);
    $district_region_update = mysqli_real_escape_string($conn, $_POST['district_region_update']);
    $district_location_update = mysqli_real_escape_string($conn, $_POST['district_location_update']);

    $district_update_sql = "UPDATE district SET district_name ='$district_name_update', district_code='$district_code_update', district_region='$district_region_update', district_location='$district_location_update' WHERE district_code='$district_code_update' AND district_region='$district_region_update' AND district_location='$district_location_update'";

    $district_update_result = mysqli_query($conn, $district_update_sql);

    if ($district_update_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $district_name_update . '</strong> Has been Updated successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $district_name_update . '</strong> Has already been update.
                      </div>
        ';

    }

}
?>