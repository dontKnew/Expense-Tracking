<?= $this->extend('app') ?>
<?= $this->section('main-body') ?>
<?php require(APPPATH . 'views/dashboard/include/sidebar.php') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Expense</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Datewise Expense Report</div>
                    
                <!--success message -->
                    <?php if (session()->getFlashdata('success')) { ?>
                        <p class="alert alert-success text-center"><?= session()->getFlashdata('success'); ?></p>
                    <?php } ?>
                    <!--error message -->
                    <?php if (session()->getFlashdata('error')) { ?>
                        <p class="alert alert-danger text-center"><?= session()->getFlashdata('error'); ?></p>
                    <?php } ?>
                    
                <div class="panel-body">

                    <div class="col-md-12">

                        <?php echo form_open('report/datewise', ['name' => 'expensedatewiserportds']) ?>


                        <div class="form-group">
                            <label>From Date</label>

                            <?php echo form_input(['name' => 'fromdate', "type"=>"date", 'id' => 'fromdate', 'class' => 'form-control', 'data-date-format' => 'yyyy-mm-dd', 'value' => set_value('fromdate')]); ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('fromdate');?></div>
                            <?php }?>

                        </div>
                        <div class="form-group">
                            <label style="color:#000">To Date</label>
                            <?php echo form_input(['name' => 'todate', "type"=>"date", 'id' => 'todate', 'class' => 'form-control', 'data-date-format' => 'dd-mm-yyyy', 'value' => set_value('todate')]); ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('todate');?></div>
                            <?php }?>
                        </div>

                        <div class="form-group has-success">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'submit', 'class' => 'btn btn-primary']); ?>
                        </div>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div><!-- /.panel-->

    </div><!-- /.col-->
    <!-- might be below footer -->
</div><!-- /.row -->
</div>
<!--/.main-->
<?= $this->endSection() ?>