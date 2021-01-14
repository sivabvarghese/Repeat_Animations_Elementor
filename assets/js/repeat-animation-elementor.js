console.log(scriptParams_repeat_animation_elementor);


var number_of_objects = objectLenght = Object.keys(scriptParams_repeat_animation_elementor).length; 
for(var i =0;i<=number_of_objects/3;i++){


var first_flag=0;
check_if_element_visible(scriptParams_repeat_animation_elementor["repeat_animation_elementor_option_id_".concat(i)],first_flag);
}


function check_if_element_visible(class_or_id){


    var nav = jQuery(class_or_id);

    
	jQuery(window).scroll(function() {
		if (nav.length) {
    var top_of_element = jQuery(class_or_id).offset().top;
    var bottom_of_element = jQuery(class_or_id).offset().top + jQuery(class_or_id).outerHeight();
    var bottom_of_screen = jQuery(window).scrollTop() + jQuery(window).innerHeight();
    var top_of_screen =jQuery(window).scrollTop();

    if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){

        console.log(class_or_id.concat(" is visible"));
        //jQuery(class_or_id).removeClass("fadeOutRight");
        jQuery(class_or_id).addClass("animated fadeInRight");
       
        first_flag=1;
    } else {
     
        jQuery(class_or_id).removeClass("fadeInRight");
    	//Query(class_or_id).addClass("animated fadeOutRight");
    	
       console.log(class_or_id.concat(" is not visible"));
    }
    }
});



}