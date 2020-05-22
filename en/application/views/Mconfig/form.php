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
                            	<form method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                <div class="control-group <?php echo form_error('Mconfigmodel[name]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("name") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Mconfigmodel[name]" value="<?php echo set_value('Mconfigmodel[name]',$content->data->name) ?>">
                                        <span class="help-inline"><?php echo form_error('Mconfigmodel[name]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Mconfigmodel[value]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("value") ?></label>
                                    <div class="controls">
                                    	<?php
										if($content->data->type=="file")
										{
										?>
                                        <input class="default" type="file" name="file">
                                        <?php
										}
										else
										{
										?>
                                        <textarea class="span6 m-wrap" name="Mconfigmodel[value]"><?php echo set_value('Mconfigmodel[value]',$content->data->value) ?></textarea>
                                        <?php
										}
										?>
                                        <span class="help-inline"><?php echo form_error('Mconfigmodel[value]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Mconfigmodel[status_active]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_active") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Mconfigmodel[status_active]">
                                        <?php
											foreach($status_active->data as $status_active1)
											{
												?>
                                                <option value="<?php echo $status_active1->value?>" <?php echo set_value('Mconfigmodel[status_active]',$content->data->status_active)==$status_active1->value?"selected=\"selected\"":"" ?>><?php echo $status_active1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Mconfigmodel[status_active]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="submit" value="submit">Submit</button>
                                    <a href="<?php echo site_url("mconfig"); ?>" class="btn">Cancel</a>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->