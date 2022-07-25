<?= $this->extend('app') ?>
<?= $this->section('main-body') ?> 
    <!-- main body -->
    <div class="row">
			<h2 align="center">Daily Expense Record</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register User </div>
				<div class="panel-body">
					
				<!--validation message -->
					 <?php if(isset($validation)) { ?>
						<div class="alert alert-danger" role="alert">
						<?= $validation->listErrors(); ?>
					<?php } ?> 

					<!--success message -->
					<?php if (session()->getFlashdata('success')) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('success') ?></div>
					<?php endif; ?>

					<!--error message -->
					<?php if (session()->getFlashdata('error')) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
					<?php endif; ?>

					<?php echo form_open('register',['name'=>'register']);?>
						<fieldset>
                            <div class="form-group">
                                <?php echo form_input(['name'=>'fullname','id'=>'fullname','class'=>'form-control','placeholder'=>'Enter your Full Name','value'=>set_value('fullname')]);?>
							</div>

							<div class="form-group">
								<?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Enter  registered email id','value'=>set_value('email')]);?>
								<!-- <?php if(isset($validation)) { ?>
									<div class="text-danger mb-1">
									<?= $validation->getError('email'); ?>
								<?php } ?> -->
							</div>

                            <div class="form-group">
                                <?php echo form_input(['name'=>'mobileno','id'=>'mobileno','class'=>'form-control','placeholder'=>'Enter  valid  10 digit mobile number','value'=>set_value('mobileno')]);?>

							</div>

                            <div class="form-group">
                                <?php echo form_password(['name'=>'newpassword','id'=>'newpassword','class'=>'form-control','placeholder'=>'Enter the Password','value'=>set_value('newpassword')]);?>	
								
							</div>
                            
                            <?php echo form_submit(['name'=>'submit','id'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);?>
                            <p style="color:blue"> Already Registered <a href="<?=  base_url('/');?>">Login</a></p>
						</fieldset>
					<?php echo form_close();?>

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
    <!-- end mainbody -->
	<?= $this->endSection() ?> 