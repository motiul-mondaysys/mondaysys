<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>
    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="border-container">
            <div class="empty-column"></div>
            <div class="section-column">
              <?php the_title( '<h1 class="page-title section-spacing mb-0">', '</h1>' ); ?>
            </div>
        </div>
        <div class="border-container border-top">
            <div class="empty-column"></div>
            <div class="section-column">
              <div class="page-entry-content py-2 py-lg-4 px-1 px-lg-2"><?php the_content(); ?></div>
            </div>
        </div>
    </article>
    <?php
  }
}
?>

<?php get_footer(); ?>
