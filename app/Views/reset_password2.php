<?= $this->extend('app') ?>
<?= $this->section('main-body') ?> 
    <!-- main body -->
    <div class="row">
			<h2 align="center">Daily Expense Record</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Change your password <i class="fa fa-key" aria-hidden="true"></i></div>
				<div class="panel-body">

					<!--error message -->
					<?php if (session()->getFlashdata('error')) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
					<?php endif; ?>
					<?php if (session()->getFlashdata('success')) : ?>
						<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
					<?php endif; ?>

					<?php echo form_open('reset-password2',['name'=>'reset-password2']);?>
						<fieldset>
							<div class="form-group">
								<?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','readonly'=>'true', 'value'=>session('email')]);?>
								<?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('email');?></div>
                            <?php }?>
							</div>
							<div class="form-group">							
								<?php echo form_password(['name'=>'password', 'class'=>'form-control','placeholder'=>'Enter new password','value'=>set_value('password')]);?>
								<?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('password');?></div>
                            <?php }?>
							</div>
							<div class="form-group">							
								<?php echo form_password(['name'=>'confirmpassword', 'class'=>'form-control','placeholder'=>'Confirm password','value'=>set_value('confirmpassword')]);?>
								<?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('confirmpassword');?></div>
                            <?php }?>
							</div>
							<div class="checkbox">
								<?php echo form_submit(['name'=>'verify','id'=>'login','class'=>'btn btn-warning shadow','value'=>'Change']);?>	
							<hr />
							
							<p style="color:blue"> Having toubrolshot ? 
								<a href="<?= base_url('login');?>" style="color:blue"> </a> <span class="text-danger">contact us</span> </p>
							</div>
						</fieldset>
					<?php echo form_close();?>

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
    <!-- end mainbody -->
	<?= $this->endSection() ?> 