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
                        <li class="breadcrumb-item active">Department</li>
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
                                        <h3 class="h4">Create Department</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="department_display"></div>
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">Department ID:</td>
                                                    <td><input type="text" class="form-control" id="departmentid"
                                                            name="departmentid" placeholder="Department ID" required>
                                                        <p id="showDeptId"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Department Name:</td>
                                                    <td><input type="text" class="form-control" id="departmentname"
                                                            name="departmentname" placeholder="Department Name"
                                                            required>
                                                        <p id="showDeptName"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Unit ID:</td>
                                                    <td><input type="text" class="form-control" id="unitId"
                                                            name="unitId" placeholder="Unit ID" required>
                                                        <p id="showUnitID"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Unit Name:</td>
                                                    <td><input type="text" class="form-control" id="unitname"
                                                            name="unitname" placeholder="Unit Name" required>
                                                        <p id="showUnitName"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Region:</td>
                                                    <td><input type="text" class="form-control" id="region"
                                                            name="region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly:</td>
                                                    <td><input type="text" class="form-control" id="district"
                                                            name="district" placeholder="Region"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm " id="department_submit"
                                                                name="department_submit"
                                                                value="department_submit">Create Department</button>
                                                        </div>
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
                                        <h3 class="h4">Department and Unit Available</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="display_department"></div>

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
                                        <h3 class="h4">Department and their Unit</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <select class="custom-select d-block my-3 " id="department_unit"
                                                name="department_unit" required>
                                                <option value="">Select a Department</option>
                                                <?php 
                                  $department_unit_display = '';
                                  // $district = "AND";
                                  // $region = "Ashanti";

                                  $department_unit_sql = "SELECT DISTINCT(department_name) FROM department WHERE region='$session_login_region' AND district='$session_login_district'";

                                  $department_unit_result = mysqli_query($conn, $department_unit_sql);

                                  while ($department_unit_row = mysqli_fetch_array($department_unit_result)) {
                                    $department_unit_display .= '
                                        <option value="' . $department_unit_row['department_name'] . '">' . $department_unit_row['department_name'] . '</option>
                                      ';
                                  }
                                  ?>
                                                <?php echo $department_unit_display; ?>
                                                <!-- <option value="2">Department 2</option>
                                  <option value="3">Department 3</option> -->
                                            </select>
                                            <div id="department_unit_display2"></div>

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
                                        <h3 class="h4">Update Department / Unit</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="update_department"></div>

                                        <div class="table-responsive">

                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">
                                                        <strong>Dept ID:</strong>
                                                        <select class="custom-select d-block my-3 "
                                                            id="department_unit_change" name="department_unit_change"
                                                            required>
                                                            <option value="">Select a Department</option>
                                                            <?php 
                                $department_unit_update = '';
                                // $district_update = "AND";
                                // $region_update = "Ashanti";
                                $department_unit_sql_update = "SELECT DISTINCT(department_id) FROM department WHERE region='$session_login_region' AND district='$session_login_district'";

                                $department_unit_result_update = mysqli_query($conn, $department_unit_sql_update);

                                while ($department_unit_row_update = mysqli_fetch_array($department_unit_result_update)) {
                                  $department_unit_update .= '
                                        <option value="' . $department_unit_row_update['department_id'] . '">' . $department_unit_row_update['department_id'] . '</option>
                                      ';
                                }
                                ?>
                                                            <?php echo $department_unit_update; ?>

                                                        </select>
                                                        <p id="departmentUnitShow"></p>
                                                    </td>
                                                    <td>
                                                        <strong>Unit Name:</strong>
                                                        <select class="custom-select d-block my-3 "
                                                            id="unit_department_change" required>
                                                            <option value="">Select a Unit</option>
                                                            <?php 
                                $department_update_unit = '';
                                // $district_update_unit = "AND";
                                // $region_update_unit = "Ashanti";
                                $department_update_unit_sql = "SELECT unit_id, unit_name FROM department WHERE region='$session_login_region' AND district='$session_login_district'";

                                $department_update_unit_result = mysqli_query($conn, $department_update_unit_sql);

                                while ($department_update_unit_row = mysqli_fetch_array($department_update_unit_result)) {
                                  $department_update_unit .= '
                                        <option value="' . $department_update_unit_row['unit_id'] . '">' . $department_update_unit_row['unit_name'] . '</option>
                                      ';
                                }
                                ?>
                                                            <?php echo $department_update_unit; ?>

                                                        </select>
                                                        <p id="departmentUpdateShow"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <!-- <td style="float:right;">Department ID:</td> -->
                                                    <!--<td>--><input type="hidden" class="form-control"
                                                        id="dept_id_update" name="dept_id_update"
                                                        placeholder="Department ID" disabled>
                                                    <!--</td>-->
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Department:</td>
                                                    <td><input type="text" class="form-control"
                                                            id="department_name_update" name="department_name_update"
                                                            placeholder="Department" required>
                                                        <p id="departmentupdateShow"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <!-- <td style="float:right;">Unit ID:</td> -->
                                                    <!--<td>--><input type="hidden" class="form-control"
                                                        id="unit_id_update" name="unit_id_update" placeholder="Unit Id"
                                                        disabled>
                                                    <!--</td>-->
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Unit:</td>
                                                    <td><input type="text" class="form-control" id="unit_update"
                                                            name="unit_update" placeholder="Unit" required>
                                                        <p id="unitupdateShow"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <!-- <td style="float:right;">Region:</td> -->
                                                    <!--<td>--><input type="hidden" class="form-control"
                                                        id="region_update" name="region_update" placeholder="Region"
                                                        disabled>
                                                    <!--</td>-->
                                                </tr>
                                                <tr>
                                                    <!-- <td style="float:right;">District/Municipal/Assembly:</td> -->
                                                    <!--<td>--><input type="hidden" class="form-control"
                                                        id="district_update" name="district_update"
                                                        placeholder="District/Municipal/Assembly" disabled>
                                                    <!--</td>-->
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm" id="department_update"
                                                                name="department_update"
                                                                value="department_update">Update Department</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
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
    $('#department_submit').click(function() {
        var departmentid = $('#departmentid').val();
        var departmentname = $('#departmentname').val();
        var unitId = $('#unitId').val();
        var unitname = $('#unitname').val();
        var region = $('#region').val();
        var district = $('#district').val();
        var department_submit = $('#department_submit').val();





        if (departmentid === '') {
            $("#departmentid").css({
                "border-color": "red"
            });
            //=================
            setTimeout(() => {
                $("#departmentid").css({
                    "border-color": "black"
                });
                $('#showDeptId').html('');
                $('#showDeptId').css({
                    'color': ""
                });
            }, 2000);
            //==================
            $('#showDeptId').html('Field can not be empty');
            $('#showDeptId').css({
                'color': "red"
            });
            //===================
        } else if (departmentname === '') {
            $("#departmentname").css({
                "border-color": "red"
            });

            //=================
            setTimeout(() => {
                $("#departmentname").css({
                    "border-color": "black"
                });
                $('#showDeptName').html('');
                $('#showDeptName').css({
                    'color': ""
                });
            }, 2000);
            //=================
            $('#showDeptName').html('Field can not be empty');
            $('#showDeptName').css({
                'color': "red"
            });
            //===================
        } else if (unitId === '') {
            $("#unitId").css({
                "border-color": "red"
            });

            //=================
            setTimeout(() => {
                $("#unitId").css({
                    "border-color": "black"
                });
                $('#showUnitID').html('');
                $('#showUnitID').css({
                    'color': ""
                });
            }, 2000);
            //=================
            $('#showUnitID').html('Field can not be empty');
            $('#showUnitID').css({
                'color': "red"
            });
            //===================
        } else if (unitname === '') {
            $("#unitname").css({
                "border-color": "red"
            });

            //=================
            setTimeout(() => {
                $("#unitname").css({
                    "border-color": "black"
                });
                $('#showUnitName').html('');
                $('#showUnitName').css({
                    'color': ""
                });
            }, 2000);
            //=================
            $('#showUnitName').html('Field can not be empty');
            $('#showUnitName').css({
                'color': "red"
            });
            //===================
        } else {

            $.ajax({
                url: '../../script/departmentScript.php',
                method: 'POST',
                data: {
                    departmentid: departmentid,
                    departmentname: departmentname,
                    unitId: unitId,
                    unitname: unitname,
                    region: region,
                    district: district,
                    department_submit: department_submit
                },

                success: function(data) {
                    $('#department_display').html(data);
                    setTimeout(() => {
                        $(".alert").alert('close');
                        $('#departmentid').val('');
                        $('#departmentname').val('');
                        $('#unitId').val('');
                        $('#unitname').val('');
                        location.reload();
                    }, 3000);

                }
            });
        }
    });
    //=============================== POPULATE TABLE ==============================
    fetchUser();

    function fetchUser() {
        var action = "select";
        $.ajax({
            url: '../../script/departmentScript.php',
            method: 'POST',
            data: {
                action: action
            },
            success: function(data) {
                $('#display_department').html(data);
            }
        });
    }

    //=========================== DEPARTMENT & UNIT
    $('#department_unit').change(function() {
        var department_unit = $('#department_unit').val();
        $.ajax({
            url: '../../script/departmentScript.php',
            method: 'POST',
            data: {
                department_unit: department_unit
            },
            success: function(data) {
                $('#department_unit_display2').html(data);
            }
        });
    });

    //=========================| PULL DEPARMENT |=============================
    $('#department_unit_change').change(function() {
        var department_unit_change = $('#department_unit_change').val();
        var unit_department_change = $('#unit_department_change').val();
        $.ajax({
            url: '../../script/departmentScript.php',
            method: 'POST',
            data: {
                department_unit_change: department_unit_change,
                unit_department_change: unit_department_change
            },
            dataType: 'json',
            success: function(data) {
                // $('#department_unit_display2').html(data);
                $('#dept_id_update').val(data.dept_id_update);
                $('#department_name_update').val(data.department_name_update);
                $('#unit_id_update').val(data.unit_id_update);
                $('#unit_update').val(data.unit_update);
                $('#region_update').val(data.region_update);
                $('#district_update').val(data.district_update);
            }
        })
    });

    //=========================| PULL DEPARMENT |=============================
    $('#unit_department_change').change(function() {
        var department_unit_change2 = $('#department_unit_change').val();
        var unit_department_change2 = $('#unit_department_change').val();
        $.ajax({
            url: '../../script/departmentScript.php',
            method: 'POST',
            data: {
                department_unit_change2: department_unit_change2,
                unit_department_change2: unit_department_change2
            },
            dataType: 'json',
            success: function(data) {
                // $('#department_unit_display2').html(data);
                $('#dept_id_update').val(data.dept_id_update2);
                $('#department_name_update').val(data.department_name_update2);
                $('#unit_id_update').val(data.unit_id_update2);
                $('#unit_update').val(data.unit_update2);
                $('#region_update').val(data.region_update2);
                $('#district_update').val(data.district_update2);
            }
        })
    });

    //=========================| UPDATE |=============================
    $('#department_update').click(function() {
        var dept_id_ = $('#dept_id_update').val();
        var department_name_ = $('#department_name_update').val();
        var unit_id_ = $('#unit_id_update').val();
        var unit_ = $('#unit_update').val();
        var region_ = $('#region_update').val();
        var district_ = $('#district_update').val();
        var department_btn = $('#department_update').val();

        if (confirm("ARE SURE YOU WANT TO UPDATE") == true) {
            if ($('#department_name_update').val() === '') {
                $('#departmentupdateShow').html("Field can't be empty");
                $('#department_name_update').css({
                    "border-color": "red"
                });
                $('#departmentupdateShow').css({
                    "color": "red"
                });
                setTimeout(() => {
                    $('#departmentupdateShow').remove();
                    $('#department_name_update').css({
                        "border-color": "black"
                    })
                }, 3000);
            } else if ($('#unit_update').val() === '') {
                $('#unitupdateShow').html("Field can't be empty");
                $('#unit_update').css({
                    "border-color": "red"
                });
                $('#unitupdateShow').css({
                    "color": "red"
                });
                setTimeout(() => {
                    $('#unitupdateShow').remove();
                    $('#unit_update').css({
                        "border-color": "black"
                    })
                }, 3000);
            } else if ($('#department_unit_change').val() === "") {
                $('#departmentUnitShow').html("Please Select a Field");
                $('#departmentUnitShow').css({
                    "color": "red"
                });
                setTimeout(() => {
                    $('#departmentUnitShow').remove();
                    $('#departmentUnitShow').css({
                        "color": ""
                    });
                }, 3000);


            } else if ($('#unit_department_change').val() === "") {

                $('#departmentUpdateShow').html("Please Select a Field");
                $('#departmentUpdateShow').css({
                    "color": "red"
                });
                setTimeout(() => {
                    $('#departmentUpdateShow').remove();
                    $('#departmentUpdateShow').css({
                        "color": ""
                    });
                }, 3000);
            } else {
                $.ajax({
                    url: '../../script/departmentScript.php',
                    method: 'POST',
                    data: {
                        dept_id_: dept_id_,
                        department_name_: department_name_,
                        unit_id_: unit_id_,
                        unit_: unit_,
                        region_: region_,
                        district_: district_,
                        department_btn: department_btn
                    },

                    success: function(data) {
                        $('#update_department').html(data);
                        setTimeout(() => {
                            $(".alert").alert('close');
                            $('#dept_id_update').val('');
                            $('#department_name_update').val('');
                            $('#unit_id_update').val('');
                            $('#unit_update').val('');
                            // $('#region_update').val('');
                            // $('#district_update').val('');
                            $('#department_update').val('');
                            // $('#department_unit_change').val("Select a Department").is;
                            // $('#unit_department_change').val("Select a Unit");
                            location.reload();

                        }, 3000);

                    }
                })
            }
        } else {
            alert("Cancelled");
        }

        /**/
    });
});
</script>