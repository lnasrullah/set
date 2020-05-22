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
								<div class="caption"><i class="icon-edit"></i>Form<?php echo $content->data->title?" : ".$content->data->title:"" ?></div>
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
                                
                                <div class="control-group <?php echo form_error('Tpagemodel[title]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("title") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Tpagemodel[title]" value="<?php echo set_value('Tpagemodel[title]',$content->data->title) ?>">
                                        <span class="help-inline"><?php echo form_error('Tpagemodel[title]'); ?></span>
                                    </div>
                                </div>
                                
                                <?php
								if($content->data->parent==0)
								{
									?>
                                    <input type="hidden" name="Tpagemodel[parent]" value="<?php echo $content->data->parent ?>">
                                    <?php
								}
								else
								{
								?>
                                
                                <div class="control-group <?php echo form_error('Tpagemodel[parent]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("parent") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemodel[parent]">
                                        <?php
										if($parent->data!=NULL)
										{
											foreach($parent->data as $parent1)
											{
												?>
                                                <option value="<?php echo $parent1->id?>" <?php echo set_value('Tpagemodel[parent]',$content->data->parent)==$parent1->id?"selected=\"selected\"":"" ?>><?php echo $parent1->title?></option>
                                                <?php
											}
										}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemodel[parent]'); ?></span>
                                    </div>
                                </div>
                                <?php
								}
								?>
                                
                                <div class="control-group <?php echo form_error('Tpagemodel[article]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("article") ?></label>
                                    <div class="controls">
                                        <textarea class="span12 ckeditor m-wrap" name="Tpagemodel[article]" rows="6"><?php echo set_value('Tpagemodel[article]',$content->data->article) ?></textarea>
                                        <span class="help-inline"><?php echo form_error('Tpagemodel[article]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label"><?php echo $content->getLabel("header_image") ?></label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url($content->data->header_image); ?>" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input name="file" type="file" class="default" /></span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <span class="label label-important">NOTE!</span>
                                        <span>
                                        Attached image thumbnail is
                                        supported in Latest Firefox, Chrome, Opera, 
                                        Safari and Internet Explorer 10 only
                                        </span>
                                    </div>
                                </div>
                                
                                <?php
								if($content->data->header_image)
								{
                                ?>
                                <div class="control-group">
                                    <div class="controls">
										<label class="checkbox">
											<input type="checkbox" name="Tpagemodel[header_image]" value="" /> Delete Image
										</label>
                                    </div>
                                </div>
                                <?php
								}
                                ?>
                                
                                <div class="control-group <?php echo form_error('Tpagemodel[status_link]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_link") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemodel[status_link]">
                                        <?php
											foreach($status_link->data as $status_link1)
											{
												?>
                                                <option value="<?php echo $status_link1->value?>" <?php echo set_value('Tpagemodel[status_link]',$content->data->status_link)==$status_link1->value?"selected=\"selected\"":"" ?>><?php echo $status_link1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemodel[status_link]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Tpagemodel[link_location]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("link_location") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemodel[link_location]">
                                        <?php
											foreach($link_location->data as $link_location1)
											{
												?>
                                                <option value="<?php echo $link_location1->value?>" <?php echo set_value('Tpagemodel[link_location]',$content->data->link_location)==$link_location1->value?"selected=\"selected\"":"" ?>><?php echo $link_location1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemodel[link_location]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="control-group <?php echo form_error('Tpagemodel[status_active]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_active") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemodel[status_active]">
                                        <?php
											foreach($status_active->data as $status_active1)
											{
												?>
                                                <option value="<?php echo $status_active1->value?>" <?php echo set_value('Tpagemodel[status_active]',$content->data->status_active)==$status_active1->value?"selected=\"selected\"":"" ?>><?php echo $status_active1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemodel[status_active]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="submit" value="submit">Submit</button>
                                    <a href="<?php echo $content->data->parent==0?site_url("tpage"):site_url("tpage/update/".$content->data->parent); ?>" class="btn">Cancel</a>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->
                        
                        <?php
						if($content->data->id!==NULL)
						{
						?>
                        
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Sub Menu</div>
							</div>
                            <div class="portlet-body form">
                            	<div class="row-fluid">
                                	<div class="span12">
                                		<a href="<?php echo site_url("tpage/create/".$content->data->id); ?>" class="btn yellow">Add New</a>
                                    </div>
                                </div><br />

                            	<form method="post" class="form-horizontal">
                                <?php
								createTable(
									$submenu,
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
										array("",'<a class=\"btn blue\" href=\"'.site_url("tpage/update").'/$data->id\">Edit</a><input type=\"hidden\" name=\"indexes[$data->id]\" value=\"$rownum\">')
									),
									2);
								?>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn green" name="saveorder" value="submit">Save Order</button>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->
                        
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Page Modules</div>
							</div>
                            <div class="portlet-body form">
                            	<div class="row-fluid">
                                	<div class="span12">
                                		<a href="<?php echo site_url("tpagemodule/create/".$content->data->id); ?>" class="btn yellow">Add New</a>
                                    </div>
                                </div><br />

                            	<form method="post" class="form-horizontal">
                                <?php
								createTable(
									$pagemodule,
									array(
										array("No",'$rownum'),
										"title",
										"module_type",
										"status_active",
										"created_by",
										"created_date",
										"modified_by",
										"modified_date",
										//array("",'<a class=\"btn blue\" href=\"$data->id\".site_url(\"tpage/update/\").\"\">Edit</a>')
										//array("",'<a class=\"btn blue\" href=\"tpage/update/$data->id\">Edit</a>')
										array("",'<a class=\"btn blue\" href=\"'.site_url("tpagemodule/update").'/$data->id\">Edit</a><input type=\"hidden\" name=\"indexes[$data->id]\" value=\"$rownum\">')
									),
									2);
								?>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn purple" name="savemoduleorder" value="submit">Save Order</button>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->
                        
                        <?php
						}
						?>