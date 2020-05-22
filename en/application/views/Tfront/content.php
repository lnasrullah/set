<?php
if($this->Tpagemodel->data->header_image)
{
	?>
<div class="row content-header"><!--BEGIN content-header-->
	<img src="<?php echo base_url($this->Tpagemodel->data->header_image) ?>">
</div><!--END content-header-->
    <?php
}
?>


<div class="row content-wrapper"><!--BEGIN content-wrapper-->
	<div class="span12">
        <div class="span8 container">
        	<div class="content"><!--BEGIN content-->
            	<h1><?php echo $this->Tpagemodel->data->title ?></h1>
            	<?php echo $this->Tpagemodel->data->article ?>
                <?php
					if($this->Tpagemodulemodel->data)
					{
						foreach($this->Tpagemodulemodel->data as $module)
						{
							echo "<div class=\"module-container module-".$module->module_type."\">";
							echo "<h3>".$module->title."</h3>";
							$this->Tpagemoduledetailmodel->getWhere(array("page_module_id"=>$module->id));
							if($this->Tpagemoduledetailmodel->data)
							{
								foreach($this->Tpagemoduledetailmodel->data as $moduledetail)
								{
									echo "<div class=\"module-detail ".($moduledetail->id==$highlight?"highlight":"")."\">";
										echo "<h2>".$moduledetail->title."</h2>";
										echo $moduledetail->value2?"<img src=\"".base_url($moduledetail->value2)."\">":"";
										echo "<div class=\"module-desc\">".substr(strip_tags($moduledetail->value1),0,150)."</div>";
										echo "<div class=\"module-content\">".$moduledetail->value1."</div>";
									echo "</div>";
								}
							}
							echo "</div>";
						}
					}
				?>
        	</div><!--END content-->
        </div>
        <div class="submenucontainer span4">
        	<div class="submenu">
        	<?php
				echo $submenu;
			?>
            </div>
        </div>
    </div>
</div><!--END content-wrapper-->