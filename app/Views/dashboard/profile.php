<?= $this->extend('dashboard/index') ?>
<?= $this->section('dashboard-body') ?>
<?php require(APPPATH.'views/dashboard/include/sidebar.php') ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Profile</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
        <?php echo form_open('Profile', ['name' => 'userprofile']) ?>
        <div class="panel panel-default">
					<div class="panel-heading">Profile</div>

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
							<div class="form-group">
								<label>Full Name</label>
								<?php echo form_input(['name' => 'fullname', 'id' => 'fullname', 'class' => 'form-control', 'value' => set_value('fromdate', session('user_name'))]); ?>
                                <?php if(isset($validation)) { ?>
                                    <div style="color:red"><?= $validation->getError('fullname');?></div>
                                <?php }?>
								
							</div>
							<div class="form-group">
								<label style="color:#000">Email</label>
								<?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'readonly' => 'true', 'value' => set_value('fromdate', session('user_email'))]); ?>
								<?php if(isset($validation)) { ?>
                                    <div style="color:red"><?= $validation->getError('email');?></div>
                                <?php }?>
							</div>

							<div class="form-group">
								<label style="color:#000">Mobile Number</label>
								<?php echo form_input(['name' => 'mobileno', 'id' => 'MobileNumber', 'class' => 'form-control', 'value' => set_value('fromdate', session('user_number'))]); ?>
                                <?php if(isset($validation)) { ?>
                                    <div style="color:red"><?= $validation->getError('mobileno');?></div>
                                <?php }?>
							</div>
							<div class="form-group">
								<label style="color:#000">Registration Date</label>
								<?php echo form_input(['name' => 'regdate', 'id' => 'regdate', 'class' => 'form-control', 'readonly' => 'true', 'value' => set_value('fromdate', session('user_regDate'))]);?>
							</div>

							<div class="form-group has-success">
								<?php echo form_submit(['name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary']); ?>
							</div>
						</div>
						<?php echo form_close(); ?>
						</form>
					</div>
				</div>
			</div><!-- /.panel-->
        </div><!-- /.col-->
        
        <?= $this->endSection() ?>
        