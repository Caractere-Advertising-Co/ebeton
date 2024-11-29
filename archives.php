<?php 
    $home = get_bloginfo('url');
    
    wp_safe_redirect($home);
    exit();
?>