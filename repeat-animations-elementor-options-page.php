<?php 



if (isset($_GET['hello'])) {
    add_class_or_id_field_repeat_animation_elementor();
  }
  
function add_class_or_id_field_repeat_animation_elementor(){
	
	 echo "<script type='text/javascript'>alert('".get_option(repeat_animation_elementor_option_id_1)."');</script>";
	
}  


function repeat_animation_elementor_options_page()
{

?>
  <div>
 
  <div>
  <img src = <?php echo REPEAT_ANIMATION_ELEMENTOR_ASSETS_URL . 'images/siva_creative_logo.png' ; ?> class = "admin_siva_options_page_logo" />
  <h1 style = "float:left;"><b>ELEMENTOR REPEAT ANIMATION</b></h1></div><br><br><br>
  <form method="post" action="options.php">
  <?php settings_fields( 'repeat_animation_elementor_options_group' ); ?>
  <h2>Settings</h>
  <p>This is a plugin that adds options to add animation to your content , sections,columns or text widget</p>
  <label for="repeat_animation_elementor_option_number"><b>Enter Option Number</b> </label></th>
  <input type="text" id="lrepeat_animation_elementor_option_number" name="repeat_animation_elementor_option_number" value="<?php echo get_option('repeat_animation_elementor_option_number'); ?>" />
  <button type="button" class = "clear_input_fields_siva" onclick = clear_input_fields_repeat_animation_elementor(<?php echo get_option('repeat_animation_elementor_option_number'); ?>) >Clear Settings</button>
  <?php  submit_button(); ?>
  
  
 
  
   

  
  <?php 

  $option_value_number = get_option('repeat_animation_elementor_option_number');
       
		
		?>

		
		<?php

	
      
		
   for ($count_option = 1; $count_option <= (int)$option_value_number; $count_option++) 
   {
        

   	    
		 $options = get_option( 'dropdown_settings_'.strval($count_option) );
	     $temp_select_name = 'dropdown_settings_'.strval($count_option).'[month]';
		
		echo '<table>';
		echo '<tr valign="top" halign = "left"><h3 class="bar_title-label"><b>Elementor Repeat Animation Content '.$count_option.'</b></h3>';

		
		
		
		echo '<th><div><label for="repeat_animation_elementor_option_id_'.strval($count_option).'"><b>Enter css element class or id</label></b><input type="text" id="repeat_animation_elementor_option_id_'.strval($count_option).'"  name="repeat_animation_elementor_option_id_'.strval($count_option).'" value="' . get_option('repeat_animation_elementor_option_id_'.strval($count_option)).'" /></div></th>';

		echo '<th><div><label for="repeat_animation_elementor_option_name_'.strval($count_option).'"><b>Enter Details</label></b><input type="text" id="repeat_animation_elementor_option_name_'.strval($count_option).'"  name="repeat_animation_elementor_option_name_'.strval($count_option).'" value="' . get_option('repeat_animation_elementor_option_name_'.strval($count_option)).' " /></div></th>';

		

        echo '<th><div><label for="repeat_animation_elementor_option_image_link_'.strval($count_option).'"><b>Enter Company Logo URL</label></b><input type="text" id="repeat_animation_elementor_option_name_'.strval($count_option).'"  name="repeat_animation_elementor_option_image_link_'.strval($count_option).'" value="' . get_option('repeat_animation_elementor_option_image_link_'.strval($count_option)).' " /></div></th>';


        echo '<td><div>'.Dropdown_select_field_render($count_option,$options,$temp_select_name).'</div></td>';
		

        echo '</tr>';
		
	


        
		echo '</table>';
		

		
   }

   
  
  ?>
 
  
  
 
 
  
  </form>
  </div>
<?php
}

function repeat_animation_elementor_admin_mesage(){
	$user_id = get_current_user_id();
	if ( !get_user_meta( $user_id, 'repeat_animation_elementor_notice_dismissed' ) ){
		
		 ?>
    <div class="updated notice">
        <p style = 'font-size:25px;'><b><?php _e( 'Elementor Repeat Animation Plugin has been installed!Looking for more ways to expand your WordPress skills?', 'repeat-animation-elementor' ); ?></b></p>
		<button onclick = 'window.open("https://sivacreative.com/")' class = "admin_promo_message" > Get access to tons of premium plugins with <b>Tomorrow Plugins!</b> </button>
		<button class = "admin_promo_section_dismiss"><a href="?repeat_animation_elementor-dismissed" style = 'color:red;'>Dismiss</a></button>
    </div>
    <?php
	
		
	}
	
	
}

