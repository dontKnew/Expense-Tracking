<?= $this->extend('app') ?>
<?= $this->section('main-body') ?> 
    <!-- main body -->
    <div class="row">
			<h2 align="center">- Daily Expense Record -</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"> <i class="fa fa-user-secret" aria-hidden="true"></i> User Log in
 					</div>
				<div class="panel-body">

					<!--success message -->
					<?php if (session()->getFlashdata('success')) : ?>
						<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
					<?php endif; ?>

					<!--error message -->
					<?php if (session()->getFlashdata('error')) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
					<?php endif; ?>

					<?php echo form_open('login',['name'=>'login']);?>
						<fieldset>
							<div class="form-group">
								<?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Enter  registered email address','value'=>set_value('email')]);?>
								<?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('email');?></div>
                            <?php }?>
							</div>

							<a href="<?= base_url('reset-password');?>">Forgot Password?</a>
							<div class="form-group">							
								<?php echo form_password(['name'=>'password','id'=>'password','class'=>'form-control','placeholder'=>'Enter the Password','value'=>set_value('password')]);?>
								<?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('password');?></div>
                            <?php }?>
							</div>

							<div class="checkbox">
								<?php echo form_submit(['name'=>'login','id'=>'login','class'=>'btn btn-success','value'=>'login']);?>	
							<hr />
							
							<p style="color:blue">Not registered yet ? 
								<a href="<?= base_url('register');?>"> Registere here</a></p>
							</div>
						</fieldset>
					<?php echo form_close();?>

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
    <!-- end mainbody -->
	<?= $this->endSection() ?> 