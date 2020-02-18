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
                              <td><input type="text" class="form-control" id="class_region" name="class_region" placeholder="Region" disabled></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="class_district" name="class_district" placeholder="District" disabled></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="class_submit">Assign</button></div></td>
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
                        <table class="table">
                            <tr>
                              <td style="float:right;">Class Code:</td>
                              <td>
                                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="asset_class_code">
                                  <option selected>Choose Class Code...</option>
                                  <option value="1">AP</option>
                                  <option value="2">OE</option>
                                  <!-- <option value="3">Three</option> -->
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
                              <td><input type="text" class="form-control" id="asset_class_region" name="asset_class_region" placeholder="Region" disabled></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="asset_class_district" name="asset_class_district" placeholder="District" disabled></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="asset_class_submit"><i class="fa  fa-save "></i> Save</button></div></td>
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
                      <h3 class="h4">Update Class</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              
                              <th>Class Code</th>
                              <th>Class Definition</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                             
                              <td>AP</td>
                              <td>Appliance</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="residence_delete" id="residence_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="residence_update" id="residence_update"><i class="fa  fa-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                             
                              <td>CE</td>
                              <td>Communication Equipment</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="residence_delete" id="residence_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="residence_update" id="residence_update"><i class="fa  fa-pencil"></i></button>
                                </td>
                            </tr>
                           
                          </tbody>
                        </table>
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
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              
                              <th>Class Code</th>
                              <th>Sub Class Code</th>
                              <th>Class Definition</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                             
                              <td>AP</td>
                              <th>1</th>
                              <td>Air Condition</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="asset_code_delete" name="asset_code_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="asset_code_update" name="asset_code_update"><i class="fa  fa-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                             
                              <td>CE</td>
                              <td>2</td>
                              <td>Control Board</td>
                              <td>
                                <span> </span><button type="buttom" class="btn btn-danger btn-sm" id="residence_delete" id="residence_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="residence_update" id="residence_update"><i class="fa  fa-pencil"></i></button>
                                </td>
                            </tr>
                           
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div align="center"><a href="#" class="btn btn-info btn-sm">Click to Generate Reports</a></div>
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