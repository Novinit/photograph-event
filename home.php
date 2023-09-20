<?php 
/**
 *
 * Template Name: ACCUEIL 
 *
 * @package WordPress
 * @subpackage GHYS JOHAN
 */



get_header(); ?>


<section  class="sliderpicture sectionblocks">
    <div class="slidetitle">
        <h1>PHOTOGRAPHE EVENT</h1>
    </div>
    <img src="http://photographe-event.local/wp-content/uploads/2023/09/nathalie-11.webp"  alt="Photographe event ambiance">
   
</section>

<section class="filter sectionblocks">

    <div class="filter_left">

        <select id="select_category" class="taxonomy">
          
            <?php 
            $taxonomy ='catgor';
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ]);
            echo '<option  class="tax_choise" value="all">CATEGORIES</option><br>';
            foreach ($terms as $term){
                echo '<option class="tax_choise" value="'.$term->slug.'">' . $term->name . '</option></br>';         
            }?>
        </select>

        <select id="select_format" class="taxonomy">
        
            <?php 
            $taxonomy ='format';
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ]);
            echo '<option  class="tax_choise" value="all">FORMATS</option><br>';
            foreach ($terms as $term){
                echo '<option class="tax_choise" value="'.$term->slug.'"> ' . $term->name . '</option></br>';         
            }?>
        </select>

    </div>

    <div class="filter_right">

        <select  id="select_date" class="taxonomy">
            <option  class="tax_choise" value="">TRIE PAR</option>
            <option value="ASC">Anciennes</option>
           <option value="DESC">Récentes</option>
        </select>

    </div>



</section>

<section class="archive sectionblocks">
  
        <?php   
            $args = array(
                'post_type' => 'photo',    
                'posts_per_page' => 6,
                'order' =>'ASC',   
            );       
            generate_archive ($args);
            wp_reset_postdata();
        ?>
     
            
    <button id="button_to_load_data" class="standard-button">Load more</button>

</section>

<?php get_footer(); ?>
