<?php 
require_once('../inc/db/db.php');
require_once('session.php');
include('../../script/date_time.php');
// include('session.php');
// $msg = '';
// if (isset($_POST['register_asset'])) {
//   $mmda = mysqli_real_escape_string($conn, $_POST['mmda']);
//   $region = mysqli_real_escape_string($conn, $_POST['region']);
//   $district = mysqli_real_escape_string($conn, $_POST['district']);
//   $item = mysqli_real_escape_string($conn, $_POST['item']);
//   $description = mysqli_real_escape_string($conn, $_POST['description']);
//   $id_show = mysqli_real_escape_string($conn, $_POST['id_show']);
//   $id_show_ = mysqli_real_escape_string($conn, $_POST['id_show_']);
//   $dept_show = mysqli_real_escape_string($conn, $_POST['residence_show']);
//   $room_show = mysqli_real_escape_string($conn, $_POST['_residence_show']);
//   $asset_date = mysqli_real_escape_string($conn, $_POST['asset_date']);
//   $supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
//   $price = mysqli_real_escape_string($conn, $_POST['price']);
//   $condition = mysqli_real_escape_string($conn, $_POST['condition']);
//   $unit_value = mysqli_real_escape_string($conn, $_POST['unit_value']);
//   $user_contact = mysqli_real_escape_string($conn, $_POST['user_contact']);
//   $model_number = mysqli_real_escape_string($conn, $_POST['model_number']);
//   $serial_no = mysqli_real_escape_string($conn, $_POST['serial_no']);
//   $photo = $_FILES['photo']['name'];

//     //move image to folder.
//   $Target = "../../upload/" . basename($_FILES['photo']['name']);
//   $_sql = "INSERT INTO asset_register VALUES('$mmda','$region','$district','$item','$description','$id_show','$id_show_','$dept_show','$room_show','$asset_date','$supplier','$price','$condition','$unit_value','$user_contact','$model_number','$serial_no','$photo','$DateTime')";

//   $_result = mysqli_query($conn, $_sql);
//   move_uploaded_file($_FILES['photo']['tmp_name'], $Target);

//   if ($_result) {
//     $msg .= '<div class="alert alert-success alert-dismissible fade show" role="alert">
//                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                           <span aria-hidden="true">&times;</span>
//                         </button>
//                         <strong>' . $id_show_ . '</strong> Has been save to <strong>' . $room_show . '</strong>.
//                       </div>';
//   } else {
//     $msg .= '
//             <div class="alert alert-warning alert-dismissible fade show" role="alert">
//                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                           <span aria-hidden="true">&times;</span>
//                         </button>
//                         <strong>' . $id_show_ . '</strong> Has already been created.
//                       </div>
//         ';
//   }

// }
?>
<!DOCTYPE html>
<html>
  <?php require_once('../inc/head.php'); ?>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <?php require_once('../inc/header.php'); ?>
      
        <div class="">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <!-- <h2 class="no-margin-bottom"><marquee><?php echo $session_login_region; ?></marquee></h2> -->
            </div>
          </header>
          <!-- Breadcrumb-->
          <!-- <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Asset Register</li>
            </ul>
          </div> -->
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Asset Register</h3>
                    </div>
                    <div class="card-body">
                      <div id=""></div>
                      <div id="" class="table-responsive">
                      <div class="table table-responsive">
                        View Asset by
                        <table class="table table-responsive table-borderless">
                          <thead>
                            <th>Department</th>
                            <th>Category</th>
                            <th>ID</th>
                            <th>Room</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-sm" id="department">
                                  <option selected>Choose...</option>
                                  <?php 
                                  $department_show = '';
                                  // $department_district = "a";
                                  // $department_region = "s";
                                  $department_sql = "SELECT DISTINCT(dept) FROM asset_register WHERE region='$session_login_region' AND mmda_mda='$session_login_district'";

                                  $department_result = mysqli_query($conn, $department_sql);

                                  while ($department_row = mysqli_fetch_array($department_result)) {
                                    $department_show .= '
                                        <option value="' . $department_row['dept'] . '">' . $department_row['dept'] . '</option>
                                      ';
                                  }
                                  ?>
                                  <?php echo $department_show; ?>
                                
                                </select> 
                              </td>
                              <td>
                               <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-sm" id="category">
                                <option selected>Choose...</option>
                                  <?php 
                                  $category_show = '';
                                  // $category_district = "a";
                                  // $category_region = "s";
                                  $category_sql = "SELECT DISTINCT(category) FROM asset_register WHERE region='$session_login_region' AND mmda_mda='$session_login_district'";

                                  $category_result = mysqli_query($conn, $category_sql);

                                  while ($category_row = mysqli_fetch_array($category_result)) {
                                    $category_show .= '
                                        <option value="' . $category_row['category'] . '">' . $category_row['category'] . '</option>
                                      ';
                                  }
                                  ?>
                                  <?php echo $category_show; ?>
                                
                                </select> 
                              </td>
                              <td>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-sm" id="id">
                                  <option selected>Choose...</option>
                                  <?php 
                                  $id_show = '';
                                  // $id_district = "a";
                                  // $id_region = "s";
                                  $id_sql = "SELECT DISTINCT(id) FROM asset_register WHERE region='$session_login_region' AND mmda_mda='$session_login_district'";

                                  $id_result = mysqli_query($conn, $id_sql);

                                  while ($id_row = mysqli_fetch_array($id_result)) {
                                    $id_show .= '
                                        <option value="' . $id_row['id'] . '">' . $id_row['id'] . '</option>
                                      ';
                                  }
                                  ?>
                                  <?php echo $id_show; ?>
                                
                                </select> 
                              </td>
                              <td>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-sm" id="room">
                                  <option selected>Choose...</option>
                                  <?php 
                                  $room_show = '';
                                  // $room_district = "a";
                                  // $room_region = "s";
                                  $room_sql = "SELECT DISTINCT(room) FROM asset_register WHERE region='$session_login_region' AND mmda_mda='$session_login_district'";

                                  $room_result = mysqli_query($conn, $room_sql);

                                  while ($room_row = mysqli_fetch_array($room_result)) {
                                    $room_show .= '
                                        <option value="' . $room_row['room'] . '">' . $room_row['room'] . '</option>
                                      ';
                                  }
                                  ?>
                                  <?php echo $room_show; ?>
                                
                                </select>
                              </td>
                              <td>
                                <div class="col-auto">
                                  <form class="form-inline">
                                    <label for="limit">Limit </label>&nbsp;
                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control-sm" id="limit">
                                          <option value="25">25</option>
                                          <option value="50">50</option>
                                          <option value="100">100</option>
                                          <option value="500">500</option>
                                          <option value="999999999999">All</option>
                                        </select>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          </tbody>

                        </table>
                      </div>
                      
                        
                          
                                <div>
                                  <div id="show_asset"></div>
                                </div>
                                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('../inc/footer_links.php'); ?>
  </body>
