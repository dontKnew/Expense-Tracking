<?= $this->extend('dashboard/index') ?>
<?= $this->section('dashboard-body') ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Change Password</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">User Security <i class="fa fa-user-secret" aria-hidden="true"></i></div>   
                <!-- 
                <?php if(isset($validation)) { ?>
						<div class="alert alert-danger" role="alert">
						<?= $validation->listErrors(); ?>
				<?php } ?> -->

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

                        <?php echo form_open('changePassword', ['name' => 'signup']); ?>
                        <div class="form-group">
                            <label>Current Password <i class="fa fa-key" aria-hidden="true"></i></label>
                            <?php echo form_password(['name' => 'currentpassword', 'id' => 'currentpassword', 'class' => 'form-control', 'placeholder' => 'Enter the Password', 'value' => set_value('currentpassword')]); ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('currentpassword');?></div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label style="color:#000">New Password <i class="fa fa-key" aria-hidden="true"></i></label>
                            <?php echo form_password(['name' => 'newpassword', 'id' => 'newpassword', 'class' => 'form-control', 'placeholder' => 'Enter the Password', 'value' => set_value('newpassword')]); ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('newpassword');?></div>
                            <?php }?>
                        </div>

                        <div class="form-group">
                            <label style="color:#000">Confirm Password <i class="fa fa-key" aria-hidden="true"></i></label>
                            <?php echo form_password(['name' => 'confirmpassword', 'id' => 'confirmpassword', 'class' => 'form-control', 'placeholder' => 'Confirm the Password', 'value' => set_value('confirmpassword')]); ?>
                            <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('confirmpassword');?></div>
                            <?php }?>
                        </div>

                        <div class="form-group has-success">
                            <?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Change']); ?>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
        
        <?= $this->endSection() ?>
        