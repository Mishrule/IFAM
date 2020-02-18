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
              <li class="breadcrumb-item active">Functional Location</li>
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
                      <h3 class="h4">Create a Functional Office/Section</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                            <tr>
                              <td style="float:right;">Section Name:</td>
                              <td><input type="text" class="form-control" id="section_name" name="section_name" placeholder="eg. Administrator" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Section Code:</td>
                              <td><input type="text" class="form-control" id="section_code" name="section_code" placeholder="eg. AD" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Region:</td>
                              <td><input type="text" class="form-control" id="section_region" name="section_region" placeholder="Region" disabled></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="section_district" name="section_district" placeholder="District" disabled></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="section_submit">Create</button></div></td>
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
                      <h3 class="h4">Location Codes: Functional</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table">
                            <tr>
                              <td style="float:right;"><label style="padding-top:20px;" for="">Section Name:</label></td>
                              <td>
                                  <select class="custom-select d-block my-3" required>
                                    <option value="">Select a Section</option>
                                    <option value="1">AD</option>
                                    <option value="2">CW</option>
                                    <option value="3">PU</option>
                                  </select>
                              </td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Office:</td>
                              <td><input type="text" class="form-control" id="funtional_office" name="funtional_office" placeholder="eg. M/DCE" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Code ID:</td>
                              <td>
                                <input type="text" class="form-control" id="functional_Code" name="functional_Code" placeholder="eg. AD01"> Last code ID: <label>AD01</label>
                              </td>
                            </tr>
                            <tr>
                              <td style="float:right;">Region:</td>
                              <td><input type="text" class="form-control" id="functional_region" name="functional_region" placeholder="Region" disabled></td>
                            </tr>
                            <tr>
                              <td style="float:right;">District:</td>
                              <td><input type="text" class="form-control" id="functional_district" name="functional_district" placeholder="District" disabled></td>
                            </tr>   
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm " id="functional_submit">Create</button></div></td>
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
                      <h3 class="h4">Update Functional Office</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>eg. AD</td>
                              <td>Administrator</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="section_delete" id="section_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="section_update" id="section_update"><i class="fa  fa-pencil"></i></button>
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
                      <h3 class="h4">Update | Delete Location code: functional</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">   
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Section</th>
                              <th>Office</th>
                              <th>Code ID</th>
                              <th>Controls</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>AD</td>
                              <td>M/DCE</td>
                              <td>AD01</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="section_delete" id="section_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="section_update" id="section_update"><i class="fa  fa-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>AD</td>
                              <td>M/DCE'S SEC</td>
                              <td>AD02</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="section_delete" id="section_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="section_update" id="section_update"><i class="fa  fa-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>AD</td>
                              <td>DCD</td>
                              <td>AD03</td>
                              <td>
                                <button type="buttom" class="btn btn-danger btn-sm" id="section_delete" id="section_delete"><i class="fa  fa-trash "></i></button>
                                <button type="buttom" class="btn btn-success btn-sm" id="section_update" id="section_update"><i class="fa  fa-pencil"></i></button>
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
          <div class="row">
            
          </div>
          <!-- Page Footer-->
          <?php require_once('../inc/footer.php'); ?>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('../inc/footer_links.php'); ?>
  </body>
</html>