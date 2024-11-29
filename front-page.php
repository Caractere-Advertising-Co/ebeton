<?php get_header();?>

<?php get_template_part( 'template-parts/popup-reference' );?>

<section id="hero-section">
    <div class="swiper">
        <div class="swiper-wrapper">

            <?php if(have_rows('slide')):
                while(have_rows('slide')): the_row();?>
                    <?php 
                        $btn = get_sub_field('bouton');
                        $bgSlide = get_sub_field('background-slide');    
                    ?>

                    <div class="swiper-slide" <?php echo !empty($bgSlide) ? ' style="background:url(\''.$bgSlide['url'].'\') no-repeat;background-size:cover;"' : '';?>>
                        <div class="conten from-top">
                            <?php echo get_sub_field('titre');?>
                            <?php echo get_sub_field('baseline');?>
                            
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

</section>

<section id="about-us">
    <div class="divider divider-hero"></div>

    <div class="divider divider-top"></div>
    <div class="container">
        <div class="col-g from-right">
            <?php the_field('accroche');?>
        </div>
        
        <div class="col-d from-left">
            <?php $btn = get_field('liens_about');?>
            <?php the_field('description_presentation');?>
            <a class="cta" href="<?php echo $btn['url'];?>" ;?><span><?php echo $btn['title'];?></span></a>
        </div>
        
    </div>

    <div class="divider divider-bottom"></div>
</section>

<?php get_template_part( 'template-parts/partenariats');?>

<section id="references">
    <div class="container">

        <?php $title = get_field('titre_reference');?>

       <span class="from-bottom"><?php echo $title;?></span>

        <table>
            <tbody>
                <?php query_posts( array(
                    'post_type' => 'chantiers',
                    'posts_per_page' => '3',
                ));
                    if(have_posts()):
                        while(have_posts()): the_post();?>
                        <tr class="see-details-fp from-bottom desktop" style="cursor:pointer;" data-index="<?php echo get_the_id();?>" >
                            <td class="thumbnail" style="background:url('<?php echo get_the_post_thumbnail_url();?>');"></td>
                            <td class="descr_ref">
                                <span class="date"><?php echo get_the_date( 'd.m.Y' ); ?></span>
                                <h3><?php the_title();?></h3>
                                <?php the_content();?>
                                <a href="#!">Lire plus...</a>
                            </td>
                        </tr>
                        <tr class="see-details-fp from-bottom mobile" style="cursor:pointer;" data-index="<?php echo get_the_id();?>" >
                            <td class="content_slide">
                                <div class="thumbnail" style="background:url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                                <div class="descr_ref">
                                    <span class="date"><?php echo get_the_date( 'd.m.Y' ); ?></span>
                                    <h3><?php the_title();?></h3>
                                    <?php the_content();?>
                                    <a href="#!">Lire plus...</a>
                                </div>
                            </td>
                        </tr>                
                        <?php endwhile;
                    endif;

                    wp_reset_query();
                ?>
            </tbody>
        </table>
        <?php $btn_ref = get_field('texte_bouton_ref');?>
        <a class="cta" href="<?php echo $btn_ref['url'];?>"><span>voir plus</span></a>
    </div>
</section>

<?php get_template_part('template-parts/section-contact');?>

<?php get_footer();?>