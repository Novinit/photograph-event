<?php

/************************/
/**** WP theme add's ****/
/************************/

add_theme_support( 'menus' );



/**************************************/
/**** Load style files  and sripts ****/
/**************************************/

function photographe_events_style_scripts() {
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}  
add_action( 'wp_enqueue_scripts', 'photographe_events_style_scripts' );





/******************************/
/****   Generate archive  *****/
/******************************/

function generate_archive ($args) {
      
    $my_query = new WP_Query( $args );
    $counter=0;
    $count_posts = $my_query->post_count; ?>

    <div class="holder archive"> <?php
        if( $my_query->have_posts() ) : 
            
            while( $my_query->have_posts() ) :

                /**** Creation archive ****/
                $counter=$counter+1;
                $my_query->the_post(); ?>         
                <div class="photo_container">
                    <?php the_post_thumbnail();?>
                    <div class="overlay">
                        <div class="title overlay_tekst">
                            <p><?php echo get_the_title(); ?> </p>
                        </div>
                        <div class="categorie overlay_tekst">
                            <p><?php 
                                $post = get_the_ID(); 
                                $terms = get_the_terms( $post, 'catgor' );
                                if( $terms ){
                                    $term = array_shift( $terms );
                                    echo $term->name;
                                }              
                            ?> </p>
                        </div>
                        <a href="<?php the_permalink();?>"> 
                            <div class="eye overlay_tekst">
                                <img src="http://photographe-event.local/wp-content/uploads/2023/08/eye.png" alt="icon to detail page">
                            </div>
                        </a>
                        <div class="lightbox">
                            <img src="http://photographe-event.local/wp-content/uploads/2023/08/Icon_fullscreen.png" onclick="openModal(<?php echo $counter.', '.$count_posts; ?>)" alt="icon to lightbox">                                       
                        </div>
                    </div>
                        
                  
                    <div id="myLightbox<?php echo $counter;?>" class="lightboxmodal">
                        <div class="lightbox-content">
                            <span class="close" onclick="closeModal(<?php echo $counter; ?>)">&#215;</span>
                            <?php 
                                if ($counter < $count_posts)  {$next=$counter+1;} 
                                if ($counter == $count_posts)  {$next=1;}
                                if ($counter > 1) {$prev=$counter-1;} 
                                if ($counter == 1) {$prev = $count_posts;}
                            ?>
                            <span class="next" onclick="openModal(<?php echo $next.', '.$count_posts; ?>)">&#8250;</span>
                            <span class="prev" onclick="openModal(<?php echo $prev.', '.$count_posts; ?>)">&#8249;</span>
                            <?php the_post_thumbnail();?> 
                            <div class="referenceblock">
                                <div class="referencel">
                                    <?php echo the_field('reference');  ?>
                                </div>
                                <div class="referencer"> 
                                    <?php 
                                    $post = get_the_ID(); 
                                    $terms = get_the_terms( $post, 'catgor' );
                                    if( $terms ){
                                        $term = array_shift( $terms ); 
                                        echo $term->name;
                                    } ?>
                                </div>  
                            </div>                     
                        </div>                       
                    </div>
                </div>
            <?php   
            endwhile;

        endif;
        wp_reset_postdata();?>
    </div><?php
}


/*****************************/
/****  Load More button  *****/
/****************************/

function load_more() {
   
    $args = array(
        'post_type' => 'photo',    
        'posts_per_page' => 18,
    );       
    generate_archive ($args);
    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');





/********************/
/****  Filters  *****/
/********************/

function filter() {
    $tri = isset($_POST['year']) ? $_POST['year'] : 'ASC';

    if ($tri === 'DESC') {
        $order = 'DESC';
    } else {
        $order = 'ASC';
    }

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'order' => $order,      
      
    );
    
    // Filter Category
    if ($_POST['cat'] !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'catgor',
            'field' => 'slug',
            'terms' => $_POST['cat'],
        );
    }
    // Filter Format
    if ($_POST['form'] !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $_POST['form'],
        );
    }


    generate_archive ($args);
    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_filter', 'filter');
add_action('wp_ajax_nopriv_filter', 'filter');




