<?php 
    $base_url = get_template_directory_uri();
    $logo = get_field('logo','options');
    $logo_white = get_field('logo-white','options');
    $style = get_field('header__dark_theme');
?>

<div class="header navigation">
    <div class="col-g">
        <?php if(is_front_page() || is_page_template( 'Page Référence' ) || is_page_template( 'About-us' )):?>
            <a href="<?php echo home_url();?>">
                <?php if($logo_white):?>
                    <img src="<?php echo $logo_white['url'];?>" alt="<?php echo $logo_white['title'];?>" class="logo" />
                <?php endif;?>
            </a>
        <?php else :?>

            <a href="<?php echo home_url();?>">
                <?php if($logo):?>
                    <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['title'];?>" class="logo" />
                <?php endif;?>
            </a>
        <?php endif;?>
    </div>
    
    <div class="col-d">
        <div class="primary-navigation">
            <?php wp_nav_menu( array(
                    'menu' => 'Navigation principale',
                    'theme_location' => 'Menu Principal',
                    'menu_class' => 'semi-bold nav'
            ));?>
        </div>

        <div id="open_menu" class="open_the_Mmenu">
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