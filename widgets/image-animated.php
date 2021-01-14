<?php

namespace RepeatAnimationsElementor\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ERA_Image_Animated extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */

	
	public function get_name() {
		return 'era-image-animated';
	}
 

 public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
	 
   
   
    
      
    
      
    
   }
	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image Animated', 'repeat-animation-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-image';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'siva-plugins' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'repeat-animation-elementor' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'repeat-animation-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);
		
		$this->add_control(
			'border_style',
			[
				'label' => __( 'Link', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => __( 'Media File', 'repeat-animation-elementor' ),
					'dashed' => __( 'Custom URL', 'repeat-animation-elementor' ),
					
					'none' => __( 'None', 'repeat-animation-elementor' ),
				],
			]
		);
		
		
		
			
			$this->add_control(
			'image_animated_custom_link',
			[
				'label' => __( 'Custom Link', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'repeat-animation-elementor' ),
				'condition' => [
									'border_style' => 'dashed',
								],
				'placeholder' => __( 'Custom Link', 'repeat-animation-elementor' ),
			]
		);
		
		$this->add_control(
			'image_animated_caption',
			[
				'label' => __( 'Caption', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'repeat-animation-elementor' ),
				
				'placeholder' => __( 'Caption', 'repeat-animation-elementor' ),
			]
		);
			
		

		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_heading_animated_style',
			[
				'label' => __( 'Style', 'repeat-animation-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'repeat-animation-elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}}',
					
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'label' => __( 'Text Shadow', 'repeat-animation-elementor' ),
				'selector' => '{{WRAPPER}} .era_heading_animated_wrapper',
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'section_advanced',
			[
				'label' => __( 'Animation Enabled', 'repeat-animation-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);
		
	
		
		$this->add_control(
			'transparent',
			[
				'label' => __( 'Pulse Animation', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'repeat-animation-elementor' ),
				'label_off' => __( 'Off', 'repeat-animation-elementor' ),
				'return_value' => ' pulse forever',
				'default' => '',
				'frontend_available' => true,
				'prefix_class'  => 'animated',
				
			]
		);
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'repeat-animation-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'era_heading_content_align',
			[
				'label' => __( 'Alignment', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'repeat-animation-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'repeat-animation-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'repeat-animation-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'devices' => [ 'desktop', 'tablet' ],
				'prefix_class' => 'era-content-align-%s',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: %s',
					
				],
			]
		);
		
		$this->end_controls_section();
		
		
		
		
		
		
	} 
	 
	
	
	

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		echo '<div>';
		echo '<a style = "width:100%;height:100%;color:inherit;" href = "'. $settings["image_animated_custom_link"]. '">';
		echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
		if($settings['border_style'] == 'dashed'){
		echo '<p>'.$settings["image_animated_caption"]. '</p>';	
		}
		echo '</a>';
		
	    echo '</div>';
		
		

		
		
		
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
        
		?>
		
		<#
		var image = {
			id: settings.image.id,
			url: settings.image.url,
			size: settings.thumbnail_size,
			dimension: settings.thumbnail_custom_dimension,
			model: view.getEditModel()
		};
		var image_url = elementor.imagesManager.getImageUrl( image );
		#>
		<div>
		<a style = "width:100%;height:100%;color:inherit;" href = "{{{settings.image_animated_custom_link}}}">
		<img src="{{{ image_url }}}" />
		<?php
	
		if($settings['border_style'] == 'dashed'){
			
			
				echo '<p>'.$settings["image_animated_caption"].' </p>';
		}


		?>
		</div>
		
		
		<?php
	}
}
