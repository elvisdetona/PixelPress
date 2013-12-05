<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
?>
	</main>
	<footer role="contentinfo" class="container">
		<nav role="navigation" class="clearfix">
			<ul role="menubar">
				<li role="menuitem" class="five columns">
					<a href="#" class="tittles">BS Educacional</a>
					<?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'foo_sobre' ) ) {
						wp_nav_menu( array( 
							
							'container' => 'ul', 
							'theme_location' => 'foo_sobre' 
							) 
						);
					} ?>
					
				</li>
				<li role="menuitem" class="five columns">
					<a href="#" class="tittles">Loja online de robótica</a>
					<?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'foo_loja' ) ) {
						wp_nav_menu( array( 
							
							'container' => 'ul', 
							'theme_location' => 'foo_loja' 
							) 
						);
					} ?>
					
				</li>
				<li role="menuitem" class="five columns">
					<a href="#" class="tittles">Suporte e Downloads</a>
					<?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'foo_suporte' ) ) {
						wp_nav_menu( array( 
							
							'container' => 'ul',  
							'theme_location' => 'foo_suporte' 
							) 
						);
					} ?>
					
				</li>
				<li role="menuitem" class="five columns">
					<a href="#" class="tittles">Central de aprendizado</a>
					
					<?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'foo_central' ) ) {
						wp_nav_menu( array( 
							
							'container' => 'ul', 
							'theme_location' => 'foo_central' 
							) 
						);
					} ?>
				</li>
				<li role="menuitem" class="five columns">
					<a href="#" class="tittles">Contato</a>
					
					<ul>
						<li><a href="/dev/contato/fale-com-gente/">Fale com a gente</a></li>
						<li><a href="/dev/contato/onde-estamos/">Onde estamos</a></li>
						<li class="ico-social">
							<a href="#" class="ir btfb">Facebook</a>
							<a href="#" class="ir btig">Instagram</a>
							<a href="#" class="ir btyt">Youtube</a>
						</li>
						<li class="sign">
							Desenvolvido por
							<a href="http://www.bizsys.com.br" rel="external"><img src="<?php bloginfo('template_url'); ?>/img/bizsys.png" alt="Logo da Bizsys"></a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<address class="one column">
			© 2013 BS EDUCACIONAL. TODOS OS DIREITOS RESERVADOS
		</address>
	</footer>

</body>
</html>