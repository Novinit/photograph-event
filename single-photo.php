<?php get_header(); ?>

<section  class="photo_presentation sectionblocks">
    
   <div class="holder photo_pres">

        <div class="photo_description">
            <div class="bottom">
                <h2><?php echo get_the_title(); ?></h2>
                <p> Référence : <span class="reference"><?php the_field('reference'); ?> </span><p>
                <p> Catégorie : <?php 
                    $post = get_the_ID(); 
                    $terms = get_the_terms( $post, 'catgor' );
                    if( $terms ){
                        $term = array_shift( $terms ); 
                        echo $term->name;
                    }              
                    ?>
                <p>
                <p> Format : <?php 
                     $post = get_the_ID(); 
                     $terms = get_the_terms( $post, 'format' );
                     if( $terms ){
                         $term = array_shift( $terms );
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

            <div class="contact_button contact_popup ">
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

<section class="other_picture sectionblocks">
    <?php 
        $post = get_the_ID(); 
        $actpost = $post;       
        $terms = get_the_terms( $post, 'catgor' );
        if( $terms ){
            $term = array_shift( $terms ); 
            $active_cat = $term->slug;              
        }
        $args = array( 
            'orderby' => 'rand',
            'post_type' => 'photo',
            'taxonomy' => 'catgor',
            'tax_query'              => [
                [
                   'taxonomy' => 'catgor',
                   'field'    => 'slug',
                   'terms'    => $active_cat,
                ],
             ],
        );
        $i=0;
        $loop = new WP_Query( $args );  
           
        while ( $loop->have_posts() && $i<2 ) : $loop->the_post();
                                     
            if ( $loop->found_posts >2) {
                if (get_the_ID()!==$actpost) {
                    $idfound[$i] = get_the_ID();
                    $i=$i+1;
                }
            } 
            if ( $loop->found_posts==1) {
                $idfound[0]= get_the_ID();
                $idfound[1]= get_the_ID();
            } 
            if ( $loop->found_posts==2) {
                $idfound[$i] = get_the_ID();
                $i=$i+1;
            }

        endwhile;                
    ?>
    
    <div class="holder">
        <h3> Vous aimerez AUSSI </h3>
    </div>
    
    <div class="holder other">
        
        <div class="photo_container">
            <a href="<?php echo get_permalink($idfound[0]);?>">
                <?php echo get_the_post_thumbnail($idfound[0]); ?> 
               
            </a> 
            <div class="overlay">
                <div class="title overlay_tekst">
                    <p><?php echo get_the_title($idfound[0]); ?> </p>
                </div>
                <div class="categorie overlay_tekst">
                    <p><?php 
                        $terms = get_the_terms( $idfound[0], 'catgor' );
                        if( $terms ){
                            $term = array_shift( $terms );
                            echo $term->name;
                        }              
                    ?> </p>
                </div>
                <a href="<?php the_permalink($idfound[0]);?>"> 
                    <div class="eye overlay_tekst">
                        <img src="http://photographe-event.local/wp-content/uploads/2023/08/eye.png" alt="icon to detail page">
                    </div>
                </a>
                <div class="lightbox">
                    <img src="http://photographe-event.local/wp-content/uploads/2023/08/Icon_fullscreen.png" onclick="openModal(0);" alt="icon to lightbox">                                       
                </div>
                
            </div>
            <div id="myLightbox0" class="lightboxmodal">
                <div class="lightbox-content">
                <span class="close" onclick="closeModal(0)">&#215;</span>
                    <?php echo get_the_post_thumbnail($idfound[0]);?> 
                    <div class="referenceblock">
                        <div class="referencel">
                            <?php echo the_field('reference', $idfound[0]);  ?>
                        </div>
                        <div class="referencer"> 
                            <?php 
                            $terms = get_the_terms( $idfound[0], 'catgor' );
                            if( $terms ){
                                $term = array_shift( $terms ); 
                                echo $term->name;
                            } ?>
                        </div>  
                    </div>                     
                </div>          
            </div>
    
        </div>


        <div class="photo_container">
            <a href="<?php echo get_permalink($idfound[1]);?>">
                <?php echo get_the_post_thumbnail($idfound[1]); ?>
            </a>
            <div class="overlay">
                <div class="title overlay_tekst">
                    <p><?php echo get_the_title($idfound[1]); ?> </p>
                </div>
                <div class="categorie overlay_tekst">
                    <p><?php 
                        $terms = get_the_terms( $idfound[1], 'catgor' );
                        if( $terms ){
                            $term = array_shift( $terms );
                            echo $term->name;
                        }              
                    ?> </p>
                </div>
                <a href="<?php the_permalink($idfound[1]);?>"> 
                    <div class="eye overlay_tekst">
                        <img src="http://photographe-event.local/wp-content/uploads/2023/08/eye.png" alt="icon to detail page">
                    </div>
                </a>
                <div class="lightbox">
                    <img src="http://photographe-event.local/wp-content/uploads/2023/08/Icon_fullscreen.png" onclick="openModal(1);" alt="icon to lightbox">                                       
                </div>
                
            </div>
            
            <div id="myLightbox1" class="lightboxmodal">
                <div class="lightbox-content">
                <span class="close" onclick="closeModal(1)">&#215;</span>
                    <?php echo get_the_post_thumbnail($idfound[1]);?> 
                    <div class="referenceblock">
                        <div class="referencel">
                            <?php echo the_field('reference', $idfound[1]);  ?>
                        </div>
                        <div class="referencer"> 
                            <?php 
                            $terms = get_the_terms( $idfound[1], 'catgor' );
                            if( $terms ){
                                $term = array_shift( $terms ); 
                                echo $term->name;
                            } ?>
                        </div>  
                    </div>                     
                </div>          
            </div>
            
        </div>


    </div>

</section>



<?php get_footer(); ?>
