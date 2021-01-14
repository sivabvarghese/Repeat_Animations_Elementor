<?php

namespace RepeatAnimationsElementor\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ERA_Heading_Animated extends Widget_Base {

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
		return 'heading-animated';
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
		return __( 'Heading Animated', 'repeat-animation-elementor' );
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
		return 'fas fa-heading';
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
			'section_heading_animated_content',
			[
				'label' => __( 'Content', 'repeat-animation-elementor' ),
			]
		);

		$this->add_control(
			'text_for_heading',
			[
				'label' => __( 'Heading', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'repeat-animation-elementor' ),
				'placeholder' => __( 'Text For Animated Heading', 'repeat-animation-elementor' ),
			]
		);
		
		$this->add_control(
			'era_heading_website_link',
			[
				'label' => __( 'Link', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'repeat-animation-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
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
				'selector' => '{{WRAPPER}} .heading_animated_text',
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
					'{{WRAPPER}} .heading_animated_text' => 'color: {{VALUE}}',
					
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
		
		$this->add_control(
				'blend_mode',
						[
							'label' => __('Blend Mode', 'rehomes-core'),
							'type' => Controls_Manager::SELECT,
							'options' => [
										'' => __('Normal', 'rehomes-core'),
										'multiply' => 'Multiply',
										'screen' => 'Screen',
										'overlay' => 'Overlay',
										'darken' => 'Darken',
										'lighten' => 'Lighten',
										'color-dodge' => 'Color Dodge',
										'saturation' => 'Saturation',
										'color' => 'Color',
										'difference' => 'Difference',
										'exclusion' => 'Exclusion',
										'hue' => 'Hue',
										'luminosity' => 'Luminosity',
										],
							'selectors' => [
												'{{WRAPPER}} .elementor-heading-title' => 'mix-blend-mode: {{VALUE}}',
											],
										'separator' => 'none',
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

		$target = $settings['era_heading_website_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['era_heading_website_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		
		echo '<div class="era_heading_animated_wrapper">';
		
		echo '<a href="' . $settings['era_heading_website_link']['url'] . '"' . $target . $nofollow . '>';
		echo "<h2 class = 'heading_animated_text'>";
		echo $settings['text_for_heading'];
		echo "</h2>";
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
		var target = settings.era_heading_website_link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.era_heading_website_link.nofollow ? ' rel="nofollow"' : '';
		#>
		<div class="era_heading_animated_wrapper">
		 <a href="{{ settings.era_heading_website_link.url }}"{{ target }}{{ nofollow }}><h2 >{{{settings.text_for_heading}}}</h2></a>
		</div>
		
		
		<?php
	}
}
