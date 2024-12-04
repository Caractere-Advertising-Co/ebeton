<?php 

$title  = get_field('titre-ref','options');
$desc   = get_field('description-ref','options');
$cta    = get_field('cta-ref', 'options');

$imageLeft = get_field('image_1_ref','options');
$imageRight = get_field('image_2_ref','options');

?>

<section id="section-reference" <?php if($args['class'] == 'front-page'): echo 'class="front-page"';endif;?>>
    <div class="container columns">
        <div class="colg">
            <?php if($desc): echo $desc; endif;?>
            <?php if($imageLeft):?>
                <div class="block-img">
                    <img src="<?php echo $imageLeft['url'];?>" alt="<?php echo $imageLeft['title'];?>" />
                </div>
            <?php endif;?>
        </div>
        <div class="cold">
            <?php if($title): echo $title; endif;?>
            <?php if($imageRight):?>
                <div class="block-img">
                    <img src="<?php echo $imageRight['url'];?>" alt="<?php echo $imageRight['title'];?>" />
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="container">
        <?php if($cta):?>
            <a href="<?php $cta['url'];?>" class="cta-border"><?php echo $cta['name'];?></a>
        <?php endif;?>
    </div>
</section>