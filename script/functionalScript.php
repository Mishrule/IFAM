<?php 
    //======================================== INCLUDES =========================================
include('db/db.php');
include('date_time.php');
include('sessions.php');
// $district_code = $session_login_district;
// $district_region = $session_login_region;

//======================================== INSERT INTO DATABASE ================================
if (isset($_POST['section_submit'])) {
    $section_name = mysqli_real_escape_string($conn, $_POST['section_name']);
    $section_code = mysqli_real_escape_string($conn, $_POST['section_code']);
    $section_region = mysqli_real_escape_string($conn, $_POST['section_region']);
    $section_district = mysqli_real_escape_string($conn, $_POST['section_district']);
    // $section_submit = mysqli_real_escape_string($conn, $_POST['section_submit']);

    $section_sql = "INSERT INTO functional_office VALUES('$section_name','$section_code','$section_region','$section_district','$DateTime')";

    $section_result = mysqli_query($conn, $section_sql);

    if ($section_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $section_name . '</strong> Has been created successfull with the code <strong>' . $section_code . '</strong>.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $section_name . '</strong> Has already been created.
                      </div>
        ';

    }
}

//======================================== INSERT INTO DATABASE ================================
if (isset($_POST['functional_submit'])) {
    $location_section_code = mysqli_real_escape_string($conn, $_POST['location_section_code']);
    $funtional_office = mysqli_real_escape_string($conn, $_POST['funtional_office']);
    $functional_Code = mysqli_real_escape_string($conn, $_POST['functional_Code']);
    $functional_region = mysqli_real_escape_string($conn, $_POST['functional_region']);
    $functional_district = mysqli_real_escape_string($conn, $_POST['functional_district']);
    // $functional_submit = mysqli_real_escape_string($conn, $_POST['functional_submit']);

    $functional_sql = "INSERT INTO functional_location VALUES('$location_section_code','$funtional_office','$functional_Code','$functional_region','$functional_district','$DateTime')";

    $functional_result = mysqli_query($conn, $functional_sql);

    if ($functional_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $funtional_office . '</strong> Has been created successfull with the code <strong>' . $functional_Code . '</strong>.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $funtional_office . '</strong> Has already been created.
                      </div>
        ';

    }
}

//======================================== SELECT FUNCTIONAL OFFICE ================================
$_function_department_show = '';
if (isset($_POST['select'])) {
    // $functional_district = "AND";
    // $functional_region = "Ashanti";
    $functional_populate_sql = "SELECT  * FROM functional_office WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc";
    $_function_department_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $functional_pop_count = 1;
    $functional_populate_result = mysqli_query($conn, $functional_populate_sql);
    if (mysqli_num_rows($functional_populate_result) > 0) {
        while ($functional_pop_row = mysqli_fetch_array($functional_populate_result)) {
            $_function_department_show .= '
                    <tr>
                        <th scope="row">' . $functional_pop_count . '</th>
                        <td>' . $functional_pop_row['section_code'] . '</td>
                        <td>' . $functional_pop_row['section_name'] . '</td>
                       
                        <td>
                           <button type="buttom" class="btn btn-danger delete btn-sm" id="' . $functional_pop_row['section_code'] . '" name="' . $functional_pop_row['section_code'] . '" value="' . $functional_pop_row['section_code'] . '"><i class="fa  fa-trash "></i></button>

                           <button type="buttom" class="btn btn-success updates btn-sm"  id="' . $functional_pop_row['section_code'] . '" name="' . $functional_pop_row['section_code'] . '" data-toggle="modal" data-target="#_functional_exampleModal" ><i class="fa  fa-pencil"></i></button>  
                        </td>
                        
                    </tr>
                ';
            $functional_pop_count++;
        }

    } else {
        $_function_department_show .= '
                <tr>
                    <td colspan="5">No Functional Office Created yet...</td>
                </tr>
            ';
    }
    $_function_department_show .= '
                 </tbody>
               </table>
            ';
    echo $_function_department_show;
}

