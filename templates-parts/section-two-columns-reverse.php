<?php 
    $titre      = get_field('titre-section-tc');
    $content    = get_field('content-tc');
    $img        = get_field('img-tc');
    $cta        = get_field('cta-tc');
?>

<section id="column-section-2" class="reverse">
    <div class="container columns">
        <div class="col-g">
            <?php if($titre): echo $titre;endif;?>
            <?php if($content): echo '<span class="from-bottom">'.$content.'</span>';endif;?>
            <?php if($cta): echo '<a href="'.$cta['url'].'" class="cta from-bottom nomobile">'.$cta['title'].'</a>';endif;?>
        </div>

        <div class="col-d">
            <?php if($img): echo '<div class="block-img"><img src="'.$img['url'].'" alt="'.$img['title'].'" class="from-bottom"></div>';endif;?>
        </div>
    </div>
</section>