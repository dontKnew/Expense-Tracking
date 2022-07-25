<?= $this->extend('app') ?>
<?= $this->section('main-body') ?> 
    <!-- main body -->
    <div class="row">
			<h2 align="center">Daily Expense Record</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Reset Your Password</div>
				<div class="panel-body">

					<!--error message -->
					<?php if (session()->getFlashdata('error')) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
					<?php endif; ?>

					<?php echo form_open('reset-password',['name'=>'reset-password']);?>
						<fieldset>
							<div class="form-group">
								<?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Enter registered email address','value'=>set_value('email')]);?>
                                <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('email');?></div>
                            <?php }?>
							</div>
							<div class="form-group">							
								<?php echo form_input(['name'=>'mobileno', 'class'=>'form-control','placeholder'=>'Enter the mobile number','value'=>set_value('mobileno')]);?>
                                <?php if(isset($validation)) { ?>
                                <div style="color:red"><?= $validation->getError('mobileno');?></div>
                            <?php }?>
							</div>
							<div class="checkbox">
								<?php echo form_submit(['name'=>'verify','id'=>'login','class'=>'btn btn-danger shadow','value'=>'Verify']);?>	
							<hr />
							
							<p style="color:blue"> Did you remembered ? 
								<a href="<?= base_url('/');?>" style="color:blue"> login here | </a> <span class="text-danger">contact us</span> </p>
							</div>
						</fieldset>
					<?php echo form_close();?>

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
    <!-- end mainbody -->
	<?= $this->endSection() ?> 