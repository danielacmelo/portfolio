<?php
/**
 * The template for displaying about me page 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DCM_theme
 */

 get_header();
 ?>
 
     <main id="primary" class="site-main">
 
         <?php
             while ( have_posts() ) :
                 the_post();
             ?>
 
                 <header class="entry-header">
                     <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                 </header><!-- .entry-header -->
                 
                 <div class="entry-content">
                 
                     <article>
                             <?php the_content(); ?>
                     </article>    

    <?php
            if ( function_exists( 'get_field' ) ) {
            $about_images = get_field('images');
            $size = 'landscape-about';
            $caption = wp_get_attachment_caption( $about_images );

            if ($about_images && is_array($about_images)) :
                ?>
                <section class="about-images">
                <div class="gallery">
                        <?php foreach ($about_images as $image) : ?>
                            <div class="gallery-item">
                                <?php 
                                echo wp_get_attachment_image( $image, $size ); 
                                $caption = wp_get_attachment_caption( $image );
                                if ($caption) :
                                    ?>
                                    <div class="gallery-caption">
                                        <?php echo esc_html($caption); ?>
                                    </div>
                                    <?php
                                endif;
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <?php
            endif;
        }    

    endwhile; // End of the loop.
    ?>

             </div><!-- .entry-content -->            
             
 
     </main><!-- #main -->
 
 <?php
 get_footer();    