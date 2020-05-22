<?php
	$module=$this->Tpagemodulemodel->data[0];
	$slides=$this->Tpagemoduledetailmodel->getWhere(array("page_module_id"=>$module->id,"status_active"=>"active"));
	if($slides->data)
	{
		?>
		<div class="row"><!--BEGIN row-->
			<div class="slidecontainer"><!--BEGIN slidecontainer-->
					<?php
					foreach($slides->data as $slide)
					{
						?>
                        <div class="row slidecontent"><!--BEGIN slidecontent-->
							<img src="<?php echo base_url($slide->value2) ?>">
                            <div class="row slidedesc">
                            	<div class="span1">&nbsp;</div>
                            	<div class="span4">
                                	<h1><?php echo $slide->title; ?></h1>
									<?php echo $slide->value1; ?>
                                    
									<?php if($slide->value3)
									{
										?>
                                        <br><a href="<?php echo $slide->value3 ?>" class="button">Read More</a> 
                                        <?php
									} ?>
                                </div>
                            	<div class="span6">&nbsp;</div>
                            	<div class="span1">&nbsp;</div>
                            </div>
                            <div class="row slidenav">
                                <div class="span1"><a href="javascript:;" class="button prevslide">&lt;</a></div>
                                <div class="span10">&nbsp;</div>
                                <div class="span1"><a href="javascript:;" class="button nextslide">&gt;</a></div>
                            </div>
                        </div><!--END slidecontent-->
						<?php
					}
					?>
                    
			</div><!--END slidecontainer-->
		</div><!--END row-->
		<?php
	}
	
	$module=$this->Tpagemodulemodel->data[1];
	$announcement=$this->Tpagemoduledetailmodel->getWhere(array("page_module_id"=>$module->id,"status_active"=>"active"));
	if($announcement->data)
	{
		?>
		<div class="row"><!--BEGIN row-->
            <div class="announcementcontainer">
                <?php
                foreach($announcement->data as $announcement1)
                {
                ?>
                    <div class="row announcement-row">
                        <div class="span4"><h1><?php echo $announcement1->title ?></h1></div>
                        <div class="span8"><?php echo nl2br($announcement1->value1) ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
		</div><!--END row-->
		<?php
	}
	?>
    <div class="row content-wrapper"><!--BEGIN content-wrapper-->
		<?php
        $module=$this->Tpagemodulemodel->data[2];
        
        $flinks=$this->Tpagemoduledetailmodel->getWhere(array("page_module_id"=>$module->id,"status_active"=>"active"));
        if($flinks->data)
        {
            ?>
            <div class="row"><!--BEGIN row-->
                <div class="span12">
                    <div class="row flinkcontainer">
                        <?php
                        foreach($flinks->data as $flink)
                        {
                        ?>
                                <div class="span4 flinkcontent">
                                <img src="<?php echo base_url($flink->value2) ?>">
                                <h1><?php echo $flink->title ?></h1>
                                <?php echo nl2br($flink->value1) ?>
                                <br><a href="<?php echo $flink->value3 ?>" class="button">Read More</a> 
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div><!--END row-->
            <?php
        }
		?>
        
        <div class="row"><!--BEGIN row-->
            <div class="span8">
            	<div class="homepanel row"><!--BEGIN homepanel-->
                	<div class="span12">
                    	<h1>Latest News</h1>
                        <div class="row homepanelcontent">
                        	<?php
								$newsmodules=$this->db->get_where("t_page_module",array("module_type"=>"news"));
								if($newsmodules->num_rows>0)
								{
									$modulesid=array();
									{
										foreach($newsmodules->result() as $newsmodule)
										{
											$modulesid[]=$newsmodule->id;
										}
										
										$this->db->where_in('page_module_id', $modulesid);
										$this->db->order_by("created_date","desc");
										$news=$this->db->get("t_page_module_detail",4,0);
										
										if($news->num_rows>0)
										{
											?>
                                            <div class="span6">
                                            	<a href="<?php echo site_url("tfront/module_open/".$news->row()->id) ?>">
                                            	<?php
												if($news->row()->value2)
												{
													?>
                                                    <img src="<?php echo base_url($news->row()->value2) ?>" >
                                                    <?php
												}
												?>
                                                <h2><?php echo $news->row()->title ?></h2>
                                                <?php echo substr(strip_tags($news->row()->value1),0,250); ?>
                                                </a>
                                            </div>
                                    		<div class="span6">
                                            	<?php
												foreach($news->result() as $key=>$news1)
												{
													if($key!=0)
													{
														?>
                                                        <div class="row">
                                                        	<div class="span3">
																<?php
                                                                if($news1->value2)
                                                                {
                                                                    ?>
                                                                    <img src="<?php echo base_url($news1->value2) ?>" >
                                                                    <?php
                                                                }
																else
																{
																	?>
                                                                    &nbsp;
                                                                    <?php
																}
                                                                ?>
                                                            </div>
                                                            <div class="span9">
                                                            	<h5><a href="<?php echo site_url("tfront/module_open/".$news1->id) ?>"><?php echo $news1->title ?></a></h5>
                                                            </div>
                                                        </div>
                                                        <?php
													}
												}
												?>
                                            </div>
                                            <?php
										}
									}
									?>
                                    
                                    <?php
								}
                            ?>
                        </div>
                    </div>
                </div><!--END homepanel-->
            </div>
            <div class="span4">
            	<div class="homepanel row"><!--BEGIN homepanel-->
                	<div class="span12">
                    	<h1>Gallery</h1>
                        <div class="row">
                        	<?php
								$gallerymodules=$this->db->get_where("t_page_module",array("module_type"=>"gallery"));
								if($gallerymodules->num_rows>0)
								{
									$modulesid=array();
									{
										foreach($gallerymodules->result() as $gallerymodule)
										{
											$modulesid[]=$gallerymodule->id;
										}
										
										$this->db->where_in('page_module_id', $modulesid);
										$this->db->order_by("created_date","desc");
										$images=$this->db->get("t_page_module_detail",2,0);
										
										if($images->num_rows>0)
										{
											foreach($images->result() as $images)
											{
												?>
												<div class="row gallerythumb">
													<img src="<?php echo base_url($images->value2) ?>" >
                                                    <h2><?php echo $images->title ?></h2>
												</div>
												<?php
											}
										}
									}
									?>
                                    
                                    <?php
								}
                            ?>
                        </div>
                    </div>
                </div><!--END homepanel-->
            </div>
        </div><!--END row-->
        
        <?php
		
		$module=$this->Tpagemodulemodel->data[3];
        
        $partners=$this->Tpagemoduledetailmodel->getWhere(array("page_module_id"=>$module->id,"status_active"=>"active"));
        if($partners->data)
        {
            ?>
            <div class="row"><!--BEGIN row-->
                <div class="span12">
                    <div class="partnercontainer">
                    	<div class="span12">
                    	<h1><?php echo $module->title ?></h1>
                        	<div class="span1"><a href="javascript:;" class="button prevcaro">&lt;</a></div>
                            <div class="span10">
                            <?php
                            /*foreach($partners->data as $partner)
                            {
                            ?>
                                    <div class="span2 partnercontent">
                                    <a href="<?php echo ($partner->value3?$partner->value3:"javascript:;") ?>">
                                    	<div>
                                        	<img src="<?php echo base_url($partner->value2) ?>">
                                        </div>
                                        <h2><?php echo $partner->title ?></h2>
                                    </a>
                                    </div>
                            <?php
                            }*/
                            ?>
                            	<div class="row">
                                <?php
								foreach($partners->data as $partner)
								{
								?>
										<div class="span2 partnercontent">
										<a href="<?php echo ($partner->value3?$partner->value3:"javascript:;") ?>">
											<img src="<?php echo base_url($partner->value2) ?>">
										</a>
										</div>
								<?php
								}
								?>
                                </div>
                                <div class="row">
                                <?php
								foreach($partners->data as $partner)
								{
								?>
										<div class="span2 partnercontent">
										<a href="<?php echo ($partner->value3?$partner->value3:"javascript:;") ?>">
											<h2><?php echo $partner->title ?></h2>
										</a>
										</div>
								<?php
								}
								?>
                                </div>
                        	</div>
                        	<div class="span1"><a href="javascript:;" class="button nextcaro">&gt;</a></div>
                        </div>
                    </div>
                </div>
            </div><!--END row-->
            <?php
        }
        ?>
	</div><!--END content-wrapper-->