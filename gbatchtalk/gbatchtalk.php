<?php /*
Plugin Name: gbatchtalk 
Plugin URI: http://prasanna.freeoda.com/blog/plugins/google-talk/
Description:google talk
Author:Prasanna 
Version: 1
Author URI:http://prasanna.freeoda.com/blog/*/

function gbatchtalkshow(){  
    $gbatchht = get_option('gbatchht');
	$gbatchwt = get_option('gbatchwt');
	$gbatchtalkusname = get_option('gbatchtalkusname');
	
	
	 
	 ?>
	 <iframe src="http://www.google.com/talk/service/badge/Show?tk=<?php echo $gbatchtalkusname; ?>&amp;w=<?php echo $gbatchwt;?>&amp;h=<?php echo $gbatchht;?>" allowtransparency="true" width="<?php echo $gbatchwt;?>" frameborder="0" height="<?php echo $gbatchht;?>" ></iframe>
	 <?php
	 
}



function gbatchtalkadmin_option() 
{
	//include_once("extra.php");
	echo "<div class='wrap'>";
	echo "<h2>"; 
	echo wp_specialchars( "Gtalk " ) ; 
	echo "</h2>";
    
	$gbatchtalkusname = get_option('gbatchtalkusname');
	$gbatchht = get_option('gbatchht');
	$gbatchwt = get_option('gbatchwt');
	/*$imgcl = get_option('imgcl');*/
	
	
	if ($_POST['cd_submit']) 
	{
		$gbatchtalkusname = stripslashes($_POST['gbatchtalkusname']);
		$gbatchht = stripslashes($_POST['gbatchht']);
		$gbatchwt = stripslashes($_POST['gbatchwt']);
		/*$imgcl = stripslashes($_POST['imgcl']);*/
		
		update_option('gbatchtalkusname', $gbatchtalkusname );
		update_option('gbatchht', $gbatchht );
		update_option('gbatchwt', $gbatchwt );
		/*update_option('imgcl', $imgcl );*/
	
	}
	?>
   

   
	<form name="cd_form" method="post" action="">
     <input name="hiddenid" type="hidden" id="hiddenid" value="<?php echo $edit_id; ?>">
        <input name="process" type="hidden" id="process" value="<?php echo $process; ?>">
   
	<table width="382" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="169">Gtalk Code </td>
    <td width="203">
	  <textarea name="gbatchtalkusname" id="gbatchtalkusname"><?php echo $gbatchtalkusname; ?></textarea>
	  </td>
  </tr>
  <tr>
    <td>Height</td>
    <td><input type="text" name="gbatchht" id="gbatchht"  value="<?php echo $gbatchht; ?>"/></td>
  </tr>
  <tr>
    <td>Width</td>
    <td><input type="text" name="gbatchwt" id="gbatchwt"  value="<?php echo $gbatchwt; ?>"/></td>
  </tr>
  <!--<tr>
    <td>Class</td>
    <td><input type="text" name="imgcl" id="imgcl"  value="<?php //echo $imgcl; ?>"/></td>
  </tr>-->
  <tr>
    <td colspan="2" align="center"><input name="cd_submit" id="cd_submit" class="button-primary" value="Submit" type="submit" /></td>
  </tr>
</table>

</form>
<?php
	echo "</div>";
}



function gbatchtalkinstall () 
 {
     add_option('gbatchtalkusname', "z01q6amlqmuakl6m37qv9j2jrbit111tshr6e4r4322fbfibet5o6haq72mu6lrs9093to493u3iccs1859jvkp4ol27sp1dvunp4udg8qqi3p9qif7mubch1mc19bb05u29rus1dba9imcv7bcncq9hm1qn434en8om1bvsh");
	 add_option('gbatchht', "60");
	 add_option('gbatchwt', "200");
	 /*add_option('imgcl', ""); */
  
  
  }

function gbatchtalkdeactivation() 
{
	delete_option('gbatchtalkusname');
	delete_option('gbatchht');
	delete_option('gbatchwt');
	/*delete_option('imgcl');*/

}
function gbatchtalkwidget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo "Gtalk";
	echo $after_title;	
	gbatchtalkshow();
	echo $after_widget;
}


function gbatchtalkcontrol()
{
	echo '<p>Gtalk.<br> Goto Gtalk .';
	echo ' <a href="options-general.php?page=gbatchtalk/gbatchtalk.php">';
	echo 'click here</a></p>';
}


function gbatchtalkwidget_init() 
{
  	register_sidebar_widget(('Gtalk'), 'gbatchtalkwidget');   
	
	if(function_exists('register_sidebar_widget')) 	
	{
		register_sidebar_widget('Gtalk', 'gbatchtalkwidget');
	}
	
	if(function_exists('register_widget_control')) 	
	{
		register_widget_control(array('Gtalk', 'widgets'), 'gbatchtalkcontrol');
	} 
}

function gbatchtalkadd_to_menu() 
{
 add_options_page('Gtalk', 'Gtalk', 3, __FILE__, 'gbatchtalkadmin_option' );
}

add_action('admin_menu', 'gbatchtalkadd_to_menu');
add_action("plugins_loaded", "gbatchtalkwidget_init");
register_activation_hook(__FILE__, 'gbatchtalkinstall');
register_deactivation_hook(__FILE__, 'gbatchtalkdeactivation');
add_action('init', 'gbatchtalkwidget_init');







?>


