<?php
/*  Template Name: About-us  */

get_header();

    // Récupérations champs ACF
    $title = get_field('titre');
    $intro = get_field('introduction');
    $btn_intro = get_field('bouton');

    $galerie = get_field('galerie');

    //services
    $subtitle = get_field('sous-titre');
    $title_service = get_field('titre-section2');
    $exp_service = get_field('explications');
    $services = 'services'; // répéteur
    $btn_service = get_field('btn_services');

    //avantages
    $titreAdv = get_field('titre_section');
    $cartesAdv = 'carte_avantages'; // répéteur
    $btnAdv = get_field('btn_avantages');
    $bgAdv    = get_field('background-advantages');

    //contact 
    $subTitleCtt = get_field('subtitle-contact');
    $titleCtt = get_field('titre-contact');
    $formCtt = get_field('formulaire_de_contact');
?>

<section id="about-lef">
    <div class="container">
        <div class="title_content">
            <div class="from-right">
                <?php echo $title;?>
            </div>
        </div>

        <div class="col_intro from-left">
            <?php echo $intro;?>
            <a href="<?php echo $btn_intro['url'];?>" class="cta-border from-bottom"><span><?php echo $btn_intro['title'];?></span></a>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="swiper swiper-aboutus from-bottom">
            <div class="swiper-wrapper" style="overflow:hidden;">
                <?php foreach($galerie as $img):?>
                    <div class="swiper-slide" <?php echo !empty($bgSlide) ? ' style="background:url(\''.$bgSlide['url'].'\') no-repeat;background-size:cover;"' : '';?>>
                        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['title'];?>"/>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="title_content">
            <div>
                <h3 class="from-left"><?php echo $subtitle;?></h3>
                <span class="from-left"><?php echo $title_service;?></span>
            </div>
        </div>

        <div id="col_services">
            <div id="exp_service" class="from-bottom">
                <?php echo $exp_service;?>
            </div>

            <div id="tabl_services">
                <?php if(have_rows('services')):
                    while(have_rows('services')): the_row();
                
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
                endif;?>
            </div>  
            
            <?php if($btn_service) : ?>
                <a class="cta from-bottom" href="<?php echo $btn_service['url'];?>"><span><?php echo $btn_service['title'];?></span></a>
            <?php endif;?>
        </div>
    </div>
</section>

<section id="advantages" class="from-bottom" <?php if($bgAdv): echo 'style="background-image: url('.$bgAdv.');"'; endif;?>>
    <div class="container">
        <span class="from-bottom"><?php echo $titreAdv;?></span>

        <div class="swiper-avantages from-bottom">
            <?php if(have_rows('carte_avantages')) : 
                while(have_rows('carte_avantages')) : the_row();
                    $icone = get_sub_field('icone');?>

                    <div class="swiper-slide">
                        <div class="content">
                            <div class="adv_title">
                                <div class="block-img">
                                    <img src="<?php echo $icone['url'];?>" alt="<?php echo $icone['title'];?>"/>
                                </div>
                                <h4><?php echo get_sub_field('nom_avantages');?></h4>
                            </div>

                            <div class="adv_descr">
                                <?php echo get_sub_field('description_avantage');?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            endif;?>     
        </div>

        <a class="cta-border" href="<?php echo $btnAdv['url'];?>"><span><?php echo $btnAdv['title'];?></span></a>
    </div>
</section>

<?php get_template_part( 'templates-parts/section-two-columns-reverse' );?>
<?php get_template_part( 'templates-parts/section-references', 'full', array('class' => 'about-us') );?>

<section id="contact">
    <div class="container from-bottom">
                
    <div class="content-title from-top">
        <h4><?php echo $subTitleCtt;?></h4>
        <?php echo $titleCtt;?>

        <span class="separator-contact"></span>
    </div>

    <?php echo do_shortcode( $formCtt , true );?>
</section>

<?php get_template_part( 'templates-parts/partenariats' );?>



<?php get_footer();?>