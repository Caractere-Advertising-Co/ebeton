<?php $taxs = get_the_terms(get_the_id(),'type-chantier');
    
if($taxs): 
    foreach($taxs as $tax):
        $value = $tax->name;
    endforeach;
endif;?>

<a href="<?php echo get_the_post_thumbnail_url();?>" data-filters="<?php echo $value;?>" data-index="<?php echo get_the_id();?>" href="" style="background:url('<?php echo get_the_post_thumbnail_url();?>');" <?php post_class('from-bottom') ;?>>
    <article class="thumbnail">
        <h3><?php the_title();?></h3>
        <p><?php echo get_field('lieu_du_chantier');?></p>
    </article>
</a>