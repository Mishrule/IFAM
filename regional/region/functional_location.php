<?php 
require_once('../inc/db/db.php');
require_once('session.php');
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
            <nav class="side-navbar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="avatar"><img src="../../img/coat.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <!-- <h1 class="h4">Welcome: <?php echo $session_user_name; ?></h1> -->
                        <!-- <p>Web Designer</p> -->
                    </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                <ul class="list-unstyled">
                    <li><a href="admin.php"> <i class="icon-home"></i>HOME </a></li>
                    <li><a href="district.php"> <i class="icon-grid"></i>DISTRICT </a></li>
                    <li><a href="department.php"> <i class="fa fa-bar-chart"></i>DEPARTMENT </a></li>
                    <li><a href="create_asset.php"> <i class="icon-padnote"></i>CREATE ASSET </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                                class="icon-interface-windows"></i>LOCATIONS </a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                            <!-- <li><a href="location.php">Location</a></li> -->
                            <li><a href="residence.php">Residence</a></li>
                            <li class="active"><a href="functional_location.php">Functional Locations</a></li>
                        </ul>
                    </li>

                    <li><a href="class_definition.php"> <i class="icon-interface-windows"></i>CLASS DEFINITION </a></li>
                    <li><a href="disposal.php"> <i class="icon-interface-windows"></i>DISPOSAL</a></li>
                    <li><a href="tagging_of_cards.php"> <i class="icon-interface-windows"></i>TAGGING OF CARDS </a></li>
                    <li><a href="asset_register.php"><i class="icon-interface-windows"></i>REGISTER ASSET</a></li>
                </ul><span class="heading">Extras</span>
                <ul class="list-unstyled">
                    <li> <a href="users.php"> <i class="icon-flask"></i>USERS </a></li>
                    <!-- <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li> -->
                    <!-- <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li> -->
                    <!-- <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li> -->
                </ul>
            </nav>
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
                                        <h3 class="h4">Create a Functional Office/Section</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="section_display"></div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">Section Name:</td>
                                                    <td><input type="text" class="form-control" id="section_name"
                                                            name="section_name" placeholder="eg. Administrator"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Section Code:</td>
                                                    <td><input type="text" class="form-control" id="section_code"
                                                            name="section_code" placeholder="eg. AD" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Region:</td>
                                                    <td><input type="text" class="form-control" id="section_region"
                                                            name="section_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District:</td>
                                                    <td><input type="text" class="form-control" id="section_district"
                                                            name="section_district" placeholder="District"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm " id="section_submit"
                                                                value="section_submit"
                                                                name="section_submit">Create</button></div>
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
                                        <h3 class="h4">Location Codes: Functional</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="location_code_show"></div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;"><label style="padding-top:20px;"
                                                            for="">Section Name:</label></td>
                                                    <td>
                                                        <select class="custom-select d-block my-3"
                                                            id="location_section_code" name="location_section_code"
                                                            required>
                                                            <option value="">Select a Section</option>
                                                            <?php 
                                                                $functional_office_show = '';
                                                                $functional_office_sql = "SELECT * FROM functional_office WHERE region='$session_login_region' AND district='$session_login_district'";
                                                                $functional_office_result = mysqli_query($conn, $functional_office_sql);

                                                                while ($functional_office_row = mysqli_fetch_array($functional_office_result)) {
                                                                    $functional_office_show .= '
                                                                        <option value="' . $functional_office_row['section_code'] . '">' . $functional_office_row['section_code'] . '</option>
                                                                    ';
                                                                }
                                                                ?>

                                                            <?php echo $functional_office_show; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Office:</td>
                                                    <td><input type="text" class="form-control" id="funtional_office"
                                                            name="funtional_office" placeholder="eg. M/DCE" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Code ID:</td>
                                                    <td>
                                                        <input type="text" class="form-control" id="functional_Code"
                                                            name="functional_Code" placeholder="eg. AD01">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Region:</td>
                                                    <td><input type="text" class="form-control" id="functional_region"
                                                            name="functional_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District:</td>
                                                    <td><input type="text" class="form-control" id="functional_district"
                                                            name="functional_district" placeholder="District"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm " id="functional_submit"
                                                                name="functional_submit"
                                                                value="functional_submit">Create</button></div>
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
                                        <h3 class="h4">Update Functional Office</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="delete_functional_info_show"></div>
                                            <div id="update_functional_office"></div>
                                           
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
                                        <h3 class="h4">Update | Delete Location code: functional</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="delete_location_info_show"></div>
                                            <div id="update_Location_office"></div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div align="center"><a href="#" class="btn btn-info btn-sm">Click to Generate Reports</a></div> -->
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
<script>
$(document).ready(function() {
    //===========================| SUBMIT TO THE DATABASE |=================================
    $('#section_submit').click(function() {
        var section_name = $('#section_name').val();
        var section_code = $('#section_code').val();
        var section_region = $('#section_region').val();
        var section_district = $('#section_district').val();
        var section_submit = $('#section_submit').val();

        $.ajax({
            url: '../../script/functionalScript.php',
            method: 'POST',
            data: {
                section_name: section_name,
                section_code: section_code,
                section_region: section_region,
                section_district: section_district,
                section_submit: section_submit
            },
            success: function(data) {
                $('#section_display').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    $('#section_name').val('');
                    $('#section_code').val('');
                    fetchFunctionalOffice();
                    fetchLocation();
                }, 3000);
            }
        });
    });

    //=================================| SUMBIT TO THE DATABASE |=============================
    $('#functional_submit').click(function() {
        var location_section_code = $('#location_section_code').val();
        var funtional_office = $('#funtional_office').val();
        var functional_Code = $('#functional_Code').val();
        var functional_region = $('#functional_region').val();
        var functional_district = $('#functional_district').val();
        var functional_submit = $('#functional_submit').val();

        $.ajax({
            url: '../../script/functionalScript.php',
            method: 'POST',
            data: {
                location_section_code: location_section_code,
                funtional_office: funtional_office,
                functional_Code: functional_Code,
                functional_region: functional_region,
                functional_district: functional_district,
                functional_submit: functional_submit
            },
            success: function(data) {
                $('#location_code_show').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    $('#location_section_code').val('');
                    $('#funtional_office').val('');
                    $('#functional_Code').val('');
                    fetchLocation();
                    fetchFunctionalOffice();
                }, 3000);
            }
        });
    });

    //=============================== FETCH FROM DATABASE |=====================================
    fetchFunctionalOffice();

    function fetchFunctionalOffice() {
        var select = "select";

        $.ajax({
            url: '../../script/functionalScript.php',
            method: 'POST',
            data: {
                select: select
            },
            success: function(data) {
                $('#update_functional_office').html(data);
            }
        });
    }

    fetchLocation();

    function fetchLocation() {
        var selectLocation = "selectLocation";

        $.ajax({
            url: '../../script/functionalScript.php',
            method: 'POST',
            data: {
                selectLocation: selectLocation
            },
            success: function(data) {
                $('#update_Location_office').html(data);
            }
        });
    }

    //============================| FILL TEXTFIELD
    $(document).on('click', '.updates', function() {
        var id_functional = $(this).attr('id');
        alert(id_functional);
        $.ajax({
            url: '../../script/functionalScript.php',
            method: 'POST',
            data: {
                id_functional: id_functional
            },
            dataType: 'json',
            success: function(data) {
                $('#section_name_').val(data.section_name_);
                $('#section_code_').val(data.section_code_);
                $('#section_region_').val(data.section_region_);
                $('#section_district_').val(data.section_district_);

                // alert(data);
            }
        })
    });


    //============================|UPDATE FUNCTIONAL OFFICE
    $('#section_submit_').click(function() {
        section_name_ = $('#section_name_').val();
        section_code_ = $('#section_code_').val();
        section_region_ = $('#section_region_').val();
        section_district_ = $('#section_district_').val();
        section_submit_ = $('#section_submit_').val();
        $.ajax({
            url: '../../script/functionalScript.php',
            method: 'POST',
            data: {
                section_name_: section_name_,
                section_code_: section_code_,
                section_region_: section_region_,
                section_district_: section_district_,
                section_submit_: section_submit_
            },

            success: function(data) {
                $('#functional_update_show').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    $('#_functional_exampleModal').modal('hide');
                    fetchFunctionalOffice();
                }, 3000);
            }
        })
    });

    //===========================| DELETE FROM DATABASE FUNCTIONAL OFFICE |=========================
    $(document).on('click', '.delete', function() {
        var id_delete = $(this).attr('id');

        if (confirm("Are you sure you want to delete record")) {
            $.ajax({
                url: '../../script/functionalScript.php',
                method: 'POST',
                data: {
                    id_delete: id_delete
                },
                success: function(data) {
                    $('#delete_functional_info_show').html(data);
                    setTimeout(() => {
                        $(".alert").alert('close');
                        fetchFunctionalOffice();
                    }, 3000);
                }
            })
        } else {
            alert("Cancelled by user");
        }
    });

    //===========================| DELETE FROM DATABASE FUNCTIONAL OFFICE |=========================
    $(document).on('click', '.delete_location', function() {
        var delete_location = $(this).attr('id');

        if (confirm("Are you sure you want to delete this record")) {
            $.ajax({
                url: '../../script/functionalScript.php',
                method: 'POST',
                data: {
                    delete_location: delete_location
                },
                success: function(data) {
                    $('#delete_location_info_show').html(data);
                    setTimeout(() => {
                        $(".alert").alert('close');
                        fetchLocation();
                    }, 3000);
                }
            })
        } else {
            alert("Cancelled by user");
        }
    });

});
</script>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="_functional_exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div id="functional_update_show"></div>
                    <table class="table">
                        <tr>
                            <td style="float:right;">Section Name:</td>
                            <td><input type="text" class="form-control" id="section_name_" name="section_name_"
                                    placeholder="eg. Administrator" required></td>
                        </tr>
                        <tr>
                            <td style="float:right;">Section Code:</td>
                            <td><input type="text" class="form-control" id="section_code_" name="section_code_"
                                    placeholder="eg. AD" disabled></td>
                        </tr>
                        <tr>
                            <td style="float:right;">Region:</td>
                            <td><input type="text" class="form-control" id="section_region_" name="section_region_"
                                    placeholder="Region" disabled></td>
                        </tr>
                        <tr>
                            <td style="float:right;">District:</td>
                            <td><input type="text" class="form-control" id="section_district_" name="section_district_"
                                    placeholder="District" disabled></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm " id="section_submit_" value="section_submit_"
                    name="section_submit_">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="locational_exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->