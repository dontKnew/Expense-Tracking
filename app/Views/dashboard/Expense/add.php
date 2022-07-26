<?= $this->extend('app') ?>
<?= $this->section('main-body') ?>
<?php require(APPPATH.'views/dashboard/include/sidebar.php') ?>

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
                <div class="panel-heading">Expense <span class="fa fa-arrow-right">&nbsp;</span></div>

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
                        <?php echo form_open('Expenses/add', ['name' => 'addexpense']); ?>
                        <div class="form-group">
                            <label>Date of Expense</label>
                            <?php echo form_input(['name' => 'expensedate', 'type'=>'date', 'id' => 'expensedate', 'class' => 'form-control', 'data-date-format' => 'dd-mm-yyyy', 'value' => set_value('expensedate')]); ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('expensedate');?></div>
                            <?php }?>

                        </div>
                        <div class="form-group">
                            <label style="color:#000">Item</label>
                            <?php echo form_input(['name' => 'item', 'id' => 'item', 'class' => 'form-control', 'value' => set_value('item')]) ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('item');?></div>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label style="color:#000">Cost of Item</label>
                            <?php echo form_input(['name' => 'costitem', 'id' => 'costitem', 'class' => 'form-control', 'value' => set_value('costitem')]) ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('costitem');?></div>
                            <?php }?>
                        </div>

                        <div class="form-group has-success">
                            <?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Add']) ?>
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