<div class="row content-wrapper"><!--BEGIN content-wrapper-->
	<div class="span12">
        <div class="span8 container">
        	<div class="content"><!--BEGIN content-->
            	<h1>Search Result</h1>
            	<?php
				if($result->num_rows>0)
				{
                    foreach($result->result() as $result1)
                    {
						?>
                        <h3><a href="<?php echo site_url("content/".urlencode(urlencode(base64_encode($result1->id)))."/".urlencode(str_replace(" ","_",strtolower($result1->title)))) ?>"><?php echo $result1->title; ?></a></h3>
                        <hr>
                        <?php
                    }
				}
				else
				{
					?>
                    <h3>No result found.</h3>
                    <?php
				}
				?>
        	</div><!--END content-->
        </div>
        <div class="submenucontainer span4">
        	<div class="submenu">
            </div>
        </div>
    </div>
</div><!--END content-wrapper-->