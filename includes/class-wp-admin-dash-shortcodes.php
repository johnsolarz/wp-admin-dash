<?php
/**
 * @todo add class and construct
 */

namespace Now\Now\Shortcodes;

use WP_Query;

if ( ! defined( 'ABSPATH' ) ) exit;

	/**
	 *  Loop shortcode with user-defined query parameters - default lists all blog posts
	 *  Example usage: [loop type="work" taxonomy="work-category" term="design" orderby="name" order="ASC"]
	 *
	 * @link http://code.tutsplus.com/tutorials/create-a-shortcode-to-list-posts-with-multiple-parameters--wp-32199
	 * @since  1.0.0
	 * @return object
	 */

	add_shortcode( 'loop', __NAMESPACE__ . '\\loop_shortcode' );

	function loop_shortcode( $atts ) {
		ob_start();
		extract( shortcode_atts( array (
			'type' => 'post',
			'order' => 'date',
			'orderby' => 'title',
			'posts' => -1,
			'taxonomy' => '',
			'term' => '',
			'category' => '',
		), $atts ) );
		// Check if there's a tax and term specified
		if($type && $taxonomy && $term) {
			$options = array(
				'post_type' => $type,
				'order' => $order,
				'orderby' => $orderby,
				'posts_per_page' => $posts,
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $term,
					),
				),
				'category_name' => $category,
			);
		} else {
			$options = array(
				'post_type' => $type,
				'order' => $order,
				'orderby' => $orderby,
				'posts_per_page' => $posts,
				'category_name' => $category,
			);
		}
		$query = new WP_Query( $options );
		if ( $query->have_posts() ) { ?>

			<ul class="now-loop">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</ul>

		<?php $loopvariable = ob_get_clean();
		return $loopvariable;
		}
	}
