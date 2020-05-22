<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">

<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url("assets/css/grid.css"); ?>" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url("assets/css/font-awesome.css"); ?>" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.min.css"); ?>" />

<script language="javascript" src="<?php echo base_url("assets/js/jquery-1.10.1.min.js"); ?>"></script>
<script language="javascript" src="<?php echo base_url("assets/js/jquery-ui.min.js"); ?>"></script>
<script language="javascript" src="<?php echo base_url("assets/js/script.js"); ?>"></script>

<!-- Data Table HTML5 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/datatable/css/dataTables.bootstrap.min.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/datatable/css/responsive.bootstrap.min.css"); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/datatable/css/buttons.dataTables.min.css"); ?>">

<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/jquery-3.3.1.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/jquery.dataTables.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/dataTables.bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/dataTables.responsive.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/responsive.bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/dataTables.buttons.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/buttons.flash.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/jszip.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/pdfmake.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/vfs_fonts.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/buttons.html5.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/datatable/js/buttons.print.min.js"); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#teregistrasi').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
} );
</script>

<title><?php echo $config["title"]; ?></title>
</head>

<body style="padding: 0px 50px">
	<div class="sitewrapper"><!--BEGIN sitewrapper-->
    	<div class="page-wrap"><!--BEGIN page-wrap-->
            <div class="page-header"><!--BEGIN page-header-->
            	<div class="row languagebar"><!--BEGIN languagebar-->
                	<div class="span12">
                    	<a href="<?php echo base_url("../?lang=id"); ?>"><img src="<?php echo base_url("assets/images/flags/id.png"); ?>" /></a>
                        <a href="<?php echo base_url("../?lang=en"); ?>"><img src="<?php echo base_url("assets/images/flags/gb.png"); ?>" /></a>
                        <form method="post" action="" class="searchfield"><input type="text" name="search" /></form>
                        <a href="#" class="search"><i class="fa fa-search"></i></a>
                    </div>
                </div><!--END languagebar-->
            	<div class="row navigation"><!--BEGIN navigation-->
                	<div class="span12">
                    	<div class="logocontainer">
                        	<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url($config["logo"]); ?>" /></a>
                        </div>
                        <div class="navigationmenu"><!--BEGIN navigationmenu-->
                            <?php
                                echo $navigation;
                            ?>
                        </div><!--END navigationmenu-->
                    </div>
                </div><!--END navigation-->
            </div><!--END header-->
            
            <div class="page-content"><!--BEGIN page-content-->
            	<?php
				if(isset($page))
				{
					$this->load->view($page);
				}
				else
				{
					$this->load->view("Tfront/".($this->Tpagemodel->data->page_type?$this->Tpagemodel->data->page_type:"content"));
				}
				?>
            </div><!--END page-content-->
        </div><!--END page-wrap-->
        
        <div class="page-footer" style="padding: 0px 50px"><!--BEGIN page-footer-->
        	<div class="footer-row row">
            	<div class="span4">
                	<h3>Subscribe to follow our latest update</h3>
                	<form method="post">
                    	<input type="text" class="footer-input" name="subscribeemail" placeholder="Enter your email" />
                        <input type="submit" class="button footer-button" name="subscribe" value="Subscribe" />
                    </form>
                    <h3>Contact Us</h3>
                	<?php echo nl2br($config["contactinfo"]); ?>
            	</div>
                <div class="span4 footer-nav">
                	<h3>QUICKLINKS</h3>
                    <?php
					$qlink=$this->db->get_where("t_page_module",array("page_id"=>"-1","module_type"=>"featuredlink"));
					if($qlink->num_rows()>0)
					{
						?>
                        <ul>
                            <?php
							$links=$this->db->order_by("order","asc")->get_where("t_page_module_detail",array("page_module_id"=>$qlink->row()->id,"status_active"=>"active"));
							if($links->num_rows()>0)
							{
								foreach($links->result() as $link)
								{
									?>
                                    <li><a href="<?php echo $link->value3; ?>"><?php echo $link->title; ?></a></li>
                                    <?php
								}
							}
							?>
                        </ul>
                        <?php
					}
					?>
            	</div>
                <div class="span4 footer-nav">
                	<?php echo $footernavigation; ?>
            	</div>
            </div>
            
            
        	<div class="footer-row row">
            	<div class="span4">
                	<div class="span3">
                        <img src="<?php echo base_url($config["footerimage"]); ?>" />
                    </div>
                	<div class="span9">
                		<?php echo nl2br($config["footer"]); ?>
                    </div>
            	</div>
                <div class="span4">
                	&nbsp;
            	</div>
                <div class="span4">
                	<?php echo nl2br($config["copyright"]); ?>
            	</div>
            </div>
        </div><!--END footer-->
    </div><!--END sitewrapper-->
</body>
</html>
