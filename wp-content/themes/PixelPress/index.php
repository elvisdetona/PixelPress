<?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();

	/**
 	* The Variables
 	*
 	* Setup default variables, overriding them if the "Theme Options" have been saved.
 	*/
	
?>

    <section class="home">
    	<div class="titdefault">
    		<h2>Entenda e participe da tecnologia</h2>
			<h3>A tecnologia já está na sua vida. Por que não se envolver com robótica para entender dela e participar de um projeto de ciência?</h3>
    	</div>
			
			<nav role="navigation">
				<ul role="menubar">
					<li role="menuitem">
						<a href="/dev/shop/robos/" class="navrobo">Robos</a>
					</li>
					<li role="menuitem">
						<a href="/dev/shop/kitsderobos/" class="navkit">Kits Educacionais</a>
					</li>
					<li role="menuitem">
						<a href="/dev/shop/robosparaensino/" class="navsala">Robótica para sala de aula</a>
					</li>
				</ul>
			</nav>


			<div class="clearfix">
				
			
			<article class="four columns">
				<img src="<?php bloginfo('template_url'); ?>/img/ico-forum.png" alt="icone Fórum sobre robótica" />
				<h3>Fórum sobre robótica</h3>
				<p><a href="#">Entre e converse com outras pessoas interessadas em robótica</a></p>
			</article>
			<article class="four columns">
				<img src="<?php bloginfo('template_url'); ?>/img/ico-loja.png" alt="icone Loja online de robótica" />
				<h3>Loja online de robótica</h3>
				<p><a href="/dev/shop/">Robôs, kits educacionais, acessórios e mais na nossa loja online de robótica</a></p>
			</article>
			<article class="four columns">
				<img src="<?php bloginfo('template_url'); ?>/img/ico-manifesto.png" alt="icone Manifesto bs educacional" />
				<h3>Manifesto bs educacional</h3>
				<p><a href="/dev/sobre-nos/manifesto/">Por que torcemos-e-trabalhamos-para um mundo com robôs</a></p>
			</article>
			<article class="four columns">
				<img src="<?php bloginfo('template_url'); ?>/img/ico-fale.png" alt="icone Fale com a gente" />
				<h3>Fale com a gente</h3>
				<p><a href="/dev/contato/fale-com-gente/">Alguma dúvida? Suporte? Entre em contato</a></p>
			</article>

			</div>				
		</section>

		
<?php get_footer(); ?>