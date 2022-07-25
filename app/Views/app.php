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
                    <a class="navbar-brand" href="<?= base_url('/')?>"><span> Daily Expense Management </span></a>
                </div>
            </div>
        </nav>
    <!-- end header -->
    <?= $this->renderSection('main-body') ?>
    <hr>
    <!-- footer -->
    <div class="col-sm-12 ">
		<p class="back-link"> Daily Expense Management - 2022-23</p>
        <p class="back-link"> Created By - <a href="https://www.github.com/dontknew" class="text-danger"> Failure Boy </a></p>
    </div>
    <!-- end footer -->

     <script src="<?= base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?= base_url('assets/js/custom.js');?>"></script> 
</body>
</html>