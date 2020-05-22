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
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url("tfile"); ?>">Root</a> 
								<span class="icon-angle-right"></span>
							</li>
                            <?php
							
							$path="uploads/files/";
							$dir=str_replace($path,"",$base);
							$dir=explode("/",$dir);
							
							foreach($dir as $dir1)
							{
								$path.=$dir1."/";
								?>
                                <li>
                                    <a href="<?php echo site_url("tfile/showdir/".urlencode(urlencode($path))); ?>"><?php echo $dir1; ?></a>
                                    <span class="icon-angle-right"></span>
                                </li>
                                <?php
							}
							?>
						</ul>
                        
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Folder</div>
							</div>
                            <div class="portlet-body form">
                            	<div class="row-fluid">
                                	<div class="span12">
                                		<a href="<?php echo site_url("tfile/createdir/".urlencode(urlencode($base))); ?>" class="btn yellow">Add New</a>
                                    </div>
                                </div><br />
                                <table class="table table-striped table-hover table-bordered">
                                <thead>
                                	<tr>
                                    	<th>Folder Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								if($content)
								{
									foreach($content as $content1=>$val)
									{
										if(is_array($val))
										{
										?>
                                        <tr>
                                        	<td><?php echo $content1 ?></td>
                                            <td><a href="<?php echo site_url("tfile/showdir/".urlencode(urlencode($base.$content1."/"))) ?>" class="btn blue">Detail</a> <a href="<?php echo site_url("tfile/deletedir/".urlencode(urlencode($base))."/".urlencode(urlencode($content1))) ?>" class="btn red">Delete</a></td>
                                        </tr>
                                        <?php
										}
									}
								}
								?>
                                </tbody>
                                </table>
                            	
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->
                        
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Files</div>
							</div>
                            <div class="portlet-body form">
                            	<div class="row-fluid">
                                	<div class="span12">
                                		<a href="<?php echo site_url("tfile/create/".urlencode(urlencode($base))); ?>" class="btn yellow">Add New</a>
                                    </div>
                                </div><br />
                                
                                <table class="table table-striped table-hover table-bordered">
                                <thead>
                                	<tr>
                                    	<th>File Name</th>
                                        <th>Path</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
								if($content)
								{
									foreach($content as $content1)
									{
										if(!is_array($content1))
										{
										?>
                                        <tr>
                                        	<td><?php echo $content1 ?></td>
                                        	<td><?php echo base_url($base.$content1) ?></td>
                                        	<td><a href="<?php echo base_url($base.$content1) ?>" class="btn green">Download</a> <a href="<?php echo site_url("tfile/delete/".urlencode(urlencode($base))."/".urlencode(urlencode($content1))) ?>" class="btn red">Delete</a></td>
                                        </tr>
                                        <?php
										}
									}
								}
								?>
                                </tbody>
                                </table>
                            	
							</div>
                        </div>
						<!-- END EXAMPLE TABLE PORTLET-->