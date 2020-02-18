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
                        <li class="breadcrumb-item active">Tagging of Cards</li>
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
                                        <h3 class="h4">Tagging of Cards</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="tagging_show"></div>
                                            <table class="table">
                                                <tr>
                                                    <td style="float:right;">Date Required:</td>
                                                    <td><input type="date" class="form-control"
                                                            id="tagging_required_date" name="tagging_required_date"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Name of Asset:</td>
                                                    <td><input type="text" class="form-control" id="tagging_asset_name"
                                                            name="tagging_asset_name" placeholder="Name of Asset"
                                                            required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Date Transferred:</td>
                                                    <td><input type="date" class="form-control"
                                                            id="tagging_transferred_date"
                                                            name="tagging_transferred_date" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">New Location:</td>
                                                    <td><input type="text" class="form-control" id="tagging_location"
                                                            name="tagging_location" placeholder="New Location" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Authority:</td>
                                                    <td><input type="text" class="form-control" id="tagging_authority"
                                                            name="tagging_authority" placeholder="Authority" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Condition before Transfer:</td>
                                                    <td><input type="text" class="form-control" id="tagging_condition"
                                                            name="tagging_condition"
                                                            placeholder="Condition before Transfer" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Date Expected Back to Original Location:
                                                    </td>
                                                    <td><input type="date" class="form-control"
                                                            id="tagging_transferred_date"
                                                            name="tagging_transferred_date" required></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">Region:</td>
                                                    <td><input type="text" class="form-control" id="tagging_region"
                                                            name="tagging_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly:</td>
                                                    <td><input type="text" class="form-control" id="tagging_district"
                                                            name="tagging_district" placeholder="Region"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm " id="department_submit"
                                                                name="department_submit"
                                                                value="department_submit">Tagging of Cards</button>
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
                                        <h3 class="h4">Tagging of Cards Reports</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0 col-2 float-right"
                                                id="tagging_change" name="tagging_change">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="50">50</option>
                                                <option value="99999">All</option>
                                            </select>
                                            <label style="padding:10px;" class="float-right">Limit:</label>
                                            <div id="tagging_fetch_show"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
            </section>
            
        </div>
    </div>
    </div>
    <!-- JavaScript files-->
    <?php require_once('../inc/footer_links.php'); ?>
</body>

</html>
<script>
$(document).ready(function() {
    //====================================| INSERT
    $('#department_submit').click(function() {
        var tagging_required_date = $('#tagging_required_date').val();
        var tagging_asset_name = $('#tagging_asset_name').val();
        var tagging_transferred_date = $('#tagging_transferred_date').val();
        var tagging_location = $('#tagging_location').val();
        var tagging_authority = $('#tagging_authority').val();
        var tagging_condition = $('#tagging_condition').val();
        var tagging_transferred_date = $('#tagging_transferred_date').val();
        var tagging_region = $('#tagging_region').val();
        var tagging_district = $('#tagging_district').val();
        var department_submit = $('#department_submit').val();

        $.ajax({
            url: '../../script/taggingScript.php',
            method: 'POST',
            data: {
                tagging_required_date: tagging_required_date,
                tagging_asset_name: tagging_asset_name,
                tagging_transferred_date: tagging_transferred_date,
                tagging_location: tagging_location,
                tagging_authority: tagging_authority,
                tagging_condition: tagging_condition,
                tagging_transferred_date: tagging_transferred_date,
                tagging_region: tagging_region,
                tagging_district: tagging_district,
                department_submit: department_submit
            },
            success: function(data) {
                $('#tagging_show').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    fetchTagging();
                }, 3000);
            }
        });
    });

    //==============================| DISPOSE FETCHED |========================
    fetchTagging();

    function fetchTagging() {
        var tagging_fetch = "taggingFected";

        $.ajax({
            url: '../../script/taggingScript.php',
            method: 'POST',
            data: {
                tagging_fetch: tagging_fetch
            },
            success: function(data) {
                $('#tagging_fetch_show').html(data);
            }
        });
    }
    //=========================| DISPOSE CHANGE LIMIT |
    $('#tagging_change').change(function() {
        var tagging_change = $('#tagging_change').val();
        $.ajax({
            url: '../../script/taggingScript.php',
            method: 'POST',
            data: {
                tagging_change: tagging_change
            },
            success: function(data) {
                $('#tagging_fetch_show').html(data);
            }
        });
    });

});
</script>