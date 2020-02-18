<?php 
include('db/db.php');
include('date_time.php');
include('sessions.php');
$district_code = $session_login_district;
$district_region = $session_login_region;
//========================================| INSERT INTO DEPARTMENT
if (isset($_POST['department_submit'])) {
    $departmentid = mysqli_real_escape_string($conn, $_POST['departmentid']);
    $departmentname = mysqli_real_escape_string($conn, $_POST['departmentname']);
    $unitId = mysqli_real_escape_string($conn, $_POST['unitId']);
    $unitname = mysqli_real_escape_string($conn, $_POST['unitname']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);

    $department_sql = "INSERT INTO department VALUES('$departmentid','$departmentname','$unitId','$unitname','$region','$district','$DateTime')";

    $department_result = mysqli_query($conn, $department_sql);

    if ($department_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>' . $departmentname . '</strong> Has been created successfull with  <strong>' . $unitname . ' Unit</strong>.
                        </div>';
    } else {
        echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>' . $unitname . '</strong> Has already been created.
                        </div>
            ';

    }

}

    //=====================================| POPULATE TABLE
$department_show = '';
if (isset($_POST['action'])) {
    // $district = "AND";
    // $region = "Ashanti";

    $deparment_populate_sql = "SELECT DISTINCT department_name, department_id, unit_id, unit_name FROM department WHERE region='$district_region' AND district='$district_code' ORDER BY department_id desc";
    $department_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Dept ID</th>
                              <th>Dept</th>
                              <th>Unit ID</th>
                              <th>Unit</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $department_pop_count = 1;
    $department_populate_result = mysqli_query($conn, $deparment_populate_sql);
    if (mysqli_num_rows($department_populate_result) > 0) {
        while ($department_pop_row = mysqli_fetch_array($department_populate_result)) {
            $department_show .= '
                    <tr>
                        <th scope="row">' . $department_pop_count . '</th>
                        <td>' . $department_pop_row['department_id'] . '</td>
                        <td>' . $department_pop_row['department_name'] . '</td>
                        <td>' . $department_pop_row['unit_id'] . '</td>
                        <td>' . $department_pop_row['unit_name'] . '</td>
                        
                    </tr>
                ';
            $department_pop_count++;
        }

    } else {
        $department_show .= '
                <tr>
                    <td colspan="5">No Department and Unit Registered</td>
                </tr>
            ';
    }
    $department_show .= '
                 </tbody>
               </table>
            ';
    echo $department_show;
}

    //=====================================| POPULATE TABLE
$department_show_unit = '';
if (isset($_POST['department_unit'])) {
    $department_unit = mysqli_real_escape_string($conn, $_POST['department_unit']);
    // $district_unit = "AND";
    // $region_unit = "Ashanti";

    $deparment_unit_sql = "SELECT  unit_id, unit_name FROM department WHERE region='$session_login_region' AND district='$session_login_district'  AND department_name='$department_unit'";
    $department_show_unit .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                            
                              <th>Unit ID</th>
                              <th>Unit</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $department_unit_count = 1;
    $department_unit_result = mysqli_query($conn, $deparment_unit_sql);
    if (mysqli_num_rows($department_unit_result) > 0) {
        while ($department_unit_row = mysqli_fetch_array($department_unit_result)) {
            $department_show_unit .= '
                    <tr>
                        <th scope="row">' . $department_unit_count . '</th>
                        
                        <td>' . $department_unit_row['unit_id'] . '</td>
                        <td>' . $department_unit_row['unit_name'] . '</td>
                        
                    </tr>
                ';
            $department_unit_count++;
        }

    } else {
        $department_show_unit .= '
                <tr>
                    <td colspan="5">No Department and Unit Registered</td>
                </tr>
            ';
    }
    $department_show_unit .= '
                 </tbody>
               </table>
            ';
    echo $department_show_unit;
}

