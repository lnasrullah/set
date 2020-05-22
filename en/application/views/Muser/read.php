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
								<div class="caption"><i class="icon-edit"></i>List</div>
							</div>
                            <div class="portlet-body">
                            	<div class="row-fluid">
                                	<div class="span12">
                                		<a href="<?php echo site_url("muser/create"); ?>" class="btn yellow">Add New</a>
                                    </div>
                                </div><br />
                            	<?php
								createTable(
									$this->Musermodel,
									array(
										array("No",'$rownum'),
										"username",
										"name",
										"status_active",
										"created_by",
										"created_date",
										"modified_by",
										"modified_date",
										array("",'<a class=\"btn blue\" href=\"muser/update/$data->id\">Edit</a> <a class=\"btn yellow\" href=\"muser/changepwd/$data->id\">Change Password</a>')
									),
									1);
								?>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->