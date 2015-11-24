<?php
/**
 * @todo add class and construct
 */
namespace Now\Now\MCE;

if ( ! defined( 'ABSPATH' ) ) exit;

	/**
	 * Add Formats Dropdown Menu To MCE
	 */
	function  mce_editor_buttons( $buttons ) {
	    array_unshift( $buttons, 'styleselect' );
	    return $buttons;
	}
	add_filter( 'mce_buttons_2', __NAMESPACE__ . '\\mce_editor_buttons' );

	/**
	 * Add new styles to the TinyMCE "formats" menu drop-down
	 */
	function  mce_before_init( $settings ) {

	  // Create array of new styles
	  $style_formats = array(
	    array(
	      'title' => 'Typography',
	      'items' => array(
	        array(
	          'title' => 'Lead Paragraph',
	          'selector' => 'p',
	          'classes' => 'lead'
	        ),
	        array(
	          'title' => 'Small Text',
	          'inline' => 'small'
	        ),
	        array(
	          'title' => 'Abbreviation',
	          'inline' => 'abbr',
	          'attributes' => array(
	              'title' => ''
	          ),
	        ),
	        array(
	          'title' => 'Initialism',
	          'inline' => 'abbr',
	          'classes' => 'initialism',
	          'attributes' => array(
	              'title' => ''
	          ),
	        ),
	      ),
	    ),
	    array(
	      'title' => 'Contextual Colors',
	      'items' => array(
	        array(
	          'title' => 'Muted Text',
	          'inline' => 'span',
	          'classes' => 'text-muted'
	        ),
	        array(
	          'title' => 'Primary Text',
	          'inline' => 'span',
	          'classes' => 'text-primary'
	        ),
	        array(
	          'title' => 'Success Text',
	          'inline' => 'span',
	          'classes' => 'text-success'
	        ),
	        array(
	          'title' => 'Info Text',
	          'inline' => 'span',
	          'classes' => 'text-info'
	        ),
	        array(
	          'title' => 'Warning Text',
	          'inline' => 'span',
	          'classes' => 'text-warning'
	        ),
	        array(
	          'title' => 'Danger Text',
	          'inline' => 'span',
	          'classes' => 'text-danger'
	        ),
	      ),
	    ),
	    array(
	      'title' => 'Contextual Backgrounds',
	      'items' => array(
	        array(
	          'title' => 'Primary Background',
	          'inline' => 'span',
	          'classes' => 'bg-primary'
	        ),
	        array(
	          'title' => 'Success Background',
	          'inline' => 'span',
	          'classes' => 'bg-success'
	        ),
	        array(
	          'title' => 'Info Background',
	          'inline' => 'span',
	          'classes' => 'bg-info'
	        ),
	        array(
	          'title' => 'Warning Background',
	          'inline' => 'span',
	          'classes' => 'bg-warning'
	        ),
	        array(
	          'title' => 'Danger Background',
	          'inline' => 'span',
	          'classes' => 'bg-danger'
	        ),
	      ),
	    ),
	    array(
	      'title' => 'Buttons',
	      'items' => array(
	        array(
	          'title' => 'Type',
	          'items' => array(
	            array(
	              'title' => 'Link',
	              'selector' => 'a',
	              'classes' => 'btn'
	            ),
	            array(
	              'title' => 'Button',
	              'inline' => 'button',
	              'classes' => 'btn',
	              'attributes' => array(
	                  'type' => 'button'
	              ),
	            ),
	          ),
	        ),
	        array(
	          'title' => 'Options',
	          'items' => array(
	            array(
	              'title' => 'Default',
	              'selector' => 'a',
	              'classes' => 'btn-default'
	            ),
	            array(
	              'title' => 'Primary',
	              'selector' => 'a',
	              'classes' => 'btn-primary'
	            ),
	            array(
	              'title' => 'Success',
	              'selector' => 'a',
	              'classes' => 'btn-success'
	            ),
	            array(
	              'title' => 'Info',
	              'selector' => 'a',
	              'classes' => 'btn-info'
	            ),
	            array(
	              'title' => 'Warning',
	              'selector' => 'a',
	              'classes' => 'btn-warning'
	            ),
	            array(
	              'title' => 'Danger',
	              'selector' => 'a',
	              'classes' => 'btn-danger'
	            ),
	          ),
	        ),
	        array(
	          'title' => 'Sizes',
	          'items' => array(
	            array(
	              'title' => 'Large',
	              'selector' => 'a',
	              'classes' => 'btn-lg'
	            ),
	            array(
	              'title' => 'Default',
	              'selector' => 'a',
	              'classes' => ''
	            ),
	            array(
	              'title' => 'Small',
	              'selector' => 'a',
	              'classes' => 'btn-sm'
	            ),
	            array(
	              'title' => 'Extra Small',
	              'selector' => 'a',
	              'classes' => 'btn-xs'
	            ),
	            array(
	              'title' => 'Block',
	              'selector' => 'a',
	              'inline' => 'button',
	              'classes' => 'btn-block'
	            ),
	          ),
	        ),
	      ),
	    ),
	    /* Other examples
	    array(
	        'title' => 'Warning Box',
	        'block' => 'div',
	        'classes' => 'warning box',
	        'wrapper' => true
	    ),
	    array(
	        'title' => 'Red Uppercase Text',
	        'inline' => 'span',
	        'styles' => array(
	            'color' => '#ff0000',
	            'fontWeight' => 'bold',
	            'textTransform' => 'uppercase'
	        )
	    )
	    */
	  );

	  // Merge old & new styles
	  //$settings['style_formats_merge'] = true;

	  // Add new styles
	  $settings['style_formats'] = json_encode( $style_formats );

	  // Return New Settings
	  return $settings;

	}
	add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\\mce_before_init' );
