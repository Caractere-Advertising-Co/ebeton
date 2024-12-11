<?php
// Menu 
register_nav_menus( array(
    'megamenu' => 'Mega Menu',
	  'main' => 'Menu Principal',
	  'footer' => 'Bas de page',
) );

add_theme_support( 'post-thumbnails' ); 

//SVG Files
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );
  
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
  
function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
  add_filter( 'upload_mimes', 'cc_mime_types' );
  add_action( 'admin_head', 'fix_svg' );

  // Create custom post (Chantiers)

function entrepFrancois_register_post_type(){
  $labels = array(
    'name' => 'Chantiers',
    'all_items' => 'Tous les chantiers',  // affiché dans le sous menu
    'singular_name' => 'Chantier',
    'add_new_item' => 'Ajouter un chantier',
    'edit_item' => 'Modifier le chantier',
    'menu_name' => 'Chantiers'
  );

  $supports = array(
    'title',
    'editor',
    'thumbnail',
    'excerpt',
    'revisions',
    'custom-fields',
    'page-attributes',
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => $supports,
      'taxonomy' => array('category'),
      'menu_position' => 5, 
      'menu_icon' => 'dashicons-admin-customizer',
  );

  register_post_type( 'chantiers', $args );
  
  // Déclaration de la taxonomie

  $labels = array(
    'name' => 'Type de chantier',
    'new_item_name' => 'Nom du type de chantier',
    'parent_item' => 'Nom projet parent',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
  );

  register_taxonomy( 'type-chantier', 'chantiers', $args);
}

add_action('init','entrepFrancois_register_post_type');

/* AJAX - add more function */

function load_more_ref() {
  $ajaxposts = new WP_Query([
    'post_type' => 'chantiers',
    'posts_per_page' => 9,
    'orderby' => 'date',
    'paged' => $_POST['paged'],
  ]);

  $response = '';
  $max_pages = $ajaxposts->max_num_pages;

  if($ajaxposts->have_posts()) {
    ob_start();
      while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $response .= get_template_part('template-parts/card-chantier');
      endwhile;

      $output = ob_get_contents();
    ob_end_clean();
  } else {
    $response = '';
  }

  $result = array(
    'max' => $max_pages,
    'html' => $output,
  );

  echo json_encode($result);
  exit;
}

add_action('wp_ajax_load_more_ref', 'load_more_ref');
add_action('wp_ajax_nopriv_load_more_ref', 'load_more_ref');

/* Récup infos popup */

// function content_popup(){
//   $ajaxposts = new WP_Query([
//       'post_type' => 'chantiers',
//       'p' => intval($_POST['id']),
//   ]);

//   if ($ajaxposts->have_posts()) {
//       while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
//           $post_data = array(
//               'title' => get_the_title(),
//               'content' => get_the_content(),
//               'thumbnails' => get_the_post_thumbnail_url(),
//               'date' => get_field('date_du_chantier'),
//               'lieu' => get_field('lieu_du_chantier'),
//               'galerie' => get_field('galerie_du_chantier'),
//           );

//           ob_start();
//           ?>
          
//           <div class="popup-content">
//             <div class="col_details">
//               <h2><?php echo $post_data['title']; ?></h2>
//               <p><strong>Date du chantier : </strong><?php echo $post_data['date']; ?></p>
//               <p><strong>Lieu : </strong><?php echo $post_data['lieu']; ?></p>
//               <?php echo $post_data['content']; ?>
//             </div>
            
//             <div class="col-slider">
//             <div class="close">X</div>

//               <?php if($post_data['galerie']) : ?>
//                 <div class="swiper swiper-reference">
//                   <div class="swiper-wrapper">
//                     <?php foreach($post_data['galerie'] as $img) :?>
//                       <div class="swiper-slide" style="background:url('<?php echo $img['url'];?>');">
//                       </div>
//                     <?php endforeach;?>
//                   </div>

//                   <div class="swiper-button-next"></div>
//                   <div class="swiper-button-prev"></div>  
//                 </div>

//                 <!-- <div thumbsSlider="" class="swiper swiper-thumbs">
//                   <div class="swiper-wrapper">
//                     <?php foreach($post_data['galerie'] as $img) : ?>
//                       <div class="swiper-slide" style="background:url('<?php echo $img['url'];?>');background-size:cover;">
//                       </div>
//                     <?php endforeach;?>
//                   </div>
//                 </div> -->
                  
//               <?php else :?>
//                 <div class="full-size" style="background:url('<?php echo $post_data['thumbnails'];?>');">
//                 </div>
//               <?php endif;?>
//             </div>
//           </div>

//           <?php
//           $response['template_content'] = ob_get_clean(); // Récupère le contenu du template après l'inclusion
//       endwhile;
//   } else {
//       $response['template_content'] = ''; // Aucun post trouvé, réponse vide
//   }

//   wp_reset_postdata(); // Réinitialise les données du post

//   echo json_encode($response);
//   exit;
// }

// add_action('wp_ajax_content_popup', 'content_popup');
// add_action('wp_ajax_nopriv_content_popup', 'content_popup');