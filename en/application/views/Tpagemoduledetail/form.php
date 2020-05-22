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
                                
                                <div class="control-group <?php echo form_error('Tpagemoduledetailmodel[title]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("title") ?></label>
                                    <div class="controls">
                                        <input class="span6 m-wrap" type="text" name="Tpagemoduledetailmodel[title]" value="<?php echo set_value('Tpagemoduledetailmodel[title]',$content->data->title) ?>">
                                        <span class="help-inline"><?php echo form_error('Tpagemoduledetailmodel[title]'); ?></span>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="Tpagemoduledetailmodel[page_module_id]" value="<?php echo $content->data->page_module_id ?>">
                                
                                <div class="control-group">
                                    <label class="control-label"><?php echo $content->getLabel("value2") ?></label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url($content->data->value2); ?>" alt="" />
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
								if($content->data->value2)
								{
                                ?>
                                <div class="control-group">
                                    <div class="controls">
										<label class="checkbox">
											<input type="checkbox" name="Tpagemoduledetailmodel[value2]" value="" /> Delete Image
										</label>
                                    </div>
                                </div>
                                <?php
								}
                                ?>
                                
                                <div class="control-group <?php echo form_error('Tpagemoduledetailmodel[value1]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("value1") ?></label>
                                    <div class="controls">
                                        <textarea class="span12 m-wrap <?php echo $Tpagemodule->data->module_type=="news"?"ckeditor":""?>" name="Tpagemoduledetailmodel[value1]" rows="6"><?php echo set_value('Tpagemoduledetailmodel[value1]',$content->data->value1) ?></textarea>
                                        <span class="help-inline"><?php echo form_error('Tpagemoduledetailmodel[value1]'); ?></span>
                                    </div>
                                </div>
                                
                                <?php
								if($Tpagemodule->data->module_type!="news" && $Tpagemodule->data->module_type!="gallery")
								{
									?>
                                    <div class="control-group <?php echo form_error('Tpagemoduledetailmodel[value3]')?"error":""; ?>">
                                        <label class="control-label"><?php echo $content->getLabel("value3") ?></label>
                                        <div class="controls">
                                            <input class="span6 m-wrap" type="text" name="Tpagemoduledetailmodel[value3]" value="<?php echo set_value('Tpagemoduledetailmodel[value3]',$content->data->value3) ?>">
                                            <span class="help-inline"><?php echo form_error('Tpagemoduledetailmodel[value3]'); ?></span>
                                        </div>
                                    </div>
                                    <?php
								}
								?>
                                
                                
                                <div class="control-group <?php echo form_error('Tpagemoduledetailmodel[status_active]')?"error":""; ?>">
                                    <label class="control-label"><?php echo $content->getLabel("status_active") ?></label>
                                    <div class="controls">
                                        <select class="span6 m-wrap" data-placeholder="Choose a Category" tabindex="1"  name="Tpagemoduledetailmodel[status_active]">
                                        <?php
											foreach($status_active->data as $status_active1)
											{
												?>
                                                <option value="<?php echo $status_active1->value?>" <?php echo set_value('Tpagemoduledetailmodel[status_active]',$content->data->status_active)==$status_active1->value?"selected=\"selected\"":"" ?>><?php echo $status_active1->name?></option>
                                                <?php
											}
										?>
                                        </select>
                                        <span class="help-inline"><?php echo form_error('Tpagemoduledetailmodel[status_active]'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="submit" value="submit">Submit</button>
                                    <a href="<?php echo site_url("tpagemodule/update/".$content->data->page_module_id); ?>" class="btn">Cancel</a>
                                </div>
                                
                                
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->