<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options, $woocommerce;
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

	<!-- Mobile Specific Metas
  ================================================== -->
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->

	<!-- CSS
  ================================================== -->
	
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

</head>

<body>
<?php woo_top(); ?>

<header role="banner" class="container">
		<div class="box-head">
		<?php
			if ( is_home() ) { ?>
			 <h1>
				<a href="/dev/"><img src="<?php bloginfo('template_url'); ?>/img/bs-educacional.png" alt="BS Educacional" /></a>
			</h1>
			<?php } else { ?>
			 <span>
			    <a href="/dev/"><img src="<?php bloginfo('template_url'); ?>/img/bs-educacional.png" alt="BS Educacional" /></a>
			 </span>
			<?php }
		?>

			
			<!--<a href="#" class="pularconteudo ir" aria-label="Pular direto para o conteúdo">Pular para o conteúdo</a>-->
			
				<ul class="socialmedia">
					<li>
						<a href="#" class="ir smfb">Facebook</a>
					</li>
					<li>
						<a href="#" class="ir smig">Instagram</a>
					</li>
					<li>
						<a href="#" class="ir smyt">Youtube</a>
					</li>
					<li>
						<a href="#" class="ir smtw">Twitter</a>
					</li>
				</ul>			
		</div>

		<nav role="navigation">
		<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 
					'container' => 'ul',
					'theme_location' => 'primary-menu'					
					) 
				);
			} 
		?>
			<ul role="menubar" class="menucart">
				<li role="menuitem">
					<a href="/dev/carrinho/" aria-label="Seu carrinho" class="cart">Seu Carrinho</a>
				</li>

				<li role="menuitem">
					<a href="#" aria-label="Faça o login" class="login">Faça <strong>Login</strong></a> <br> <a href="#" aria-label="Cadastre-se">ou <strong>Cadastre-se</strong></a>
				</li>
				<li role="menuitem">
					<a href="/dev/contato/fale-com-gente/" class="fale">Fale com a gente</a>
				</li>
			</ul>

		</nav>
		<img src="<?php bloginfo('template_url'); ?>/img/banner.png" alt="" class="banner" />
	</header>
	<main role="main" class="container">