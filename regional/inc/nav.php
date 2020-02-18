<?php 
    echo '
        <nav class="side-navbar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="avatar"><img src="../../img/coat.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <h1 class="h4">Welcome: <?php 
                                      echo $session_user_name;
                                      ?> </h1>
                        <!-- <p>Web Designer</p> -->
                    </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                <ul class="list-unstyled">
                    <li class="active"><a href="admin.php"> <i class="icon-home"></i>HOME </a></li>
                    <li><a href="district.php"> <i class="icon-grid"></i>DISTRICT </a></li>
                    <li><a href="department.php"> <i class="fa fa-bar-chart"></i>DEPARTMENT </a></li>
                    <li><a href="create_asset.php"> <i class="icon-padnote"></i>CREATE ASSET </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                                class="icon-interface-windows"></i>LOCATIONS </a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                            <!-- <li><a href="location.php">Location</a></li> -->
                            <li><a href="residence.php">Residence</a></li>
                            <li><a href="functional_location.php">Functional Locations</a></li>
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
    ';
?>