function plugin_checbox_section_text_repeat_animation_elementor(){

 echo 'Scroll Checkbox test';

}

function repeat_animation_elementor_register_settings() {

   



   
   add_option( 'repeat_animation_elementor_option_number', 1);
   register_setting( 'repeat_animation_elementor_options_group', 'repeat_animation_elementor_option_number', 'repeat_animation_elementor_callback' );
   $option_value_number = get_option('repeat_animation_elementor_option_number');
   


 
   
   
   
   for ($count_option = 1; $count_option <= (int)$option_value_number; $count_option++) 
   {
   	    $args = array ('count'=>$count_option,'class_siva'=>"demo-checkbox_".strval($count_option));
   	    add_settings_section("repeat_animation_elementor_options_group", null, null, "demo_".strval($count_option));
		add_option( 'repeat_animation_elementor_option_name_'.strval($count_option), 'Enter Details ' .strval($count_option));
		register_setting( 'repeat_animation_elementor_options_group','repeat_animation_elementor_option_name_'.strval($count_option), 'repeat_animation_elementor_callback' );
		add_option( 'repeat_animation_elementor_option_id_'.strval($count_option), 'Enter Class Elements '.strval($count_option));
		register_setting( 'repeat_animation_elementor_options_group','repeat_animation_elementor_option_id_'.strval($count_option), 'repeat_animation_elementor_callback' );
		add_option( 'repeat_animation_elementor_option_image_link_'.strval($count_option), 'Enter Logo URL '.strval($count_option));
		register_setting( 'repeat_animation_elementor_options_group','repeat_animation_elementor_option_image_link_'.strval($count_option), 'repeat_animation_elementor_callback' );

		add_settings_field('month',__( 'Settings field description', 'dropdown' ),'Dropdown_select_field_render','repeat_animation_elementor_options_page','repeat_animation_elementor_options_group');
        register_setting( 'repeat_animation_elementor_options_group', 'dropdown_settings_'.strval($count_option) );
		
		//add_settings_field('day',__( 'Settings field description', 'dropdown' ),'Dropdown_select_field_render_day','repeat_animation_elementor_options_page','repeat_animation_elementor_options_group');
       // register_setting( 'repeat_animation_elementor_options_group', 'dropdown_settings_day_'.strval($count_option) );
		
		
		
   }
}



function repeat_animation_elementor_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['repeat_animation_elementor-dismissed'] ) ){
		
	}
        //add_user_meta( $user_id, 'scroll_changer_notice_dismissed', 'true', true );
}

