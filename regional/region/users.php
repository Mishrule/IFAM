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
                        <li class="breadcrumb-item active">Users</li>
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
                                        <h3 class="h4">Register User</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="show_user"></div>

                                            <!-- <form class="container" id="needs-validation"> -->
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <label for="first_name">First name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="eg. Benard" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="middle_name">Middle Name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="middle_name"
                                                            name="middle_name" placeholder="eg. Kofi" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="last_name">Last name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="eg. Mensah" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="user_name">User name</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="user_name"
                                                            name="user_name" placeholder="eg. Ben" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="contact">Contact</label>
                                                    </td>
                                                    <td>
                                                        <input type="tel" class="form-control" id="contact"
                                                            name="contact" placeholder="eg. 024#######" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="pass">Password</label>
                                                    </td>
                                                    <td>
                                                        <input type="password" class="form-control" id="pass"
                                                            name="pass" placeholder="eg. Password" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="region">Region</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="region"
                                                            name="region" placeholder="Ashanti Region"
                                                            value="<?php echo $session_login_region; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="districtName">DistrictName/Municipal:</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="districtName"
                                                            name="district" placeholder="eg. Ashanti North District"
                                                            value="<?php echo $session_login_district_name; ?>"
                                                            disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="district">District/Municipal Code:</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="district"
                                                            name="district" placeholder="eg. AND"
                                                            value="<?php echo $session_login_district; ?>" disabled>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="location">Location</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="location"
                                                            name="location" placeholder="eg. Kumasi"
                                                            value="<?php echo $session_login_location; ?>" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="login_type">Login Type</label>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select d-block my-3" id="login_type"
                                                            name="login_type" required>
                                                            <option value="user">User</option>
                                                            <option value="administrator">Administrator</option>
                                                            <!-- <option value="2">Two</option>
                                    <option value="3">Three</option> -->
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                            <button class="btn btn-primary" id="submit" name="submit"
                                                type="button">Submit</button>
                                            <!-- </form> -->
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
                                        <h3 class="h4">User Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="delete_user_data"></div>
                                            <div id="show_user_data"></div>

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
<!-- <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  "use strict";
  window.addEventListener("load", function() {
    var form = document.getElementById("needs-validation");
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
}());
</script> -->
<script>
$(document).ready(function() {
    $('#submit').click(function() {
        var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var user_name = $('#user_name').val();
        var contact = $('#contact').val();
        var pass = $('#pass').val();
        var region = $('#region').val();
        var district = $('#district').val();
        var location = $('#location').val();
        var login_type = $('#login_type').val();
        var submit = $('#submit').val();

        $.ajax({
            url: '../../script/userSript.php',
            method: 'POST',
            data: {
                first_name: first_name,
                middle_name: middle_name,
                last_name: last_name,
                user_name: user_name,
                contact: contact,
                pass: pass,
                region: region,
                district: district,
                district_name: district_name,
                location: location,
                login_type: login_type,
                submit: submit
            },
            success: function(data) {
                $('#show_user').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    // $('#_functional_exampleModal').modal('hide');
                    fetchUser();
                }, 3000);
            }
        });
    });
    fetchUser();

    function fetchUser() {
        var fetch = "select";

        $.ajax({
            url: '../../script/userSript.php',
            method: 'POST',
            data: {
                fetch: fetch
            },
            success: function(data) {
                $('#show_user_data').html(data);

            }
        });

    }

    $(document).on('click', '.updates', function() {
        var user_update = $(this).attr('id');

        $.ajax({
            url: '../../script/userSript.php',
            method: 'POST',
            data: {
                user_update: user_update
            },
            dataType: 'json',
            success: function(data) {
                $('#update_first_name').val(data.update_first_name);
                $('#update_id').val(data.update_id);
                $('#update_middle_name').val(data.update_middle_name);
                $('#update_last_name').val(data.update_last_name);
                $('#update_user_name').val(data.update_user_name);
                $('#update_contact').val(data.update_contact);
                $('#update_pass').val(data.update_pass);
                $('#update_region').val(data.update_region);
                $('#update_district').val(data.update_district);
                $('#update_location').val(data.update_location);
            }
        })
    });

    $('#update_changes').click(function() {
        var update_first_name = $('#update_first_name').val();
        var update_id = $('#update_id').val();
        var update_middle_name = $('#update_middle_name').val();
        var update_last_name = $('#update_last_name').val();
        var update_user_name = $('#update_user_name').val();
        var update_contact = $('#update_contact').val();
        var update_pass = $('#update_pass').val();
        var update_region = $('#update_region').val();
        var update_district = $('#update_district').val();
        var update_location = $('#update_location').val();
        var update_changes = $('#update_changes').val();

        $.ajax({
            url: '../../script/userSript.php',
            method: 'POST',
            data: {
                update_first_name: update_first_name,
                update_id: update_id,
                update_middle_name: update_middle_name,
                update_last_name: update_last_name,
                update_user_name: update_user_name,
                update_contact: update_contact,
                update_pass: update_pass,
                update_region: update_region,
                update_district: update_district,
                update_location: update_location,
                update_changes: update_changes
            },
            success: function(data) {
                $('#show_user_update_data').html(data);
                setTimeout(() => {
                    $(".alert").alert('close');
                    $('#user_exampleModal').modal('hide');
                    fetchUser();
                }, 3000);
            }
        });

    });

    //===========================| DELETE FROM DATABASE FUNCTIONAL OFFICE |=========================
    $(document).on('click', '.delete', function() {
        var id_delete = $(this).attr('id');

        if (confirm("Are you sure you want to delete record")) {
            $.ajax({
                url: '../../script/userSript.php',
                method: 'POST',
                data: {
                    id_delete: id_delete
                },
                success: function(data) {
                    $('#delete_user_data').html(data);
                    setTimeout(() => {
                        $(".alert").alert('close');
                        fetchUser();
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
<div class="modal fade" id="user_exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE USER DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div id="show_user_update_data"></div>
                    <table class="table">
                        <tr>
                            <td>
                                <label for="update_first_name">First name</label>
                            </td>
                            <td>
                                <input type="hidden" class="form-control" id="update_id" name="update_id"
                                    placeholder="eg. Benard" required>
                                <input type="text" class="form-control" id="update_first_name" name="update_first_name"
                                    placeholder="eg. Benard" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="update_middle_name">Middle Name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="update_middle_name"
                                    name="update_middle_name" placeholder="eg. Kofi" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="update_last_name">Last name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="update_last_name" name="update_last_name"
                                    placeholder="eg. Mensah" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="update_user_name">User name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="update_user_name" name="update_user_name"
                                    placeholder="eg. Ben" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="update_contact">Contact</label>
                            </td>
                            <td>
                                <input type="tel" class="form-control" id="update_contact" name="update_contact"
                                    placeholder="eg. 024#######" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for=update_pass">Password</label>
                            </td>
                            <td>
                                <input type="password" class="form-control" id="update_pass" name="update_pass"
                                    placeholder="eg. Password" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="update_region">Region</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="update_region" name="update_region"
                                    placeholder="Ashanti Region" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="update_district">District/Municipal:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="update_district" name="update_district"
                                    placeholder="eg. AND" disabled>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="update_location">Location</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="update_location" name="update_location"
                                    placeholder="eg. Kumasi" disabled>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update_changes" name="update_changes"
                    value="update_changes">Update changes</button>
            </div>
        </div>
    </div>
</div>