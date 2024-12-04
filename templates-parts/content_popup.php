<div class="popup-content desktop">
    <div class="col_g">
        <h2><?php echo $post_data['title']; ?></h2>
        <p>Date du chantier : <?php echo $post_data['date']; ?></p>
        <p>Lieu : <?php echo $post_data['lieu']; ?></p>
        <p>X</p>
        <div class="content"><?php echo $post_data['content']; ?></div>
    </div>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php if($post_data['galerie']) :
                foreach($post_data['galerie'] as $img) : ?>
                    <div class="swiper-slide"></div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
