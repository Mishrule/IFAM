<?php 
        //======================================== INCLUDES =========================================
include('db/db.php');
include('date_time.php');
include('sessions.php');
// $district_code = $session_login_district;
// $district_region = $session_login_region;

//==========================================|CHANGE CATEGORY =================================
$show_id = '';
if (isset($_POST['id_show'])) {
    $id_show = mysqli_real_escape_string($conn, $_POST['id_show']);
    // $id_district = 'AND';
    // $id_region = 'Ashanti';

    $id_sql = "SELECT * FROM register_class WHERE class_code='$id_show' AND district='$session_login_district' AND region='$session_login_region'";
    $id_result = mysqli_query($conn, $id_sql);
    $show_id .= '
        <select class="custom-select d-block my-3 " id="id_show_" name="id_show_" required>
         <option value="">Select Category</option>
    ';
    if (mysqli_num_rows($id_result) > 0) {
        while ($id_row = mysqli_fetch_array($id_result)) {
            $show_id .= '
                  <option value="' . $id_row['class_definition'] . '">' . $id_row['class_definition'] . '</option>
            ';
        }
    } else {
        $show_id .= '
            <option>No Category available</option>
        ';
    }
    $show_id .= '</select>';
    echo $show_id;
}

//==========================================|CHANGE ROOM |=================================
$show_room = '';
if (isset($_POST['dept_show'])) {
    $dept_show = mysqli_real_escape_string($conn, $_POST['dept_show']);
    // $room_district = 'AND';
    // $room_region = 'Ashanti';

    $room_sql = "SELECT * FROM functional_location WHERE section_name='$dept_show' AND district='$session_login_district' AND region='$session_login_region'";
    $room_result = mysqli_query($conn, $room_sql);
    $show_room .= '
        <select class="custom-select d-block my-3 " id="room_show" name="room_show" required>
         <option value="">SELECT ROOM...</option>
    ';
    if (mysqli_num_rows($room_result) > 0) {
        while ($room_row = mysqli_fetch_array($room_result)) {
            $show_room .= '
                  <option value="' . $room_row['code_id'] . '">' . $room_row['code_id'] . '</option>
            ';
        }
    } else {
        $show_room .= '
            <option>No ROOM available</option>
        ';
    }
    $show_room .= '</select>';
    echo $show_room;
}

//===================================================================================================================
//                                             PREVIEW ASSET REGISTER
//===================================================================================================================
//==========================================| DISPLAY ASSET |========================================================
if (isset($_POST['select'])) {
    $limit = mysqli_real_escape_string($conn, $_POST['limit']);
    // $district = "a";
    // $region = "s";
    // $mmda_mda = "a";
    $show_asset = '';
    $asset_sql = "SELECT * FROM asset_register WHERE mmda_mda='$session_login_district' AND region='$session_login_region' AND district='$session_login_location' ORDER BY date_created DESC LIMIT $limit";
    $asset_result = mysqli_query($conn, $asset_sql);
    $count = 1;
    $show_asset .= '
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Item_NO:</th>
                <th>Description</th>
                <th>ID</th>
                <th>Category</th>
                <th>Dept</th>
                <th>Room</th>
                <th>Asset Date</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Unit Value</th>
                <th>Qty</th>
                <th>Model No.</th>
                <th>Serial No.</th>
                <th>Photo</th>
                <th>date Saved</th>
             </thead>
             <tbody>
    
    ';
    if (mysqli_num_rows($asset_result) > 0) {
        while ($asset_row = mysqli_fetch_array($asset_result)) {
            $show_asset .= '
                <tr>
                    <td>' . $count . '</td>
                    <td>' . $asset_row['item_number'] . '</td>
                    <td>' . $asset_row['description'] . '</td>
                    <td>' . $asset_row['id'] . '</td>
                    <td>' . $asset_row['category'] . '</td>
                    <td>' . $asset_row['dept'] . '</td>
                    <td>' . $asset_row['room'] . '</td>
                    <td>' . $asset_row['asset_date'] . '</td>
                    <td>' . $asset_row['supplier'] . '</td>
                    <td>' . $asset_row['price'] . '</td>
                    <td>' . $asset_row['condition'] . '</td>
                    <td>' . $asset_row['unit_value'] . '</td>
                    <td>' . $asset_row['qty'] . '</td>
                    <td>' . $asset_row['model_no'] . '</td>
                    <td>' . $asset_row['serial_no'] . '</td>
                    <td><img src="../../upload/' . $asset_row['photo_info_unit'] . '" class="img-thumbnail" width="50px"</td>
                    <td>' . $asset_row['date_created'] . '</td>
                                    
                </tr>
            ';

            $count++;
        }
    } else {
        $show_asset .= '
                <tr>
                    <td colspan="17">
                    <marquee>SORRY THERE IS NO ASSET FOR THIS DISTRICT...</marquee>
                    </td>
                 </tr>
                ';
    }
    $show_asset .= '
            <tr>
                <td colspan="17">
                  <div align="center">
                    <button type="button" class="btn btn-primary btn-sm">Print</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                 </div>
                </td>
            </tr>

    ';
    $show_asset .= '
        </body>
        </table>
    ';
    echo $show_asset;

}

