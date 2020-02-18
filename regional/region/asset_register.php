<?php 
require_once('../inc/db/db.php');
require_once('session.php');
include('../../script/date_time.php');
// include('session.php');
// session_user_name
//   session_login_district
//   session_login_region
//   session_login_location
$msg = '';
if (isset($_POST['register_asset'])) {
  $mmda = mysqli_real_escape_string($conn, $_POST['mmda']);
  $region = mysqli_real_escape_string($conn, $_POST['region']);
  $district = mysqli_real_escape_string($conn, $_POST['district']);
  $item = mysqli_real_escape_string($conn, $_POST['item']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $id_show = mysqli_real_escape_string($conn, $_POST['id_show']);
  $id_show_ = mysqli_real_escape_string($conn, $_POST['id_show_']);
  $dept_show = mysqli_real_escape_string($conn, $_POST['dept_show']);
  $room_show = mysqli_real_escape_string($conn, $_POST['room_show']);
  $asset_date = mysqli_real_escape_string($conn, $_POST['asset_date']);
  $supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $condition = mysqli_real_escape_string($conn, $_POST['condition']);
  $unit_value = mysqli_real_escape_string($conn, $_POST['unit_value']);
  $user_contact = mysqli_real_escape_string($conn, $_POST['user_contact']);
  $model_number = mysqli_real_escape_string($conn, $_POST['model_number']);
  $serial_no = mysqli_real_escape_string($conn, $_POST['serial_no']);
  $photo = $_FILES['photo']['name'];

    //move image to folder.
  $Target = "../../upload/" . basename($_FILES['photo']['name']);
  $_sql = "INSERT INTO asset_register VALUES('$mmda','$region','$district','$item','$description','$id_show','$id_show_','$dept_show','$room_show','$asset_date','$supplier','$price','$condition','$unit_value','$user_contact','$model_number','$serial_no','$photo','$DateTime')";

  $_result = mysqli_query($conn, $_sql);
  move_uploaded_file($_FILES['photo']['tmp_name'], $Target);

  if ($_result) {
    $msg .= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $id_show_ . '</strong> Has been save to <strong>' . $room_show . '</strong>.
                      </div>';
  } else {
    $msg .= '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>' . $id_show_ . '</strong> Has already been created.
                      </div>
        ';
  }

}
?>
<!DOCTYPE html>
<html>
<?php require_once('../inc/head.php'); ?>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <?php require_once('../inc/header.php'); ?>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php require_once('../inc/nav.php'); ?>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">
                            <marquee><?php echo $session_login_region; ?></marquee>
                        </h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Asset Register</li>
                    </ul>
                </div>
                <section class="tables">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-close">
                                        <div class="dropdown">
                                            <button type="button" id="closeCard1" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard1"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Asset Register</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $msg; ?>

                                        <div align="center">
                                            <div>Select the Location from the link below</div>
                                            <div class="form-check" style="padding-top:10px;">
                                                <span style="padding-right:50px;">
                                                    <input class="form-check-input form-check-inline" type="radio"
                                                        name="f_location" id="f_location1" value="option1" checked>
                                                    <a href="asset_register.php">Functional Location</a>
                                                </span>
                                                <span>
                                                    <input class="form-check-input form-check-inline" type="radio"
                                                        name="f_location" id="f_location2" value="option2">
                                                    <a href="asset_register_residence.php">Residence Location</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <form action="<?php $_PHP_SELF ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <table class="table">
                                                    <tr>
                                                        <td><strong>MMDA/MDA:</strong><input type="text"
                                                                class="form-control" id="mmda" name="mmda"
                                                                placeholder="MMDA"
                                                                value="<?php echo $session_login_district; ?>" disabled>
                                                        </td>
                                                        <td><strong>REGION:</strong><input type="text"
                                                                class="form-control" id="region" name="region"
                                                                placeholder="REGION"
                                                                value="<?php echo $session_login_region; ?>" disabled>
                                                        </td>
                                                        <td><strong>DISTRICT:</strong><input type="text"
                                                                class="form-control" id="district" name="district"
                                                                placeholder="District"
                                                                value="<?php echo $session_login_location; ?>" disabled>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><label for=""><strong><span
                                                                        style="color:red">ITEM
                                                                        DESCRIPTION</span></strong></label></td>
                                                    </tr>
                                                    <tr>

                                                        <td><strong>ITEM NO.:</strong><input type="text"
                                                                class="form-control" id="item" name="item"
                                                                placeholder="Item No." required>
                                                        </td>
                                                        <td><strong>DESCRIPTION:</strong><input type="text"
                                                                class="form-control" id="description" name="description"
                                                                placeholder="DESCRIPTION" required>
                                                        </td>
                                                        <td>
                                                            <select class="custom-select d-block my-3 " id="id_show"
                                                                name="id_show" required>
                                                                <option value="">Select an ID</option>
                                                                <?php 
                                $department_unit_update = '';
                                // $district_update = "AND";
                                // $region_update = "Ashanti";
                                $department_unit_sql_update = "SELECT DISTINCT(class_code) FROM register_class WHERE region='$session_login_region' AND district='$session_login_district'";

                                $department_unit_result_update = mysqli_query($conn, $department_unit_sql_update);

                                while ($department_unit_row_update = mysqli_fetch_array($department_unit_result_update)) {
                                  $department_unit_update .= '
                                        <option value="' . $department_unit_row_update['class_code'] . '">' . $department_unit_row_update['class_code'] . '</option>
                                      ';
                                }
                                ?>
                                                                <?php echo $department_unit_update; ?>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div id="category_show"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><label for=""><strong><span
                                                                        style="color:red">LOCATION</span></strong></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <td>
                               
                              </td> -->
                                                        <td>
                                                            <div id="dept_show_radio">
                                                                <select class="custom-select d-block my-3 "
                                                                    id="dept_show" name="dept_show" required>
                                                                    <option value="">SELECT DEPT</option>
                                                                    <?php 
                                $dept_show = '';
                                // $dept_district = "AND";
                                // $dept_show = "Ashanti";
                                $dept_sql = "SELECT DISTINCT(section_name) FROM functional_location WHERE region='$session_login_region' AND district='$session_login_district'";

                                $dept_result = mysqli_query($conn, $dept_sql);

                                while ($dept_row = mysqli_fetch_array($dept_result)) {
                                  $dept_show .= '
                                        <option value="' . $dept_row['section_name'] . '">' . $dept_row['section_name'] . '</option>
                                      ';
                                }
                                ?>
                                                                    <?php echo $dept_show; ?>

                                                                </select>
                                                            </div>
                                                            <!-------------------------- RESIDENCE -->
                                                            <!-- <div id="residence_show_radio">
                                <select class="custom-select d-block my-3 " id="residence_show" name="residence_show" required>
                               <option value="">SELECT DEPT</option>
                                 <?php 
                                $residence_show = '';
                                // $residence_district = "AND";
                                // $residence_show = "Ashanti";
                                $residence_sql = "SELECT * FROM residence_code WHERE region='$session_login_region' AND district='$session_login_district'";

                                $residence_result = mysqli_query($conn, $residence_sql);

                                while ($residence_row = mysqli_fetch_array($residence_result)) {
                                  $residence_show .= '
                                        <option value="' . $residence_row['title'] . '">' . $residence_row['title'] . '</option>
                                      ';
                                }
                                ?>
                                  <?php echo $residence_show; ?>
                                
                                </select>
                             </div> -->
                                                        </td>

                                                        <td>
                                                            <div id="room_show_radio">
                                                                <div id="room_show"></div>
                                                            </div>

                                                            <!-- <div id="_residence_show_radio">
                                 <select class="custom-select d-block my-3 " id="_residence_show" name="_residence_show" required>
                               <option value="">SELECT ROOM</option>
                                 <?php 
                                $_residence_show = '';
                                // $_residence_district = "AND";
                                // $_residence_show = "Ashanti";
                                $_residence_sql = "SELECT * FROM residence_code WHERE region='$session_login_region' AND district='$session_login_district'";

                                $_residence_result = mysqli_query($conn, $_residence_sql);

                                while ($_residence_row = mysqli_fetch_array($_residence_result)) {
                                  $_residence_show .= '
                                        <option value="' . $_residence_row['residence_code'] . '">' . $_residence_row['residence_code'] . '</option>
                                      ';
                                }
                                ?>
                                  <?php echo $_residence_show; ?>
                                
                                </select>
                              </div> -->
                                                        </td>

                                                        <td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><label for=""><strong><span
                                                                        style="color:red">PURCHASE
                                                                        INFORMATION</span></strong></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>DATE:</strong><input type="date"
                                                                class="form-control" id="asset_date" name="asset_date"
                                                                placeholder="Date" required>
                                                        </td>
                                                        <td><strong>SUPPLIER:</strong><input type="text"
                                                                class="form-control" id="supplier" name="supplier"
                                                                placeholder="SUPPLIER" required>
                                                        </td>
                                                        <td><strong>PRICE.:</strong><input type="text"
                                                                class="form-control" id="price" name="price"
                                                                placeholder="Price" required>
                                                        </td>
                                                        <td>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><label for=""><strong><span
                                                                        style="color:red">QUALITY AND
                                                                        VALUE</span></strong></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>CONDITION:</strong><input type="text"
                                                                class="form-control" id="condition" name="condition"
                                                                placeholder="Condition" required>
                                                        </td>
                                                        <td><strong>UNIT VALUE:</strong><input type="text"
                                                                class="form-control" id="unit_value" name="unit_value"
                                                                placeholder="Unit Value" required>
                                                        </td>
                                                        <td><strong>QTY:</strong><input type="text" class="form-control"
                                                                id="user_contact" name="user_contact"
                                                                placeholder="Quantity" required>
                                                        </td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><label for=""><strong><span
                                                                        style="color:red">ITEM
                                                                        DETAILS</span></strong></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>MODEL NO.:</strong><input type="text"
                                                                class="form-control" id="model_number"
                                                                name="model_number" placeholder="Model No." required>
                                                        </td>
                                                        <td><strong>SERIAL NO.:</strong><input type="text"
                                                                class="form-control" id="serial_no" name="serial_no"
                                                                placeholder="Serial Number" required>
                                                        </td>
                                                        <td><strong>PHOTO INFO UNIT</strong><input type="file"
                                                                class="form-control" id="photo" name="photo"
                                                                placeholder="Photo Info Unit" required>
                                                        </td>
                                                        <td>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <div align="center">
                                                                <!-- <div style="padding-top:20px;"> -->
                                                                <input type="checkbox" class="btn btn-dark btn-sm"
                                                                    id="agree_register_asset"
                                                                    name="agree_register_asset"> Agree
                                                                <button type="submit" class="btn btn-dark btn-sm"
                                                                    id="register_asset" name="register_asset">Register
                                                                    Asset</button>
                                                                <!-- </div> -->
                                                                <a href="preview_registered_asset.php"
                                                                    class="btn btn-primary btn-sm" id="register_asset"
                                                                    target="_blank" name="register_asset">Preview
                                                                    Registered Asset</a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- Page Footer-->
                <?php require_once('../inc/footer.php'); ?>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('../inc/footer_links.php'); ?>
</body>

</html>
<script>
$(document).ready(function() {
    //====================================== CHANGE CATEGORY =========================
    $('#id_show').change(function() {
        var id_show = $('#id_show').val();

        $.ajax({
            url: '../../script/assetRegisterScript.php',
            method: 'POST',
            data: {
                id_show: id_show
            },
            success: function(data) {
                $('#category_show').html(data);
            }
        });
    });

    //=======================================| CHANGE ROOM ========================================
    $('#dept_show').change(function() {
        var dept_show = $('#dept_show').val();

        $.ajax({
            url: '../../script/assetRegisterScript.php',
            method: 'POST',
            data: {
                dept_show: dept_show
            },
            success: function(data) {
                $('#room_show').html(data);
            }
        });
    });

    //     $('#dept_show_radio').show();
    //     $('#residence_show_radio').hide();
    //     $('#room_show_radio').show();
    //     $('#_residence_show_radio').hide();

    // $('#f_location1').click(function(){
    //   if(this.checked){
    //     $('#dept_show_radio').show();
    //     $('#residence_show_radio').hide();
    //     $('#room_show_radio').show();
    //     $('#_residence_show_radio').hide();
    //     // $('#residence_show').val('SELECT DEPT');
    //   }else{
    //     // $('#combo_dept').hide();
    //     // $('#combo_room').hide();
    //   }
    // });
    // $('#f_location2').click(function(){
    //   if(this.checked){
    //     $('#dept_show_radio').hide();
    //     $('#residence_show_radio').show();
    //     $('#room_show_radio').hide();
    //     $('#_residence_show_radio').show();
    //   }else{
    //     // $('#combo_residence').hide();
    //     // $('#_combo_residence').hide();
    //   }
    // });

});
</script>