<?php 
        //======================================== INCLUDES =========================================
include('db/db.php');
include('date_time.php');
include('sessions.php');
// $district_code = $session_login_district;
// $district_region = $session_login_region;

//=========================================| INSERT INTO ASSET REGISTER
if (isset($_POST['class_submit'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $class_code = mysqli_real_escape_string($conn, $_POST['class_code']);
    $class_region = mysqli_real_escape_string($conn, $_POST['class_region']);
    $class_district = mysqli_real_escape_string($conn, $_POST['class_district']);

    $class_reg_sql = "INSERT INTO register_class VALUES('$class_name','$class_code','$class_region','$class_district','$DateTime')";

    $class_reg_result = mysqli_query($conn, $class_reg_sql);

    if ($class_reg_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $class_name . '</strong> Has been created successfull with the code <strong>' . $class_code . '</strong>.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $class_name . '</strong> Has already been created.
                      </div>
        ';
    }

}

//=========================================| INSERT INTO ASSET CODE
if (isset($_POST['asset_class_submit'])) {
    $asset_class_code = mysqli_real_escape_string($conn, $_POST['asset_class_code']);
    $asset_sub_class_code = mysqli_real_escape_string($conn, $_POST['asset_sub_class_code']);
    $asset_class_definition = mysqli_real_escape_string($conn, $_POST['asset_class_definition']);
    $asset_class_region = mysqli_real_escape_string($conn, $_POST['asset_class_region']);
    $asset_class_district = mysqli_real_escape_string($conn, $_POST['asset_class_district']);

    $asset_sql = "INSERT INTO asset_code VALUES('$asset_class_code','$asset_sub_class_code','$asset_class_definition','$asset_class_region','$asset_class_district','$DateTime')";

    $asset_result = mysqli_query($conn, $asset_sql);

    if ($asset_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $asset_class_definition . '</strong> Has been created successfull with the code <strong>' . $asset_sub_class_code . '</strong>.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $asset_class_definition . '</strong> Has already been created.
                      </div>
        ';
    }

}

//==================================| FETCH ASSET REGISTER 

$asset_register_show = '';
if (isset($_POST['fetch_class'])) {
    // $asset_register_district = "AND";
    // $asset_register_region = "Ashanti";
    $asset_register_sql = "SELECT  * FROM register_class WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc";
    $asset_register_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                               <th>#</th>
                              <th>Class Code</th>
                              <th>Class Definition</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $asset_register_count = 1;
    $asset_register_result = mysqli_query($conn, $asset_register_sql);
    if (mysqli_num_rows($asset_register_result) > 0) {
        while ($asset_register_row = mysqli_fetch_array($asset_register_result)) {
            $asset_register_show .= '
                    <tr>
                        <th scope="row">' . $asset_register_count . '</th>
                        <td>' . $asset_register_row['class_code'] . '</td>
                        <td>' . $asset_register_row['class_definition'] . '</td>
                        
                        <td>
                           <button type="buttom" class="btn btn-danger delete_location btn-sm" id="' . $asset_register_row['class_code'] . '" name="' . $asset_register_row['class_code'] . '" value="' . $asset_register_row['class_code'] . '"><i class="fa  fa-trash "></i></button>

                         <!--  <button type="buttom" class="btn btn-success update btn-sm"  id="' . $asset_register_row['class_code'] . '" data-toggle="modal" data-target="#locational_exampleModal"><i class="fa  fa-pencil"></i></button>  -->
                        </td>
                        
                    </tr>
                ';
            $asset_register_count++;
        }

    } else {
        $asset_register_show .= '
                <tr>
                    <td colspan="4">No Functional Office Created yet...</td>
                </tr>
            ';
    }
    $asset_register_show .= '
                 </tbody>
               </table>
            ';
    echo $asset_register_show;
}

//==================================| FETCH SUBCLASS REGISTER 

$asset_class_show = '';
if (isset($_POST['fetch_class_subClass'])) {
    // $asset_subclass_district = "AND";
    // $asset_subclass_region = "Ashanti";
    $asset_subclass_sql = "SELECT  * FROM asset_code WHERE region='$session_login_region' AND district='$session_login_district' ORDER BY date_created desc";
    $asset_class_show .= '
            <table class="table table-striped">
                          <thead>
                            <tr>
                               <th>#</th>
                              <th>Class Code</th>
                              <th>Sub Class Code</th>
                              <th>Class Definition</th>
                              <th>Control</th>
                            </tr>
                          </thead>
                          <tbody>
        ';
    $asset_subclass_count = 1;
    $asset_subclass_result = mysqli_query($conn, $asset_subclass_sql);
    if (mysqli_num_rows($asset_subclass_result) > 0) {
        while ($asset_subclass_row = mysqli_fetch_array($asset_subclass_result)) {
            $asset_class_show .= '
                    <tr>
                        <th scope="row">' . $asset_subclass_count . '</th>
                        <td>' . $asset_subclass_row['class_code'] . '</td>
                        <td>' . $asset_subclass_row['sub_class_code'] . '</td>
                        <td>' . $asset_subclass_row['class_definition'] . '</td>
                        
                        <td>
                           <button type="buttom" class="btn btn-danger delete_subclass btn-sm" id="' . $asset_subclass_row['sub_class_code'] . '" name="' . $asset_subclass_row['sub_class_code'] . '" value="' . $asset_subclass_row['sub_class_code'] . '"><i class="fa  fa-trash "></i></button>

                         <!--  <button type="buttom" class="btn btn-success update_subclass btn-sm"  id="' . $asset_subclass_row['sub_class_code'] . '" data-toggle="modal" data-target="#locational_exampleModal"><i class="fa  fa-pencil"></i></button>  -->
                        </td>
                        
                    </tr>
                ';
            $asset_subclass_count++;
        }

    } else {
        $asset_class_show .= '
                <tr>
                    <td colspan="5">No Asset Code Created yet...</td>
                </tr>
            ';
    }
    $asset_class_show .= '
                 </tbody>
               </table>
            ';
    echo $asset_class_show;
}

//================================| DELETE ASSET |
if (isset($_POST['delete_asset'])) {

    $asset_id_delete = mysqli_real_escape_string($conn, $_POST['delete_asset']);
    // $asset_region_delete = "Ashanti";
    // $asset_district_delete = "AND";
    $asset_delete_sql = "DELETE FROM register_class WHERE class_code='$asset_id_delete' AND region='$session_login_region' AND district='$session_login_district'";

    $asset_delete_result = mysqli_query($conn, $asset_delete_sql);

    if ($asset_delete_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $asset_id_delete . '</strong> Has been deleted successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $asset_id_delete . '</strong> Has already been delete.
                      </div>
        ';

    }

}

//================================| DELETE SUBCLASS |
if (isset($_POST['delete_subclass'])) {

    $subclass_id_delete = mysqli_real_escape_string($conn, $_POST['delete_subclass']);
    // $subclass_region_delete = "Ashanti";
    // $subclass_district_delete = "AND";
    $subclass_delete_sql = "DELETE FROM asset_code WHERE sub_class_code='$subclass_id_delete' AND region='$session_login_region' AND district='$session_login_district'";

    $subclass_delete_result = mysqli_query($conn, $subclass_delete_sql);

    if ($subclass_delete_result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $subclass_id_delete . '</strong> Has been deleted successfully.
                      </div>';
    } else {
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $subclass_id_delete . '</strong> Has already been delete.
                      </div>
        ';

    }

}
?>