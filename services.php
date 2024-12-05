<?php
/* Template Name: Services */

get_header();

// Récupérations champs ACF
 $title = get_field('titre');
 $intro = get_field('introduction');
 $btn_intro = get_field('bouton');

 $imgSeparator = get_field('image-separator');
 $carousel = get_field('carousel');

//services
 $subtitle = get_field('sous-titre');
 $title_service = get_field('titre-section2');
 $exp_service = get_field('explications');
 $services = get_field('services'); // répéteur
 $btn_service = get_field('btn_services');

//contact 
 $subTitleCtt = get_field('subtitle-contact');
 $titleCtt = get_field('titre-contact');
 $formCtt = get_field('formulaire_de_contact');
?>

<section id="about-lef">
    <div class="container">
        <div class="title_content">
            <div class="from-right"><?php echo $title;?></div>
        </div>

        <div class="col_intro from-left">
            <?php echo $intro;?>

            <div id="col_services">
                <div id="exp_service" class="from-bottom"><?php echo $exp_service;?>é</div>

                <div id="tabl_services">
                    <?php 
                        if(have_rows('services')):
                            while(have_rows('services')): the_row(); ?>
                            <?php
                                $carspec = array('é','è','à','ç');
                                $ref =  substr(strtolower(get_sub_field('nom_service')),0,5);
                                $id = str_replace($carspec,'e',$ref).'_id';
                            ?>
                                <div id="<?php echo $id;?>" class="from-bottom" >
                                    <button class="accordion"><?php echo get_sub_field('nom_service');?></button>
                                    <div class="content_toggle">
                                        <?php echo get_sub_field('explications-service');?>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <?php if($imgSeparator):?>
            <div class="block-img img-separator">
                <img src="<?php echo $imgSeparator['url'];?>" alt="<?php echo $imgSeparator['title'];?>"/>
            </div>
        <?php endif;?>
    </div>
    
    <div class="container columns">
        <div class="colg">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        
        <div class="cold">
            <div class="swiper swiper-activite from-bottom">
                <div class="swiper-wrapper" style="overflow:hidden;">
                    <?php foreach($carousel as $serv):?>
                        <div class="swiper-slide">
                            <h3 ><?php echo $serv['titre'];?></h3>
                            <?php echo $serv['description'];?>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

    <div class="container swiperScrollbar">
        <div class="swiper-scrollbar"></div>
    </div>
    <div class="container">
        <?php if($btn_service):?>
            <a href="<?php echo $btn_service['url'];?>" class="cta-border">
                <?php echo $btn_service['title'];?>
            </a>
        <?php endif;?>
    </div>
</section>

<section id="contact">
    <div class="container from-bottom">
        <div class="content-title from-top">
            <h4><?php echo $subTitleCtt;?></h4>
            <?php echo $titleCtt;?>
            <span class="separator-contact"></span>
        </div>

        <?php echo do_shortcode( $formCtt , true );?>
    </div>
</section>

<?php get_template_part( 'templates-parts/partenariats' );?>
<?php get_footer();