//==========================================|DEPARTMENT |=================================
if (isset($_POST['department'])) {
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $dept_limit = mysqli_real_escape_string($conn, $_POST['dept_limit']);
    // $dept_district = "a";
    // $dept_region = "s";
    // $dept_mmda_mda = "a";
    $dept_asset = '';
    $dept_sql = "SELECT * FROM asset_register WHERE mmda_mda='$session_login_district' AND dept='$department' AND region='$session_login_region' AND district='$session_login_location' ORDER BY date_created DESC LIMIT $dept_limit";
    $dept_result = mysqli_query($conn, $dept_sql);
    $dept_count = 1;
    $dept_asset .= '
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Item_NO:</th>
                <th>Description</th>
                <th>ID</th>
                <th>Category</th>
                <th>Dept</th>
                <th>Room</th>
                <th>Asset Date</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Unit Value</th>
                <th>Qty</th>
                <th>Model No.</th>
                <th>Serial No.</th>
                <th>Photo</th>
                <th>date Saved</th>
             </thead>
             <tbody>
    
    ';
    if (mysqli_num_rows($dept_result) > 0) {
        while ($dept_row = mysqli_fetch_array($dept_result)) {
            $dept_asset .= '
                <tr>
                    <td>' . $dept_count . '</td>
                    <td>' . $dept_row['item_number'] . '</td>
                    <td>' . $dept_row['description'] . '</td>
                    <td>' . $dept_row['id'] . '</td>
                    <td>' . $dept_row['category'] . '</td>
                    <td>' . $dept_row['dept'] . '</td>
                    <td>' . $dept_row['room'] . '</td>
                    <td>' . $dept_row['asset_date'] . '</td>
                    <td>' . $dept_row['supplier'] . '</td>
                    <td>' . $dept_row['price'] . '</td>
                    <td>' . $dept_row['condition'] . '</td>
                    <td>' . $dept_row['unit_value'] . '</td>
                    <td>' . $dept_row['qty'] . '</td>
                    <td>' . $dept_row['model_no'] . '</td>
                    <td>' . $dept_row['serial_no'] . '</td>
                    <td><img src="../../upload/' . $dept_row['photo_info_unit'] . '" class="img-thumbnail" width="50px"</td>
                    <td>' . $dept_row['date_created'] . '</td>
                                    
                </tr>
            ';

            $dept_count++;
        }
    } else {
        $dept_asset .= '
                <tr>
                    <td colspan="17">
                    <marquee>SORRY THERE IS NO ASSET FOR THIS DISTRICT...</marquee>
                    </td>
                 </tr>
                ';
    }
    $dept_asset .= '
            <tr>
                <td colspan="17">
                  <div align="center">
                    <button type="button" class="btn btn-primary btn-sm">Print</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                 </div>
                </td>
            </tr>

    ';
    $dept_asset .= '
        </body>
        </table>
    ';
    echo $dept_asset;

}

