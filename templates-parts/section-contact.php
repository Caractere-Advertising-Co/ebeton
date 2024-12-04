<section id="contact-us"  <?php if($args['class'] == 'front-page'): echo 'class="front-page"';endif;?>>
    <div class="container">
        <?php 
            $contact_title = get_field('titre-contact','options');
            $contact_txt = get_field('texte_contact','options');
        ?>
        <span class="from-top">
            <?php echo $contact_title;?>
            <?php echo $contact_txt;?>
        </span>

        <a class="cta from-bottom" href="<?php echo get_bloginfo('url').'/contact';?>"><span>Contact</span></a>
    </div>
</section>