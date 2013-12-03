<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post_id;
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$post_id = get_the_id();
	$cat_id = array_keys( get_the_terms( $post->id, 'product_cat' ) );
	$cat_id = $cat_id[0];
	$args = array(
		'post_type'		=>	'product',
		'tax_query' => array(
			array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => $cat_id
			)
		)
	);
	$products_query = new WP_Query( $args );
	if ( $products_query->have_posts() ):
	?>
		<div class="alternative_nav">
			<h3>Navegue por aqui</h3>
			<ul>
			<?php
			while ( $products_query->have_posts() ):
				$products_query->the_post();
			?>
			<li <?php echo ( $post_id == get_the_ID() ? "class='current-product item-product'" : "class='item-product'" ); ?>>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li> 
			<?php
			endwhile;
		?>
			</ul>
		</div>
	<?php
	endif;
	wp_reset_postdata();
	?>

	<div class="summary entry-summary">
		<?php
			/**
			 * woocommerce_show_product_images hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		
		<div class="clearfix">
			<?php do_action( 'woocommerce_after_single_product' ); ?>
		</div>

		
		<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>

	</div><!-- .summary -->

	

</div><!-- #product-<?php the_ID(); ?> -->

