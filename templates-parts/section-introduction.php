<?php 
    $accroche   = get_field('accroche');
    $btn        = get_field('liens_about');
    $descrPresa = get_field('description_presentation');

    if(empty($descrPresa) && empty($btn) && empty($accroche)):
        $descrPresa = get_field('description_presentation','options');
        $accroche   = get_field('accroche','options');
        $btn        = get_field('liens_about','options');
    endif;
?>

<section id="section-about-us">
    <div class="container">
        <div class="col-g from-right">
            <?php if($accroche): echo $accroche; endif;?>
        </div>
        
        <div class="col-d from-left">
            <?php if($descrPresa): echo $descrPresa; endif;?>

            <?php if($btn):?>
            <a class="cta-border" href="<?php echo $btn['url'];?>" ;?><span><?php echo $btn['title'];?></span></a>
            <?php endif;?>
        </div>
        
    </div>
</section>