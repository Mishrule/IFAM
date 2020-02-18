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
                                            <div id="dispose_show"></div>
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
                                                            name="disposal_region" placeholder="Region"
                                                            value="<?php echo $session_login_region; ?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td style="float:right;">District/Municipal/Assembly:</td>
                                                    <td><input type="text" class="form-control" id="disposal_district"
                                                            name="disposal_district" placeholder="District"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center"><button type="button"
                                                                class="btn btn-primary btn-sm " id="disposal_submit"
                                                                name="disposal_submit"
                                                                value="disposal_submit">Dispose</button></div>
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
                                            id="dispose_change" name="dispose_change">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="50">50</option>
                                            <option value="99999">All</option>
                                        </select>
                                        <label style="padding:10px;" class="float-right">Limit:</label>
                                        <div class="table-responsive">
                                            <div id="dispose_fetch_show"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
            </div>
            </section>
            <!-- Page Footer-->

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
    $('#disposal_submit').click(function() {
        var disposal_date = $('#disposal_date').val();
        var disposal_nature = $('#disposal_nature').val();
        var disposal_sale_value = $('#disposal_sale_value').val();
        var disposal_buyer = $('#disposal_buyer').val();
        var disposal_region = $('#disposal_region').val();
        var disposal_district = $('#disposal_district').val();
        var disposal_submit = $('#disposal_submit').val();

        $.ajax({
            url: '../../script/disposeScript.php',
            method: 'POST',
            data: {
                disposal_nature: disposal_nature,
                disposal_sale_value: disposal_sale_value,
                disposal_buyer: disposal_buyer,
                disposal_region: disposal_region,
                disposal_district: disposal_district,
                disposal_submit: disposal_submit,
                disposal_date: disposal_date
            },
            success: function(data) {
                $('#dispose_show').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    fetchDispose();
                }, 3000);
            }

        });
    });
    //==============================| DISPOSE FETCHED |========================
    fetchDispose();

    function fetchDispose() {
        var dispose_fetch = "disposeFected";

        $.ajax({
            url: '../../script/disposeScript.php',
            method: 'POST',
            data: {
                dispose_fetch: dispose_fetch
            },
            success: function(data) {
                $('#dispose_fetch_show').html(data);
            }
        });
    }

    //=========================| DISPOSE CHANGE LIMIT |

    $('#dispose_change').change(function() {
        var dispose_change = $('#dispose_change').val();
        $.ajax({
            url: '../../script/disposeScript.php',
            method: 'POST',
            data: {
                dispose_change: dispose_change
            },
            success: function(data) {
                $('#dispose_fetch_show').html(data);
            }
        });
    });
});
</script>