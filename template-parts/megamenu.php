
<div id="megamenu" class="megamenu">
    <div class="container">
        <div class="col-g">
        <?php wp_nav_menu(
                    array(
                        'menu' => 'principal',
                        'theme_location' => 'Mega Menu',
                    ));?>
        </div>
        <div class="col-d">
            <?php 
                $titleMm = get_field('titre_megamenu','options');
                $emailCt = get_field('email_de_contact','options');
                $arrayRS = get_field('reseaux_sociaux','options');
                $telCt = get_field('numero_de_telephone','options');
            
                echo '<h2>'.$titleMm .'</h2>';
                echo '<a href="mailto:'. $emailCt .'">'.$emailCt.'</a><br>';
                
                echo '<a class="tel_Mmenu" href="tel:0032'.substr($telCt,1,10).'"> T.+32 ('. substr($telCt,0,1) . ') ' . substr($telCt,1,10).'</a>';
                
                ?>
                <div class="line_rs">
                    <?php
                    if($arrayRS) :
                        foreach($arrayRS as $rs) :
                            echo '<a href="'.$rs['url-compte'].'"><img src="'.$rs['icone-rs']['sizes']['medium'].'"/></a>';
                        endforeach;
                    endif;
                    ?>
                </div>
        </div>
    </div>
</div>