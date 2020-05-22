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
                            <div class="portlet-body form">
                            	<form method="post" class="form-horizontal" enctype="multipart/form-data">
                            	<?php
								createTable(
									$content,
									array(
										array("No",'$rownum'),
										"title",
										"status_active",
										"created_by",
										"created_date",
										"modified_by",
										"modified_date",
										array("",'<a class=\"btn blue\" href=\"tpage/update/$data->id\">Edit</a><input type=\"hidden\" name=\"indexes[$data->id]\" value=\"$rownum\">')
									),
									2);
								?>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" name="saveorder" value="submit">Save Order</button>
                                </div>
                                </form>
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->