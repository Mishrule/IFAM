<?php 
            //======================================== INCLUDES =========================================
include('db/db.php');
include('date_time.php');
include('sessions.php');
// $district_code = $session_login_district;
// $district_region = $session_login_region;
//=====================================| INSERT
if (isset($_POST['department_submit'])) {

    $tagging_required_date = mysqli_real_escape_string($conn, $_POST['tagging_required_date']);
    $tagging_asset_name = mysqli_real_escape_string($conn, $_POST['tagging_asset_name']);
    $tagging_transferred_date = mysqli_real_escape_string($conn, $_POST['tagging_transferred_date']);
    $tagging_location = mysqli_real_escape_string($conn, $_POST['tagging_location']);
    $tagging_authority = mysqli_real_escape_string($conn, $_POST['tagging_authority']);
    $tagging_condition = mysqli_real_escape_string($conn, $_POST['tagging_condition']);
    $tagging_transferred_date = mysqli_real_escape_string($conn, $_POST['tagging_transferred_date']);
    $tagging_region = mysqli_real_escape_string($conn, $_POST['tagging_region']);
    $tagging_district = mysqli_real_escape_string($conn, $_POST['tagging_district']);


    $tagging_sql = "INSERT INTO tagging_card VALUES('$tagging_required_date','$tagging_asset_name','$tagging_transferred_date','$tagging_location','$tagging_authority','$tagging_condition','$tagging_transferred_date','$tagging_region','$tagging_district','$DateTime')";

    $tagging_result = mysqli_query($conn, $tagging_sql);

    if ($tagging_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $tagging_asset_name . '</strong> Has been Tagged Successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Ooops! </strong> Something went wrong try again.
                      </div>
        ';
    }

}

//==================================| FETCH TAGGING |
$tagging_show = '';
if (isset($_POST['tagging_fetch'])) {
    // $tagging_district = "AND";
    // $tagging_region = "Ashanti";
    $tagging_sql = "SELECT  * FROM tagging_card WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc LIMIT 5";
    $tagging_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                             <th>#</th>
                              <th>Date Required</th>
                              <th>Asset Name</th>
                              <th>Date Transferred</th>
                              <th>Authority</th>
                              <th>New Location</th>
                              <th>Condition</th>
                              <th>Return Date</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $tagging_count = 1;
    $tagging_result = mysqli_query($conn, $tagging_sql);
    if (mysqli_num_rows($tagging_result) > 0) {
        while ($tagging_row = mysqli_fetch_array($tagging_result)) {
            $tagging_show .= '
                    <tr>
                        <th scope="row">' . $tagging_count . '</th>
                        <td>' . $tagging_row['date_required'] . '</td>
                        <td>' . $tagging_row['asset_name'] . '</td>
                        <td>' . $tagging_row['date_transferred'] . '</td>
                        <td>' . $tagging_row['authority'] . '</td> 
                        <td>' . $tagging_row['new_location'] . '</td> 
                        <td>' . $tagging_row['condition'] . '</td>
                        <td>' . $tagging_row['original_location'] . '</td> 
                    </tr>
                ';
            $tagging_count++;
        }

    } else {
        $tagging_show .= '
                <tr>
                    <td colspan="8">No Disposed Items yet...</td>
                </tr>
            ';
    }
    $tagging_show .= '
                 </tbody>
               </table>
               <div class="float-right">
                 <button type="button" class="btn btn-info btn-sm" id="tagging_print" name="tagging_print">
                  Print
               </button>
            ';
    echo $tagging_show;
}
//==================================| FETCH TAGGING CHANGE| 
$tagging_change_show = '';
if (isset($_POST['tagging_change'])) {
    $tagging_change = mysqli_real_escape_string($conn, $_POST['tagging_change']);
    // $tagging_change_district = "AND";
    // $tagging_change_region = "Ashanti";
    $tagging_change_sql = "SELECT  * FROM tagging_card WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc LIMIT $tagging_change";
    $tagging_change_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                             <th>#</th>
                              <th>Date Required</th>
                              <th>Asset Name</th>
                              <th>Date Transferred</th>
                              <th>Authority</th>
                              <th>New Location</th>
                              <th>Condition</th>
                              <th>Return Date</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $tagging_change_count = 1;
    $tagging_change_result = mysqli_query($conn, $tagging_change_sql);
    if (mysqli_num_rows($tagging_change_result) > 0) {
        while ($tagging_change_row = mysqli_fetch_array($tagging_change_result)) {
            $tagging_change_show .= '
                    <tr>
                        <th scope="row">' . $tagging_change_count . '</th>
                        <td>' . $tagging_change_row['date_required'] . '</td>
                        <td>' . $tagging_change_row['asset_name'] . '</td>
                        <td>' . $tagging_change_row['date_transferred'] . '</td>
                        <td>' . $tagging_change_row['authority'] . '</td> 
                        <td>' . $tagging_change_row['new_location'] . '</td> 
                        <td>' . $tagging_change_row['condition'] . '</td>
                        <td>' . $tagging_change_row['original_location'] . '</td> 
                    </tr>
                ';
            $tagging_change_count++;
        }

    } else {
        $tagging_change_show .= '
                <tr>
                    <td colspan="8">No Disposed Items yet...</td>
                </tr>
            ';
    }
    $tagging_change_show .= '
                 </tbody>
               </table>
               <div class="float-right">
                 <button type="button" class="btn btn-info btn-sm" id="tagging_print" name="tagging_print">
                  Print
               </button>
            ';
    echo $tagging_change_show;
}

?>