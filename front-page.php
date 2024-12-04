<?php 

/* Template Name: Page accueil */

$elements = get_field('menu_hero');

get_header();?>

<section id="hero-section">
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php if(have_rows('slide')):
                while(have_rows('slide')): the_row();?>
                    <?php 
                        $btn      = get_sub_field('bouton');
                        $bgSlide  = get_sub_field('background-slide');    
                        $titre    = get_sub_field('titre');
                        $baseline = get_sub_field('baseline'); 
                    ?>

                    <div class="swiper-slide" <?php echo !empty($bgSlide) ? ' style="background:url(\''.$bgSlide['url'].'\') no-repeat;background-size:cover;"' : '';?>>
                        <div class="content from-top">
                            <?php if($titre): echo $titre; endif;?>
                            <?php if($baseline): echo $baseline; endif;?>
                            
                            <?php if($btn) : ?>
                                <a class="cta hero-btn" href="<?php echo $btn['url'];?>"><span><?php echo $btn['title'];?></span></a>
                            <?php endif;?>
                        </div>
                            </div>
                <?php endwhile;
            endif;?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="menu-front-page">
        <div class="container columns">
            <?php if($elements):
                foreach($elements as $item):
                    echo '<a href="'.get_permalink($item->ID).'" class="cta cta-hover">'.$item->post_name.'</a>';?>
                <?php endforeach;
            endif;?>
        </div>
    </div>
</section>

<?php get_template_part( 'templates-parts/section-introduction' );?>
<?php get_template_part( 'templates-parts/section-two-columns' );?>
<?php get_template_part( 'templates-parts/section-references', 'full', array('class' => 'front-page') );?>
<?php get_template_part( 'templates-parts/section-contact', 'full', array('class' => 'front-page') );?>

<?php get_footer();?>