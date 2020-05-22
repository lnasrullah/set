<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Content Management System</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<style>
	
	</style>
	<link href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url(); ?>assets/admin/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- fancybox-->
	<link href="<?php echo base_url(); ?>assets/admin/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/plugins/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
	<!-- and fancybox-->
	<!-- search-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/select2/select2_metro.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/data-tables/DT_bootstrap.css" />
	<!-- and search-->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/clockface/css/clockface.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/jquery-multi-select/css/multi-select-metro.css" />
	<link href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/jquery-tags-input/jquery.tagsinput.css" />
	
	<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
</head>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner" style="height:40px"><!--img src="<?php echo base_url(); ?>assets/admin/img/logo3.png" alt="" width=180 height=100/--> 
		
			<ul class="nav pull-right">
				<li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    
                    <font color="white"><i class="icon-user"></i> <?php echo $this->session->userdata('name'); ?></font>
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/logout"><i class="icon-lock"></i> Log Out</a></li>
                    </ul>
                </li>
			</ul>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">		
			<ul class="page-sidebar-menu">
				
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="start active">
					<a href="<?php echo base_url(); ?>index.php/home/">
					<i class="icon-home"></i> 
					<span class="title"> Home</span>
					</a>
				</li>
                
                <?php
				$privilege=$this->db->get_where("v_privilege",array("user_id"=>$this->session->userdata('id'),"parent"=>NULL,"status_active"=>"active"));
				
				if($privilege->num_rows>0)
				{
					foreach($privilege->result() as $privilege1)
					{
						?>
                        <li class="">
                            <a href="<?php echo site_url($privilege1->path); ?>">
                            <i class="icon-wrench"></i> 
                            <span class="title"> <?php echo $privilege1->name ?></span>
                            </a>
                        </li>
                        <?php
					}
				}
				?>
                
                <!--li class="">
					<a href="javascript:;">
					<i class="icon-wrench"></i> 
					<span class="title"> Dummy</span>
                    <span class="arrow "></span>
					</a>
                    <ul class="sub-menu">
                    	<li class="">
                            <a href="">Dummy sub</a>
                        </li>
                    </ul>
				</li-->

				<li class="last">
					<a href="<?php echo base_url(); ?>index.php/logout">
					<i class="icon-signout"></i> 
					<span class="title">Log out</span>
					
					</a>
					
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
        	<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER -->
						<!-- END BEGIN STYLE CUSTOMIZER -->          
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <?php
						if(isset($this->module_name))
						{
                        ?>
                        <h3 class="page-title"><?php echo $this->module_name; ?></h3>
                        <?php
						}
						?>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
					<?php
						$this->load->view($this->path."/".$page);
					?>               
					</div>
				</div>
                <!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->     
		</div>
		<!-- END PAGE --> 
	</div>
	<div class="footer">
		<div class="footer-inner">
			2015 &copy; 
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- fancybox --> 
	<script src="<?php echo base_url(); ?>assets/admin/plugins/fancybox/source/jquery.fancybox.pack.js"></script>   
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/scripts/gallery.js"></script>  
	<!-- and fancybox -->
	<!-- search -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/data-tables/DT_bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/scripts/table-editable.js"></script>
	<!-- and search -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/ckeditor/ckeditor.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>   
	<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript" ></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript" ></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
	<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>assets/admin/scripts/app.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/scripts/form-components.js"></script>     
	<!-- END PAGE LEVEL SCRIPTS -->
	  
	<!-- END ON/OFF -->
	
	<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		   
		   FormComponents.init();
		   Gallery.init();
		   $('.fancybox-video').fancybox({type: 'iframe'});
		   $(".fancyboxes").fancybox({type:'iframe','width':'70%','autoSize' : false});
		   $(".fancyboxy").fancybox({type:'inline',width:'20%',height:'100','autoSize' : false});
		   
		   TableEditable.init();
		  
		   $('.date-picker').on('changeDate', function(ev){
				$(this).datepicker('hide');
			});
			
			
			$('.date-pickerbf').datepicker({
				todayHighlight:'TRUE',
				autoclose : true,
			});
			$('.date-pickerbf').on('show', function(){
				var startDate = new Date(String($(this).attr("data-id")));
				$(this).datepicker("setStartDate", startDate);
			});
			
			$( ".table-sortable tbody" ).sortable({
			  update: function( event, ui ) 
			  {
				  $(this).find("tr input").each(function()
				  {
					  $(this).val($(this).closest("tr").index()+1);
				  });
				}
			});
		   
		   // TableManaged.init();
		   // Charts.init();
		   // Charts.initCharts();
		   // Charts.initPieCharts();
		   
		   
		});
	</script>
</body>
<!-- END BODY -->
</html>