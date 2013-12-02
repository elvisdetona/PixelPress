<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
    get_header();
    global $woo_options;
?>
    <section class="interna">
       <?php
            if ( have_posts() ) { $count = 0;
                while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
        
        <h1><?php the_title(); ?></h1>

        <?php if ( is_page( 'manifesto' )) { ?>
        <div class="clearfix one columns">
            <p class="init">
            Inglês, espanhol, chinês? Artesanato, bale, teatro, judô? Qual a melhor escola? Ranking Enem? Quais as oportunidades que devemos dar aos filhos? E as capacidades básicas como domínio do português, ciências e matemática? Será que eles estão apreendendo? Será que nós ainda dominamos o que aprendemos?
           
            </p>
            <p class="custom"> <span class="ir casp">"</span>Vivemos em um mundo cada vez mais complexo, cheio de tecnologia, bombardeados por informações, com milhões de opções de escolha, onde tudo acontece em uma velocidade muito grande. <span class="ir casp-last">"</span></p>
        </div>
        <article class="three columns">
        <p>Nós brasileiros, ainda sofremos muito com a qualidade de ensino. Nossa capacidade de formar mão de obra qualificada na área cientifica é muito baixa. Mesmo em boas faculdades, as oficinas e laboratórios ainda deixam muito a desejar.</p>
        <p>Na última avaliação do PISA, programa de avaliação internacional de estudantes, feita em 2012 o Brasil ocupou o 53º lugar. Posição muito baixa para um pais um país que ocupou a sétima colocação na economia mundial em 2012. Entre os melhores colocados, no PISA, estão China, Coreia do Sul, Finlândia e Cingapura.</p>
        <p>O estereótipo do Brasileiro é de ser criativo, bom jogo de cintura, flexibilidade, relacionamento. Por outro lado nossa produtividade na indústria e serviço ainda é muito baixa assim como nossa capacidade de planejamento. Temos casos de sucesso, setores que avançaram mais. </p>
        <p>Ainda precisamos de muito mais para mudar o Brasil e finalmente concretizar nosso potencial.</p>

        </article>
        <article class="three columns">
            <p>A melhora de capacidades básicas sejam na escrita como na área de ciências é fundamental para permitir que cada um tenha uma chance real de atingir o todo o seu desenvolvimento.</p>
            <p>Nos últimos anos temos visto muitos esforços nessa área traduzidos, grandes investimentos principalmente de organizações internacionais em programas STEM (sigla em inglês para ciência, tecnologia, engenharia e matemática).</p>
            <p>Alguns exemplos nessa área são: o grande sucesso das aulas de matemática online do professor Kahn e sua tradução pela Fundação Lemann. O crescimento dos cursos Kumon. Materiais e metodologias para melhorar o ensino como o “Ciência e Tecnologia com criatividade” da Abramundo. Programas como o ciência sem fronteiras.</p>
        </article>
        <article class="three columns">
            <p>O aprendizado da robótica, através da montagem de robôs, aumenta a lente como cada um de nós enxerga a área cientifica.</p>
            <p>Nos permite entender, pelo menos um pouco, de toda a tecnologia que está a nossa volta. Além disso melhora habilidades que são usadas em todos os aspectos da vida como raciocínio critico, planejamento, perseverança.</p>
            <p>Nossa oferta também treina o indivíduo no a aprender sozinho.</p>
        </article>

        <div class="clearfix one columns">
            <p class="custom-dest">Nossos produtos são baseados em robôs de simples montagem que usam a linguagem Basic Stamps ou Propeller.</p>
        </div>

            
            

        <?php } else { ?>

        <article class="one columns">
        <?php the_content(); ?>
        </article>
           
        <?php } ?>


            <?php  } // End WHILE Loop
            } else { ?>
        <?php } // End IF Statement ?>  

        <?php get_sidebar(); ?> 
 
    </section>
          
    
<?php get_footer(); ?>