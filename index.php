<?php
if(isset($_GET['lang']))
{
	setcookie("lang",$_GET['lang'],time()+60*60*24*30);
	header("Location:./".$_GET['lang']);
}
else if(isset($_COOKIE['lang']))
{
	header("Location:./".$_COOKIE['lang']);
}
else
{
	header("Location:./en");
}
?>