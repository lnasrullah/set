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
                                
                                <div class="control-group <?php echo form_error('Tpagemodulemodel[title]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("title") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Tpagemodulemodel[title]" value="<?php echo set_value('Tpagemodulemodel[title]',$content->data->title) ?>">
                                        <span class="help-inline"><?php echo form_error('Tpagemodulemodel[title]'); ?></span>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="Tpagemodulemodel[page_id]" value="<?php echo $content->data->page_id ?>">
                                <div class="control-group <?php echo form_error('Tpagemodulemodel[module_type]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("module_type") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemodulemodel[module_type]">
                                        <?php
											foreach($module_type->data as $module_type1)
											{
												?>
                                                <option value="<?php echo $module_type1->value?>" <?php echo set_value('Tpagemodulemodel[module_type]',$content->data->module_type)==$module_type1->value?"selected=\"selected\"":"" ?>><?php echo $module_type1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemodulemodel[module_type]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Tpagemodulemodel[status_active]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_active") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemodulemodel[status_active]">
                                        <?php
											foreach($status_active->data as $status_active1)
											{
												?>
                                                <option value="<?php echo $status_active1->value?>" <?php echo set_value('Tpagemodulemodel[status_active]',$content->data->status_active)==$status_active1->value?"selected=\"selected\"":"" ?>><?php echo $status_active1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemodulemodel[status_active]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="submit" value="submit">Submit</button>
                                    <a href="<?php echo site_url("tpage/update/".$content->data->page_id); ?>" class="btn">Cancel</a>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->
                        
                        <?php
						if($content->data->id)
						{
							?>
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-edit"></i>Module Detail</div>
                                </div>
                                <div class="portlet-body form">
                                
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <a href="<?php echo site_url("tpagemoduledetail/create/".$content->data->id); ?>" class="btn yellow">Add New</a>
                                        </div>
                                    </div><br />
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    
                                    
									<?php
                                    createTable(
                                        $this->Tpagemoduledetailmodel,
                                        array(
                                            array("No",'$rownum'),
                                            "title",
                                            "status_active",
                                            "created_by",
                                            "created_date",
                                            "modified_by",
                                            "modified_date",
                                            //array("",'<a class=\"btn blue\" href=\"$data->id\".site_url(\"tpage/update/\").\"\">Edit</a>')
                                            //array("",'<a class=\"btn blue\" href=\"tpage/update/$data->id\">Edit</a>')
                                            array("",'<a class=\"btn red\" href=\"'.site_url("tpagemoduledetail/update").'/$data->id\">Edit</a><input type=\"hidden\" name=\"indexes[$data->id]\" value=\"$rownum\">')
                                        ),
                                        2);
                                    ?>
                                    
                                    <div class="form-actions">
                                        <button type="submit" class="btn red" name="saveorder" value="submit">Save Order</button>
                                    </div>
                                    
                                    
                                    </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <?php
						}
						?>