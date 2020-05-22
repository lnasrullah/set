<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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

<style>/* CSS Document 

@import url(https://fonts.googleapis.com/css?family=Open+Sans);
@import url(https://fonts.googleapis.com/css?family=Bree+Serif);
*/
.toggle,
[id^=drop],[id^=zdrop] {
    display: none;
}
.height100{
    height:100%
}

/* Giving a background-color to the nav.menuresp container. */
nav.menuresp { 
    margin:0;
    padding: 0;
}

#logo {
    display: block;
    padding: 0 0px;
    float: left;
    font-size:20px;
    line-height: 60px;
}

/* Since we'll have the "ul li" "float:left"
 * we need to add a clear after the container. */

nav.menuresp:after {
    content:"";
    display:table;
    clear:both;
}

/* Removing padding, margin and "list-style" from the "ul",
 * and adding "position:reltive" */
nav.menuresp ul {
    float: right;
    padding:0;
    margin:0;
    list-style: none;
    position: relative;
    }
    
/* Positioning the navigation items inline */
nav.menuresp ul li {
    margin: 0px;
    display:inline-block;
    float: left;    border-left: #707070 1px solid;
    }

/* Styling the links */
nav.menuresp a {
    display:block;
    line-height: 25px;
    padding: 37px 20px;
    color:#2f305c;
    font-size:17px;
    text-decoration:none;
}


nav.menuresp ul li ul li:hover { background: #000000; }

/* Background color change on Hover */
nav.menuresp a:hover { color:white;
    background-color: #000000; 
}
/* Hide Dropdowns by Default
 * and giving it a position of absolute */
nav.menuresp ul ul {
    display: none;
    position: absolute; 
    /* has to be the same number as the "line-height" of "nav.menuresp a" */
    top: 100%; 
}
    
/* Display Dropdowns on Hover */
nav.menuresp ul li:hover > ul {
    display:inherit;
}
    
/* Fisrt Tier Dropdown */
nav.menuresp ul ul li {
    float:none;
    display:list-item;
    position: relative;
}

/* Second, Third and more Tiers 
 * We move the 2nd and 3rd etc tier dropdowns to the left
 * by the amount of the width of the first tier.
*/
nav.menuresp ul ul ul li {
    position: relative;
    top: -90px;
}

    
/* Change ' +' in order to change the Dropdown symbol */
li > a:after { content:  ' ▼'; }
li > a:only-child:after { content: ''; }

nav.menuresp ul li:hover > ul > li > a {
    border-top: 2px solid white;
    color: white;    padding: 15px;text-align:center;
    line-height: 25px;
}
nav.menuresp ul li:hover > ul > li:first-child > a {
    border-top: none;
}
nav.menuresp ul li:hover > ul > li > a:after{content:  ' ►';
}
nav.menuresp ul li:hover > ul > li > a:only-child:after { content: ''; }
div.partnercontainer .button {
    position: inherit;
    right: 0px;
    float: right;
    width: 10px;
    margin-top: -60px;
}
a.button.prevcaro {
    left: 0px;
    float: left;
}
/* Media Queries
--------------------------------------------- */

@media all and (max-width : 768px) {
div.navigationmenu{width:100%}
    #logo {
        display: block;
        padding: 0;
        width: 100%;
        text-align: center;
        float: none;
    }.footertext{
    margin-left: 50px;
    position: absolute;}
div.slidecontainer div.slidecontent div.slidenav{
    width:100%
}
div.slidecontainer div.slidecontent div.slidenav .nextslide
{
    right:2%;position:absolute
}

    nav.menuresp {
        margin: 0;
    }

div.content-wrapper h2{font-size:10px;margin-top:10px}
    /* Hide the navigation menu by default */
    /* Also hide the  */
    .toggle + a,
    .menu {
        display: none;
    }

    /* Stylinf the toggle lable */
    .toggle {    
        display: block;
        padding:14px 20px;  
        font-size:17px;
        text-decoration:none;
        border: 3px solid #357833;
    }

    .toggle:hover { 
        background-color: #2f305c;
        color: white;
    }.toggle i {float:right}

    /* Display Dropdown when clicked on Parent Lable */
    [id^=drop]:checked + ul,[id^=zdrop]:checked + ul {
        display: block;
    }

    /* Change menu item's width to 100% */
    nav.menuresp ul li {
        display: block;
        width: 100%;
        }

    nav.menuresp ul ul .toggle,
    nav.menuresp ul ul a {
        padding: 0 40px;
    }

    nav.menuresp ul ul ul a {
        padding: 0 80px;
    }

    nav.menuresp a:hover,
    nav.menuresp ul ul ul a {
        background-color: #000000;
    }
  
    nav.menuresp ul li ul li .toggle,
    nav.menuresp ul ul a,
  nav.menuresp ul ul ul a{
        padding:14px 20px;  
        color:#FFF;
        font-size:17px; 
    }
  
  
    nav.menuresp ul li ul li .toggle,
    nav.menuresp ul ul a {
        background-color: #212121; 
    }

    /* Hide Dropdowns by Default */
    nav.menuresp ul ul {
        float: none;
        position:static;
        color: #ffffff;
        /* has to be the same number as the "line-height" of "nav.menuresp a" */
    }
        
    /* Hide menus on hover */
    nav.menuresp ul ul li:hover > ul,
    nav.menuresp ul li:hover > ul {
//      display: none;
    }
        
    /* Fisrt Tier Dropdown */
    nav.menuresp ul ul li {
        display: block;
        width: 100%;
    }

    nav.menuresp ul ul ul li {
        position: static;
        /* has to be the same number as the "width" of "nav.menuresp ul ul li" */ 

    }div.partnercontent img{margin:0px auto}
.span2.partnercontent {
    width: 27%;padding-left:4%
}div.partnercontainer h1 {
    padding-bottom: 25px;
padding-top: 15px;}
div.partnercontent img {
width: 90%;}div.content-wrapper h2{height:3em}
}

@media all and (max-width : 450px) {
    div.slidecontainer div.slidecontent.active div.slidenav
{bottom:0px}
}

@media all and (max-width : 330px) {

    nav.menuresp ul li {
        display:block;
        width: 94%;
    }

}</style>

<script>
  iframe.onload = function() {
    // just do anything
    iframe.contentDocument.body.prepend();
  };
</script>
<title><?php echo $config["title"]; ?></title>
</head>

<body>       
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
                        <div class="navigationmenu"><!--BEGIN navigationmenu-->
        <div id="logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url($config["logo"]); ?>" /></a></div>

                            <nav class="menuresp">

        <label for="drop" class="toggle">MENU <i class="fa fa-bars"></i></label>
        <input type="checkbox" id="drop" /><?php
                                echo $navigation;
                            ?>
        </nav>
                        </div><!--END navigationmenu-->
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
        
        <div class="page-footer"><!--BEGIN page-footer-->
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
                <div class="span8">
                    <div class="span2">
                        <img src="<?php echo base_url($config["footerimage"]); ?>" />
                    </div>
                    <div class="span10"><div class="footertext">
                        <?php echo nl2br($config["footer"]); ?></div>
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