//==========================================|CATEGORY |=================================
if (isset($_POST['category'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $category_limit = mysqli_real_escape_string($conn, $_POST['cate_limit']);
    // $category_district = "a";
    // $category_region = "s";
    // $category_mmda_mda = "a";
    $category_asset = '';
    $category_sql = "SELECT * FROM asset_register WHERE mmda_mda='$session_login_district' AND category='$category' AND region='$session_login_region' AND district='$session_login_location' ORDER BY date_created DESC LIMIT $category_limit";
    $category_result = mysqli_query($conn, $category_sql);
    $category_count = 1;
    $category_asset .= '
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Item_NO:</th>
                <th>Description</th>
                <th>ID</th>
                <th>Category</th>
                <th>Dept</th>
                <th>Room</th>
                <th>Asset Date</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Unit Value</th>
                <th>Qty</th>
                <th>Model No.</th>
                <th>Serial No.</th>
                <th>Photo</th>
                <th>date Saved</th>
             </thead>
             <tbody>
    
    ';
    if (mysqli_num_rows($category_result) > 0) {
        while ($category_row = mysqli_fetch_array($category_result)) {
            $category_asset .= '
                <tr>
                    <td>' . $category_count . '</td>
                    <td>' . $category_row['item_number'] . '</td>
                    <td>' . $category_row['description'] . '</td>
                    <td>' . $category_row['id'] . '</td>
                    <td>' . $category_row['category'] . '</td>
                    <td>' . $category_row['dept'] . '</td>
                    <td>' . $category_row['room'] . '</td>
                    <td>' . $category_row['asset_date'] . '</td>
                    <td>' . $category_row['supplier'] . '</td>
                    <td>' . $category_row['price'] . '</td>
                    <td>' . $category_row['condition'] . '</td>
                    <td>' . $category_row['unit_value'] . '</td>
                    <td>' . $category_row['qty'] . '</td>
                    <td>' . $category_row['model_no'] . '</td>
                    <td>' . $category_row['serial_no'] . '</td>
                    <td><img src="../../upload/' . $category_row['photo_info_unit'] . '" class="img-thumbnail" width="50px"</td>
                    <td>' . $category_row['date_created'] . '</td>
                                    
                </tr>
            ';

            $category_count++;
        }
    } else {
        $category_asset .= '
                <tr>
                    <td colspan="17">
                    <marquee>SORRY THERE IS NO ASSET FOR THIS DISTRICT...</marquee>
                    </td>
                 </tr>
                ';
    }
    $category_asset .= '
            <tr>
                <td colspan="17">
                  <div align="center">
                    <button type="button" class="btn btn-primary btn-sm">Print</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                 </div>
                </td>
            </tr>

    ';
    $category_asset .= '
        </body>
        </table>
    ';
    echo $category_asset;

}

//==========================================|ID |=================================
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $id_limit = mysqli_real_escape_string($conn, $_POST['id_limit']);
    // $id_district = "a";
    // $id_region = "s";
    // $id_mmda_mda = "a";
    $id_asset = '';
    $id_sql = "SELECT * FROM asset_register WHERE mmda_mda='$session_login_district' AND id='$id' AND region='$session_login_region' AND district='$session_login_location' ORDER BY date_created DESC LIMIT $id_limit";
    $id_result = mysqli_query($conn, $id_sql);
    $id_count = 1;
    $id_asset .= '
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Item_NO:</th>
                <th>Description</th>
                <th>ID</th>
                <th>Category</th>
                <th>Dept</th>
                <th>Room</th>
                <th>Asset Date</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Unit Value</th>
                <th>Qty</th>
                <th>Model No.</th>
                <th>Serial No.</th>
                <th>Photo</th>
                <th>date Saved</th>
             </thead>
             <tbody>
    
    ';
    if (mysqli_num_rows($id_result) > 0) {
        while ($id_row = mysqli_fetch_array($id_result)) {
            $id_asset .= '
                <tr>
                    <td>' . $id_count . '</td>
                    <td>' . $id_row['item_number'] . '</td>
                    <td>' . $id_row['description'] . '</td>
                    <td>' . $id_row['id'] . '</td>
                    <td>' . $id_row['category'] . '</td>
                    <td>' . $id_row['dept'] . '</td>
                    <td>' . $id_row['room'] . '</td>
                    <td>' . $id_row['asset_date'] . '</td>
                    <td>' . $id_row['supplier'] . '</td>
                    <td>' . $id_row['price'] . '</td>
                    <td>' . $id_row['condition'] . '</td>
                    <td>' . $id_row['unit_value'] . '</td>
                    <td>' . $id_row['qty'] . '</td>
                    <td>' . $id_row['model_no'] . '</td>
                    <td>' . $id_row['serial_no'] . '</td>
                    <td><img src="../../upload/' . $id_row['photo_info_unit'] . '" class="img-thumbnail" width="50px"</td>
                    <td>' . $id_row['date_created'] . '</td>
                                    
                </tr>
            ';

            $id_count++;
        }
    } else {
        $id_asset .= '
                <tr>
                    <td colspan="17">
                    <marquee>SORRY THERE IS NO ASSET FOR THIS DISTRICT...</marquee>
                    </td>
                 </tr>
                ';
    }
    $id_asset .= '
            <tr>
                <td colspan="17">
                  <div align="center">
                    <button type="button" class="btn btn-primary btn-sm">Print</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                 </div>
                </td>
            </tr>
    ';
    $id_asset .= '
        </body>
        </table>
    ';
    echo $id_asset;

}

//==========================================|ROOM |=================================
if (isset($_POST['room'])) {
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $room_limit = mysqli_real_escape_string($conn, $_POST['room_limit']);
    // $room_district = "a";
    // $room_region = "s";
    // $room_mmda_mda = "a";
    $room_asset = '';
    $room_sql = "SELECT * FROM asset_register WHERE mmda_mda='$session_login_district' AND room='$room' AND region='$session_login_region' AND district='$session_login_location' ORDER BY date_created DESC LIMIT $room_limit";
    $room_result = mysqli_query($conn, $room_sql);
    $room_count = 1;
    $room_asset .= '
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Item_NO:</th>
                <th>Description</th>
                <th>Id</th>
                <th>Category</th>
                <th>Dept</th>
                <th>Room</th>
                <th>Asset Date</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Unit Value</th>
                <th>Qty</th>
                <th>Model No.</th>
                <th>Serial No.</th>
                <th>Photo</th>
                <th>date Saved</th>
             </thead>
             <tbody>
    
    ';
    if (mysqli_num_rows($room_result) > 0) {
        while ($room_row = mysqli_fetch_array($room_result)) {
            $room_asset .= '
                <tr>
                    <td>' . $room_count . '</td>
                    <td>' . $room_row['item_number'] . '</td>
                    <td>' . $room_row['description'] . '</td>
                    <td>' . $room_row['id'] . '</td>
                    <td>' . $room_row['category'] . '</td>
                    <td>' . $room_row['dept'] . '</td>
                    <td>' . $room_row['room'] . '</td>
                    <td>' . $room_row['asset_date'] . '</td>
                    <td>' . $room_row['supplier'] . '</td>
                    <td>' . $room_row['price'] . '</td>
                    <td>' . $room_row['condition'] . '</td>
                    <td>' . $room_row['unit_value'] . '</td>
                    <td>' . $room_row['qty'] . '</td>
                    <td>' . $room_row['model_no'] . '</td>
                    <td>' . $room_row['serial_no'] . '</td>
                    <td><img src="../../upload/' . $room_row['photo_info_unit'] . '" class="img-thumbnail" width="50px"</td>
                    <td>' . $room_row['date_created'] . '</td>
                                    
                </tr>
            ';

            $room_count++;
        }
    } else {
        $room_asset .= '
                <tr>
                    <td colspan="17">
                    <marquee>SORRY THERE IS NO ASSET FOR THIS DISTRICT...</marquee>
                    </td>
                 </tr>
                ';
    }
    $room_asset .= '
            <tr>
                <td colspan="17">
                  <div align="center">
                    <button type="button" class="btn btn-primary btn-sm">Print</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                 </div>
                </td>
            </tr>

    ';
    $room_asset .= '
        </body>
        </table>
    ';
    echo $room_asset;

}

//==========================================|LIMIT |=================================
if (isset($_POST['lim_limit'])) {

    $limit_ = mysqli_real_escape_string($conn, $_POST['lim_limit']);
    // $limit_district = "a";
    // $limit_region = "s";
    // $limit_mmda_mda = "a";
    $limit_asset = '';
    $limit_sql = "SELECT * FROM asset_register WHERE mmda_mda='$session_login_district'  AND region='$session_login_region' AND district='$session_login_location' ORDER BY date_created DESC LIMIT $limit_";
    $limit_result = mysqli_query($conn, $limit_sql);
    $limit_count = 1;
    $limit_asset .= '
        <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Item_NO:</th>
                <th>Description</th>
                <th>Id</th>
                <th>Category</th>
                <th>Dept</th>
                <th>Room</th>
                <th>Asset Date</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Unit Value</th>
                <th>Qty</th>
                <th>Model No.</th>
                <th>Serial No.</th>
                <th>Photo</th>
                <th>date Saved</th>
             </thead>
             <tbody>
    
    ';
    if (mysqli_num_rows($limit_result) > 0) {
        while ($limit_row = mysqli_fetch_array($limit_result)) {
            $limit_asset .= '
                <tr>
                    <td>' . $limit_count . '</td>
                    <td>' . $limit_row['item_number'] . '</td>
                    <td>' . $limit_row['description'] . '</td>
                    <td>' . $limit_row['id'] . '</td>
                    <td>' . $limit_row['category'] . '</td>
                    <td>' . $limit_row['dept'] . '</td>
                    <td>' . $limit_row['room'] . '</td>
                    <td>' . $limit_row['asset_date'] . '</td>
                    <td>' . $limit_row['supplier'] . '</td>
                    <td>' . $limit_row['price'] . '</td>
                    <td>' . $limit_row['condition'] . '</td>
                    <td>' . $limit_row['unit_value'] . '</td>
                    <td>' . $limit_row['qty'] . '</td>
                    <td>' . $limit_row['model_no'] . '</td>
                    <td>' . $limit_row['serial_no'] . '</td>
                    <td><img src="../../upload/' . $limit_row['photo_info_unit'] . '" class="img-thumbnail" width="50px"</td>
                    <td>' . $limit_row['date_created'] . '</td>
                                    
                </tr>
            ';

            $limit_count++;
        }
    } else {
        $limit_asset .= '
                <tr>
                    <td colspan="17">
                    <marquee>SORRY THERE IS NO ASSET FOR THIS DISTRICT...</marquee>
                    </td>
                 </tr>
                ';
    }
    $limit_asset .= '
            <tr>
                <td colspan="17">
                  <div align="center">
                    <button type="button" class="btn btn-primary btn-sm">Print</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                 </div>
                </td>
            </tr>
        
    ';
    $limit_asset .= '
        </body>
        </table>
    ';
    echo $limit_asset;

}
?>