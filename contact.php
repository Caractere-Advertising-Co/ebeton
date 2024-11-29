<?php 
/* Template Name: Page contact */

get_header();?>

<section id="content-page-contact">
    <div class="container">
        <?php 
            $title = get_field('titre_contact');
            $content = get_field('contenu_page_contact');
            $form = get_field('shortcode_formulaire');
        
        ?>
        <div class="title_content">
            <div><?php echo $title;?></div>
        </div>

        <div class="col_intro">
            <?php echo $content;?>
            <?php echo do_shortcode($form);?>
        </div>
    </div>
</section>

<?php get_footer();