<footer>
    <div class="container">
        <div class="footer-top">
            <div class="logo-footer from-left">
                <a href="<?php get_bloginfo('url');?>">

                <?php $logooter = get_field('logo-footer','options');?>
                    <img src="<?php echo $logooter['url'];?>" alt="<?php echo $logooter['title'];?>">
                </a>
            </div>
            <div class="menu_footer from-bottom">
                <h4>L'entreprise</h4>
                <?php wp_nav_menu(
                    array(
                        'menu-name' => 'footer',
                        'theme_location' => 'footer'
                    ));?>
            </div>
            <div class="col-contact from-right">
                <h4>Contact</h4>
                <?php echo get_field('information_de_contact','options');?>
            </div>
        </div>

        <div class="footer-bottom from-bottom">
            <?php echo get_field('credentials','options');?>           
        </div>
    </div>
    <div class="disclaimer">
        <div class="container">
            <a href="">Cookies</a>
            <p><?php echo get_field('copyright','options');?></p>
            <a href="">Confidentialité</a>
        </div>
    </div>
    
    <div class="back-to-top" id="scrollToTopBtn">
        <?php $stturl = get_field('scrolltop','options');?>
        <img src="<?php echo $stturl['url'];?>" alt="scroll-to-top" width="50"></div>
</footer>

<?php wp_footer(); ?>