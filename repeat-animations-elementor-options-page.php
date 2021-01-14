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


        echo '<td><div><label><b>Month</b></label>'.Dropdown_select_field_render($count_option,$options,$temp_select_name).'</div></td>';
		

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
    ?><label>Dissapear On</label>
    <select name=<?php echo $temp_select_name ?>>
        <option value='January' <?php selected( $options['month'], 'January' ); ?>>January</option>
        <option value='February' <?php selected( $options['month'], 'February' ); ?>>February</option>
        <option value='March' <?php selected( $options['month'], 'March' ); ?>>March</option>
        <option value='April' <?php selected( $options['month'], 'April' ); ?>>April</option>
		<option value='May' <?php selected( $options['month'], 'May' ); ?>>May</option>
        <option value='June' <?php selected( $options['month'], 'June' ); ?>>June</option>
        <option value='July' <?php selected( $options['month'], 'July' ); ?>>July</option>
        <option value='August' <?php selected( $options['month'], 'August' ); ?>>August</option>
		<option value='September' <?php selected( $options['month'], 'September' ); ?>>September</option>
        <option value='October' <?php selected( $options['month'], 'October' ); ?>>October</option>
        <option value='November' <?php selected( $options['month'], 'November' ); ?>>November</option>
        <option value='December' <?php selected( $options['month'], 'December' ); ?>>December</option>
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