<?php 
/* Template Name: Page Référence */

get_header(); 

//Récupération field

$title = get_field('titre');
$titre_presa = get_field('titre_presentation');
$descr = get_field('description');
$bouton = get_field('bouton');

?>

<?php get_template_part( 'template-parts/popup-reference' );?>

<section id="page-reference">
    <div class="container section-galerie">
        <div class="section_titre">
            <?php echo get_field('titre');?>
            <!--<div class="section_filter">
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
            </div>-->
        </div>

        <div class="grid-chantier">
            <?php 
                $chantiers = new WP_Query(array(
                    'post_type' => 'chantiers',
                    'posts_per_page' => 9,
                    'orderby' => 'date',
                    'paged' => 1,
                ));

                if ($chantiers->have_posts()):
                    while ($chantiers->have_posts()): $chantiers->the_post(); ?>
                        <?php get_template_part('template-parts/card-chantier');?>
                    <?php endwhile;
                endif;
                
                wp_reset_postdata();
            ?>
        </div>

        <a href="#!" class="cta" id="load-more"><span>Voir plus</span></a>
    </div>

    <?php get_template_part('template-parts/section-contact');?>

    <div class="container from-bottom" id="section-presa">
        <div class="title_content from-top">
            <?php echo $titre_presa;?>
        </div>

        <div class="col_intro from-right">
            <?php echo $descr;?>

            <a href="<?php echo $bouton['url'];?>" class="cta"><span><?php echo $bouton['title'];?></span></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>