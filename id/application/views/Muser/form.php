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
                                
                                <div class="control-group <?php echo form_error('Musermodel[username]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("username") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Musermodel[username]" value="<?php echo set_value('Musermodel[username]',$content->data->username) ?>" <?php echo ($content->data->id?"readonly=\"readonly\"":"") ?>>
                                        <span class="help-inline"><?php echo form_error('Musermodel[username]'); ?></span>
                                    </div>
                                </div>
                                
                                <?php
								if(!$content->data->id)
								{
									?>
                                    <div class="control-group <?php echo form_error('Musermodel[password]')?"error":""; ?>">
                                        <label class="control-label"><?php echo $content->getLabel("password") ?></label>
                                        <div class="controls">
                                            <input class="span6 m-wrap" type="password" name="Musermodel[password]" value="<?php echo set_value('Musermodel[password]',$content->data->password) ?>">
                                            <span class="help-inline"><?php echo form_error('Musermodel[password]'); ?></span>
                                        </div>
                                    </div>
                                    <?php
								}
								?>
                                
                                
                                
                                <div class="control-group <?php echo form_error('Musermodel[name]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("name") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Musermodel[name]" value="<?php echo set_value('Musermodel[name]',$content->data->name) ?>">
                                        <span class="help-inline"><?php echo form_error('Musermodel[name]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Musermodel[status_active]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_active") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Musermodel[status_active]">
                                        <?php
											foreach($status_active->data as $status_active1)
											{
												?>
                                                <option value="<?php echo $status_active1->value?>" <?php echo set_value('Musermodel[status_active]',$content->data->status_active)==$status_active1->value?"selected=\"selected\"":"" ?>><?php echo $status_active1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Musermodel[status_active]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Group</label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="group">
                                        <?php
											foreach($this->Mgroupmodel->data as $group)
											{
												?>
                                                <option value="<?php echo $group->id?>" <?php echo $usergroup && $usergroup->group_id==$group->id?"selected=\"selected\"":"" ?>><?php echo $group->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"></span>
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