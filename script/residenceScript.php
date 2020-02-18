<?php 
include('db/db.php');
include('date_time.php');
include('sessions.php');
$district_code = $session_login_district;
$district_region = $session_login_region;
//============================================| INSERT |=====================
if (isset($_POST['residence_submit'])) {
    $title_name = mysqli_real_escape_string($conn, $_POST['title_name']);
    $residence_code = mysqli_real_escape_string($conn, $_POST['residence_code']);
    $residence_region = mysqli_real_escape_string($conn, $_POST['residence_region']);
    $residence_district = mysqli_real_escape_string($conn, $_POST['residence_district']);

    $residence_sql = "INSERT INTO residence_code VALUES('$title_name','$residence_code','$residence_region','$residence_district','$DateTime')";

    $residence_result = mysqli_query($conn, $residence_sql);

    if ($residence_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $title_name . '</strong> Has been Updated successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $title_name . '</strong> Has already been update.
                      </div>
        ';

    }

}

//===================================|POPULATE TABLE|=====================================
$residence_show = '';
if (isset($_POST['action'])) {
    // $action = mysqli_real_escape_string($conn, $_POST['action']);
    // $district_unit = "AND";
    // $region_unit = "Ashanti";
    $residence_table_sql = "SELECT * FROM residence_code WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc";
    $residence_show .= '
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Residence Code ID</th>
                    <th>Controls</th>
                  </tr>
                </thead>
                <tbody>
        ';
    $residence_table_count = 1;
    $residence_table_result = mysqli_query($conn, $residence_table_sql);
    if (mysqli_num_rows($residence_table_result) > 0) {
        while ($residence_table_row = mysqli_fetch_array($residence_table_result)) {
            $residence_show .= '
                    <tr>
                        <th scope="row">' . $residence_table_count . '</th>
                        
                        <td>' . $residence_table_row['title'] . '</td>
                        <td>' . $residence_table_row['residence_code'] . '</td>
                        <td>
                           <button type="buttom" class="btn btn-danger delete btn-sm" id="' . $residence_table_row['residence_code'] . '" name="' . $residence_table_row['residence_code'] . '" value="' . $residence_table_row['residence_code'] . '"><i class="fa  fa-trash "></i></button>

                           <button type="buttom" class="btn btn-success update btn-sm"  id="' . $residence_table_row['residence_code'] . '" data-toggle="modal" data-target="#exampleModal" name="' . $residence_table_row['residence_code'] . '" value="' . $residence_table_row['residence_code'] . '"><i class="fa  fa-pencil"></i></button>  
                        </td>
                    </tr>
                ';
            $residence_table_count++;
        }

    } else {
        $residence_show .= '
                <tr>
                    <td colspan="4">No Residence Created</td>
                </tr>
            ';
    }
    $residence_show .= '
                 </tbody>
               </table>
            ';
    echo $residence_show;
}

//==================================| FILL TEXTFIELD |=============================================
$fill_array = array();
if (isset($_POST['id_update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id_update']);
    $fill_district_unit = "AND";
    $fill_region_unit = "Ashanti";

    $fill_sql = "SELECT * FROM residence_code WHERE residence_code='$id' AND region='$session_login_region' AND district='$session_login_district'";

    $fill_result = mysqli_query($conn, $fill_sql);
    while ($fill_row = mysqli_fetch_array($fill_result)) {
        $fill_array['residence_code_update'] = $fill_row['residence_code'];
        $fill_array['residence_title_update'] = $fill_row['title'];
        $fill_array['residence_region_update'] = $fill_row['region'];
        $fill_array['residence_district_update'] = $fill_row['district'];
    }
    echo json_encode($fill_array);
}
//=====================================| UPDATE |
if (isset($_POST['update_residence'])) {

    $residence_code_update = mysqli_real_escape_string($conn, $_POST['_code_update']);
    $residence_title_update = mysqli_real_escape_string($conn, $_POST['_title_update']);
    $residence_region_update = mysqli_real_escape_string($conn, $_POST['_region_update']);
    $residence_district_update = mysqli_real_escape_string($conn, $_POST['_district_update']);

    $departments_update_sql = "UPDATE residence_code SET title='$residence_title_update',region='$residence_region_update', district='$residence_district_update' WHERE residence_code='$residence_code_update' AND region='$residence_region_update' AND district='$residence_district_update'";

    $departments_update_result = mysqli_query($conn, $departments_update_sql);

    if ($departments_update_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $residence_district_update . '</strong> Has been Updated successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $residence_district_update . '</strong> Has already been update.
                      </div>
        ';

    }

}

//=====================================| DELETE |
if (isset($_POST['id'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    // $id_region = "Ashanti";
    // $id_district = "AND";
    $residence_delete_sql = "DELETE FROM residence_code WHERE residence_code='$id' AND region='$session_login_region' AND district='$session_login_district'";

    $residence_delete_result = mysqli_query($conn, $residence_delete_sql);

    if ($residence_delete_result) {
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