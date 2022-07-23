<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Project </title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="dashboard.php"><span>Daily Expense Tracker</span></a>
            </div>
        </div>
    </nav>
    <!-- end header -->
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            Dashboard
            <div class="profile-usertitle-name"><?= session('user_name') ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="<?php base_url('dashboard'); ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="<?= base_url('Expenses/add'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                    </a></li>
                <li><a class="" href="<?= base_url('Expenses/manage'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                    </a></li>

            </ul>

        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="<?= base_url('Reports/datewiserport'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daywise Expenses
                    </a></li>
                <li><a class="" href="<?= base_url('Reports/monthwiserport'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Expenses
                    </a></li>
                <li><a class="" href="<?= base_url('Reports/yearwiserport'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Expenses
                    </a></li>

            </ul>
        </li>
        <li><a href="<?= base_url('Profile'); ?>"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
        <li><a href="<?= base_url('changePassword'); ?>"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
        <li><a href="<?= base_url('logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
    </div>
    <?= $this->renderSection('dashboard-body') ?>
    <!-- footer -->
    <div class="col-sm-12">
        <p class="back-link">Daily Expense Tracker <a href="https://phpgurukul.com">phpgurukul</a></p>
    </div>
    <!-- end footer -->

    <script src="<?= base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart-data.js'); ?>"></script>
    <script src="<?= base_url('assets/js/easypiechart.js'); ?>"></script>
    <script src="<?= base_url('assets/js/easypiechart-data.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.js'); ?>"></script> -->

    <script>
        window.onload = function() {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>
</body>

</html>