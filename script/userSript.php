<?php 
include('db/db.php');

include('date_time.php');
include('sessions.php');
// $district_code = $session_login_district;
// $district_region = $session_login_region;
//=======================================| ADD A USER
if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $district_name = mysqli_real_escape_string($conn, $_POST['district_name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $login_type = mysqli_real_escape_string($conn, $_POST['login_type']);

    $user_sql = "INSERT INTO user_account VALUES('','$first_name','$middle_name','$last_name','$user_name','$contact','$pass','$region','$district_name','$district','$location','$login_type','$DateTime')";

    $user_result = mysqli_query($conn, $user_sql);

    if ($user_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $user_name . '</strong> Has been created successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $user_name . '</strong> Username already exist.
                      </div>
        ';

    }


}

//======================================| FETCH DATA
$show_user_data = '';
if (isset($_POST['fetch'])) {
    // $fetch_user_district = 'AND';
    // $fetch_user_region = 'Ashanti';

    $fetch_user_sql = "SELECT * FROM user_account WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created DESC";
    $fetch_user_result = mysqli_query($conn, $fetch_user_sql);

    $show_user_data .= '
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Control</th>
              </tr>
            </thead>
            <tbody>
    ';
    $fetch_user_count = 1;
    if (mysqli_num_rows($fetch_user_result) > 0) {
        while ($fetch_user_row = mysqli_fetch_array($fetch_user_result)) {
            $show_user_data .= '
                <tr>
                  <th scope="row">' . $fetch_user_count . '</th>
                  <td>' . $fetch_user_row['first_name'] . ' ' . $fetch_user_row['middle_name'] . ' ' . $fetch_user_row['last_name'] . '</td>
                  <td>' . $fetch_user_row['user_name'] . '</td>
                  <td>
                     <button type="buttom" class="btn btn-danger delete btn-sm" id="' . $fetch_user_row['user_id'] . '" name="' . $fetch_user_row['user_id'] . '" value="' . $fetch_user_row['user_id'] . '"><i class="fa  fa-trash "></i></button>

                     <button type="buttom" class="btn btn-success updates btn-sm"  id="' . $fetch_user_row['user_id'] . '" name="' . $fetch_user_row['user_id'] . '" data-toggle="modal" data-target="#user_exampleModal" ><i class="fa  fa-pencil"></i></button>  
                       
                  </td>
                </tr>
            ';
            $fetch_user_count++;
        }
    } else {
        $show_user_data .= '
            <tr>
                <td colspan="4"><marquee>Sorry there is no user account available</marquee></td>
            </tr>
        ';
    }
    $show_user_data .= '
        </tbody>
       </table>
    ';
    echo $show_user_data;
}

//==================================| FILL TEXTFIELD user |=============================================
$fill_array_user = array();
if (isset($_POST['user_update'])) {
    $user_update = mysqli_real_escape_string($conn, $_POST['user_update']);
    // $fill_user_district = "AND";
    // $fill_user_region = "Ashanti";

    $fill_user_sql = "SELECT * FROM user_account WHERE user_id='$user_update' AND region='$session_login_region' AND district='$session_login_district'";

    $fill_user_result = mysqli_query($conn, $fill_user_sql);
    while ($fill_user_row = mysqli_fetch_array($fill_user_result)) {
        $fill_array_user['update_first_name'] = $fill_user_row['first_name'];
        $fill_array_user['update_id'] = $fill_user_row['user_id'];
        $fill_array_user['update_middle_name'] = $fill_user_row['middle_name'];
        $fill_array_user['update_last_name'] = $fill_user_row['last_name'];
        $fill_array_user['update_user_name'] = $fill_user_row['user_name'];
        $fill_array_user['update_contact'] = $fill_user_row['contact'];
        $fill_array_user['update_pass'] = $fill_user_row['pass'];
        $fill_array_user['update_region'] = $fill_user_row['region'];
        $fill_array_user['update_district'] = $fill_user_row['district'];
        $fill_array_user['update_location'] = $fill_user_row['location_'];
    }
    echo json_encode($fill_array_user);
}

//=====================================| UPDATE |
if (isset($_POST['update_changes'])) {

    $update_first_name = mysqli_real_escape_string($conn, $_POST['update_first_name']);
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $update_middle_name = mysqli_real_escape_string($conn, $_POST['update_middle_name']);
    $update_last_name = mysqli_real_escape_string($conn, $_POST['update_last_name']);
    $update_user_name = mysqli_real_escape_string($conn, $_POST['update_user_name']);
    $update_contact = mysqli_real_escape_string($conn, $_POST['update_contact']);
    $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
    $update_region = mysqli_real_escape_string($conn, $_POST['update_region']);
    $update_district = mysqli_real_escape_string($conn, $_POST['update_district']);
    $update_location = mysqli_real_escape_string($conn, $_POST['update_location']);
    $update_changes = mysqli_real_escape_string($conn, $_POST['update_changes']);

    $_update_sql = "UPDATE user_account SET first_name='$update_first_name', middle_name='$update_middle_name', last_name='$update_last_name', user_name='$update_user_name', contact='$update_contact', pass='$update_pass' WHERE user_id='$update_id' AND region='$update_region' AND district='$update_district'";

    $functional_update_result = mysqli_query($conn, $_update_sql);

    if ($functional_update_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                  <strong>' . $update_user_name . '</strong> Has been Updated successfully.
             </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
                  <strong>Ooops</strong> Username already Exist.
            </div>
        ';

    }

}

//=====================================| DELETE |
if (isset($_POST['id_delete'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id_delete']);
    // $user_region_delete = "Ashanti";
    // $user_district_delete = "AND";
    $user_delete_sql = "DELETE FROM user_account WHERE user_id='$id' AND region='$session_login_region' AND district='$session_login_district'";

    $user_delete_result = mysqli_query($conn, $user_delete_sql);

    if ($user_delete_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $id . '</strong> Has been deleted successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $id . '</strong> Has already been delete.
                      </div>
        ';

    }

}

?>