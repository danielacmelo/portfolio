<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DCM_theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
    ?>

        <header class="entry-header">
            <h1 class="screen-reader-text"><?php echo esc_html('Daniela Melo'); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-content">

            <article>
                <?php the_content(); ?>
            </article>

        </div><!-- .entry-content -->

    <?php
    endwhile;
    ?>

</main><!-- #main -->

<?php
get_footer();