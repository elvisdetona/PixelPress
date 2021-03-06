<?php
/**
 * Template Name: Suporte Lista
 *
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product, $woocommerce_loop;
get_header('shop'); ?>

    <?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        #do_action('woocommerce_before_main_content');
    ?>

        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="page-title">Produtos | <?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>

            <?php
                /**
                 * woocommerce_before_shop_loop hook
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                //do_action( 'woocommerce_before_shop_loop' );
            ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php woocommerce_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>
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
                            <a href="<?php bloginfo('url'); ?>/dev/shop/<?php echo $cat->slug; ?>/" class="category-more <?php echo 'cat_'.$cat->slug; ?>"><?php echo $cat->name; ?></a>
                    <?php
                        endif;
                        $counter++;
                    endforeach;
                    ?>
                    </li>

            <?php woocommerce_product_loop_end(); ?>

            <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

            <?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

        <?php endif; ?>

    <?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
    ?>

    <?php
        /**
         * woocommerce_sidebar hook
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action('woocommerce_sidebar');
    ?>

<?php get_footer('shop'); ?>