</html>
<script>
$(document).ready(function(){
  //   //====================================== CHANGE CATEGORY =========================
  // $('#id_show').change(function(){
  //   var id_show = $('#id_show').val();

  //   $.ajax({
  //     url:'../../script/assetRegisterScript.php',
  //     method:'POST',
  //     data:{id_show:id_show},
  //     success:function(data){
  //       $('#category_show').html(data);
  //     }
  //    });
  // });

  //   //=======================================| CHANGE ROOM ========================================
  // $('#dept_show').change(function(){
  //   var dept_show = $('#dept_show').val();

  //   $.ajax({
  //     url:'../../script/assetRegisterScript.php',
  //     method:'POST',
  //     data:{dept_show:dept_show},
  //     success:function(data){
  //       $('#room_show').html(data);
  //     }
  //    });
  // });
 displayRegister();
  function displayRegister(){
   var select = "select";
   var limit = $('#limit').val();

    $.ajax({
      url:'../../script/assetRegisterScript.php',
      method:'POST',
      data:{select:select, limit:limit},
      success:function(data){
        $('#show_asset').html(data);
      }
     }); 
  }
//===========================================DEPARTMENT
 $('#department').change(function(){
  var department = $('#department').val();
  var dept_limit = $('#limit').val();

    $.ajax({
      url:'../../script/assetRegisterScript.php',
      method:'POST',
      data:{department:department, dept_limit:dept_limit},
      success:function(data){
        $('#show_asset').html(data);
      }
     });
 });

 //===========================================CATEGORY
 $('#category').change(function(){
  var category = $('#category').val();
  var cate_limit = $('#limit').val();

    $.ajax({
      url:'../../script/assetRegisterScript.php',
      method:'POST',
      data:{category:category, cate_limit:cate_limit},
      success:function(data){
        $('#show_asset').html(data);
      }
     });
 });

  //===========================================ID
 $('#id').change(function(){
  var id = $('#id').val();
  var id_limit = $('#limit').val();

    $.ajax({
      url:'../../script/assetRegisterScript.php',
      method:'POST',
      data:{id:id, id_limit:id_limit},
      success:function(data){
        $('#show_asset').html(data);
      }
     });
 });

   //===========================================ROOM
 $('#room').change(function(){
  var room = $('#room').val();
  var room_limit = $('#limit').val();

    $.ajax({
      url:'../../script/assetRegisterScript.php',
      method:'POST',
      data:{room:room, room_limit:room_limit},
      success:function(data){
        $('#show_asset').html(data);
      }
     });
 });

    //===========================================LIMIT
 $('#limit').change(function(){
 
  var lim_limit = $('#limit').val();

    $.ajax({
      url:'../../script/assetRegisterScript.php',
      method:'POST',
      data:{lim_limit:lim_limit},
      success:function(data){
        $('#show_asset').html(data);
      }
     });
 });

});
</script>