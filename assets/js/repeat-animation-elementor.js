console.log(scriptParams_repeat_animation_elementor);


var number_of_objects = objectLenght = Object.keys(scriptParams_repeat_animation_elementor).length; 
for(var i =1;i<=number_of_objects/4;i++){


var first_flag=0;
check_if_element_visible(scriptParams_repeat_animation_elementor["repeat_animation_elementor_option_id_".concat(i)],first_flag,scriptParams_repeat_animation_elementor["repeat_animation_elementor_option_animation_".concat(i)]["month"]);
}


function check_if_element_visible(class_or_id,first_flag,animation_style){


    var nav = jQuery(class_or_id);
    console.log(animation_style);

    
	jQuery(window).scroll(function() {
		if (nav.length) {
    var top_of_element = jQuery(class_or_id).offset().top;
    var bottom_of_element = jQuery(class_or_id).offset().top + jQuery(class_or_id).outerHeight();
    var bottom_of_screen = jQuery(window).scrollTop() + jQuery(window).innerHeight();
    var top_of_screen =jQuery(window).scrollTop();
    
    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){

        //console.log(class_or_id.concat(" is visible"));
        //jQuery(class_or_id).removeClass("fadeOutRight");
        if(first_flag==0){
        jQuery(class_or_id).addClass("animated ".concat(animation_style));
        first_flag=1;
        }

       
        
    } else {
        if(first_flag==1){
        jQuery(class_or_id).removeClass("animated ".concat(animation_style));
        first_flag=0;
        }
    	//Query(class_or_id).addClass("animated fadeOutRight");
    	
       //console.log(class_or_id.concat(" is not visible"));
    }
    }
});



}