//===================================| FILL UPDATE TEXTFILED
$department_show_array = array();
if (isset($_POST['department_unit_change'])) {

    $department_unit_change = mysqli_real_escape_string($conn, $_POST['department_unit_change']);
    $unit_department_change = mysqli_real_escape_string($conn, $_POST['unit_department_change']);
    // $district_unit_change = "AND";
    // $region_unit_change = "Ashanti";

    $deparment_unit_sql_change = "SELECT  * FROM department WHERE region='$session_login_region' AND district='$session_login_district'  AND department_id='$department_unit_change' AND unit_id='$unit_department_change'";

    $department_unit_result_change = mysqli_query($conn, $deparment_unit_sql_change);
    if (mysqli_num_rows($department_unit_result_change) > 0) {
        while ($department_unit_row_change = mysqli_fetch_array($department_unit_result_change)) {
            $department_show_array['dept_id_update'] = $department_unit_row_change['department_id'];
            $department_show_array['department_name_update'] = $department_unit_row_change['department_name'];
            $department_show_array['unit_id_update'] = $department_unit_row_change['unit_id'];
            $department_show_array['unit_update'] = $department_unit_row_change['unit_name'];
            $department_show_array['region_update'] = $department_unit_row_change['region'];
            $department_show_array['district_update'] = $department_unit_row_change['district'];
        }

    }
    echo json_encode($department_show_array);
}

//===================================| FILL UPDATE TEXTFILED
$department_show_array2 = array();
if (isset($_POST['unit_department_change2'])) {

    $department_unit_change2 = mysqli_real_escape_string($conn, $_POST['department_unit_change2']);
    $unit_department_change2 = mysqli_real_escape_string($conn, $_POST['unit_department_change2']);
    $district_unit_change2 = "AND";
    $region_unit_change2 = "Ashanti";

    $deparment_unit_sql_change2 = "SELECT  * FROM department WHERE region='$session_login_region' AND district='$session_login_district'  AND department_id='$department_unit_change2' AND unit_id='$unit_department_change2'";

    $department_unit_result_change2 = mysqli_query($conn, $deparment_unit_sql_change2);
    if (mysqli_num_rows($department_unit_result_change2) > 0) {
        while ($department_unit_row_change2 = mysqli_fetch_array($department_unit_result_change2)) {
            $department_show_array2['dept_id_update2'] = $department_unit_row_change2['department_id'];
            $department_show_array2['department_name_update2'] = $department_unit_row_change2['department_name'];
            $department_show_array2['unit_id_update2'] = $department_unit_row_change2['unit_id'];
            $department_show_array2['unit_update2'] = $department_unit_row_change2['unit_name'];
            $department_show_array2['region_update2'] = $department_unit_row_change2['region'];
            $department_show_array2['district_update2'] = $department_unit_row_change2['district'];
        }

    }
    echo json_encode($department_show_array2);
}

//=====================================| UPATE A DISTRICT |========================================
if (isset($_POST['department_btn'])) {

    $dept_id_ = mysqli_real_escape_string($conn, $_POST['dept_id_']);
    $department_name_ = mysqli_real_escape_string($conn, $_POST['department_name_']);
    $unit_id_ = mysqli_real_escape_string($conn, $_POST['unit_id_']);
    $unit_ = mysqli_real_escape_string($conn, $_POST['unit_']);
    $region_ = mysqli_real_escape_string($conn, $_POST['region_']);
    $district_ = mysqli_real_escape_string($conn, $_POST['district_']);

    $departments_update_sql = "UPDATE department SET department_name='$department_name_', unit_name='$unit_', region='$region_', district='$district_' WHERE department_id='$dept_id_' AND unit_id='$unit_id_' AND region='$region_' AND district='$district_'";

    $departments_update_result = mysqli_query($conn, $departments_update_sql);

    if ($departments_update_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $dept_id_ . '</strong> Has been Updated successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $dept_id_ . '</strong> Has already been update.
                      </div>
        ';

    }

}
?>