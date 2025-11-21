<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
            <header class="entry-header pt-4 pt-lg-5 pb-2">
              <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
            </header>

            <div class="entry-content pb-3">
              <?php the_content(); ?>
            </div>
      </div>
      
    </article>
    <?php
  }
}
?>

<?php get_footer(); ?>
