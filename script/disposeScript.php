<?php  
            //======================================== INCLUDES =========================================
include('db/db.php');
include('date_time.php');
include('sessions.php');
// $district_code = $session_login_district;
// $district_region = $session_login_region;
//=====================================| INSERT
if (isset($_POST['disposal_submit'])) {

    $disposal_nature = mysqli_real_escape_string($conn, $_POST['disposal_nature']);
    $disposal_sale_value = mysqli_real_escape_string($conn, $_POST['disposal_sale_value']);
    $disposal_buyer = mysqli_real_escape_string($conn, $_POST['disposal_buyer']);
    $disposal_region = mysqli_real_escape_string($conn, $_POST['disposal_region']);
    $disposal_district = mysqli_real_escape_string($conn, $_POST['disposal_district']);
    $disposal_date = mysqli_real_escape_string($conn, $_POST['disposal_date']);


    $dispose_sql = "INSERT INTO disposal VALUES('$disposal_date','$disposal_nature','$disposal_sale_value','$disposal_buyer','$disposal_region','$disposal_district','$DateTime')";

    $dispose_result = mysqli_query($conn, $dispose_sql);

    if ($dispose_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $disposal_nature . '</strong> Has been Disposed Successfull.
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

//==================================| FETCH DISPOSE 

$dispose_fetch_show = '';
if (isset($_POST['dispose_fetch'])) {
    // $dispose_fetch_district = "AND";
    // $dispose_fetch_region = "Ashanti";
    $dispose_fetch_sql = "SELECT  * FROM disposal WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc LIMIT 5";
    $dispose_fetch_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                             <th>#</th>
                              <th>Date</th>
                              <th>Nature of Disposal</th>
                              <th>Sale Value</th>
                              <th>Buyer</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $dispose_fetch_count = 1;
    $dispose_fetch_result = mysqli_query($conn, $dispose_fetch_sql);
    if (mysqli_num_rows($dispose_fetch_result) > 0) {
        while ($dispose_fetch_row = mysqli_fetch_array($dispose_fetch_result)) {
            $dispose_fetch_show .= '
                    <tr>
                        <th scope="row">' . $dispose_fetch_count . '</th>
                        <td>' . $dispose_fetch_row['date_dispose'] . '</td>
                        <td>' . $dispose_fetch_row['nature_of_disposal'] . '</td>
                        <td>' . $dispose_fetch_row['sale_value'] . '</td>
                        <td>' . $dispose_fetch_row['buyer'] . '</td> 
                    </tr>
                ';
            $dispose_fetch_count++;
        }

    } else {
        $dispose_fetch_show .= '
                <tr>
                    <td colspan="5">No Disposed Items yet...</td>
                </tr>
            ';
    }
    $dispose_fetch_show .= '
                 </tbody>
               </table>
               <div class="float-right">
                 <button type="button" class="btn btn-info btn-sm" id="disposal_print" name="disposal_print">
                  Print
               </button>
            ';
    echo $dispose_fetch_show;
}

//==================================| FETCH DISPOSE 

$change_show = '';
if (isset($_POST['dispose_change'])) {
    $dispose_change = mysqli_real_escape_string($conn, $_POST['dispose_change']);
    // $change_district = "AND";
    // $change_region = "Ashanti";
    $change_sql = "SELECT  * FROM disposal WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc LIMIT $dispose_change";
    $change_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                             <th>#</th>
                              <th>Date</th>
                              <th>Nature of Disposal</th>
                              <th>Sale Value</th>
                              <th>Buyer</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $change_count = 1;
    $change_result = mysqli_query($conn, $change_sql);
    if (mysqli_num_rows($change_result) > 0) {
        while ($change_row = mysqli_fetch_array($change_result)) {
            $change_show .= '
                    <tr>
                        <th scope="row">' . $change_count . '</th>
                        <td>' . $change_row['date_dispose'] . '</td>
                        <td>' . $change_row['nature_of_disposal'] . '</td>
                        <td>' . $change_row['sale_value'] . '</td>
                        <td>' . $change_row['buyer'] . '</td> 
                    </tr>
                ';
            $change_count++;
        }

    } else {
        $change_show .= '
                <tr>
                    <td colspan="5">No Disposed Items yet...</td>
                </tr>
            ';
    }
    $change_show .= '
                 </tbody>
               </table>
               <div class="float-right">
                 <button type="button" class="btn btn-info btn-sm" id="disposal_print" name="disposal_print">
                  Print
               </button>
            ';
    echo $change_show;
}
?>