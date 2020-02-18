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
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Asset Register</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                         <table class="table">
                          <tr>
                              <td><strong>Dept:</strong><input type="text" class="form-control" id="departmentid" name="departmentid" placeholder="Dept" required>
                              </td>
                              <td><strong>Building No:</strong><input type="text" class="form-control" id="Building No" name="Building No" placeholder="Building No" required>
                              </td>
                              <td><strong>Room No:</strong><input type="text" class="form-control" id="Room No" name="Room No" placeholder="Room No" required>
                              </td>
                              <td><strong>District:</strong><input type="text" class="form-control" id="district" name="district" placeholder="District" required>
                              </td>
                            </tr>
                            <tr>
                              <td><strong>Asset Description:</strong><input type="text" class="form-control" id="Asset Description" name="Asset Description" placeholder="Asset Description" required>
                              </td>
                              <td><strong>Unit ID:</strong><input type="text" class="form-control" id="Unit ID" name="Unit ID" placeholder="Unit ID" required>
                              </td>
                              <td><strong>Asset Category:</strong><input type="text" class="form-control" id="Asset Category" name="Asset Category" placeholder="Asset Category" required>
                              </td>
                              <td><strong>Asset Type:</strong><input type="text" class="form-control" id="Asset Type" name="Asset Type" placeholder="Asset Type" required>
                              </td>
                            </tr>
                            <tr>
                              <td><strong>Make or Mode:</strong><input type="text" class="form-control" id="Make or Mode" name="Make or Mode" placeholder="Make or Mode" required>
                              </td>
                              <td><strong> Manufacturer:</strong><input type="text" class="form-control" id="Manufacturer" name="Manufacturer" placeholder="Manufacturer" required>
                              </td>
                              <td><strong>Serial No.:</strong><input type="text" class="form-control" id="Serial No." name="Serial No." placeholder="Serial No." required>
                              </td>
                              <td><strong> Source of Fund:</strong><input type="text" class="form-control" id="source_of_fund" name="source_of_fund" placeholder="Source of Fund" required>
                              </td>
                             
                              
                            </tr>
                            <tr>
                              <td><strong>Movable or Fixed:</strong><input type="text" class="form-control" id="movable_fixed" name="movable_fixed" placeholder="Movable or Fixed" required>
                              </td>
                              <td><strong>MMDA ID Code:</strong><input type="text" class="form-control" id="mmda_ID" name="mmda_ID" placeholder="MMDA ID Code" required>
                              </td>
                              <td><strong>User Contact:</strong><input type="text" class="form-control" id="user_contact" name="user_contact" placeholder="User Contact" required>
                              </td>
                              <td><strong>Purchase Order No:</strong><input type="text" class="form-control" id="purchase_order" name="purchase_order" placeholder="Purchase Order No" required>
                              </td>
                              
                              
                            </tr>  
                            <tr>
                              <td><strong>Purchase Price:</strong><input type="text" class="form-control" id="purchase_price" name="purchase_price" placeholder="Purchase Price" required>
                              </td>
                              <td><strong>Purchase Date:</strong><input type="text" class="form-control" id="purchase_date" name="purchase_date" placeholder="Purchase Date" required>
                              </td>
                              <td><strong>Depreciation Value:</strong><input type="text" class="form-control" id="depreciation_value" name="depreciation_value" placeholder="Depreciation Value" required>
                              </td>
                              <td><strong>Write off Value:</strong><input type="text" class="form-control" id="write_off_value" name="write_off_value" placeholder="Write off Value" required>
                              </td>
                             
                            </tr> 
                            <tr>
                               <td><strong>Condition Type:</strong><input type="text" class="form-control" id="condition_type" name="condition_type" placeholder="Condition Type" required>
                              </td>
                              <td><strong>Condition:</strong><input type="text" class="form-control" id="condition" name="condition" placeholder="Condition" required>
                              </td>
                              <td>
                               <strong>Region:</strong><input type="text" class="form-control" id="region" name="region" placeholder="Region" required>
                              </td>
                              <td>
                              
                               
                              </td>
                            </tr>                     
                        </table>
                        <div align="center">
                          <!-- <div style="padding-top:20px;"> -->
                          <input  type="checkbox" class="btn btn-dark btn-sm" id="agree_register_asset" name="agree_register_asset"> Agree
                           <button  type="button" class="btn btn-dark btn-sm" id="register_asset" name="register_asset">Register Asset</button>
                              <!-- </div> -->
                          <a  href="#" class="btn btn-primary btn-sm" id="register_asset" name="register_asset">Preview Registered Asset</a>
                        </div>
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