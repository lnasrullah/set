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
                                
                                <div class="control-group <?php echo form_error('Mgroupmodel[name]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("name") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Mgroupmodel[name]" value="<?php echo set_value('Mgroupmodel[name]',$content->data->name) ?>">
                                        <span class="help-inline"><?php echo form_error('Mgroupmodel[name]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Mgroupmodel[notes]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("notes") ?></label>
                                    <div class="controls">
                                        <textarea class="span6 m-wrap" name="Mgroupmodel[notes]" rows="6"><?php echo set_value('Mgroupmodel[notes]',$content->data->notes) ?></textarea>
                                        <span class="help-inline"><?php echo form_error('Mgroupmodel[notes]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Mgroupmodel[status_active]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_active") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Mgroupmodel[status_active]">
                                        <?php
											foreach($status_active->data as $status_active1)
											{
												?>
                                                <option value="<?php echo $status_active1->value?>" <?php echo set_value('Mgroupmodel[status_active]',$content->data->status_active)==$status_active1->value?"selected=\"selected\"":"" ?>><?php echo $status_active1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Mgroupmodel[status_active]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Privileges</label>
                                    <div class="controls">
                                        <select name="privilege[]" multiple="multiple" id="my_multi_select1" name="my_multi_select1[]">
												<?php
												foreach($this->Mmodulemodel->data as $module)
												{
													?>
                                                    <option value="<?php echo $module->id ?>" <?php echo in_array($module->id,$privilege)?"selected=\"selected\"":"" ?>><?php echo $module->name ?></option>
                                                    <?php
												}
												?>
											</select>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="submit" value="submit">Submit</button>
                                    <a href="<?php echo site_url("mgroup"); ?>" class="btn">Cancel</a>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->