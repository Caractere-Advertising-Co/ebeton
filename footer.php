<?php 

$titleCol1       = get_field('titleCol1','options');
$titleCol2       = get_field('titleCol2','options');

$logoFooter      = get_field('logo-footer','options');
$cookies         = get_field('cookies','options');
$confidentialite = get_field('confidentialite','options');

$credentials     = get_field('credentials','options');
$copyright       = get_field('copyright','options');

$infos           = get_field('information_de_contact','options');

?>

<footer>
    <div class="container">
        <div class="footer-top">
            <div class="logo-footer from-left">
                <a href="<?php get_bloginfo('url');?>">
                    <div class="block-img">
                        <img src="<?php echo $logoFooter['url'];?>" alt="<?php echo $logoFooter['title'];?>">
                    </div>    
                </a>
            </div>
            <div class="menu_footer from-bottom">
                <h4><?php echo $titleCol1;?></h4>
                <?php wp_nav_menu(
                    array(
                        'menu-name' => 'footer',
                        'theme_location' => 'footer'
                    ));?>
            </div>
            <div class="col-contact from-right">
                <h4><?php echo $titleCol2;?></h4>
                <?php if($infos): echo $infos; endif;?>
            </div>
        </div>

        <div class="footer-bottom from-bottom">
            <?php echo $credentials;?>           
        </div>
    </div>
    <div class="disclaimer">
        <div class="container">
            <?php if($cookies):?>
                <a href="<?php echo $cookies['url'];?>"><?php echo $cookies['title'];?></a>
            <?php endif;?>
            <p><?php if($copyright): echo $copyright; endif;?></p>
            <?php if($confidentialite):?>
                <a href="<?php echo $confidentialite['url'];?>"><?php echo $confidentialite['title'];?></a>
            <?php endif;?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>