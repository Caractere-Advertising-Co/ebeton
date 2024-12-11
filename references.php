<?php 
/* Template Name: Page Référence */

get_header(); 

//Récupération field

$title = get_field('titre');
$titre_presa = get_field('titre_presentation');
$descr       = get_field('description');
$bouton      = get_field('bouton');

?>

<?php get_template_part( 'templates-parts/popup-reference' );?>

<section id="page-reference">
    <div class="section-galerie">
        <div class="container">
            <div class="section_titre">
                <?php echo get_field('titre');?>
                <div class="section_filter">
                    <?php 
                        $terms = get_terms('type-chantier', array(
                            'orderby' => 'name',
                            'order' => 'asc',
                            'hide-empty' => false,
                        ));
                            
                        echo '<div class="filter active" data-filter="all"> Voir tout</div>';
                        
                        foreach ($terms as $term) :
                            echo '<div class="filter" data-filter="'. $term->name .'">'. $term->name .'</div>';
                        endforeach; 
                            
                    ?>
                </div>
            </div>
        </div>
    
        <div class="grid-chantier">
            <?php 
                $chantiers = new WP_Query(array(
                    'post_type' => 'chantiers',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'paged' => 1,
                ));

                if ($chantiers->have_posts()):
                    while ($chantiers->have_posts()): $chantiers->the_post(); ?>
                        <?php get_template_part('templates-parts/card-chantier');?>
                    <?php endwhile;
                endif;
                    
                wp_reset_postdata();
            ?>
        </div>

        <div class="container">
            <a href="#!" class="cta-border" id="load-more"><span>Voir plus</span></a>
        </div>
    </div>

    <?php get_template_part('template-parts/section-contact');?>
</section>

<?php get_template_part( 'templates-parts/section-contact', 'full', array('class' => 'page-reference') );?>
<?php get_template_part( 'templates-parts/separator/horizontal-line' );?>
<?php get_template_part( 'templates-parts/section-introduction' );?>

<?php get_footer(); ?>