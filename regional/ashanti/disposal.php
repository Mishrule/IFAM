<!DOCTYPE html>
<html>

<?php require_once('../inc/head.php'); ?>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <?php require_once('../inc/head.php'); ?>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php require_once('../inc/nav.php'); ?>
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">
                            <marquee>ASHANTI REGION</marquee>
                        </h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Disposal</li>
                    </ul>
                </div>
                <section class="tables">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
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
                                        <h3 class="h4">Disposal</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">Date:</td>
                                                    <td><input type="date" class="form-control" id="disposal_date"
                                                            name="disposal_date" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Nature of Disposal:</td>
                                                    <td><input type="text" class="form-control" id="disposal_nature"
                                                            name="disposal_nature" placeholder="Nature of Disposal"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Sale value:</td>
                                                    <td><input type="text" class="form-control" id="disposal_sale_value"
                                                            name="disposal_sale_value" placeholder="Sale value"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Buyer:</td>
                                                    <td><input type="text" class="form-control" id="disposal_buyer"
                                                            name="disposal_buyer" placeholder="Buyer" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Region:</td>
                                                    <td><input type="text" class="form-control" id="disposal_region"
                                                            name="disposal_region" placeholder="Region" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly:</td>
                                                    <td><input type="text" class="form-control" id="disposal_district"
                                                            name="disposal_district" placeholder="District" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm "
                                                                id="disposal_submit">Dispose</button></div>
                                                    </td>
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
                                            <button type="button" id="closeCard2" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard2"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Disposal Report</h3>
                                    </div>
                                    <div class="card-body">
                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 col-2 float-right"
                                            id="inlineFormCustomSelect">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="50">50</option>
                                            <option value="99999">All</option>
                                        </select>
                                        <label style="padding:10px;" class="float-right">Limit:</label>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Nature of Disposal</th>
                                                        <th>Sale Value</th>
                                                        <th>Buyer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="float-right">
                                                <button type="button" class="btn btn-info btn-sm" id="disposal_print"
                                                    name="disposal_print">
                                                    Print
                                                </button>
                                            </div>
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
                      <h3 class="h4">Department and Unit Available</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Dept ID</th>
                              <th>Dept</th>
                              <th>Unit ID</th>
                              <th>Unit</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Test111</td>
                              <td>Dept Test</td>
                              <td>Test Unit111</td>
                              <td>Unit Test</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Test111</td>
                              <td>Dept Test</td>
                              <td>Test Unit111</td>
                              <td>Unit Test</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Test111</td>
                              <td>Dept Test</td>
                              <td>Test Unit111</td>
                              <td>Unit Test</td>
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
                      <h3 class="h4">Update Department / Unit</h3>
                    </div>
                    <div class="card-body">

                      <div class="table-responsive">  
                      
                        <table class="table">
                            <tr>
                              <td style="float:right;">
                                <select class="custom-select d-block my-3 " required>
                                  <option value="">Select a Department</option>
                                  <option value="1">Department 1</option>
                                  <option value="2">Department 2</option>
                                  <option value="3">Department 3</option>
                                </select> 
                              </td>
                              <td>
                                <select class="custom-select d-block my-3" required>
                                  <option value="">Select a Unit</option>
                                  <option value="1">Unit 1</option>
                                  <option value="2">Unit 2</option>
                                  <option value="3">Unit 3</option>
                                </select> 
                              </td>
                            </tr>
                            <tr>
                              <td style="float:right;">Department ID:</td>
                              <td><input type="text" class="form-control" id="dept_id_update" name="dept_id_update" placeholder="Department ID" required></td>
                            </tr>
                            <tr>
                              <td style="float:right;">Department:</td>
                              <td><input type="text" class="form-control" id="department_name_update" name="department_name_update" placeholder="Department" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Unit ID:</td>
                              <td><input type="text" class="form-control" id="unit_id_update" name="unit_id_update" placeholder="Unit Id" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Unit:</td>
                              <td><input type="text" class="form-control" id="unit_update" name="unit_update" placeholder="Unit" required></td>
                            </tr> 
                            <tr>
                              <td style="float:right;">Region:</td>
                              <td><input type="text" class="form-control" id="region_update" name="region_update" placeholder="Region" required></td>
                            </tr>   
                            <tr>
                              <td style="float:right;">District/Municipal/Assembly:</td>
                              <td><input type="text" class="form-control" id="district_update" name="district_update" placeholder="District/Municipal/Assembly" required></td>
                            </tr>
                            <tr>
                              <td colspan="2"><div align="center"><button type="button" class="btn btn-primary btn-sm" id="department_update" name="department_update">Update Department</button></div></td>
                            </tr>                        
                        </table>
                      </div>
                    </div>
                  </div>
                </div> -->
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