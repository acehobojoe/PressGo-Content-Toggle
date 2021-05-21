<?php
namespace PressGo_Widget_Pack\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class PressGo extends Widget_Base {

  /**
   * Retrieve the widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'PressGo';
  }

  /**
   * Retrieve the widget title.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget title.
   */

   public function __construct( $data = [], $args = null ) {
 			parent::__construct( $data, $args );

 			wp_register_style('toggle-style', plugins_url() . '/Elementor-Widget-Pack/assets/css/togl-style.css', );
      wp_register_script( 'toggle-script', plugins_url() . '/Elementor-Widget-Pack/assets/js/toggle.js', );


  	}





  public function get_title() {
    return __( 'Toggle Slider', 'elementor-PressGo' );

  }


// Get Stylesheet
  public function get_style_depends() {
    return [
      'toggle-style'
    ];
  //  Get Script
  }
  public function get_script_depends() {
	return [ 'jquery','toggle-script' ];
}





  /**
   * Retrieve the widget icon.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'fa fa-toggle-on';
  }

  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'pressgo' ];
  }

  /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.1.0
   *
   * @access protected
   */


  protected function _register_controls() {
    $this->start_controls_section(
      'section_content',
      [
        'label' => __( 'Content', 'elementor-PressGo' ),

      ]
    );

    $this->add_control(
      'heading1',
      [
        'label' => __( 'Heading 1', 'elementor-PressGo' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'Heading 1', 'elementor-PressGo' ),
      ]
    );


    $this->add_control(
      'content_section',
      [
        'label' => __( 'Content Section', 'elementor-PressGo' ),
        'type' => Controls_Manager::WYSIWYG,
        'default' => __( 'Primary Content (template short-codes work here)', 'elementor-PressGo' ),
      ]
    );

    $this->add_control(
      'heading2',
      [
        'label' => __( 'Heading 2', 'elementor-PressGo' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'Heading 2', 'elementor-PressGo' ),
      ]
    );

    $this->add_control(
      'content_section2',
      [
        'label' => __( 'Content Section 2', 'elementor-PressGo' ),
        'type' => Controls_Manager::WYSIWYG,
        'default' => __( 'Secondary Content (template short-codes work here too)', 'elementor-PressGo' ),
      ]
    );


    $this->add_control(
  			'html_tag',
  			[
  				'label' => __( 'Heading HTML Tag', 'elementor-PressGo' ),
  				'type' => \Elementor\Controls_Manager::SELECT,
  				'default' => 'div',
  				'options' => [
  					'h1'  => __( 'H1', 'elementor-PressGo' ),
  					'h2' => __( 'H2', 'elementor-PressGo' ),
  					'h3' => __( 'H3', 'elementor-PressGo' ),
  					'h4' => __( 'H4', 'elementor-PressGo' ),
            'h5' => __( 'H5', 'elementor-PressGo' ),
            'div' => __( 'div', 'elementor-PressGo' ),
  					'p' => __( 'p', 'elementor-PressGo' ),
  				],
  			]
  		);




     /* Add the options you'd like to show in this tab here */

$this->end_controls_section();

     // Style Section:


     $this->start_controls_section(

   			'style-section-button',
   			[
   				'label' => __( 'Widget Style', 'elementor-PressGo' ),
   				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
   			]
   		);

       $this->add_group_control(
       \Elementor\Group_Control_Typography::get_type(),
[
         'name'     => 'content_typography',
         'label'    => __( 'Title Typography', 'elementor-PressGo' ),
         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
         'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
         'selector' => '{{WRAPPER}} .elementor-togl',

        ]
  );

  $this->add_control(
        'heading-spacing',
        [
          'label' => __( 'Heading Spacing', 'elementor-PressGo' ),
          'type' => Controls_Manager::SLIDER,
          'size_units' => [ 'px' ],
          'range' => [
            'px' => [
              'min' => -30,
              'max' => 100,
              'step' => .1,
            ],

          ],
          'default' => [
            'unit' => 'px',
            'size' => 0,
          ],
          'selectors' => [
            '.switch' => 'margin-right: {{SIZE}}px;
            margin-left:  {{SIZE}}px;',



          ],
        ]
      );

  $this->add_control(
      'title_color',
      [
        'label' => __( 'Title Color', 'elementor-PressGo' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'default' => '#000000',
        'selectors' => [
          '.elementor-togl' => 'color: {{VALUE}}',
        ],
      ]
    );

  $this->add_control(
			'IAsw_color',
			[
				'label' => __( 'Inactive Switch Color', 'elementor-PressGo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
        'default' => '#FFFFFF',
				'selectors' => [
					'.switch .slider:after' => 'background-color: {{VALUE}}',
				],
			]
		);

    $this->add_control(
        'Asw_color',
        [
          'label' => __( 'Active Switch Color', 'elementor-PressGo' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
          'default' => '#FFFFFF',
          'selectors' => [
            '.switch input:checked + .slider:after ' => 'background-color: {{VALUE}}',
          ],
        ]
      );

      $this->add_control(
          'Abg_color',
          [
            'label' => __( 'Active Background Color', 'elementor-PressGo' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
              'type' => \Elementor\Scheme_Color::get_type(),
              'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'default' => '#10ADFC',
            'selectors' => [
              '.switch input:checked + .slider' => 'background-color: {{VALUE}}',
            ],
          ]
        );


        $this->add_control(
            'IAbg_color',
            [
              'label' => __( 'Inactive Background Color', 'elementor-PressGo' ),
              'type' => \Elementor\Controls_Manager::COLOR,
              'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
              ],
              'default' => '#809098',
              'selectors' => [
                '.switch .slider' => 'background-color: {{VALUE}}',
              ],
            ]
          );

          $this->add_control(
          			'slider-size',
          			[
          				'label' => __( 'Switch Size', 'elementor-PressGo' ),
          				'type' => Controls_Manager::SLIDER,
          				'size_units' => [ 'em' ],
          				'range' => [
          					'px' => [
          						'min' => .1,
          						'max' => 4,
          						'step' => .1,
          					],

          				],
          				'default' => [
          					'unit' => 'em',
          					'size' => .8,
          				],
          				'selectors' => [
          					'{{WRAPPER}} .switch' => 'font-size: {{SIZE}}{{UNIT}};',

          				],
          			]
          		);
              $this->add_control(
                    'slider-border-radius',
                    [
                      'label' => __( 'Roundness', 'elementor-PressGo' ),
                      'type' => Controls_Manager::SLIDER,
                      'size_units' => [ 'em' ],
                      'range' => [
                        'em' => [
                          'min' => 0,
                          'max' => 10,
                          'step' => .1,
                        ],

                      ],
                      'default' => [
                        'unit' => 'em',
                        'size' => 5,
                      ],
                      'selectors' => [
                        '{{WRAPPER}} .slider.round' => 'border-radius: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .slider.round:after' => 'border-radius: {{SIZE}}{{UNIT}};',
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
   * @since 1.1.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();
    $this->add_render_attribute( 'wrapper', 'class', 'toggle-style' );

    $this->add_inline_editing_attributes( 'html_tag', 'none');
    $this->add_inline_editing_attributes( 'heading1', 'basic' );
    $this->add_inline_editing_attributes( 'text_align', 'none' );
    ?>

<div class="toggle-btn-sec">
<div><<?php echo $settings['html_tag'];?> class="elementor-togl"><?php echo $settings['heading1']; ?></<?php echo $settings['html_tag'];?>></div>
<div class="main-btn">
  <label class="switch">
    <input type="checkbox" class="tgl" checked><span class="slider round"></span></label></div>
<div><<?php echo $settings['html_tag'];?> class="elementor-togl"><?php echo $settings['heading2']; ?></<?php echo $settings['html_tag'];?>></div></div>
<div class="contentsec">
<div align=center class="section-1"><?php echo $settings['content_section'];?></div>
<div align=center class="section-2 hide-sec"><?php echo $settings['content_section2'];?></div></div></div>

    <?php
  }

  /**
   * Render the widget output in the editor.
   *
   * Written as a Backbone JavaScript template and used to generate the live preview.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function _content_template() {
    ?>
    <#
    view.addInlineEditingAttributes( 'heading1', 'basic' );
    view.addInlineEditingAttributes( 'content', 'advanced' );
    #>
    <div class="toggle-btn-sec">
    <div><{{settings.html_tag}} class="elementor-togl">{{settings.heading1}}</{{settings.html_tag}}></div>
    <div class="main-btn"><label class="switch">
      <input type="checkbox" class="tgl" checked><span class="slider round"></span></label></div>
    <div><{{settings.html_tag}} class="elementor-togl">{{settings.heading2}}</{{settings.html_tag}}></div></div>
    <div class="contentsec"><div align=center class="section-1">{{settings.content_section}}</div>
    <div align=center class="section-2 hide-sec">{{settings.content_section2}}</div></div></div>

    <?php
  }
}
