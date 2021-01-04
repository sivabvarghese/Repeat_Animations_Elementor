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
class Word_Cloud extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */

	public $word_length;
	public $partial_text;
	public function get_name() {
		return 'word-cloud';
	}
 

 public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
	  $this->word_length=0;
	  $this->partial_text = "";
   
   
    
      
    
      
    
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
		return __( 'Word Cloud', 'repeat-animation-elementor' );
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
		return 'fas fa-cloud';
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
			'section_content',
			[
				'label' => __( 'Content', 'repeat-animation-elementor' ),
			]
		);

		$this->add_control(
			'text_for_wordcloud',
			[
				'label' => __( 'Description', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( '', 'elementor-hello-world' ),
				'placeholder' => __( 'Text For Word Cloud', 'repeat-animation-elementor' ),
			]
		);
		
		
		

		



		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
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
				'selector' => '{{WRAPPER}} .word_cloud_description',
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
					'{{WRAPPER}} .word_cloud_description' => 'color: {{VALUE}}',
					
				],
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
				'label' => __( 'Enable', 'repeat-animation-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'repeat-animation-elementor' ),
				'label_off' => __( 'Off', 'repeat-animation-elementor' ),
				'return_value' => ' bounce forever',
				'default' => '',
				'frontend_available' => true,
				'prefix_class'  => 'animated',
				'selectors' => [
					'{{WRAPPER}} .word_cloud_description' => 'color: {{VALUE}}',
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
		
		echo '<div class = '   . $settings['hover_animation'] . ' >';
		
		echo '<div class= "word_cloud_description">';
		echo '<img src="' . $settings['word_image']['url'] . '">';
		echo "<p>";
		echo $settings['text_for_wordcloud'];
		echo "</p>";
		//echo '<p>Hello</p>';
		echo '</div>';
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
		<div class = "{{ settings.hover_animation }} ">
		<div class="word_cloud_description">
		 
		 <p >{{{settings.text_for_wordcloud}}}</p>
		</div>
		
		</div>
		<?php
	}
}
