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
              <h2 class="no-margin-bottom"><marquee>ASHANTI REGION</marquee></h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Residence</li>
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
                      <h3 class="h4">Assign Code to Residence</h3>
                    </div>
                    <div class="card-body">
                    <div id="assign_show"></div>
                      <div class="table-responsive">
                        <table class="table">
                            <tr>
                              <td style="float:right;">Title:</td>
                              <td><input type="text" class="form-control" id="title_name" name="title_name" placeholder="eg. District Chief Executive" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Residence Code:</td>
                              <td>
                                <input type="text" class="form-control" id="residence_code" name="residence_code" placeholder="eg. RB0101" required>
                              </td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Region:</td>
                              <td><input type="text" class="form-control" id="residence_region" name="residence_region" placeholder="Region" ></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="residence_district" name="residence_district" placeholder="District" ></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="residence_submit">Assign</button></div></td>
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
                      <h3 class="h4">Residence Info</h3>
                    </div>
                    <div class="card-body">
                    
                      <div class="table-responsive">  
                        <!-- <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              
                              <th>Title</th>
                              <th>Residence Code ID</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                             
                              <td>Chief Executive Officer</td>
                              <td>AD01</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="residence_delete" id="residence_delete">Delete</button>
                                <button type="buttom" class="btn btn-success btn-sm" id="residence_update" id="residence_update">Update</button>
                                </td>
                            </tr>
                           
                          </tbody>
                        </table> -->
                        <div id="delete_residence_info_show"></div>
                        <div id="residence_info_show"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Update District Details</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Username</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Compact Table</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">   
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Username</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter      </td>
                            </tr>
                            <tr>
                              <th scope="row">4</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">5</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">6</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter      </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
             <div align="center"><a href="#" class="btn btn-info btn-sm">Click to Generate Reports</a></div>
            <!--<li><a href="disposal.php"> <i class="icon-interface-windows"></i>DISPOSAL</a></li>
            <li><a href="tagging_of_cards.php"> <i class="icon-interface-windows"></i>TAGGING OF CARDS </a></li>
            <li><a href="asset_register.php"><i class="icon-interface-windows"></i>REGISTER ASSET</a></li> -->
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
//========================================| INSERT INTO |===============================
    $('#residence_submit').click(function(){
      var title_name = $('#title_name').val();
      var residence_code = $('#residence_code').val();
      var residence_region = $('#residence_region').val();
      var residence_district = $('#residence_district').val();
      var residence_submit = $('#residence_submit').val();
      
      $.ajax({
        url:'../../script/residenceScript.php',
        method:'POST',
        data:{title_name:title_name, residence_code:residence_code, residence_region:residence_region, residence_district:residence_district, residence_submit:residence_submit},
        success:function(data){
          $('#assign_show').html(data);
          setTimeout(() => {
              $(".alert").alert('close');
              $('#title_name').val('');
              $('#residence_code').val('');
              // $('#residence_region').val('');
              // $('#residence_district').val('');
             
          }, 3000);
        }
      });
    });
//======================================| POPULATE TABLE |================================
fetchResidence();
    function fetchResidence(){
      var action = "select";
      $.ajax({
        url:'../../script/residenceScript.php',
        method:'POST',
        data:{action:action},
        success:function(data){
          $('#residence_info_show').html(data);
        }
      })
    }
//============================| FILL TEXTFIELD
    $(document).on('click','.update', function(){
      var id= $(this).attr('id');
      $.ajax({
        url:'../../script/residenceScript.php',
        method:'POST',
        data:{id:id},
        dataType:'json',
        success:function(data){
          $('#residence_code_update').val(data.residence_code_update);
          $('#residence_title_update').val(data.residence_title_update);
          $('#residence_region_update').val(data.residence_region_update);
          $('#residence_district_update').val(data.residence_district_update);
        }
      })
    });

    // $('#update_residence').click(function(){
      $(document).on('click','#update_residence', function(){
        var _code_update =$('#residence_code_update').val();
        var _title_update =$('#residence_title_update').val();
        var _region_update =$('#residence_region_update').val();
        var _district_update =$('#residence_district_update').val();
        var update_residence = $('#update_residence').val();
      $.ajax({
        url:'../../script/residenceScript.php',
        method:'POST',
        data:{_code_update:_code_update, _title_update:_title_update, _region_update:_region_update, update_residence:update_residence, _district_update:_district_update},
        // dataType:'json',
        success:function(data){
          $('#update_show').html(data);
          setTimeout(() => {
            $(".alert").alert('close');
            $('#exampleModal').modal('hide');
          }, 3000);
        }
      })
    // });
    });

  //===========================| DELETE FROM DATABASE |=========================
      $(document).on('click','.delete', function(){
      var id= $(this).attr('id');
     
      if(confirm("Are you sure you want to delete record")){
        $.ajax({
        url:'../../script/residenceScript.php',
        method:'POST',
        data:{id:id},
        success:function(data){
          $('#delete_residence_info_show').html(data);
          setTimeout(() => {
            $(".alert").alert('close');
          }, 3000);
        }
      })
      }else{
        alert("Cancelled by user");
      }
    });
  });
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="update_show"></div>
        <p> <label>Title:</label>
          <input type="hidden" class="form-control" id="residence_code_update" name="residence_code_update" placeholder="eg District Chief Executive" >
            <input type="text" class="form-control" id="residence_title_update" name="residence_title_update" placeholder="eg District Chief Executive" >
        </p>
        <p> <label>Region:</label>
            <input type="text" class="form-control" id="residence_region_update" name="residence_region_update" placeholder="eg District Chief Executive" >
        </p>
        <p> <label>District:</label>
            <input type="text" class="form-control" id="residence_district_update" name="residence_district_update" placeholder="eg District Chief Executive" >
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"id="update_residence" name="update_residence" value="update_residence">Save changes</button>
      </div>
    </div>
  </div>
</div>
