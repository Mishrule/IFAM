<?php 
include('../../script/db/db.php');
include('session.php');
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
              <h2 class="no-margin-bottom"><marquee><?php echo $session_login_region; ?></marquee></h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Class Definition</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Register a Class</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                      <div id="class_register_show"></div>
                        <table class="table">
                            <tr>
                              <td style="float:right;">Class Definition:</td>
                              <td><input type="text" class="form-control" id="class_name" name="class_name" placeholder="eg. Appliances" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">class Code:</td>
                              <td>
                                <input type="text" class="form-control" id="class_code" name="class_code" placeholder="eg. AP" required>
                              </td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Region:</td>
                              <td><input type="text" class="form-control" id="class_region" name="class_region" placeholder="Region" value="<?php echo $session_login_region; ?>" disabled></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="class_district" name="class_district" placeholder="District" value="<?php echo $session_login_district; ?>" disabled></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="class_submit" name="class_submit" value="class_submit">Assign</button></div></td>
                            </tr>                        
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Asset Code</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">  
                      <div id="asset_code_show"></div>
                        <table class="table">
                            <tr>
                              <td style="float:right;"><label style="padding-top:20px;" for="">Class Code:</label></td>
                              <td>
                                  <select class="custom-select d-block my-3" id="asset_class_code" name="asset_class_code" required>
                                  <option value="">Select a Section</option>
                                  <?php 
                                  $functional_office_show = '';
                                  $functional_office_sql = "SELECT * FROM register_class";
                                  $functional_office_result = mysqli_query($conn, $functional_office_sql);

                                  while ($functional_office_row = mysqli_fetch_array($functional_office_result)) {
                                    $functional_office_show .= '
                                        <option value="' . $functional_office_row['class_code'] . '">' . $functional_office_row['class_code'] . '</option>
                                      ';
                                  }
                                  ?>
                                    
                                    <?php echo $functional_office_show; ?>
                                  </select>
                              </td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Sub class Code:</td>
                              <td>
                                <input type="text" class="form-control" id="asset_sub_class_code" name="asset_sub_class_code" placeholder="eg. 1" required>
                              </td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Class Definition:</td>
                              <td>
                                <input type="text" class="form-control" id="asset_class_definition" name="asset_class_definition" placeholder="eg. Common Board" required>
                              </td>
                            </tr>
                            <tr>
                              <td style="float:right;">Region:</td>
                              <td><input type="text" class="form-control" id="asset_class_region" name="asset_class_region" placeholder="Region" value="<?php echo $session_login_region; ?>" disabled></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="asset_class_district" name="asset_class_district" placeholder="District" value="<?php echo $session_login_district; ?>" disabled></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="asset_class_submit" name="asset_class_submit" value="asset_class_submit"><i class="fa  fa-save "></i> Save</button></div></td>
                            </tr>                        
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Delete Class Code</h3>
                    </div>
                    <div class="card-body">
                    
                      <div class="table-responsive">  
                      <div id="delete_asset_show"></div>
                      <div id="update_class"></div>                     
                       
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Asset Codes – Class and Sub-class </h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">   
                      <div id="delete_subclass_show"></div>
                      <div id="update_class_subClass"></div>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div align="center"><a href="#" class="btn btn-info btn-sm">Click to Generate Reports</a></div> -->
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
  $(document).ready(function(){
    $('#class_submit').click(function(){
      var class_name  = $('#class_name').val();
      var class_code  = $('#class_code').val();
      var class_region  = $('#class_region').val();
      var class_district  = $('#class_district').val();
      var class_submit  = $('#class_submit').val();
      
      $.ajax({
        url:'../../script/classDefinitionScript.php',
        method:'POST',
        data:{class_name:class_name, class_code:class_code, class_region:class_region, class_district:class_district, class_submit:class_submit},
        success:function(data){
          $('#class_register_show').html(data);
          setTimeout(() => {
              $(".alert").alert('close');
              fetchClass();
            }, 3000);
        }
      })
    });
//=================================== | INSERT 
    $('#asset_class_submit').click(function(){
      var asset_class_code = $('#asset_class_code').val();
      var asset_sub_class_code = $('#asset_sub_class_code').val();
      var asset_class_definition = $('#asset_class_definition').val();
      var asset_class_region = $('#asset_class_region').val();
      var asset_class_district = $('#asset_class_district').val();
      var asset_class_submit = $('#asset_class_submit').val();

      $.ajax({
        url:'../../script/classDefinitionScript.php',
        method:'POST',
        data:{asset_class_code:asset_class_code, asset_sub_class_code:asset_sub_class_code, asset_class_definition:asset_class_definition, asset_class_region:asset_class_region, asset_class_district:asset_class_district, asset_class_submit:asset_class_submit},
        success:function(data){
          $('#asset_code_show').html(data);
          setTimeout(() => {
              $(".alert").alert('close');
              fetchSubclass();
            }, 3000);
        }
      })
    });
//=======================================| FETCH CLASS
fetchClass();
function fetchClass(){
  var fetch_class = "selectLocation";

  $.ajax({
    url:'../../script/classDefinitionScript.php',
    method:'POST',
    data:{fetch_class:fetch_class},
    success:function(data){
      $('#update_class').html(data);
    }
  });
}

//==============================| FETCH CLASS AND SUB CLASS
fetchSubclass();
function fetchSubclass(){
  var fetch_class_subClass = "selectLocation_subClass";

  $.ajax({
    url:'../../script/classDefinitionScript.php',
    method:'POST',
    data:{fetch_class_subClass:fetch_class_subClass},
    success:function(data){
      $('#update_class_subClass').html(data);
    }
  });
}

  //===========================| DELETE FROM DATABASE ASSET CODE |=========================
  $(document).on('click','.delete_location', function(){
      var delete_asset = $(this).attr('id');
      
     
      if(confirm("Are you sure you want to delete record")){
        $.ajax({
        url:'../../script/classDefinitionScript.php',
        method:'POST',
        data:{delete_asset:delete_asset },
        success:function(data){
          $('#delete_asset_show').html(data);
          setTimeout(() => {
            $(".alert").alert('close');
            fetchClass();
          }, 3000);
        }
      });
      }else{
        alert("Cancelled by user");
      }
  })

    //===========================| DELETE FROM DATABASE SUB CLASS|=========================
  $(document).on('click','.delete_subclass', function(){
      var delete_subclass = $(this).attr('id');
     
     
      if(confirm("Are you sure you want to delete record")){
        $.ajax({
        url:'../../script/classDefinitionScript.php',
        method:'POST',
        data:{delete_subclass:delete_subclass },
        success:function(data){
          $('#delete_subclass_show').html(data);
          setTimeout(() => {
            $(".alert").alert('close');
            fetchSubclass();
          }, 3000);
        }
      });
      }else{
        alert("Cancelled by user");
      }
  })


  });
</script>