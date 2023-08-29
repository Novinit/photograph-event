<?php get_header(); ?>


<section  class="sliderpicture sectionblocks">
    <div class="slidetitle">
        <h1>PHOTOGRAPHE EVENT</h1>
    </div>
    <img src="http://photographe-event.local/wp-content/uploads/2023/08/Photograhe-event-ambiance.jpg"  alt="Photographe event ambiance">
   
</section>

<section class="archive sectionblocks">
    <div class="holder">
        <?php 

$args = array(
    'post_type' => 'photo',    
    'posts_per_page' =>10,
);

$my_query = new WP_Query( $args );


       // 3. On lance la boucle !
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    

the_post_thumbnail();

endwhile;
endif;

// 4. On réinitialise à la requête principale (important)
wp_reset_postdata();
         ?>


    </div>


</section>






<?php get_footer(); ?>
