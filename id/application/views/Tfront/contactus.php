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
	<div class="span6 contact-content">
    	<div class="span12">
        	<h1>Where You Can Find Us</h1>
            <?php echo $this->Tpagemodel->data->article ?>
        </div>
    </div>
    <div class="span6 contact-form">
     	<div class="span12">
        	<h1>Get in Touch with Us</h1>
            <form method="post">
            <div class="span6"><input type="text" name="name" placeholder="Name"></div>
            <div class="span6"><input type="text" name="email" placeholder="E-mail"></div>
            <div class="span12"><input type="text" name="subject" placeholder="Subject"></div>
            <div class="span12"><textarea name="message" placeholder="Message" rows="8"></textarea></div>
            <div class="span12"><input type="checkbox" name="copy">Send me a copy</div>
            <div class="span12"><input type="submit" name="contact" value="Submit"></div>
            </form>
        </div>
    </div>
</div><!--END content-wrapper-->