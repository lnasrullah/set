<?php
if($this->session->flashdata('success'))
{
	?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert"></button>
        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php
}
?>
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Form</div>
							</div>
                            <div class="portlet-body form">
                            <?php
							if(validation_errors())
							{
								?>
								<div class="alert alert-error">
									<button class="close" data-dismiss="alert"></button>
									<strong>Error!</strong><?php echo validation_errors(); ?>
								</div>
								<?php
							}
							?>
                            <?php
							if($this->session->flashdata('error'))
							{
								?>
								<div class="alert alert-error">
									<button class="close" data-dismiss="alert"></button>
									<strong>Error!</strong><?php echo $this->session->flashdata('error'); ?>
								</div>
								<?php
							}
							?>
                            	<form method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                <input class="span6 m-wrap" type="hidden" name="Musermodel[username]" value="<?php echo ($content->data->username) ?>">
                                
                                <input class="span6 m-wrap" type="hidden" name="Musermodel[name]" value="<?php echo ($content->data->name) ?>">
                                
                                <div class="control-group <?php echo form_error('Musermodel[password]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("password") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="password" name="Musermodel[password]" value="">
                                        <span class="help-inline"><?php echo form_error('Musermodel[password]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('c_password')?"error":""; ?>">
                                    <label class="control-label">Confirm Password</label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="password" name="c_password" value="">
                                        <span class="help-inline"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                                
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="submit" value="submit">Submit</button>
                                    <a href="<?php echo site_url("muser"); ?>" class="btn">Cancel</a>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->