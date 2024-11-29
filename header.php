<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="<?php echo  get_template_directory_uri();?>/dist/main.js" defer></script>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
        <?php 
            $base_url = get_template_directory_uri();
            $logo = get_field('logo','options');
            $logo_white = get_field('logo-white','options');
            $style = get_field('header__dark_theme');
        ?>

        <?php get_template_part('template-parts/megamenu');?>

        <?php if($style) : ?>
            <div id="header" class="dark-theme">
                <div class="container">
                    <a class="logo-white" href="<?php echo get_bloginfo( 'url' );?>">
                        <img class="logo" src="<?php echo  $logo_white['url'];?>" alt="<?php echo $logo_white['alt'];?>"/>
                    </a>
                    
                    <a href="<?php echo get_bloginfo( 'url' );?>">
                        <img class="logo" src="<?php echo  $logo['url'];?>" alt="<?php echo $logo['alt'];?>"/>
                    </a>

                    <div id="open_menu" class="open_the_Mmenu">
                        <p class="labelToggle active">Menu</p>
                        <p class="labelToggle">Fermer</p>
                        <svg id="open_the_Mmenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" stroke-width=".6" fill="rgba(0,0,0,0)" stroke-linecap="round" style="cursor: pointer">
                            <path d="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7">
                                <animate dur="0.2s" attributeName="d" values="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7;M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7" fill="freeze" begin="start.begin" />
                                <animate dur="0.2s" attributeName="d" values="M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7;M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7" fill="freeze" begin="reverse.begin" />
                            </path>
                            <rect width="10" height="10" stroke="none">
                                <animate dur="2s" id="reverse" attributeName="width" begin="click" />
                            </rect>
                            <rect width="10" height="10" stroke="none">
                                <animate dur="0.001s" id="start" attributeName="width" values="10;0" fill="freeze" begin="click" />
                                <animate dur="0.001s" attributeName="width" values="0;10" fill="freeze" begin="reverse.begin" />
                            </rect>
                        </svg>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div id="header">
                <div class="container">
                    <a href="<?php echo get_bloginfo( 'url' );?>">
                        <img class="logo" src="<?php echo  $logo['url'];?>" alt="<?php echo $logo['alt'];?>"/>
                    </a>

                    <div id="open_menu" class="open_the_Mmenu">
                        <p class="labelToggle active">Menu</p>
                        <p class="labelToggle">Fermer</p>
                        <svg id="open_the_Mmenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" stroke="#022964" stroke-width=".6" fill="rgba(0,0,0,0)" stroke-linecap="round" style="cursor: pointer">
                            <path d="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7">
                                <animate dur="0.2s" attributeName="d" values="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7;M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7" fill="freeze" begin="start.begin" />
                                <animate dur="0.2s" attributeName="d" values="M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7;M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7" fill="freeze" begin="reverse.begin" />
                            </path>
                            <rect width="10" height="10" stroke="none">
                                <animate dur="2s" id="reverse" attributeName="width" begin="click" />
                            </rect>
                            <rect width="10" height="10" stroke="none">
                                <animate dur="0.001s" id="start" attributeName="width" values="10;0" fill="freeze" begin="click" />
                                <animate dur="0.001s" attributeName="width" values="0;10" fill="freeze" begin="reverse.begin" />
                            </rect>
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif;?>

