<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
    <?php
  }
}
?>

<?php get_footer(); ?>
