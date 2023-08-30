<?php get_header(); ?>

<section  class="photo_presentation sectionblocks">
    
   <div class="holder">

        <div class="photo_description">
            <div class="bottom">
                <h2><?php echo get_the_title(); ?></h2>
                <p> Référence : <?php the_field('reference'); ?> <p>
                <p> Catégorie : <?php 
                    $post = get_the_ID(); 
                    $terms = get_the_terms( $post, 'catgor' );
                    if( $terms ){
                        $term = array_shift( $terms ); // get first
                    
                        // now you can display the name of the term
                        echo $term->name;
                    }              
                    ?>
                <p>
                <p> Format : <?php 
                     $post = get_the_ID(); 
                     $terms = get_the_terms( $post, 'format' );
                     if( $terms ){
                         $term = array_shift( $terms ); // get first
                     
                         // now you can display the name of the term
                         echo $term->name;
                     }          
                    ?>
                <p>
                <p> Type : <?php the_field('type'); ?> <p>
                <p> Année : <?php the_field('annee'); ?> <p>
            </div>
        </div>
      

        <div class="photo">
            <?php the_post_thumbnail( 'full' ); ?> 
        </div>
    
    </div>   
   
</section>

<section class="contact_navigation sectionblocks">

    <div class="holder"> 

        <section class="contact">

            <div class="question">
                    <p> Cette photo vous intéresse ?</p>
            </div>

            <div class="contact_button">
                 <button class="standard-button">
                    Contact
                </button>
            </div>



        </section>
        
        <nav class="post_navigation">


            <div class="nav_thumb">
                   <?php 
                     the_post_navigation( 
                        array( 
                            'prev_text'  => __( '← ' ),
                            'next_text'  => __( '' ),
                        ) 
                    );
                    $prev_post = get_previous_post();
                    if( $prev_post ) { $prev_thumbnail = get_the_post_thumbnail( $prev_post->ID, 'thumbnail');}
                    if( $prev_post ) {echo "<a href='".get_permalink($prev_post->ID)."'>".$prev_thumbnail."</a>"; }
                    ?> 
            </div>
            <div class="nav_thumb">
                    <?php 
                     the_post_navigation( 
                        array( 
                            'prev_text'  => __( '' ),
                            'next_text'  => __( ' →' ),
                        ) 
                    );                    
                    $next_post = get_next_post();                  
                    if( $next_post ) {$next_thumbnail = get_the_post_thumbnail( $next_post->ID, 'thumbnail');}
                    if( $next_post ) {echo "<a href='".get_permalink($next_post->ID)."'>".$next_thumbnail."</a>";}
                    ?> 
            </div>
        
            

        </nav>


    </div>
</section>




<?php get_footer(); ?>
