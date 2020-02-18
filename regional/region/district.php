<?php 

include('../inc/db/db.php');
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
                        <li class="breadcrumb-item active">District</li>
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
                                        <h3 class="h4">Register District</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <div id="district_show"></div>
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly Name:</td>
                                                    <td><input type="text" class="form-control" id="district_name"
                                                            name="district_name" placeholder="First name" required>
                                                        <p id="showName"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly Code:</td>
                                                    <td><input type="text" class="form-control" id="district_code"
                                                            name="district_code" placeholder="Code" required>
                                                        <p id="showCode"></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly Region:</td>
                                                    <td><input type="text" class="form-control" id="district_region"
                                                            name="district_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly Location:</td>
                                                    <td><input type="text" class="form-control" id="district_location"
                                                            name="district_location" placeholder="Location"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm " id="district_submit"
                                                                name="district_submit" value="district_submit">Register
                                                                District</button></div>
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
                                        <h3 class="h4">District Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="display_district_info"></div>

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
                                        <h3 class="h4">Update District Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="district_show_update"></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <select class="custom-select d-block my-3" id="district_details"
                                                    name="district_details" required>
                                                    <option value="">Open this District</option>
                                                    <?php 
                                                        $district_details_show = '';

                                                        $district_code = $session_login_district;
                                                        $district_region = $session_login_region;
                                                        // $district_region = "Ashanti Region";
                                                        $district_details_sql = "SELECT * FROM district WHERE district_code='$district_code' AND district_region='$district_region'";
                                                        $district_details_result = mysqli_query($conn, $district_details_sql);
                                                        while ($district_details_row = mysqli_fetch_array($district_details_result)) {
                                                            $district_details_show .= ' 
                                                                <option value="' . $district_details_row['district_code'] . '">' . $district_details_row['district_name'] . '</option> 
                                                            ';
                                                        }
                                                        ?>

                                                    <?php 
                                                        echo $district_details_show;
                                                    ?>
                                                    <!-- <option value="2">Two</option>
                            <option value="3">Three</option> -->
                                                </select>
                                                <thead>
                                                    <tr>
                                                        <td style="float:right;">District/Municipal/Assembly Name:</td>
                                                        <td><input type="text" class="form-control"
                                                                id="district_name_update" name="district_name_update"
                                                                placeholder="First name" required></td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <td style="float:right;">District/Municipal/Assembly Code:</td> -->
                                                        <!--<td>--><input type="hidden" class="form-control"
                                                            id="district_code_update" name="district_code_update"
                                                            placeholder="Code" disabled>
                                                        <!--</td>-->
                                                    </tr>
                                                    <tr>
                                                        <!-- <td style="float:right;">District/Municipal/Assembly Region:</td> -->
                                                        <!--<td>--><input type="hidden" class="form-control"
                                                            id="district_region_update" name="district_region_update"
                                                            placeholder="Region" disabled>
                                                        <!--</td>-->
                                                    </tr>
                                                    <tr>
                                                        <!-- <td style="float:right;">District/Municipal/Assembly Location:</td> -->
                                                        <!-- <td>--><input type="hidden" class="form-control"
                                                            id="district_location_update"
                                                            name="district_location_update" placeholder="Location"
                                                            disabled>
                                                        <!--</td>-->
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div align="center">
                                                                <button type="button" class="btn btn-success btn-sm "
                                                                    id="district_submit_update"
                                                                    name="district_submit_update"
                                                                    value="district_submit_update">Update District
                                                                </button>
                                                                <!-- <button type="button" class="btn btn-danger btn-sm " id="district_submit_delete" name="district_submit_delete" value="district_submit_delete">Delete District -->
                                                                </button>
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
    fetchUser();

    $('#district_submit').click(function() {
        var district_name = $('#district_name').val();
        var district_code = $('#district_code').val();
        var district_region = $('#district_region').val();
        var district_location = $('#district_location').val();
        var district_submit = $('#district_submit').val();

        if (district_name === '') {
            $("#district_name").css({
                "border-color": "red"
            });
            setTimeout(() => {
                $("#district_name").css({
                    "border-color": "black"
                });
                $('#showName').html('');
                $('#showName').css({
                    'color': ""
                });
            }, 2000);
            $('#showName').html('Field can not be empty');
            $('#showName').css({
                'color': "red"
            });
        } else if (district_code === '') {
            $("#district_code").css({
                "border-color": "red"
            });
            $('#showCode').html('Field can not be empty');
            $('#showCode').css({
                'color': "red"
            });
            setTimeout(() => {
                $("#district_code").css({
                    "border-color": "black"
                });
                $('#showCode').html('');
                $('#showCode').css({
                    'color': ""
                });
            }, 2000);
        } else if (district_region === '') {

        } else if (district_location === '') {

        } else {

            $.ajax({
                url: '../../script/districtScript.php',
                method: 'POST',
                data: {
                    district_name: district_name,
                    district_code: district_code,
                    district_region: district_region,
                    district_location: district_location,
                    district_submit: district_submit
                },
                success: function(data) {
                    $('#district_show').html(data);
                    setTimeout(() => {
                        $(".alert").alert('close');
                        $('#district_name').val('')
                        $('#district_code').val('')
                        $('#district_region').val('');
                        $('#district_location').val('');
                        $('#district_submit').val('');
                    }, 3000);
                    fetchUser();
                }
            });
        }

    });

    //=============================== SEARCH FROM DATABASE

    function fetchUser() {
        var action = "select";

        $.ajax({
            url: '../../script/districtScript.php',
            method: 'POST',
            data: {
                action: action
            },
            success: function(data) {
                $('#display_district_info').html(data);
            }
        });
    }

    //========================| DISPLAY TEXTFIELD
    $('#district_details').change(function() {
        var district_details = $('#district_details').val();
        //  alert(district_details);
        $.ajax({
            url: '../../script/districtScript.php',
            method: 'POST',
            data: {
                district_details: district_details
            },
            dataType: 'json',
            success: function(data) {
                $('#district_name_update').val(data.district_name_update);
                $('#district_code_update').val(data.district_code_update);
                $('#district_region_update').val(data.district_region_update);
                $('#district_location_update').val(data.district_location_update);
                // alert(data);
            }
        });
    });

    //======================| UPDATE DISTRICT
    $('#district_submit_update').click(function() {
        if (confirm("Are you sure you want to update the district")) {
            var district_submit_update = $('#district_submit_update').val();
            var district_name_update = $('#district_name_update').val();
            var district_code_update = $('#district_code_update').val();
            var district_region_update = $('#district_region_update').val();
            var district_location_update = $('#district_location_update').val();
            $.ajax({
                url: '../../script/districtScript.php',
                method: 'POST',
                data: {
                    district_name_update: district_name_update,
                    district_code_update: district_code_update,
                    district_region_update: district_region_update,
                    district_location_update: district_location_update,
                    district_submit_update: district_submit_update
                },

                success: function(data) {
                    $('#district_show_update').html(data);
                    setTimeout(() => {
                        $(".alert").alert('close');
                        $('#district_name_update').val('');
                        $('#district_code_update').val('');
                        $('#district_region_update').val('');
                        $('#district_location_update').val('');
                    }, 3000);

                }
            });
        } else {
            alert("Cancelled by user");
        }

    });

});
</script>