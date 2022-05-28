<?php
/**
 * Template Name: Post-Archive.php
 * 
 * Please note that this is the wordpress constuct of pages
 * and that other pages on your wordpress website may use a sifferent template 
 * 
 * @link http://developer.wordpress.org/themes/basics/template-hierarchy
 * 
 * @package UltraThreads
 */

get_header();
?>

<main id="primary" class="site-main">

<?php
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', 'page' );

    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile;
?>
</main>

<?php
get_sidebar();
get_footer();