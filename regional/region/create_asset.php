<?php 
require_once('../inc/db/db.php');
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
                        <h2 class="no-margin-bottom">
                            <marquee><?php echo $session_login_region; ?></marquee>
                        </h2>
                    </div>
                </header>
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder container-fluid">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Register Asset</li>
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
                                        <h3 class="h4">Full Asset Code(Identification Number)</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">District Code</td>
                                                    <td><input type="text" class="form-control" id="district_name"
                                                            name="district_name" placeholder="eg. KMA"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Functional Location</td>
                                                    <td>
                                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0"
                                                            id="inlineFormCustomSelect">
                                                            <option selected>Choose...</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Asset Class</td>
                                                    <td>
                                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0"
                                                            id="inlineFormCustomSelect">
                                                            <option selected>Choose...</option>
                                                            <option value="1">AP01</option>
                                                            <option value="2">AP55</option>
                                                            <option value="3">AP25</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Serial Number</td>
                                                    <td><input type="text" class="form-control" id="district_name"
                                                            name="district_name" placeholder="eg. 01"></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly Region:</td>
                                                    <td><input type="text" class="form-control" id="district_region"
                                                            name="district_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm "
                                                                id="district_submit">Register District</button></div>
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
                                        <h3 class="h4">Residence Asset</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">District Code</td>
                                                    <td><input type="text" class="form-control" id="district_name"
                                                            name="district_name" placeholder="eg. KMA"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Residence Location</td>
                                                    <td>
                                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0"
                                                            id="inlineFormCustomSelect">
                                                            <option selected>Choose...</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Asset Class</td>
                                                    <td>
                                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0"
                                                            id="inlineFormCustomSelect">
                                                            <option selected>Choose...</option>
                                                            <option value="1">AP01</option>
                                                            <option value="2">AP55</option>
                                                            <option value="3">AP25</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Serial Number</td>
                                                    <td><input type="text" class="form-control" id="district_name"
                                                            name="district_name" placeholder="eg. 01"></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly Region:</td>
                                                    <td><input type="text" class="form-control" id="district_region"
                                                            name="district_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm "
                                                                id="district_submit">Register District</button></div>
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
                                            <button type="button" id="closeCard3" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard3"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Asset Codes</h3>
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
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Asset Code</th>
                                                        <th>Control</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>BCM/AD01/AP16/01</td>
                                                        <td colspan="2">
                                                            <div align="center"><button type="button"
                                                                    class="btn btn-primary btn-sm "
                                                                    id="district_submit">Update</button></div>
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
                                            <button type="button" id="closeCard4" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i
                                                    class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard4"
                                                class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                                    class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                                    href="#" class="dropdown-item edit"> <i
                                                        class="fa fa-gear"></i>Edit</a></div>
                                        </div>
                                    </div>
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">Residence</h3>
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
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Asset Code</th>
                                                        <th>Control</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>KED/RB0305/FF03/01</td>
                                                        <td colspan="2">
                                                            <div align="center"><button type="button"
                                                                    class="btn btn-primary btn-sm "
                                                                    id="district_submit">Update</button></div>
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