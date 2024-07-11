<?php
/**
 * The template for displaying work archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DCM_theme
 */

 get_header();
 ?>
 
     <main id="primary" class="site-main">
 
         <?php if ( have_posts() ) : ?>
 
             <header class="page-header">
                 <?php
                 the_archive_title( '<h1 class="page-title">', '</h1>' );
                 ?>
             </header><!-- .page-header -->
 
             <?php
 
             $args = array(
                 'post_type'      => 'dcm-work',
                 'posts_per_page' => -1,
                 'orderby'        => 'title',
                 'order'          => 'ASC'
             );
             
             $query = new WP_Query( $args );
 
             if ( $query->have_posts() ) {
                 echo '<section class="works">';
                 while( $query->have_posts() ) {
                     $query->the_post(); 
                    // Get the ACF field value
                    $tools_and_skills = get_field('tools_and_skills');
                    // Check if $tools_and_skills is an array and convert it to a string
                    if (is_array($tools_and_skills)) {
                    $tools_and_skills = implode(' - ', $tools_and_skills);
                    }
                    ?>
                    <article class="works">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('landscape-projects'); ?>
                                    <h2><?php the_title(); ?></h2>
                                    <h3><?php echo esc_html($tools_and_skills); ?></h3>
                                </a>
                            </article>
                            <?php
                        }
                        wp_reset_postdata();
                        echo '</section>';
                    } 

                    ?>
                       
         <?php     
         else :
 
             get_template_part( 'template-parts/content', 'none' );
 
         endif;
         ?>
 
     </main><!-- #main -->
 
 <?php
 get_footer();
 