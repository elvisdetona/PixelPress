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
if ( isset( $_GET['suporte'] ) ):
?>
	<div class="suporte">
<?php
endif;
?>
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
					<a href="<?php the_permalink(); echo isset( $_GET['suporte'] ) ? '?suporte' : '' ?>"><?php the_title(); ?></a>
				</li> 
			<?php
			endwhile;
		?>
			</ul>

			<ul class="veja_tambem">
				<li class="see_more"><h4>Veja também:</h4>

					<?php
					$args = array(
					    /*'number'     => $number,
					    'orderby'    => $orderby,
					    'order'      => $order,
					    'hide_empty' => $hide_empty,
					    'include'    => $ids*/
					);

					$product_categories = get_terms( 'product_cat', $args );
					$counter = 1;
					foreach ($product_categories as $key => $cat):
						if( counter <= 4 ):
					?>
							<a href="<?php bloginfo('url'); ?>/shop/<?php echo $cat->slug; ?>/" class="category-more <?php echo 'cat_'.$cat->slug; ?>"><?php echo $cat->name; ?></a>
					<?php
						endif;
						$counter++;
					endforeach;
					?>
					</li>
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
		if ( isset( $_GET['suporte'] ) ):
		?>
			<div class="suporte_item">
				<h3>Manuais</h3>
				<ul class="manuais">
					<li><h4 class="desc">Descrição</h4> <h4 class="tipo">Tipo</h4> <h4 class="tamanho">Tamanho</h4> <h4 class="data">Data</h4></li>
					<?php
					if( get_field( 'manuais' ) ):
						foreach ( get_field( 'manuais' ) as $key => $manual):
						//print_r( $manual );
						?>
						<li>
							<span class="desc"><a href="<?php echo $manual['arquivo']['url']; ?>"><?php echo $manual['nome']; ?></a> </span>
							<span class="tipo"><?php echo $manual['tipo']; ?> </span>
							<span class="tipo"><?php echo $manual['tamanho']; ?> </span>
							<span class="tipo"><?php echo $manual['data']; ?> </span>
						</li>
						<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>

			<div class="suporte_item">
				<h3>Vídeos</h3>
				<ul class="manuais">
					<?php
					if( get_field( 'video' ) ):
					echo get_field( 'video' ); 					
					endif;
					?>
				</ul>
			</div>

			<div class="suporte_item">
				<h3>Downloads</h3>
				<ul class="downloads">
					<li><h4 class="desc">Descrição</h4> <h4 class="tipo">Tipo</h4> <h4 class="tamanho">Tamanho</h4> <h4 class="data">Data</h4></li>
					<?php
					if( get_field( 'downloads' ) ):
						foreach ( get_field( 'downloads' ) as $key => $download):
						?>
						<li>
							<span class="desc"><a href="<?php echo $download['arquivo']['url']; ?>"><?php echo $download['nome']; ?></a> </span>
							<span class="tipo"><?php echo $download['tipo']; ?> </span>
							<span class="tipo"><?php echo $download['tamanho']; ?> </span>
							<span class="tipo"><?php echo $download['data']; ?> </span>
						</li>
						<?php
						endforeach;
					endif;
					?>
				</ul>
			</div>


		<?php
		endif;
		?>

		
		<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
		?>

	</div><!-- .summary -->

	
<?php
if ( isset( $_GET['suporte'] ) ):
?>
	</div>
<?php
endif;
?>
</div><!-- #product-<?php the_ID(); ?> -->