//==================================| FILL TEXTFIELD FUNCTIONAL |=============================================
$fill_array_functional = array();
if (isset($_POST['id_functional'])) {
    $id_functional = mysqli_real_escape_string($conn, $_POST['id_functional']);
    // $fill_functional_district = "AND";
    // $fill_functional_region = "Ashanti";

    $fill_functional_sql = "SELECT * FROM functional_office WHERE section_code='$id_functional' AND region='$session_login_region' AND district='$session_login_district' ";
    // echo $fill_functional_sql;
    $fill_functional_result = mysqli_query($conn, $fill_functional_sql);
    while ($fill_functional_row = mysqli_fetch_array($fill_functional_result)) {
        $fill_array_functional['section_name_'] = $fill_functional_row['section_name'];
        $fill_array_functional['section_code_'] = $fill_functional_row['section_code'];
        $fill_array_functional['section_region_'] = $fill_functional_row['region'];
        $fill_array_functional['section_district_'] = $fill_functional_row['district'];
    }
    echo json_encode($fill_array_functional);
}

//======================================== SELECT LOCATION OFFICE ================================
$location_department_show = '';
if (isset($_POST['selectLocation'])) {
    // $location_district = "AND";
    // $location_region = "Ashanti";
    $location_populate_sql = "SELECT  * FROM functional_location WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc";
    $location_department_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Section</th>
                              <th>Office</th>
                              <th>Code ID</th>
                              <th>Control</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $location_pop_count = 1;
    $location_populate_result = mysqli_query($conn, $location_populate_sql);
    if (mysqli_num_rows($location_populate_result) > 0) {
        while ($location_pop_row = mysqli_fetch_array($location_populate_result)) {
            $location_department_show .= '
                    <tr>
                        <th scope="row">' . $location_pop_count . '</th>
                        <td>' . $location_pop_row['section_name'] . '</td>
                        <td>' . $location_pop_row['office'] . '</td>
                        <td>' . $location_pop_row['code_id'] . '</td>
                        <td>
                           <button type="buttom" class="btn btn-danger delete_location btn-sm" id="' . $location_pop_row['code_id'] . '" name="' . $location_pop_row['code_id'] . '" value="' . $location_pop_row['code_id'] . '"><i class="fa  fa-trash "></i></button>

                         <!--  <button type="buttom" class="btn btn-success update btn-sm"  id="' . $location_pop_row['code_id'] . '" data-toggle="modal" data-target="#locational_exampleModal"><i class="fa  fa-pencil"></i></button>  -->
                        </td>
                        
                    </tr>
                ';
            $location_pop_count++;
        }

    } else {
        $location_department_show .= '
                <tr>
                    <td colspan="5">No Functional Office Created yet...</td>
                </tr>
            ';
    }
    $location_department_show .= '
                 </tbody>
               </table>
            ';
    echo $location_department_show;
}



//=====================================| UPDATE |
if (isset($_POST['section_submit_'])) {

    $functional_code_update = mysqli_real_escape_string($conn, $_POST['section_code_']);
    $functional_name_update = mysqli_real_escape_string($conn, $_POST['section_name_']);
    $functional_region_update = mysqli_real_escape_string($conn, $_POST['section_region_']);
    $functional_district_update = mysqli_real_escape_string($conn, $_POST['section_district_']);

    $functional_update_sql = "UPDATE functional_office SET section_name='$functional_name_update' WHERE section_code='$functional_code_update' AND region='$functional_region_update' AND district='$functional_district_update'";

    $functional_update_result = mysqli_query($conn, $functional_update_sql);

    if ($functional_update_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                  <strong>' . $functional_name_update . '</strong> Has been Updated successfully.
             </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
                  <strong>Ooops</strong> Something went wrong try again.
            </div>
        ';

    }

}

//=====================================| DELETE |
if (isset($_POST['id_delete'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id_delete']);
    // $functional_region_delete = "Ashanti";
    // $functional_district_delete = "AND";
    $functional_delete_sql = "DELETE FROM functional_office WHERE section_code='$id' AND region='$session_login_region' AND district='$session_login_district'";

    $functional_delete_result = mysqli_query($conn, $functional_delete_sql);

    if ($functional_delete_result) {
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

//=====================================| DELETE |
if (isset($_POST['delete_location'])) {

    $delete_location = mysqli_real_escape_string($conn, $_POST['delete_location']);
    // $location_region_delete = "Ashanti";
    // $location_district_delete = "AND";
    $location_delete_sql = "DELETE FROM functional_location WHERE code_id='$delete_location' AND region='$session_login_region' AND district='$session_login_district'";

    $location_delete_result = mysqli_query($conn, $location_delete_sql);

    if ($location_delete_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $delete_location . '</strong> Has been deleted successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $delete_location . '</strong> Has already been delete.
                      </div>
        ';

    }

}
?>