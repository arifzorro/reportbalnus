<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php assets('images/favicon.png'); ?>">

    <title>Dashboard</title>

    <link rel="stylesheet" href="<?php mix('css/app.css'); ?>">
    <?php show_ifset($css); ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title">
                        <i class="fa fa-paw"></i>
                        <span class="m-l-5">GPON-D V0.1</span>
                    </a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?php assets('images/user.png'); ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?php echo $this->auth->get_username(); ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <div class="clearfix"></div>

                <!-- sidebar menu -->
                <?php include ('partials/_sidebar.php'); ?>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php assets('images/user.png'); ?>" alt=""><?php echo $this->auth->get_name(); ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php route('autentikasi/logout'); ?>" method="POST" style="display: none;"></form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <?php $message = $this->session->flashdata('message'); ?>
                <?php if (!empty($message)): ?>
                    <div class="alert <?php echo $this->session->flashdata('type') == "success" ? "alert-success" : "alert-danger"; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <?php
                // show konten yg dirender dari controller
                show_ifset($content);
                ?>

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include 'partials/_footer.php'; ?>
        <!-- /footer content -->
    </div>
</div>

<script src="<?php mix('js/app.js'); ?>"></script>
<?php show_ifset($js); ?>
</body>
</html>