function repeat_animation_elementor_scripts() {
    $option_value_number = get_option('repeat_animation_elementor_option_number');
	if(get_option('repeat_animation_elementor_option_id')!="repeat_animation_elementor_option_id" && get_option('repeat_animation_elementor_option_name')!="repeat_animation_elementor_option_name" ){
		$script_params_repeat_animation_elementor = array();
		for ($count_option = 1; $count_option <= (int)$option_value_number; $count_option++) 
			{
				$script_params_repeat_animation_elementor['repeat_animation_elementor_option_name_'.strval($count_option)] = get_option('repeat_animation_elementor_option_name_'.strval($count_option));
				$script_params_repeat_animation_elementor['repeat_animation_elementor_option_id_'.strval($count_option)] = get_option('repeat_animation_elementor_option_id_'.strval($count_option));
				$script_params_repeat_animation_elementor['repeat_animation_elementor_option_image_link_'.strval($count_option)] = get_option('repeat_animation_elementor_option_image_link_'.strval($count_option));
				$script_params_repeat_animation_elementor['repeat_animation_elementor_option_animation_'.strval($count_option)] = get_option( 'dropdown_settings_'.strval($count_option));
		

	}

  
    wp_register_style( 'jQuery-UI-css', 'https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css' );
    wp_enqueue_style('jQuery-UI-css');
   
	wp_register_script( 'script_repeat_animation_elementor', plugins_url( '/assets/js/repeat-animation-elementor.js', __FILE__ ), array ( 'jquery' ), 1.1, true);
	
	
	  wp_register_script( 'jQueryUI_tooltip', 'https://code.jquery.com/ui/1.10.4/jquery-ui.js', null, null, true );
	wp_enqueue_script('jQueryUI_tooltip');
	
	wp_register_style( 'style_repeat_animation_elementor', plugins_url( '/assets/css/repeat-animation-elementor.css', __FILE__ ));
    wp_enqueue_style( 'style_repeat_animation_elementor' );

    //wp_register_style( 'style_repeat_animation_elementor_animate_css_mod', plugins_url( '/assets/css/modified-animate-repeat.css', __FILE__ ));
   // wp_enqueue_style( 'style_repeat_animation_elementor_animate_css_mod' );
	
    wp_localize_script('script_repeat_animation_elementor', 'scriptParams_repeat_animation_elementor', $script_params_repeat_animation_elementor);
    wp_enqueue_script('script_repeat_animation_elementor');

    wp_register_style( 'style_repeat_animation_elementor_animate_css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
    wp_enqueue_style('style_repeat_animation_elementor_animate_css');

       

  

	


	
	
	




}

}


function admin_repeat_animation_elementor_js_siva(){
	
	$admin_details_array = array();
	$admin_details_array["delete_option_php_url"]= REPEAT_ANIMATION_ELEMENTOR_PHP_FILES_URL;
	$admin_details_array["number_of_elements"]=get_option("repeat_animation_elementor_option_number");
	wp_register_script( 'admin_backend_js_repeat_animation_elementor', REPEAT_ANIMATION_ELEMENTOR_ASSETS_URL . 'js/admin-repeat-animation-elementor.js', array ( 'jquery' ), 1.1, true);
	wp_localize_script('admin_backend_js_repeat_animation_elementor', 'admin_details_array', $admin_details_array);
	wp_enqueue_script('admin_backend_js_repeat_animation_elementor');
	wp_register_style( 'admin_siva_repeat_animation_elementor_css',REPEAT_ANIMATION_ELEMENTOR_ASSETS_URL . 'css/admin-repeat-animation-elementor.css', false, '1.0.0' );
    wp_enqueue_style( 'admin_siva_repeat_animation_elementor_css' );
	
	
}


function Dropdown_select_field_render($count_option,$options,$temp_select_name) { 
    //$count_option = $args["count"];
    //$options = get_option( 'dropdown_settings_'.strval($count_option) );
	//$temp_select_name = 'dropdown_settings_'.strval($count_option).'[select_field_0]';
  /*  $info = array('fadeIn',
'fadeInDown',
'fadeInDownBig',
'fadeInLeft',
'fadeInLeftBig',
'fadeInRight',
'fadeInRightBig',
'fadeInUp',
'fadeInUpBig',
'fadeInTopLeft',
'fadeInTopRight',
'fadeInBottomLeft',
'fadeInBottomRight',
'fadeOut',
'fadeOutDown',
'fadeOutDownBig',
'fadeOutLeft',
'fadeOutLeftBig',
'fadeOutRight',
'fadeOutRightBig',
'fadeOutUp',
'fadeOutUpBig',
'fadeOutTopLeft',
'fadeOutTopRight',
'fadeOutBottomRight',
'fadeOutBottomLeft',
'flip',
'flipInX',
'flipInY',
'flipOutX',
'flipOutY',
'lightSpeedInRight',
'lightSpeedInLeft',
'lightSpeedOutRight',
'lightSpeedOutLeft',
'rotateIn',
'rotateInDownLeft',
'rotateInDownRight',
'rotateInUpLeft',
'rotateInUpRight',
'rotateOut',
'rotateOutDownLeft',
'rotateOutDownRight',
'rotateOutUpLeft',
'rotateOutUpRight',
'hinge',
'jackInTheBox',
'rollIn',
'rollOut',
'zoomIn',
'zoomInDown',
'zoomInLeft',
'zoomInRight',
'zoomInUp',
'zoomOut',
'zoomOutDown',
'zoomOutLeft',
'zoomOutRight',
'zoomOutUp',
'slideInDown',
'slideInLeft',
'slideInRight',
'slideInUp',
'slideOutDown',
'slideOutLeft',
'slideOutRight',
'slideOutUp');

    $html = '<label>Select Animation</label>';
    $html .= '<select name= '. $temp_select_name.' >';

    for ($count=0;$count<$info.length;$count++){

    	$html .= '<option value=' . $info[$count] . selected( $options['month'], $info[$count] ) . '>'.$info[$count].'</option>';
    }
    $html .= '</select>';*/


    ?><label>Select Animation</label>
    <select name=<?php echo $temp_select_name ?>>

      
    	
        <option value='bounce' <?php selected( $options['month'], 'bounce' ); ?>>Bounce</option>
        <option value='flash' <?php selected( $options['month'], 'flash' ); ?>>Flash</option>
        <option value='pulse' <?php selected( $options['month'], 'pulse' ); ?>>Pulse</option>
        <option value='rubberBand' <?php selected( $options['month'], 'rubberBand' ); ?>>Rubber Band</option>
		<option value='shakeX' <?php selected( $options['month'], 'shakeX' ); ?>>Shake X</option>
        <option value='shakeY' <?php selected( $options['month'], 'shakeY' ); ?>>shake Y</option>
        <option value='fadeInRightBig' <?php selected( $options['month'], 'fadeInRightBig' ); ?>>Fade In Right Big</option>
        <option value='headShake' <?php selected( $options['month'], 'headShake' ); ?>>HeadShake</option>
		<option value='swing' <?php selected( $options['month'], 'swing' ); ?>>Swing</option>
        <option value='tada' <?php selected( $options['month'], 'tada' ); ?>>Tada</option>
        <option value='wobble' <?php selected( $options['month'], 'wobble' ); ?>>Wobble</option>
        <option value='jello' <?php selected( $options['month'], 'jello' ); ?>>Jello</option>
        <option value='heartBeat' <?php selected( $options['month'], 'heartBeat' ); ?>>Heart Beat</option>
        <option value='backInDown' <?php selected( $options['month'], 'backInDown' ); ?>>Back In Down</option>
        <option value='backInLeft' <?php selected( $options['month'], 'backInLeft' ); ?>>Back In Left</option>
        <option value='backInRight' <?php selected( $options['month'], 'backInRight' ); ?>>Back In Right</option>
		<option value='backInUp' <?php selected( $options['month'], 'backInUp' ); ?>>Back In Up</option>
        <option value='backOutDown' <?php selected( $options['month'], 'backOutDown' ); ?>>Back Out Down</option>
        <option value='backOutLeft' <?php selected( $options['month'], 'backOutLeft' ); ?>>Back Out Left</option>
        <option value='backOutRight' <?php selected( $options['month'], 'backOutRight' ); ?>>Back Out Right</option>
		<option value='bounceIn' <?php selected( $options['month'], 'bounceIn' ); ?>>Bounce In</option>
        <option value='bounceInDown' <?php selected( $options['month'], 'bounceInDown' ); ?>>Bounce In Down</option>
        <option value='bounceInLeft' <?php selected( $options['month'], 'bounceInLeft' ); ?>>Bounce In Left</option>
        <option value='bounceInRight' <?php selected( $options['month'], 'bounceInRight' ); ?>>Bounce In Right</option>
        <option value='bounceInUp' <?php selected( $options['month'], 'bounceInUp' ); ?>>Bounce In Up</option>
        <option value='bounceOut' <?php selected( $options['month'], 'bounceOut' ); ?>>Bounce Out</option>
        <option value='bounceOutDown' <?php selected( $options['month'], 'bounceOutDown' ); ?>>Bounce Out Down</option>
        <option value='bounceOutLeft' <?php selected( $options['month'], 'bounceOutLeft' ); ?>>Bounce Out Left</option>
        <option value='bounceOutRight' <?php selected( $options['month'], 'bounceOutRight' ); ?>>Bounce Out Right</option>
        <option value='bounceOutUp' <?php selected( $options['month'], 'bounceOutUp' ); ?>>Bounce Out Up</option>
        <option value='fadeIn' <?php selected( $options['month'], 'fadeIn' ); ?>>Fade In</option>
        <option value='fadeInDown' <?php selected( $options['month'], 'fadeInDown' ); ?>>Fade Down</option>
        <option value='fadeInDownBig' <?php selected( $options['month'], 'fadeInDownBig' ); ?>>Fade In Down Big</option>
        <option value='fadeInLeft' <?php selected( $options['month'], 'fadeInLeft' ); ?>>Fade In Left</option>
		<option value='fadeInLeftBig' <?php selected( $options['month'], 'fadeInLeftBig' ); ?>>Fade In Left Big</option>
        <option value='fadeInRight' <?php selected( $options['month'], 'fadeInRight' ); ?>>Fade In Right</option>
        <option value='fadeInRightBig' <?php selected( $options['month'], 'fadeInRightBig' ); ?>>Fade In Right Big</option>
        <option value='fadeInUp' <?php selected( $options['month'], 'fadeInUp' ); ?>>Fade In Up</option>
		<option value='fadeInUpBig' <?php selected( $options['month'], 'fadeInUpBig' ); ?>>Fade In Up Big</option>
        <option value='fadeInTopLeft' <?php selected( $options['month'], 'fadeInTopLeft' ); ?>>Fade In Top Left</option>
        <option value='fadeInTopRight' <?php selected( $options['month'], 'fadeInTopRight' ); ?>>Fade In Top Right</option>
        <option value='fadeInBottomLeft' <?php selected( $options['month'], 'fadeInBottomLeft' ); ?>>Fade In Bottom Left</option>
        <option value='fadeInBottomRight' <?php selected( $options['month'], 'fadeInBottomRight' ); ?>>Fade In Bottom Right</option>
        <option value='fadeOut' <?php selected( $options['month'], 'fadeOut' ); ?>>Fade Out</option>
        <option value='fadeOutDown' <?php selected( $options['month'], 'fadeOutDown' ); ?>>Fade Out Down</option>
        <option value='fadeOutDownBig' <?php selected( $options['month'], 'fadeOutDownBig' ); ?>>Fade Out Down Big</option>
		<option value='fadeOutLeft' <?php selected( $options['month'], 'fadeOutLeft' ); ?>>Fade Out Left</option>
        <option value='fadeOutLeftBig' <?php selected( $options['month'], 'fadeOutLeftBig' ); ?>>Fade Out Left Big</option>
        <option value='fadeOutRight' <?php selected( $options['month'], 'fadeOutRight' ); ?>>Fade Out Right</option>
        <option value='fadeOutRightBig' <?php selected( $options['month'], 'fadeOutRightBig' ); ?>>Fade Out Right Big</option>
		<option value='fadeOutUp' <?php selected( $options['month'], 'fadeOutUp' ); ?>>Fade Out Up</option>
        <option value='fadeOutUpBig' <?php selected( $options['month'], 'fadeOutUpBig' ); ?>>Fade Out Up Big</option>
        <option value='fadeOutTopLeft' <?php selected( $options['month'], 'fadeOutTopLeft' ); ?>>Fade Out Top Left</option>
        <option value='fadeOutTopRight' <?php selected( $options['month'], 'fadeOutTopRight' ); ?>>Fade Out Top Right</option>
        <option value='fadeOutBottomRight' <?php selected( $options['month'], 'fadeOutBottomRight' ); ?>>Fade Out Bottom Right</option>
        <option value='fadeOutBottomLeft' <?php selected( $options['month'], 'fadeOutBottomLeft' ); ?>>Fade Out Bottom Left</option>
        <option value='flip' <?php selected( $options['month'], 'flip' ); ?>>Flip</option>
        <option value='flipInX' <?php selected( $options['month'], 'flipInX' ); ?>>Flip In X</option>
		<option value='flipInY' <?php selected( $options['month'], 'flipInY' ); ?>>Flip In Y</option>
        <option value='flipOutX' <?php selected( $options['month'], 'flipOutX' ); ?>>Flip Out X</option>
        <option value='flipOutY' <?php selected( $options['month'], 'flipOutY' ); ?>>Flip Out Y</option>
        <option value='lightSpeedInRight' <?php selected( $options['month'], 'lightSpeedInRight' ); ?>>Light Speed In Right</option>
        <option value='lightSpeedInLeft' <?php selected( $options['month'], 'lightSpeedInLeft' ); ?>>Light Speed In Left</option>
        <option value='lightSpeedOutRight' <?php selected( $options['month'], 'lightSpeedOutRight' ); ?>>Light Speed Out Right</option>
        <option value='lightSpeedOutLeft' <?php selected( $options['month'], 'lightSpeedOutLeft' ); ?>>Light Speed Out Left</option>
        <option value='rotateIn' <?php selected( $options['month'], 'rotateIn' ); ?>>Rotate In</option>
        <option value='rotateInDownLeft' <?php selected( $options['month'], 'rotateInDownLeft' ); ?>>Rotate In Down Left</option>
        <option value='rotateInDownRight' <?php selected( $options['month'], 'rotateInDownRight' ); ?>>Rotate In Down Right</option>
        <option value='rotateInUpLeft' <?php selected( $options['month'], 'rotateInUpLeft' ); ?>>Rotate In Up Left</option>
		<option value='rotateInUpRight' <?php selected( $options['month'], 'rotateInUpRight' ); ?>>Rotate In Up Right</option>
        <option value='rotateOut' <?php selected( $options['month'], 'rotateOut' ); ?>>Rotate Out</option>
        <option value='rotateOutDownLeft' <?php selected( $options['month'], 'rotateOutDownLeft' ); ?>>Rotate Out Down Left</option>
        <option value='rotateOutDownRight' <?php selected( $options['month'], 'rotateOutDownRight' ); ?>>Rotate Out Down Right</option>
		<option value='rotateOutUpLeft' <?php selected( $options['month'], 'rotateOutUpLeft' ); ?>>Rotate Out Up Left</option>
        <option value='rotateOutUpRight' <?php selected( $options['month'], 'rotateOutUpRight' ); ?>>Rotate Out Up Right</option>
        <option value='hinge' <?php selected( $options['month'], 'hinge' ); ?>>Hinge</option>
        <option value='jackInTheBox' <?php selected( $options['month'], 'jackInTheBox' ); ?>>Jack In The Box</option>
        <option value='rollIn' <?php selected( $options['month'], 'rollIn' ); ?>>Roll In</option>
        <option value='rollOut' <?php selected( $options['month'], 'rollOut' ); ?>>Roll Out</option>
        <option value='zoomIn' <?php selected( $options['month'], 'zoomIn' ); ?>>Zoom In</option>
        <option value='zoomInDown' <?php selected( $options['month'], 'zoomInDown' ); ?>>Zoom In Down</option>
		<option value='zoomInLeft' <?php selected( $options['month'], 'zoomInLeft' ); ?>>Zoom In Left</option>
        <option value='zoomInRight' <?php selected( $options['month'], 'zoomInRight' ); ?>>Zomm in Right</option>
        <option value='zoomInUp' <?php selected( $options['month'], 'zoomInUp' ); ?>>Zoom In Up</option>
        <option value='zoomOut' <?php selected( $options['month'], 'zoomOut' ); ?>>Zoom Out</option>
		<option value='zoomOutDown' <?php selected( $options['month'], 'zoomOutDown' ); ?>>Zoom Out Down</option>
        <option value='zoomOutLeft' <?php selected( $options['month'], 'zoomOutLeft' ); ?>>Zoom Out Left</option>
        <option value='zoomOutRight' <?php selected( $options['month'], 'zoomOutRight' ); ?>>Zoom Out Right</option>
        <option value='zoomOutUp' <?php selected( $options['month'], 'zoomOutUp' ); ?>>Zoom Out Up</option>
        <option value='slideInDown' <?php selected( $options['month'], 'slideInDown' ); ?>>Slide In Down</option>
        <option value='slideInLeft' <?php selected( $options['month'], 'slideInLeft' ); ?>>Slide In Left</option>
        <option value='slideInRight' <?php selected( $options['month'], 'slideInRight' ); ?>>Slide In Right</option>
        <option value='slideInUp' <?php selected( $options['month'], 'slideInUp' ); ?>>Slide In Up</option>
		<option value='slideOutDown' <?php selected( $options['month'], 'slideOutDown' ); ?>>Slide Out Down</option>
        <option value='slideOutLeft' <?php selected( $options['month'], 'slideOutLeft' ); ?>>Slide Out Left</option>
        <option value='slideOutRight' <?php selected( $options['month'], 'slideOutRight' ); ?>>Slide Out Right</option>
        <option value='slideOutUp' <?php selected( $options['month'], 'slideOutUp' ); ?>>Slide Out Up</option>
		
    </select>
<?php


}


function Dropdown_select_field_render_day($count_option) { 
     //$count_option = $args["count"];
     $options = get_option( 'dropdown_settings_day_'.strval($count_option) );
	 $temp_select_name_day = 'dropdown_settings_day_'.strval($count_option).'[day]';
    ?><label>Dissapear On</label>
    <select name=<?php echo $temp_select_name_day ?>>
	
	<option value='1' <?php selected( $options['day'], 1 ); ?>>Day 1</option>
    <option value='2' <?php selected( $options['day'], 2 ); ?>>Day 2</option>
    <option value='3' <?php selected( $options['day'], 3 ); ?>>Day 3</option>
    <option value='4' <?php selected( $options['day'], 4 ); ?>>Day 4</option>
      
    </select>
<?php
}



function Dropdown_settings_section_callback(  ) { 
    echo __( 'This section description', 'dropdown' );
}


function Dropdown_settings_init(  ) { 
	add_settings_section('timed_content_options_group',null,null,'timed_content_options_page');
    add_settings_field('select_field_0',__( 'Settings field description', 'dropdown' ),'Dropdown_select_field_render','timed_content_options_page','timed_content_options_group');
    register_setting( 'timed_content_options_group', 'dropdown_settings' );
    
}


















 ?>